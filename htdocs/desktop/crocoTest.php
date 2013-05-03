<?php
error_reporting(E_ALL);
$croco  = new Crocodoc();
/* $uuids  = "eea37c77-1255-4858-ae83-748543f3313f";
 */
$test = file_get_contents('https://crocodoc.com/api/v2/session/create?token=V0dDkJz3i64l87CbSFq2EIXm&uuid=a81968cf-55bd-4133-b961-ceda33f434f2&editable=true&user=1,Username&downloadable=true&sidebar=auto&duration700000');
var_dump($test);
/* $status = $croco->getStatus($uuids); */
/* var_dump($status); */
/*
 $url = 'http://bluefeeds.cs.duke.edu/home/htdocs/desktop/uploadsPDF/Faculty%20Eval%20Form%20Fall%202012%20Yr.1.pdf';
$ret = $croco->uploadFile($url);
var_dump($ret); 
*/

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
	
	public function uploadFile($fileurl){
		$url = $this->api_url.'document/upload';
		$token = $this->api_key;
        $dataStr = '?token='.$token.'&url='.$fileurl;
		
		return file_get_contents($url.$dataStr);
	}
}
?>