<?php
$token = 'V0dDkJz3i64l87CbSFq2EIXm';
$pdfurl = 'http://bluefeeds.cs.duke.edu/home/htdocs/desktop/uploadsPDF/Fillable_PDF_Sample_from_TheWebJockeys_vC5.pdf';
$uploadurl = "https://crocodoc.com/api/v2/document/upload";
$endpoint = $uploadurl . '?token=${' . $token . '}&url=' . $pdfurl;

$session = curl_init($endpoint);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($session);
curl_close($session);
echo $data;
?>