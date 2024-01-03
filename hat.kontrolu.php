<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");

$jsonData = file_get_contents("php://input");
$GelenData = json_decode($jsonData, true);

$cevap = array();
$cevap['TALEP'] = $GelenData;

header('Content-Type: application/json; charset=utf-8');
echo json_encode($cevap, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
die();

// POST verisini al
$jsonData = file_get_contents("php://input");
$data = json_decode($jsonData, true);


// Eğer JSON verisi başarılı bir şekilde ayrıştırılırsa devam et
if ($data !== null) {
  // Burada gelen veriyi kullanabilirsiniz
  // Örneğin, gelen veriyi ekrana yazdıralım:
  $cevap['mesaj'] = "GELDİ";
} else {
  // JSON ayrıştırma hatası
  http_response_code(400); // Hatalı İstek
  $cevap['mesaj'] = "Hatalı JSON verisi.";
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($cevap, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
