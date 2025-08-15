<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
  
     private const SESSION_KEY = 'Metabase.sessionToken'; // Proper constant declaration


    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
        // $this->Authentication->addUnauthenticatedActions(['index', 'view']);
    }
    
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');

        // Add this line to check authentication result and lock your site
        $this->loadComponent('Authentication.Authentication');

        $this->Authentication->addUnauthenticatedActions([
            'getEmployee' ,
            'getEmployeeByNIP' ,
            'getMetabaseSession' ,
            'getfetchData',
        ]);

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/5/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }


    public function isLoggedIn(): bool
    {
        $identity = $this->request->getAttribute('identity');
        return $identity !== null;
    }

    public function getEmployee(){

        if (!$this->isLoggedIn()) {
            echo json_encode('Unauthorized Access');
            exit();
        }

        header('Content-Type: application/json');
        $query = isset($_GET['query']) ? strtolower(trim($_GET['query'])) : '';

        $url = "https://hris.itb.ac.id/data-services/pegawai?nama_lengkap=".$query;
        $accessToken = "consumer14-7a47-dc63-f722-6263-21e0-ead8-c556-4cd1";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "access_token: $accessToken"
        ));

        $response = curl_exec($ch);

        if(curl_errno($ch)) {
            echo 'Request Error:' . curl_error($ch);
        } else {
               $result = [
                "success" => true,
                "data" => json_decode($response)
            ];
            echo json_encode($result);
        }

        curl_close($ch);
        exit();
    }

    public function getEmployeeByNIP(){
        header('Content-Type: application/json');
        if (!$this->isLoggedIn()) {
            echo json_encode('Unauthorized Access');
            exit();
        }

        $query = isset($_GET['query']) ? strtolower(trim($_GET['query'])) : '';

        $url = "https://hris.itb.ac.id/data-services/pegawai?limit=1&nip=".$query."&status_pegawai=aktif";
        $accessToken = "consumer14-7a47-dc63-f722-6263-21e0-ead8-c556-4cd1";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "access_token: $accessToken"
        ));

        $response = curl_exec($ch);

        if(curl_errno($ch)) {
            echo 'Request Error:' . curl_error($ch);
        } else {

               $result = [
                    "success" => true,
                    "data" => json_decode($response)
                ];

            echo json_encode($result);
        }

        curl_close($ch);
        exit();
    }

     protected function getMetabaseSession(): ?string
    {
        // Check if the session token is already stored
        $storedToken = $this->request->getSession()->read(self::SESSION_KEY);
        if ($storedToken) {
            $this->metabaseSessionToken = $storedToken;
            return $this->metabaseSessionToken;
        }

        // Generate a new session token
        $metabaseUrl = 'https://api.satudata.itb.ac.id/v1/api/session';
        $username = 'gia.anugrah@itb.ac.id';
        $password = 'Bandung614';

        $data = [
            'username' => $username,
            'password' => $password,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $metabaseUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            curl_close($ch);
            throw new Exception('cURL Error: ' . curl_error($ch));
        }

        curl_close($ch);

        $responseData = json_decode($response, true);

        if (isset($responseData['id'])) {
            $this->metabaseSessionToken = $responseData['id']; // Store the session token
            $this->request->getSession()->write(self::SESSION_KEY, $this->metabaseSessionToken); // Save to CakePHP session
            return $this->metabaseSessionToken;
        }

        throw new Exception('Error: Unable to fetch Metabase session token.');
    }
    /**
     * Fetch data from Metabase
     *
     * @return mixed
     */
    protected function getfetchData()
    {
        $sessionToken = $this->getMetabaseSession(); // Reuse session token
        if ($sessionToken === null) {
            throw new Exception('Error: Unable to fetch data because session token is missing.');
        }

        $url = 'https://api.satudata.itb.ac.id/v1/api/card/1979/query/json';

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'X-Metabase-Session: ' . $sessionToken,
            ],
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new Exception('cURL Error: ' . curl_error($curl));
        }

        curl_close($curl);

        return $response; // Return the API response
    }


    public function checkRole($role_id=null){
        $identity = $this->request->getAttribute('identity');

         if($identity->role_id == '2f25e8a4-b9fa-444c-b809-5d925e8517b9')
         {
              $role = 'admin';
          }
          else if($identity->role_id == '6fe48ae2-f916-43ea-ad2e-c375eb51d2de')
          {
              $role = 'unit';
          }
         

        return $role;
    }

}
