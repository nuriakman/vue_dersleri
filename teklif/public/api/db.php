<?php

// .end içindeki değişkenleri okuyalım...
$envFilePath = __DIR__ . '/.env';
if (!file_exists($envFilePath)) {
  die(".env dosyası bulunamadı.");
}
$arrLines = file($envFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Dosyayı satır satır okuyup diziye ata
foreach ($arrLines as $line) {
  list($key, $value) = explode('=', $line, 2); // Her satırı işleyerek anahtar-değer çiftlerini al
  putenv("$key=$value"); // Çevresel değişken olarak kaydedelim.
} // foreach

// Veritabanı Bağlantı ayarları
$hostName = "";
$dbName   = "";
$userName = "";
$userPass = "";

if ($_SERVER["SERVER_NAME"] == "localhost") {
  $hostName = getenv('DB_HOST');
  $dbName   = getenv('DB_DATABASE');
  $userName = getenv('DB_USERNAME');
  $userPass = getenv('DB_PASSWORD');
}

if ($_SERVER["SERVER_NAME"] <> "localhost") {
  $hostName = getenv('SERVER_DB_HOST');
  $dbName   = getenv('SERVER_DB_DATABASE');
  $userName = getenv('SERVER_DB_USERNAME');
  $userPass = getenv('SERVER_DB_PASSWORD');
}

try {
  $DB = new PDO("mysql:host={$hostName};dbname={$dbName};charset=utf8", $userName, $userPass);
  $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
  die("Veritabanına bağlantı kurulamadı: " . $exception->getMessage());
}


if (function_exists('date_default_timezone_set')) {
  date_default_timezone_set('Europe/Istanbul'); // Saat dilimini ayarlayalım...
} else {
  putenv("TZ=Asia/Riyadh"); // Zaman Dilimini TÜRKİYE'ye göre ayarla.
}
