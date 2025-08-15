<?php
declare(strict_types=1);

namespace App\Controller;

class InformationSystemDetailsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('InformationSystemDetails');
        $this->loadModel('ProgrammingLanguages');
        $this->loadModel('Frameworks');
        $this->loadModel('Dbms');
        $this->loadModel('ContainerUsages');
        $this->loadModel('CloudProviderUsages');
        $this->loadModel('DevopsToolUsages');

        $this->viewBuilder()->setLayout('default');
    }

    public function add($informationSystemId = null)
    {
        $detail = $this->InformationSystemDetails->newEmptyEntity();

        if ($this->request->is('post')) {
            $detail = $this->InformationSystemDetails->patchEntity($detail, $this->request->getData());

            // pastikan relasi ke parent
            $detail->information_system_id = $informationSystemId;

            if ($this->InformationSystemDetails->save($detail)) {
                $this->Flash->success(__('Detail Sistem berhasil disimpan.'));
                return $this->redirect(['controller' => 'InformationSystems', 'action' => 'view', $informationSystemId]);
            }
            $this->Flash->error(__('Gagal menyimpan detail, silakan coba lagi.'));
        }

        $programmingLanguages = $this->ProgrammingLanguages->find('list')->toArray();
        $frameworks = $this->Frameworks->find('list')->toArray();
        $dbms = $this->Dbms->find('list')->toArray();
        $containerUsages = $this->ContainerUsages->find('list')->toArray();
        $cloudUsages = $this->CloudProviderUsages->find('list')->toArray();
        $devopsUsages = $this->DevopsToolUsages->find('list')->toArray();

        $this->set(compact(
            'detail',
            'programmingLanguages',
            'frameworks',
            'dbms',
            'containerUsages',
            'cloudUsages',
            'devopsUsages',
            'informationSystemId'
        ));
    }
}
