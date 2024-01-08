<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");

$jsonDataString = file_get_contents("php://input");
$GelenJsonData = json_decode($jsonDataString, true);

$cevap = array();
/*
if ($GelenJsonData != null) {
  http_response_code(400); // Hata oluştu
  $cevap['hata'] = "json formatı yanlış!";
} else {
  */

// gelen veri ile DB kontrol et
if ($user == 0) {
  // Login olmamış
  http_response_code(401);
}

if ($yetki < 5) {
  // Erişim Yetkisi Yok
  http_response_code(403);
}

http_response_code(200); // İşlem başarılı
$cevap['TALEP'] = $GelenJsonData;


header('Content-Type: application/json; charset=utf-8');
echo json_encode($cevap, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
