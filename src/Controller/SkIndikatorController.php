<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;

/**
 * SkIndikator Controller
 *
 * @property \App\Model\Table\SkIndikatorTable $SkIndikator
 */
class SkIndikatorController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->addUnauthenticatedActions([
            'apiIndex' ,
        ]);
    }



    public function index()
    {
        $query = $this->SkIndikator->find();
        $skIndikator = $this->paginate($query);

        $this->set(compact('skIndikator'));
    }

    /**
     * View method
     *
     * @param string|null $id Sk Indikator id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skIndikator = $this->SkIndikator->get($id, contain: []);
        $this->set(compact('skIndikator'));
    }

   public function saveData()
    {
        set_time_limit(300); // Allow more execution time
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

            // Map the fetched data to the database fields for SkIndikator
            $dataToSave = array_map(function ($item) {
                return [
                    'nip' => $item['nip'] ?? null,
                    'nama' => $item['name'] ?? null,
                    'posisi' => $item['posisi'] ?? null,
                    'kode_indikator' => $item['kode_indikator'] ?? null,
                    'tahun' => date('Y', strtotime($item['tanggal_sk'] ?? 'now')), // Extract year from 'tanggal_sk'
                    'jumlah_sk' => $item['jumlah_sk'] ?? 1, // Default to 1 if not provided
                    'status' => $item['status_sk'] ?? null,
                    'jenis_penugasan' => $item['jenis_penugasan'] ?? null,
                ];
            }, $dataArray);

            // Remove all existing records from the SkIndikator table
            $this->SkIndikator->deleteAll([]);

            // Create entities for SkIndikator model
            $entities = $this->SkIndikator->newEntities($dataToSave);

            // Save entities
            if ($this->SkIndikator->saveMany($entities)) {
                $this->Flash->success('Data successfully replaced in SkIndikator.');
            } else {
                $this->Flash->error('Failed to save data into SkIndikator.');
            }
        } catch (\Exception $e) {
            $this->Flash->error('Error: ' . $e->getMessage());
        }

        return $this->redirect(['controller' => 'SkIndikator', 'action' => 'index']);
    }


    public function apiIndex()
    {
        $this->request->allowMethod(['get']); // Allow only GET requests

        // Get query parameters
        $query = $this->request->getQueryParams();

        $indikatorKinerja = $query['indikator_kinerja'] ?? null;
        $nip = $query['nip'] ?? null;
        $tahun = $query['tahun'] ?? null;

        // Build the conditions for filtering
        $conditions = [];

        if (!empty($indikatorKinerja)) {
            $conditions['indikator_kinerja'] = $indikatorKinerja;
        }

        if (!empty($nip)) {
            $conditions['nip'] = $nip;
        }

        if (!empty($tahun)) {
            $conditions['tahun'] = $tahun;
        }

        // Load the VSkIndikatorApi model and query the data
        $unitKerjaList = TableRegistry::getTableLocator()->get('VSkIndikatorApi');
        $data = $unitKerjaList->find()
            ->where($conditions)
            ->select([
                'indikator_kinerja',
                'sasaran_kinerja',
                'nip',
                'tahun',
                'bulan',
                'komponen_id',
                'komponen_score',
                'last_update',
            ])
            ->toArray();

        // Return the JSON response
        $this->response = $this->response
            ->withType('application/json') // Set response type as JSON
            ->withStringBody(json_encode([
                'success' => true,
                'data' => $data,
            ]));

        // Stop further processing
        return $this->response;
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skIndikator = $this->SkIndikator->newEmptyEntity();
        if ($this->request->is('post')) {
            $skIndikator = $this->SkIndikator->patchEntity($skIndikator, $this->request->getData());
            if ($this->SkIndikator->save($skIndikator)) {
                $this->Flash->success(__('The sk indikator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sk indikator could not be saved. Please, try again.'));
        }
        $this->set(compact('skIndikator'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sk Indikator id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skIndikator = $this->SkIndikator->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skIndikator = $this->SkIndikator->patchEntity($skIndikator, $this->request->getData());
            if ($this->SkIndikator->save($skIndikator)) {
                $this->Flash->success(__('The sk indikator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sk indikator could not be saved. Please, try again.'));
        }
        $this->set(compact('skIndikator'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sk Indikator id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skIndikator = $this->SkIndikator->get($id);
        if ($this->SkIndikator->delete($skIndikator)) {
            $this->Flash->success(__('The sk indikator has been deleted.'));
        } else {
            $this->Flash->error(__('The sk indikator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
