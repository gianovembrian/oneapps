<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AppType Controller
 *
 * @property \App\Model\Table\AppTypeTable $AppType
 */
class AppTypeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->AppType->find();
        $appType = $this->paginate($query);

        $this->set(compact('appType'));
    }

    /**
     * View method
     *
     * @param string|null $id App Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appType = $this->AppType->get($id, contain: ['ListSisfo']);
        $this->set(compact('appType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appType = $this->AppType->newEmptyEntity();
        if ($this->request->is('post')) {
            $appType = $this->AppType->patchEntity($appType, $this->request->getData());
            if ($this->AppType->save($appType)) {
                $this->Flash->success(__('The app type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app type could not be saved. Please, try again.'));
        }
        $this->set(compact('appType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appType = $this->AppType->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appType = $this->AppType->patchEntity($appType, $this->request->getData());
            if ($this->AppType->save($appType)) {
                $this->Flash->success(__('The app type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app type could not be saved. Please, try again.'));
        }
        $this->set(compact('appType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appType = $this->AppType->get($id);
        if ($this->AppType->delete($appType)) {
            $this->Flash->success(__('The app type has been deleted.'));
        } else {
            $this->Flash->error(__('The app type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
