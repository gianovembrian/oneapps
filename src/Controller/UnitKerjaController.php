<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UnitKerja Controller
 *
 * @property \App\Model\Table\UnitKerjaTable $UnitKerja
 */
class UnitKerjaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */


    public function initialize(): void
    {
        parent::initialize();

        if($this->isLoggedIn() != false){
             $role = $this->checkRole();

             if($role == 'unit'){
                $this->redirect('/');
            }

        }
    }
    
    public function index()
    {
        $query = $this->UnitKerja->find();
        $unitKerja = $this->paginate($query);

        $this->set(compact('unitKerja'));
    }

    /**
     * View method
     *
     * @param string|null $id Unit Kerja id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $unitKerja = $this->UnitKerja->get($id, contain: ['ListSisfo', 'Users']);
        $this->set(compact('unitKerja'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $unitKerja = $this->UnitKerja->newEmptyEntity();
        if ($this->request->is('post')) {
            $unitKerja = $this->UnitKerja->patchEntity($unitKerja, $this->request->getData());
            if ($this->UnitKerja->save($unitKerja)) {
                $this->Flash->success(__('The unit kerja has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The unit kerja could not be saved. Please, try again.'));
        }
        $this->set(compact('unitKerja'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Unit Kerja id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $unitKerja = $this->UnitKerja->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $unitKerja = $this->UnitKerja->patchEntity($unitKerja, $this->request->getData());
            if ($this->UnitKerja->save($unitKerja)) {
                $this->Flash->success(__('The unit kerja has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The unit kerja could not be saved. Please, try again.'));
        }
        $this->set(compact('unitKerja'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Unit Kerja id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unitKerja = $this->UnitKerja->get($id);
        if ($this->UnitKerja->delete($unitKerja)) {
            $this->Flash->success(__('The unit kerja has been deleted.'));
        } else {
            $this->Flash->error(__('The unit kerja could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
