<?php
namespace forms;

use Exception;

class JSONValidator {
    private $json;

    public function __construct($json) {
        if(empty($json)){
            $json = "";
        }
        $this->setJSON($json);
    }

    public function getJSON() {
        return $this->json;
    }

    public function setJSON($json) {
        $this->json = $json;
    }

    public function validateJSON() {
        if($this->json == ""){
            return [false, 'The JSON is invalid - Back End'];
        }
        $jsonData = '{
            "schema": {"type":"object"},
            "json":  ' . $this->json . '
        }';

        $ch = curl_init("https://assertible.com/json");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        try {
            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new Exception('Curl error: ' . curl_error($ch));
            }

            curl_close($ch);

            $decodedArray = json_decode($response, true);

            if (isset($decodedArray["valid"])) {
                if ($decodedArray["valid"] == true) {
                    return [true, 'The JSON is valid - Back End'];
                } else {
                    return [false, 'The JSON is invalid - Back End'];
                }
            } else {
                return [false, 'The JSON is invalid - Back End'];
            }
        } catch (Exception $e) {
            return [false, $e->getMessage()];
        }
    }
}
