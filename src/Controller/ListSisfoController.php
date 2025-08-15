<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;

/**
 * ListSisfo Controller
 *
 * @property \App\Model\Table\ListSisfoTable $ListSisfo
 */
class ListSisfoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {

        $identity = $this->request->getAttribute('identity');
        $unitKerjaList = TableRegistry::getTableLocator()->get('UnitKerja');
        $unitKerjaList = $unitKerjaList->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $filterUnitKerja = $this->request->getQuery('unit_kerja');

        $role = $this->checkRole();

        if($role == 'admin'){
            $condition = array();
        }else if($role == 'unit'){
            $condition = array('ListSisfo.unit_kerja_id' => $identity->unit_kerja_id);
        }

        $query = $this->ListSisfo->find()
            ->contain(['Users', 'AppType', 'UnitKerja', 'ListsisfoFiles'])
            ->where($condition)
            ->order(['created' => 'DESC']);

        if (!empty($filterUnitKerja)) {
            $query->where(['ListSisfo.unit_kerja_id' => $filterUnitKerja]);
        }

        $listSisfo = $query->all();

        $this->set(compact('listSisfo', 'unitKerjaList', 'filterUnitKerja', 'role'));
    }

    public function deleteFile()
    {
        $this->request->allowMethod(['post']);
        $fileId = $this->request->getData('fileId');
        $filesTable = TableRegistry::getTableLocator()->get('ListsisfoFiles');

        try {
            $file = $filesTable->get($fileId);
            $filePath = WWW_ROOT . 'files' . DS . 'uploads' . DS . $file->file_name;

            if (file_exists($filePath)) {
                unlink($filePath);
            }

            if ($filesTable->delete($file)) {
                $this->set(['success' => true]);
            } else {
                $this->set(['success' => false]);
            }
        } catch (\Exception $e) {
            $this->set(['success' => false]);
        }

        $this->viewBuilder()->setOption('serialize', ['success']);
    }


    public function download($fileId)
    {
    // Assuming you have a model 'ListsisfoFile' that holds the file details
        $filesTable = TableRegistry::getTableLocator()->get('ListsisfoFiles');
        $file = $filesTable->get($fileId);

    // Define the file path
        $filePath = WWW_ROOT . 'files' . DS . 'uploads' . DS . $file->file_name;

    // Check if the file exists
        if (!file_exists($filePath)) {
            throw new NotFoundException(__('File not found'));
        }

    // Check if the file is readable
        if (!is_readable($filePath)) {
        // Attempt to set readable permissions
        if (!chmod($filePath, 0644)) { // Make the file readable
            throw new InternalErrorException(__('The file is not readable, and permissions could not be adjusted.'));
        }
    }

    // Serve the file for download
    $this->response = $this->response
    ->withType('application/octet-stream')
    ->withFile(
        $filePath,
        ['download' => true, 'name' => $file->filename]
    );

    return $this->response;
}


    // public function download($id)
    // {
    //     // Fetch the file details from the 'listsisfo_files' table
    //     $filesTable = TableRegistry::getTableLocator()->get('ListsisfoFiles');
    //     $file = $filesTable->get($id);
    //     // Check if file exists
    //     if (!$file) {
    //         $this->Flash->error('File not found.');
    //         return $this->redirect(['controller' => 'ListSisfo', 'action' => 'index']);
    //     }
    //     // Get the file path
    //     $filePath = WWW_ROOT . 'files'. DS . 'uploads' . DS . $file->filename; // assuming your files are in the 'files' directory inside 'webroot'
    //     // Check if file exists
    //     if (!file_exists($filePath)) {
    //         $this->Flash->error('File not found.');
    //         return $this->redirect(['controller' => 'ListSisfo', 'action' => 'index']);
    //     }
    //     // Set response type and headers for downloading
    //     $response = $this->response->withFile(
    //         $filePath, // Path to the file
    //         [
    //             'download' => true,
    //             'name' => $file->filename, // Display name for download
    //         ]
    //     );
    //     // Send the response
    //     return $response;
    // }


    /**
     * View method
     *
     * @param string|null $id List Sisfo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null)
    {
        $listSisfo = $this->ListSisfo->get($id, contain: ['Users', 'AppType', 'UnitKerja', 'ListsisfoFiles']);
        $this->set(compact('listSisfo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $role = $this->checkRole();

        if($role != 'admin'){
            $this->redirect('/');
        }

        $listSisfo = $this->ListSisfo->newEmptyEntity();
        $identity = $this->request->getAttribute('identity');

        if ($this->request->is('post')) {

            $data = $this->request->getData();

            $listSisfo = $this->ListSisfo->patchEntity($listSisfo, $data);

            if ($this->ListSisfo->save($listSisfo)) {
                $this->Flash->success(__('The list sisfo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The list sisfo could not be saved. Please, try again.'));
        }


        $appTypesTable = TableRegistry::getTableLocator()->get('AppType');
        $appTypes = $appTypesTable->find('list', [
            'keyField' => 'id', 
            'valueField' => 'name'
        ])->toArray();

        $this->set(compact('appTypes'));
        $this->set(compact('identity'));

        $users = $this->ListSisfo->Users->find('list', limit: 200)->all();
        $this->set(compact('listSisfo', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id List Sisfo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $listSisfo = $this->ListSisfo->get($id, contain: []);
    //     $identity = $this->request->getAttribute('identity');

    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $data = $this->request->getData();

    //         // debug($data);

    //         $listSisfo = $this->ListSisfo->patchEntity($listSisfo, $data);
    //         // debug($listSisfo);die;
    //         if ($this->ListSisfo->save($listSisfo)) {
    //             $this->Flash->success(__('The list sisfo has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The list sisfo could not be saved. Please, try again.'));
    //     }

    //     $appTypesTable = TableRegistry::getTableLocator()->get('AppType');
    //     $appTypes = $appTypesTable->find('list', [
    //         'keyField' => 'id', 
    //         'valueField' => 'name'
    //     ])->toArray();

    //     $this->set(compact('appTypes'));
    //     $this->set(compact('identity'));

    //     $users = $this->ListSisfo->Users->find('list', limit: 200)->all();
    //     $this->set(compact('listSisfo', 'users'));
    // }

    public function edit($id = null)
    {
        $listSisfo = $this->ListSisfo->get($id, ['contain' => ['ListsisfoFiles']]);
        $identity = $this->request->getAttribute('identity');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $uploadedFiles = $this->request->getUploadedFiles();

            // Handle uploaded files
            if (!empty($uploadedFiles['files'])) {
                $filesTable = TableRegistry::getTableLocator()->get('ListsisfoFiles');
                foreach ($uploadedFiles['files'] as $uploadedFile) {
                    if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
                        $filename = $uploadedFile->getClientFilename();
                        $filePath = WWW_ROOT . DS . 'files' . DS . 'uploads' . DS . $filename;

                        // Save file to disk
                        $uploadedFile->moveTo($filePath);

                        // Create new file record
                        $fileEntity = $filesTable->newEntity([
                            'list_sisfo_id' => $id,
                            'file_name' => $filename,
                            'file_path' => 'files/uploads/' . $filename,
                            'file_size' => $uploadedFile->getSize(),
                        ]);

                        // Save file record to database
                        if (!$filesTable->save($fileEntity)) {
                            $this->Flash->error(__('Failed to save uploaded file: ' . $filename));
                        }
                    }
                }
            }

            // Update main ListSisfo record
            $listSisfo = $this->ListSisfo->patchEntity($listSisfo, $data);
            if ($this->ListSisfo->save($listSisfo)) {
                $this->Flash->success(__('The list sisfo has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The list sisfo could not be saved. Please, try again.'));
        }

        $appTypesTable = TableRegistry::getTableLocator()->get('AppType');
        $appTypes = $appTypesTable->find('list', [
            'keyField' => 'id', 
            'valueField' => 'name'
        ])->toArray();

        $this->set(compact('appTypes'));
        $this->set(compact('identity'));

        $users = $this->ListSisfo->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('listSisfo', 'users'));
    }



    // // Example usage
    // $input = "example_string";
    // $uuid = stringToUuid($input);
    // echo $uuid;

    /**
     * Delete method
     *
     * @param string|null $id List Sisfo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listSisfo = $this->ListSisfo->get($id);
        if ($this->ListSisfo->delete($listSisfo)) {
            $this->Flash->success(__('The list sisfo has been deleted.'));
        } else {
            $this->Flash->error(__('The list sisfo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
