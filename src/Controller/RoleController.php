<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Role Controller
 *
 * @property \App\Model\Table\RoleTable $Role
 */
class RoleController extends AppController
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
        $query = $this->Role->find();
        $role = $this->paginate($query);

        $this->set(compact('role'));
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Role->get($id, contain: ['Users']);
        $this->set(compact('role'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Role->newEmptyEntity();
        if ($this->request->is('post')) {
            $role = $this->Role->patchEntity($role, $this->request->getData());
            if ($this->Role->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Role->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Role->patchEntity($role, $this->request->getData());
            if ($this->Role->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Role->get($id);

        if($id == '2f25e8a4-b9fa-444c-b809-5d925e8517b9' || $id == '6fe48ae2-f916-43ea-ad2e-c375eb51d2de'){
            $this->redirect('/role');
        }
        
        if ($this->Role->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
