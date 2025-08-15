<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * IndikatorKinerja Controller
 *
 * @property \App\Model\Table\IndikatorKinerjaTable $IndikatorKinerja
 */
class IndikatorKinerjaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->IndikatorKinerja->find();
        $indikatorKinerja = $this->paginate($query);

        $this->set(compact('indikatorKinerja'));
    }

    /**
     * View method
     *
     * @param string|null $id Indikator Kinerja id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $indikatorKinerja = $this->IndikatorKinerja->get($id, contain: []);
        $this->set(compact('indikatorKinerja'));
    }

    public function getData(){
         try {
            $data = $this->getfetchData();
            debug($data);die;
            $this->set('data', json_decode($data, true)); // Pass data to the view
        } catch (\Exception $e) {
            $this->Flash->error($e->getMessage());
        }

        exit();
    }

    public function saveData()
    {
        try {
            // Fetch the data from the API
            $fetchedData = $this->getfetchData();

            // Check if $fetchedData is already an array or decode if it's a JSON string
            if (is_string($fetchedData)) {
                $dataArray = json_decode($fetchedData, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new \UnexpectedValueException('Invalid JSON: ' . json_last_error_msg());
                }
            } elseif (is_array($fetchedData)) {
                $dataArray = $fetchedData; // Already an array
            } else {
                throw new \UnexpectedValueException('Fetched data is neither JSON string nor array.');
            }

            debug($fetchedData);

            // Map the fetched data to the database fields
            $dataToSave = array_map(function ($item) {
                return [
                    'nip' => $item['nip'] ?? null,
                    'status_sk' => $item['status_sk'] ?? null,
                    'tanggal_sk' => $item['tanggal_sk'] ?? null,
                    'nama' => $item['name'] ?? null,
                    'kode_indikator' => $item['kode_indikator'] ?? null,
                    'judul_sk' => $item['judul_sk'] ?? null,
                    'jenis_penugasan' => $item['jenis_penugasan'] ?? null,
                    'posisi' => $item['posisi'] ?? null,
                    'no_sk' => $item['no_sk'] ?? null,
                    'unit_pengusul' => $item['unit_pengusul'] ?? null,
                ];
            }, $dataArray);
            debug($dataToSave);
            die;

            // Create entities
            $entities = $this->IndikatorKinerja->newEntities($dataToSave);

            // Save entities
            if ($this->IndikatorKinerja->saveMany($entities)) {
                $this->Flash->success('Data successfully saved.');
            } else {
                $this->Flash->error('Failed to save data.');
            }
        } catch (\Exception $e) {
            $this->Flash->error('Error: ' . $e->getMessage());
        }

        return $this->redirect(['controller' => 'IndikatorKinerja', 'action' => 'index']);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $indikatorKinerja = $this->IndikatorKinerja->newEmptyEntity();
        if ($this->request->is('post')) {
            $indikatorKinerja = $this->IndikatorKinerja->patchEntity($indikatorKinerja, $this->request->getData());
            if ($this->IndikatorKinerja->save($indikatorKinerja)) {
                $this->Flash->success(__('The indikator kinerja has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The indikator kinerja could not be saved. Please, try again.'));
        }
        $this->set(compact('indikatorKinerja'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Indikator Kinerja id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $indikatorKinerja = $this->IndikatorKinerja->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $indikatorKinerja = $this->IndikatorKinerja->patchEntity($indikatorKinerja, $this->request->getData());
            if ($this->IndikatorKinerja->save($indikatorKinerja)) {
                $this->Flash->success(__('The indikator kinerja has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The indikator kinerja could not be saved. Please, try again.'));
        }
        $this->set(compact('indikatorKinerja'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Indikator Kinerja id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $indikatorKinerja = $this->IndikatorKinerja->get($id);
        if ($this->IndikatorKinerja->delete($indikatorKinerja)) {
            $this->Flash->success(__('The indikator kinerja has been deleted.'));
        } else {
            $this->Flash->error(__('The indikator kinerja could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
