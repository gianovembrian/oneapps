<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Dbms Controller
 *
 * @property \App\Model\Table\DbmsTable $Dbms
 */
class DbmsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Dbms->find();
        $dbms = $this->paginate($query);

        $this->set(compact('dbms'));
    }

    /**
     * View method
     *
     * @param string|null $id Dbm id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dbm = $this->Dbms->get($id, contain: []);
        $this->set(compact('dbm'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dbm = $this->Dbms->newEmptyEntity();
        if ($this->request->is('post')) {
            $dbm = $this->Dbms->patchEntity($dbm, $this->request->getData());
            if ($this->Dbms->save($dbm)) {
                $this->Flash->success(__('The dbm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dbm could not be saved. Please, try again.'));
        }
        $this->set(compact('dbm'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dbm id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dbm = $this->Dbms->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dbm = $this->Dbms->patchEntity($dbm, $this->request->getData());
            if ($this->Dbms->save($dbm)) {
                $this->Flash->success(__('The dbm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dbm could not be saved. Please, try again.'));
        }
        $this->set(compact('dbm'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dbm id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dbm = $this->Dbms->get($id);
        if ($this->Dbms->delete($dbm)) {
            $this->Flash->success(__('The dbm has been deleted.'));
        } else {
            $this->Flash->error(__('The dbm could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
