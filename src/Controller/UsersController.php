<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
use League\OAuth2\Client\Provider\GenericProvider;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

      public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login','setPassword']);
    }


    public function initialize(): void
    {
        parent::initialize();
        // $this->loadComponent('RequestHandler');
            $this->Authentication->addUnauthenticatedActions([
                'login' ,
                'setPassword',       
                // 'add'               
            ]);

            if($this->isLoggedIn() != false){
                 $role = $this->checkRole();

                 if($role == 'unit'){
                    $this->redirect('/');
                }

            }

       
    }



    public function index()
    {
        $query = $this->Users->find()
            ->contain(['Role', 'UnitKerja']); // Assuming you have set up the association between Pdln and PdlnUser
        $users = $query->all();

        $this->set(compact('users'));
    }



    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UnitKerja', 'Role', 'ListSisfo'], // Tambahkan UnitKerja dan Roles
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $user = $this->Users->newEmptyEntity();

        $roleTable = TableRegistry::getTableLocator()->get('Role');

        $roles = $roleTable->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        if ($this->request->is('post')) {
            
            $data = $this->request->getData();

            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function ssoLogin()
    {
        $this->viewBuilder()->setLayout('login');

       
    }
   
    public function login($type=null)
    {
        $this->viewBuilder()->setLayout('login');

        if(empty($type)){


            $this->request->allowMethod(['get', 'post']);
            $result = $this->Authentication->getResult();
            // regardless of POST or GET, redirect if user is logged in
            if ($result && $result->isValid()) {
                // redirect to /articles after login success
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'ListSisfo',
                    'action' => 'index',
                ]);

                return $this->redirect($redirect);
            }
            // display error if user submitted and authentication failed
            if ($this->request->is('post') && !$result->isValid()) {
                $this->Flash->error(__('Invalid username or password'));
            }

        }else if ($type == 'azure'){

            $provider = new GenericProvider([
                'clientId'                => '31600baf-6732-4777-bfb9-efa996906b9d',   
                'clientSecret'            => 'sE~8Q~XyrPRLlbRDhmz0taCFTbDGpsDk3LTRjaYv', 
                'redirectUri'             => 'https://oneapp.itb.ac.id/login/azure', 
                'urlAuthorize'            => 'https://login.microsoftonline.com/db6e1183-4c65-405c-82ce-7cd53fa6e9dc/oauth2/v2.0/authorize', 
                'urlAccessToken'          => 'https://login.microsoftonline.com/db6e1183-4c65-405c-82ce-7cd53fa6e9dc/oauth2/v2.0/token',     
                'urlResourceOwnerDetails' => 'https://graph.microsoft.com/v1.0/me',  
            ]);

            if (!$this->request->getQuery('code')) {
                $authorizationUrl = $provider->getAuthorizationUrl([
                    'scope' => 'openid profile email User.Read', 
                ]);
                $this->request->getSession()->write('oauth2state', $provider->getState());
                return $this->redirect($authorizationUrl);
            }

             elseif (empty($this->request->getQuery('state')) || ($this->request->getQuery('state') !== $this->request->getSession()->read('oauth2state'))) {
                $this->request->getSession()->delete('oauth2state');
                $this->Flash->error(__('Invalid state. Please try again.'));
                return $this->redirect(['action' => 'login']);
            } else {
                try {
                    $accessToken = $provider->getAccessToken('authorization_code', [
                        'code' => $this->request->getQuery('code'),
                    ]);

                    $resourceOwner = $provider->getResourceOwner($accessToken);
                    $user = $resourceOwner->toArray();

                    $email = $user['mail'] ?? $user['userPrincipalName'];
                    $existingUser = $this->Users->find()->where(['email' => $email])->first();

                    if ($existingUser) {
                        $this->Authentication->setIdentity($existingUser);
                        return $this->redirect(['controller' => 'ListSisfo', 'action' => 'index']);
                    } else {
                        $this->Flash->error(__('User does not exist.'));
                        return $this->redirect(['action' => 'login']);
                    }
                } catch (\Exception $e) {
                    $this->Flash->error(__('Failed to authenticate with Azure: ' . $e->getMessage()));
                    return $this->redirect(['action' => 'login']);
                }
            }

        }
       
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }


    public function setPassword($id = null)
    {
        // Find the user by ID
        $this->viewBuilder()->setLayout('login');
        $user = $this->Users->get($id);
        
        if (!$user) {
            throw new NotFoundException(__('User not found'));
        }

        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->getData();
            $user = $this->Users->patchEntity($user, $data);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The password has been updated.'));
                return $this->redirect(['action' => 'index']); // Redirect after successful update
            } else {
                $this->Flash->error(__('The password could not be updated. Please try again.'));
            }
        }

        // Pass user to the view
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

}
