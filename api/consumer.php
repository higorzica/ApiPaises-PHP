<?php

class ApiConsumer
{
    private function api($endpoint, $method = "GET")
    {
        
        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => "https://restcountries.com/v3.1/$endpoint",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => $method,
          CURLOPT_HTTPHEADER => [
            "Accept: */*"
          ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            die(0);
        } else {
            return json_decode($response, true);
        }

    }
    
    public function getAllPais()
    {
        // busca tudo da api sobre aquele artista
        $results = $this->api('all');
        $allPaisDados = [];
        foreach ($results as $result) {
            $allPaisDados[] = [
             'nome' => $result['name']['common'],
             'bandeira' => $result['flags']['png']
            ];
        }
        sort($allPaisDados);
        return $allPaisDados;

    }
    
    public function getPais($nomePais)
    {
        {
            // get a specific country
            return $this->api("name/$nomePais");
        }

    }

}
