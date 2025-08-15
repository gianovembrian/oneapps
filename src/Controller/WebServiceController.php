<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;

/**
 * OverseasTrip Controller
 *
 * @property \App\Model\Table\OverseasTripTable $OverseasTrip
 */
class WebServiceController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function isLoggedIn(): bool
    {
        $identity = $this->request->getAttribute('identity');

        debug($identity);die;
        return $identity !== null;
    }

    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->addUnauthenticatedActions([
            'getDataIndikator',
        ]);
    }


    public function getDataIndikator()
    {
        $this->request->allowMethod(['post']); 
        $data = $this->request->getData();

        $sasaranKinerja = $data['sasaran_kinerja'] ?? null;
        $nip = $data['nip'] ?? null;
        $tahun = $data['tahun'] ?? null;

        $conditions = [];
        if (!empty($sasaranKinerja)) {
            $conditions['sasaran_kinerja'] = $sasaranKinerja;
        }
        if (!empty($nip)) {
            $conditions['nip'] = $nip;
        }
        if (!empty($tahun)) {
            $conditions['tahun'] = $tahun;
        }

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
        ->withType('application/json')
        ->withStringBody(json_encode([
            'success' => true,
            'data' => $data,
        ]));

        return $this->response;
    }

  public function getAPI()
{
    $url = "https://oneapp.itb.ac.id/getDataIndikator";

    $data = [
        "indikator_kinerja" => 11,
        "nip" => "197707142008011012"
    ];

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_POST, true);          
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 

    // Specify the CA certificate bundle
    // curl_setopt($ch, CURLOPT_CAINFO, "/etc/ssl/oneapp/ITB_2024-2025.crt");

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "cURL Error: " . curl_error($ch);
    } else {
        $result = json_decode($response, true);
        print_r($result);
    }

    curl_close($ch);
    exit();
}


}
