<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'degiskenler.php';
require_once 'fonksiyonlarim.php';

// "php://input" diyoruz. Çünkü, gelen veri BODY içerisinde JSON objesi olarak geliyor
// Çünkü çağırırken "Content-Type: application/json" olarak belirtiyoruz
$temp = file_get_contents("php://input");
$data = json_decode($temp, true); // true ile json objesini diziye çevirdik
$METHOD = $data['method']; // Switch yapısı bu değişkene göre çalışıyor

if ($METHOD <> 'login') {
  list($isVerified, $message) = verifyJWT($mySecretKeyForJwt);

  if (!$isVerified) {
    dieErrorWithJson($message);
  }
}

require_once 'db.php';

$response = []; // Bu API cevap dönerken bu diziyi dönecek
//$response['GELENDATA'] = $data;
$response['success'] = false; // Varsayılan olarak "başarısız" bilgisi dönelim


switch ($METHOD) {

  case 'login':
    ################################### login ###################################
    $sql = "SELECT id, adisoyadi, eposta 
            FROM kullanicilar 
            WHERE kullaniciadi = :kullaniciadi AND kullanicisifresi = :kullanicisifresi  ";
    $SORGU = $DB->prepare($sql);
    $SORGU->bindParam(':kullaniciadi',     $data['user']['username']);
    $SORGU->bindParam(':kullanicisifresi', $data['user']['password']);
    $SORGU->execute();
    $userRow = $SORGU->fetch(PDO::FETCH_ASSOC);
    if ($userRow) {
      $response['success'] = true; // İşlem başarılı
      $userID = $userRow['id'];
      unset($userRow['id']); // ID parametresini cevaptan silelim. Yoksa mükerrer bilgi gidecek
      $myToken = generateJWT($userID, $userRow, $mySecretKeyForJwt);
      $response['token'] = $myToken;
    }
    break;

  case 'getData':
    ################################### getData ###################################
    $sql = "SELECT id, firmaadi FROM teklifler LIMIT 2";
    $SORGU = $DB->prepare($sql);
    $SORGU->execute();
    $rows = $SORGU->fetchAll(PDO::FETCH_ASSOC);
    $response['success'] = true; // İşlem başarılı
    $response['rows'] = $rows;
    break;

  default:
    ################################### default ###################################
    $response['error'] = "`method` adı geçerli değil";
    if (!isset($data['methode'])) {
      $response['error'] = "`method` parametresi bulunamadı";
    }
} // switch

// http_response_code(200);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
