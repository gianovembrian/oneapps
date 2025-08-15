<?php
declare(strict_types=1);

namespace App\Controller;
use League\OAuth2\Client\Provider\GenericProvider;

/**
 * DitbangVideos Controller
 *
 * @property \App\Model\Table\DitbangVideosTable $DitbangVideos
 */
class DitbangVideosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['preview']);
    }

    public function index()
    {
        $query = $this->DitbangVideos->find();
        $ditbangVideos = $this->paginate($query);

        $this->set(compact('ditbangVideos'));
    }

    public function preview(){
        $this->viewBuilder()->setLayout('login');

    }

    /**
     * View method
     *
     * @param string|null $id Ditbang Video id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ditbangVideo = $this->DitbangVideos->get($id, contain: []);
        $this->set(compact('ditbangVideo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ditbangVideo = $this->DitbangVideos->newEmptyEntity();
        if ($this->request->is('post')) {
            $ditbangVideo = $this->DitbangVideos->patchEntity($ditbangVideo, $this->request->getData());
            if ($this->DitbangVideos->save($ditbangVideo)) {
                $this->Flash->success(__('The ditbang video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ditbang video could not be saved. Please, try again.'));
        }
        $this->set(compact('ditbangVideo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ditbang Video id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ditbangVideo = $this->DitbangVideos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ditbangVideo = $this->DitbangVideos->patchEntity($ditbangVideo, $this->request->getData());
            if ($this->DitbangVideos->save($ditbangVideo)) {
                $this->Flash->success(__('The ditbang video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ditbang video could not be saved. Please, try again.'));
        }
        $this->set(compact('ditbangVideo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ditbang Video id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ditbangVideo = $this->DitbangVideos->get($id);
        if ($this->DitbangVideos->delete($ditbangVideo)) {
            $this->Flash->success(__('The ditbang video has been deleted.'));
        } else {
            $this->Flash->error(__('The ditbang video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
