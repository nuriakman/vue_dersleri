<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'db.php';
//require_once 'degiskenler.php';
require_once 'fonksiyonlarim.php';

$mySecretKeyForJwt = "3duGerLBc2AZcVyHaFkV";

$secretKey = $mySecretKeyForJwt;
// Gelen JWT
$headers = getallheaders();
$authorizationHeader = isset($headers['Authorization']) ? $headers['Authorization'] : '';
$receivedJwt = $authorizationHeader;

// Extract the token from the Authorization header (assuming it is in the format "Bearer {token}")
$tokenParts = explode(' ', $authorizationHeader);
$token = isset($tokenParts[1]) ? $tokenParts[1] : '';

if (empty($token)) {
  die('No token provided.');
}

// Split the token into its three parts
list($header, $payload, $signature) = explode('.', $token);

// Base64 decode the header and payload
$decodedHeader = base64_decode($header);
$decodedPayload = base64_decode($payload);

// Recreate the signature from the decoded parts
$calculatedSignature = hash_hmac('sha256', "$header.$payload", $secretKey, true);
$calculatedSignature = base64UrlEncode($calculatedSignature);
// Compare the recreated signature with the received signature
if ($calculatedSignature == $signature) {
  // Signature is valid, proceed to check expiration time (exp claim)

  // You can access the claims in the payload
  $claims = json_decode($decodedPayload, true);

  // Check if the token is expired
  $currentTimestamp = time();
  if (isset($claims['exp']) && $claims['exp'] > $currentTimestamp) {
    echo "Token is valid and not expired!\n";
    print_r($claims);
  } else {
    echo "Token has expired!\n";
  }
} else {
  echo "Token validation failed!\n";
}


echo "\n1. $calculatedSignature\n2. $signature\n";

die("bitti");

require_once 'db.php';

// "php://input" diyoruz. Çünkü, gelen veri BODY içerisinde JSON objesi olarak geliyor
// Çünkü çağırırken "Content-Type: application/json" olarak belirtiyoruz
$temp = file_get_contents("php://input");
$data = json_decode($temp, true); // true ile json objesini diziye çevirdik

// Authorization başlığını alma
$headers = getallheaders();
$authorizationHeader = isset($headers['Authorization']) ? $headers['Authorization'] : '';


ksort($_SERVER);
$response = []; // Bu API cevap dönerken bu diziyi dönecek
$response['SAAT'] = date("H:i:s");
$response['TOKEN'] = $authorizationHeader;
$response['GELENDATA'] = $data;
$response['success'] = false; // Varsayılan olarak "başarısız" bilgisi dönelim
$METHOD = $data['method']; // Switch yapısı bu değişkene göre çalışıyor

switch ($METHOD) {

  case 'login':
    ################################### login ###################################
    $sql = "SELECT id, adisoyadi, eposta 
            FROM kullanicilar 
            WHERE kullaniciadi = :kullaniciadi AND kullanicisifresi = :kullanicisifresi
            LIMIT 1";
    $SORGU = $DB->prepare($sql);
    $SORGU->bindParam(':kullaniciadi',     $data['user']['username']);
    $SORGU->bindParam(':kullanicisifresi', $data['user']['password']);
    $SORGU->execute();
    $userRow = $SORGU->fetch(PDO::FETCH_ASSOC);
    if ($userRow) {
      $response['success'] = true; // Giriş başarılı
      $userID = $userRow['id'];
      unset($userRow['id']); // ID parametresini cevaptan silelim. Yoksa mükerrer bilgi gidecek
      $myToken = generateJWT($userID, $userRow);
      $response['token'] = $myToken;
    }
    break;

  case 'getData':
    ################################### getData ###################################
    $sql = "SELECT id, firmaadi FROM teklifler LIMIT 2";
    $SORGU = $DB->prepare($sql);
    $SORGU->execute();
    $rows = $SORGU->fetchAll(PDO::FETCH_ASSOC);
    $response['success'] = true; // Giriş başarılı
    $response['rows'] = $rows;
    break;

  default:
    ################################### default ###################################
    $response['error'] = "`method` adı geçerli değil";
    if (!isset($data['methode'])) {
      $response['error'] = "`method` parametresi bulunamadı";
    }
} // switch

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
