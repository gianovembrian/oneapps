<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class InformationSystemsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->viewBuilder()->setLayout('default');
    }

    public function index()
    {
        $informationSystems = $this->paginate($this->InformationSystems->find()->contain(['InformationSystemDetails']));
        $this->set(compact('informationSystems'));
    }


    public function add()
    {
        $informationSystem = $this->InformationSystems->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $identity = $this->request->getAttribute('identity');
            if ($identity) {
                $data['user_id'] = $identity->getIdentifier();
            }

            $informationSystem = $this->InformationSystems->patchEntity(
                $informationSystem,
                $data,
                [
                    'associated' => ['InformationSystemDetails']
                ]
            );

            if ($this->InformationSystems->save($informationSystem)) {
                $this->Flash->success(__('Data sistem informasi berhasil disimpan.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Data gagal disimpan, silakan coba lagi.'));
        }

        // Dropdown yang hanya single choice
   // ambil list dari tabel master
    $appTypes = TableRegistry::getTableLocator()->get('AppType')
        ->find('list', ['keyField' => 'id', 'valueField' => 'name'])
        ->toArray();

            // Multiple choice untuk detail
        $programmingLanguages = TableRegistry::getTableLocator()->get('ProgrammingLanguages')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $frameworks = TableRegistry::getTableLocator()->get('Frameworks')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $dbms = TableRegistry::getTableLocator()->get('Dbms')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $containerUsages = TableRegistry::getTableLocator()->get('ContainerUsages')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $cloudUsages = TableRegistry::getTableLocator()->get('CloudProviderUsages')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $devopsUsages = TableRegistry::getTableLocator()->get('DevopsToolUsages')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $securityTools = TableRegistry::getTableLocator()->get('SecurityTools')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $webServers = TableRegistry::getTableLocator()->get('WebServers')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $containerTechnologies = TableRegistry::getTableLocator()->get('ContainerTechnologies')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $cloudProviders = TableRegistry::getTableLocator()->get('CloudProviders')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $devopsTools = TableRegistry::getTableLocator()->get('DevopsTools')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $this->set(compact(
            'informationSystem',
            'appTypes',
            'programmingLanguages',
            'frameworks',
            'dbms',
            'containerUsages',
            'cloudUsages',
            'devopsUsages',
            'securityTools',
            'webServers',
            'containerTechnologies',
            'cloudProviders',
            'devopsTools'
        ));
    }

    public function edit($id = null)
    {
        $informationSystem = $this->InformationSystems->get($id, [
            'contain' => ['InformationSystemDetails'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $informationSystem = $this->InformationSystems->patchEntity(
                $informationSystem,
                $this->request->getData(),
                [
                    'associated' => ['InformationSystemDetails']
                ]
            );

            if ($this->InformationSystems->save($informationSystem)) {
                $this->Flash->success(__('The information system has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The information system could not be saved. Please, try again.'));
        }

        $appTypes = TableRegistry::getTableLocator()->get('AppType')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])
            ->toArray();
        $programmingLanguages = TableRegistry::getTableLocator()->get('ProgrammingLanguages')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $frameworks = TableRegistry::getTableLocator()->get('Frameworks')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $dbms = TableRegistry::getTableLocator()->get('Dbms')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $containerUsages = TableRegistry::getTableLocator()->get('ContainerUsages')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $cloudUsages = TableRegistry::getTableLocator()->get('CloudProviderUsages')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $devopsUsages = TableRegistry::getTableLocator()->get('DevopsToolUsages')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $securityTools = TableRegistry::getTableLocator()->get('SecurityTools')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $webServers = TableRegistry::getTableLocator()->get('WebServers')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $containerTechnologies = TableRegistry::getTableLocator()->get('ContainerTechnologies')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $cloudProviders = TableRegistry::getTableLocator()->get('CloudProviders')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $devopsTools = TableRegistry::getTableLocator()->get('DevopsTools')
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $this->set(compact(
            'informationSystem',
            'appTypes',
            'programmingLanguages',
            'frameworks',
            'dbms',
            'containerUsages',
            'cloudUsages',
            'devopsUsages',
            'securityTools',
            'webServers',
            'containerTechnologies',
            'cloudProviders',
            'devopsTools'
        ));
    }

    public function view($id = null)
    {
        $informationSystem = $this->InformationSystems->get($id, [
            'contain' => [
                'AppType',
                'Users',
                'InformationSystemDetails' => [
                    'AppType',
                    'BackendProgrammingLanguage',
                    'FrontendProgrammingLanguage',
                    'FrameworkBackend',
                    'FrameworkFrontend',
                    'Dbms',
                    'ContainerTechnologies',
                    'DevopsTools',
                    'SecurityTools',
                    'WebServers',
                ]
            ],
        ]);

        $this->set(compact('informationSystem'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $informationSystem = $this->InformationSystems->get($id);
        if ($this->InformationSystems->delete($informationSystem)) {
            $this->Flash->success(__('The information system has been deleted.'));
        } else {
            $this->Flash->error(__('The information system could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
