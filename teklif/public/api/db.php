<?php

// Veritabanı Bağlantı ayarları
$host     = "localhost";
$DBname   = "teklifhazirla";
$username = "root";
$password = "root";

if ($_SERVER["SERVER_NAME"] == "localhost") {
  $host     = 'localhost';
  $DBname   = 'teklifhazirla';
  $username = 'root';
  $password = 'root';
}

if ($_SERVER["SERVER_NAME"] <> "localhost") {
  $host     = 'localhost';
  $DBname   = 'teklif';
  $username = 'root';
  $password = 'root';
}

try {
  $DB = new PDO("mysql:host={$host};dbname={$DBname};charset=utf8", $username, $password);
  $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
  die("Veritabanına bağlantı kurulamadı: " . $exception->getMessage());
}


if (function_exists('date_default_timezone_set')) {
  //date_default_timezone_set('Europe/Istanbul'); // Saat dilimini ayarlayalım...
  date_default_timezone_set('Asia/Riyadh'); // Saat dilimini ayarlayalım...
} else {
  //putenv("TZ=Europe/Istanbul"); // Zaman Dilimini TÜRKİYE'ye göre ayarla.
  putenv("TZ=Asia/Riyadh"); // Zaman Dilimini TÜRKİYE'ye göre ayarla.
}
