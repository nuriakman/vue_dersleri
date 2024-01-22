<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$temp = file_get_contents("php://input"); // Gelen veri BODY içerisinde JSON objesi olarak geliyor
$data = json_decode($temp, true); // true ile json objesini diziye çevirdik

$METOD = $data['method'];

require_once 'db.php';

$response = [];
// $response["ADI2"] = $data['user']['username'];
// header('Content-Type: application/json; charset=utf-8');
// echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
// die();

switch ($METOD) {
  case 'login':
    $sql = "SELECT id, adisoyadi, eposta FROM kullanicilar 
            WHERE kullaniciadi = :kullaniciadi AND kullanicisifresi = :kullanicisifresi";
    $SORGU = $DB->prepare($sql);
    $SORGU->bindParam(':kullaniciadi',     $data['user']['username']);
    $SORGU->bindParam(':kullanicisifresi', $data['user']['password']);
    $SORGU->execute();
    $userRow = $SORGU->fetch(PDO::FETCH_ASSOC);
    if ($userRow) {
      $response['success'] = true; // Giriş başarılı
      // $response['user'] = $userRow;
      $myToken = generateJWT($userRow['id'], $userRow['adisoyadi'], $userRow['eposta']);
      $response['token'] = $myToken;
    } else {
      $response['success'] = false;
    }
    break;
  default:
    $response['error'] = "`method` adı geçerli değil";
    if (!isset($data['methode'])) {
      $response['error'] = "`method` parametresi bulunamadı";
    }
    break;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

die();




if (isset($_POST['kullanici'])) {
  include 'db_baglan.php';
  $SORGU = $DB->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = :kullaniciadi AND kullanicisifresi = :kullanicisifresi");
  $SORGU->bindParam(":kullaniciadi",     $_POST['kullanici']);
  $SORGU->bindParam(":kullanicisifresi", $_POST['sifre']);
  $SORGU->execute();
  if ($SORGU->rowCount() == 0) {
    echo ("<h1 style='color:red;'>HATA: Hatalı kullanıcı adı veya şifre!</h1>");
  } else {
    $KULLANICI = $SORGU->fetch();
    @session_start();
    $_SESSION['giris_yapildi'] = 1;
    $_SESSION['kullanici_id']  = $KULLANICI['kullaniciadi'];
    $_SESSION['kullanici_adi'] = $KULLANICI['id'];
    $DB->exec("UPDATE kullanicilar SET sayac = sayac + 1 WHERE id = {$KULLANICI['id']}");
    header('location: index.php');
    die();
  }
}
