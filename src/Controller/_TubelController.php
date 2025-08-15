<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;
use Cake\Http\Exception\BadRequestException;
use Cake\ORM\TableRegistry;


/**
 * Pdln Controller
 *
 */
class PdlnController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->addUnauthenticatedActions([
                'approval'
            ]);

        $this->loadComponent('Flash');

        // $this->request->allowMethod(['post', 'put']);
    }

    public function index()
    {

        $identity = $this->request->getAttribute('identity');
        $userId = $identity->id;

        if($identity->role_id == '2f25e8a4-b9fa-444c-b809-5d925e8517b9')
        {
             $query = $this->Pdln->find()
                    ->contain(['PdlnUser','Countries']);

        }else if($identity->role_id == '6fe48ae2-f916-43ea-ad2e-c375eb51d2de'){
              $query = $this->Pdln->find()
                    ->contain(['PdlnUser','Countries'])
                    ->where(['Pdln.user_id' => $userId]);

        }

        $pdlnData = $this->paginate($query);

        $this->set(compact('pdlnData'));
    }
    /**
     * View method
     *
     * @param string|null $id Pdln id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $data_detail = $this->Pdln->get($id, contain: ['PdlnUser','Countries','Users']);
            $this->set(compact('data_detail'));
    }

    public function approval($id = null)
    {
        // Fetch the existing record from the pdln table
        $pdln = $this->Pdln->get($id);

        if ($this->request->is(['post', 'put'])) {
            // Get approval data from the request
            $approvalData = $this->request->getData();
            $pdln->approva_date = date('Y-m-d H:i:s');
            $pdln->approval_status = $approvalData['approval_status'];
            $pdln->approval_notes = $approvalData['approval_notes'];
            $pdln->is_new = 1;

            // Attempt to save the data to the database
            if ($this->Pdln->save($pdln)) {
                $this->Flash->success(__('Approval has been saved.'));
                return $this->redirect(['action' => 'index']); // Redirect to an appropriate page
            } else {
                $this->Flash->error(__('Unable to save approval. Please try again.'));
            }
        }

        // Pass the pdln data to the view
        $this->set(compact('pdln'));
    }

public function addRequest()
{
    $pdln = $this->Pdln->newEmptyEntity();

    if ($this->request->is('post')) {
        $identity = $this->request->getAttribute('identity');
        $userId = $identity->getIdentifier();
        $saved_data = $this->request->getData();

        $uploadFields = [
            'surat_usulan_setneg',
            'surat_biaya_setneg',
            'kak_setneg',
            'cv_setneg',

            'surat_persetujuan_setneg',
            'surat_undangan_setneg',
            'jadwal_kegiatan_setneg',

            'sk_pns_setneg',
            'ktp_setneg',
            'daftar_riwayat_setneg',
            'usulan_kk_setneg',

            'surat_usulan_itb',
            'surat_undangan_itb',
            'surat_biaya_itb',
            'jadwal_kegiatan_itb',

            'kak_itb',
            'surat_persetujuan_itb',
            'usulan_kk_itb'
        ];

        foreach ($uploadFields as $field) {

            if (isset($saved_data[$field]) && $saved_data[$field]->getError() === UPLOAD_ERR_OK) {
                $uploadedFile = $saved_data[$field];
                $fileName = uniqid() . '_' . time() . '_' . $uploadedFile->getClientFilename();
                $fileTmp = $uploadedFile->getStream()->getMetadata('uri');

                $files = $this->uploadFilesAttach($fileName, $fileTmp);

                $saved_data[$field] = $files;
            }else{
                unset($saved_data[$field]);
            }
        }

        $saved_data = array_merge($saved_data, [
            'created' => new \DateTime(),
            'modified' => new \DateTime(),
            'is_new' => 1,
            'user_id' => $userId
        ]);

       
        $pdln = $this->Pdln->patchEntity($pdln, $saved_data);

        if ($this->Pdln->save($pdln)) {

            $pdlnId = $pdln->id; 
            $employeesData = $this->request->getData('employees');

            if (!empty($employeesData)) {
                $pdlnUserTable = TableRegistry::getTableLocator()->get('PdlnUser');
                $savedEmployees = [];

                foreach ($employeesData as $employeeData) {
                    $employeeEntity = $pdlnUserTable->newEmptyEntity(); // Use the loaded table instance

                    $employeeEntity = $pdlnUserTable->patchEntity($employeeEntity, [
                        'gelar_belakang' => $employeeData['gelar_belakang'] ?? null,
                        'gelar_depan' => $employeeData['gelar_depan'] ?? null,
                        'golongan' => $employeeData['golongan'] ?? null,
                        'id_pegawai' => $employeeData['id_pegawai'] ?? null,
                        'jenis_pegawai' => $employeeData['jenis_pegawai'] ?? null,
                        'jenis_penugasan' => $employeeData['jenis_penugasan'] ?? null,
                        'nama_lengkap' => $employeeData['nama_lengkap'] ?? null,
                        'nama_unit_kerja' => $employeeData['nama_unit_kerja'] ?? null,
                        'nama_unit_kerja_penempatan' => $employeeData['nama_unit_kerja_penempatan'] ?? null,
                        'nidn' => $employeeData['nidn'] ?? null,
                        'nip' => $employeeData['nip'] ?? null,
                        'status_pegawai' => $employeeData['status_pegawai'] ?? null,
                        'tingkat_pendidikan_terakhir' => $employeeData['tingkat_pendidikan_terakhir'] ?? null,
                        'pdln_id' => $pdlnId // Ensure the relationship is set
                    ]);

                    if ($pdlnUserTable->save($employeeEntity)) {
                        $savedEmployees[] = $employeeEntity;
                    } else {
                        $this->Flash->error(__('Could not save employee: ' . $employeeEntity->nama_lengkap));
                    }
                }

                if (!empty($savedEmployees)) {
                    $this->Flash->success(__('All selected employees have been saved successfully.'));
                } else {
                    $this->Flash->error(__('Failed to save the employees. Please try again.'));
                }

                return $this->redirect(['action' => 'index']);
            }
            
            return $this->redirect(['action' => 'index']);

        } else {
            $this->Flash->error(__('Data gagal disimpan. Silakan coba lagi.'));
        }
    }

    $this->set(compact('pdln'));
}

     function uploadFilesAttach($file_name = null, $file_tmp = null){
        //check if folder exist
        if (!file_exists(WWW_ROOT . 'files' . DS . 'uploads')){
            mkdir(WWW_ROOT . 'files' . DS . 'uploads', 0775);
        }
        if (!file_exists(WWW_ROOT . 'files' . DS . 'uploads')){
            mkdir(WWW_ROOT . 'files' . DS . 'uploads', 0775);
        }

        if (move_uploaded_file($file_tmp, WWW_ROOT . 'files' . DS . 'uploads' .DS. $file_name)) {
            $filename = $file_name;
        }
        
        return $filename;
    }

    /**
     * Edit method
     *
     * @param string|null $id Pdln id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pdln = $this->Pdln->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pdln = $this->Pdln->patchEntity($pdln, $this->request->getData());
            if ($this->Pdln->save($pdln)) {
                $this->Flash->success(__('The pdln has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pdln could not be saved. Please, try again.'));
        }
        $this->set(compact('pdln'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pdln id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pdln = $this->Pdln->get($id);
        if ($this->Pdln->delete($pdln)) {
            $this->Flash->success(__('The pdln has been deleted.'));
        } else {
            $this->Flash->error(__('The pdln could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
