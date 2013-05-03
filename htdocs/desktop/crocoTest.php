<?php
$croco  = new Crocodoc();
$uuids  = "a81968cf-55bd-4133-b961-ceda33f434f2";
$status = $croco->getStatus($uuids);
var_dump($status);

class Crocodoc { 
    public $api_key = 'V0dDkJz3i64l87CbSFq2EIXm';
    public $api_url = 'https://crocodoc.com/api/v2/';

    public function getStatus($uuids){
        $url = $this->api_url.'document/status';
        $token = $this->api_key;
        $dataStr = '?token='.$token.'&uuids='.$uuids;

        // this is a GET request
        return file_get_contents($url.$dataStr);
    }
}
?>