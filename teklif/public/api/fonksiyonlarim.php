<?php

function DD($el, $title = "")
{
  if ($title <> "") echo "<h1>$title</h1>";
  echo "
  <pre>";
  print_r($el);
  echo "</pre>";
}

function DDD($el, $title = "")
{
  DD($el, $title);
  die();
}

function BuyukHarf($str)
{
  $kucuk = array('ğ', 'ü', 'ş', 'i', 'ö', 'ç', 'ı');
  $buyuk = array('Ğ', 'Ü', 'Ş', 'İ', 'Ö', 'Ç', 'I');
  $str = trim(str_replace($kucuk, $buyuk, $str));
  $str = strtoupper($str);
  return $str;
} // BuyukHarf

$TBaslik1 = "FİYAT TEKLİFİ / PRICE OFFER";
$TBaslik2 = "PROFORMA INVOICE";

function generateJWT($userId, $username, $email)
{
  // JWT başlığı (header) (Bu bbölüm SABİT)
  $header = [
    'alg' => 'HS256',
    'typ' => 'JWT',
  ];

  // JWT payload
  $payload = [
    'sub' => $userId,
    'username' => $username,
    'email' => $email,
    'iat' => time(), // İssued At: Token'ın ne zaman üretildiği
    'exp' => time() + (3600 * 24), // Expiration Time: Token'ın geçerlilik süresi (örnekte 24 saat)
  ];

  // Başlık ve payload'ı base64url encode
  $base64UrlHeader = base64UrlEncode(json_encode($header));
  $base64UrlPayload = base64UrlEncode(json_encode($payload));

  $mySecretKey = "3duGerLBc2AZcVyHaFkV";

  // Signature oluştur
  $signature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $mySecretKey, true);

  // Signature'ı base64url encode
  $base64UrlSignature = base64UrlEncode($signature);

  // JWT oluştur
  $jwt = "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";

  return $jwt;
}

// Base64url encode fonksiyonu
function base64UrlEncode($data)
{
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
