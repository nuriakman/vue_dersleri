<?php

require_once 'degiskenler.php';

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


function generateJWT($id, $payloadData)
{
  global $mySecretKeyForJwt;

  // JWT başlığı (header) (Bu bölüm SABİT)
  $header = [
    'alg' => 'HS256',
    'typ' => 'JWT',
  ];

  // JWT payload
  $payload = [
    'sub' => $id,
    'iat' => time(), // İssued At: Token'ın ne zaman üretildiği
    'exp' => time() + (3600 * 24), // Expiration Time: Token'ın geçerlilik süresi (örnekte 24 saat)
  ];

  $payload            = array_merge($payload, $payloadData);

  // Başlık ve payload'ı base64url encode
  $base64UrlHeader    = base64UrlEncode(json_encode($header));
  $base64UrlPayload   = base64UrlEncode(json_encode($payload));

  // Signature oluştur
  $signature          = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $mySecretKeyForJwt, true);

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

function verifyJWT($authorizationHeader, $secretKey = "")
{
  global $mySecretKeyForJwt;
  if ($secretKey == "") $secretKey = $mySecretKeyForJwt;

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
} // verifyJWT
