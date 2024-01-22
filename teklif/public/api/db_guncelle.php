<?php

// echo "<pre>";	print_r($_POST);echo "</pre>"; die("bitti...");

require_once("db_baglan.php");

$tarih = date("Y-m-d H:i:s");

// Kayıt eklemek için yapılacaklar
// 1.) INSERT için gerekli SQL komutunu üret
// 2.) DB'e bağlan
// 3.) Komutu DB'de çalıştır.
// 4.) DB bağlantısını kapat

if( isset($_POST) and isset($_POST['teklif_id']) and $_POST['teklif_id'] == "YENİ"){
		// TEKLİF İÇİN ÇALIŞALIM
		// TEKLİF İÇİN ÇALIŞALIM
		// TEKLİF İÇİN ÇALIŞALIM

		$LINK  = 0;
		$LINK += date("Y") * 1;
		$LINK += date("m") * 1;
		$LINK += date("d") * 1;
		$LINK += date("H") * 1;
		$LINK += date("i") * 1;
		$LINK += date("s") * 1;

		$SORGU = $DB->prepare("INSERT INTO teklifler SET
			baslik        = :tbaslik,
			firmaadi      = :tfirma,
			firmaadres    = :tadres,
			tekliftarihi  = :ttarih,
			tekliftutari  = :kgtoplam,
			yetkiliadi    = :tyetkiliad,
			yetkilitel    = :tyetkilitel,
			yetkilieposta = :tyetkilieposta,
			sondurum      = :tsondurum,
			iskonto       = :tiskonto,
			resimli       = :tresimli,
			tsart1        = :tsart1,
			tsart2        = :tsart2,
			tsart3        = :tsart3,
			tsart4        = :tsart4,
			parabirimi    = :tparabirimi,
			notlar        = :tnotlar,
			link          = :tlink,
			createdon     = :tarih1,
			updatedon     = :tarih2
		");
    $SORGU->bindParam(":tbaslik",        BuyukHarf($_POST["tbaslik"]) );
    $SORGU->bindParam(":tfirma",         BuyukHarf($_POST["tfirma"]) );
    $SORGU->bindParam(":tadres",         BuyukHarf($_POST["tadres"]) );
    $SORGU->bindParam(":ttarih",         BuyukHarf($_POST["ttarih"]) );
    $SORGU->bindParam(":kgtoplam",       BuyukHarf($_POST["kgtoplam"]) );
    $SORGU->bindParam(":tyetkiliad",     BuyukHarf($_POST["tyetkiliad"]) );
    $SORGU->bindParam(":tyetkilitel",    BuyukHarf($_POST["tyetkilitel"]) );
    $SORGU->bindParam(":tyetkilieposta", BuyukHarf($_POST["tyetkilieposta"]) );
    $SORGU->bindParam(":tsondurum",      BuyukHarf($_POST["tsondurum"]) );
    $SORGU->bindParam(":tiskonto",       BuyukHarf($_POST["tiskonto"]) );
    $SORGU->bindParam(":tresimli",       BuyukHarf($_POST["tresimli"]) );
    $SORGU->bindParam(":tsart1",         BuyukHarf($_POST["tsart1"]) );
    $SORGU->bindParam(":tsart2",         BuyukHarf($_POST["tsart2"]) );
    $SORGU->bindParam(":tsart3",         BuyukHarf($_POST["tsart3"]) );
    $SORGU->bindParam(":tsart4",         BuyukHarf($_POST["tsart4"]) );
    $SORGU->bindParam(":tparabirimi",    BuyukHarf($_POST["tparabirimi"]) );
    $SORGU->bindParam(":tnotlar",        BuyukHarf($_POST["tnotlar"]) );
    $SORGU->bindParam(":tlink",          $LINK);
    $SORGU->bindParam(":tarih1",         $tarih);
    $SORGU->bindParam(":tarih2",         $tarih);
    $SORGU->execute();

    // Son eklenen kaydın kayıt numarasını alalım
    $_POST['teklif_id'] = $DB->lastInsertId(); // Böylece, program akışı aşağıda doğru çalışacaktır...
}

if(isset($_POST) and isset($_POST['teklif_id']) and $_POST['teklif_id'] > 0){

		$TEKLIFID = intval($_POST['teklif_id']);

		// TEKLİF İÇİN ÇALIŞALIM
		// TEKLİF İÇİN ÇALIŞALIM
		// TEKLİF İÇİN ÇALIŞALIM
		$SORGU = $DB->prepare("UPDATE teklifler SET
			baslik        = :tbaslik,
			firmaadi      = :tfirma,
			firmaadres    = :tadres,
			tekliftarihi  = :ttarih,
			tekliftutari  = :kgtoplam,
			yetkiliadi    = :tyetkiliad,
			yetkilitel    = :tyetkilitel,
			yetkilieposta = :tyetkilieposta,
			sondurum      = :tsondurum,
			iskonto       = :tiskonto,
			resimli       = :tresimli,
			tsart1        = :tsart1,
			tsart2        = :tsart2,
			tsart3        = :tsart3,
			tsart4        = :tsart4,
			parabirimi    = :tparabirimi,
			notlar        = :tnotlar,
			updatedon     = :tarih
			WHERE id      = :EditID
		");
    $SORGU->bindParam(":tbaslik",        BuyukHarf($_POST["tbaslik"]) );
    $SORGU->bindParam(":tfirma",         BuyukHarf($_POST["tfirma"]) );
    $SORGU->bindParam(":tadres",         BuyukHarf($_POST["tadres"]) );
    $SORGU->bindParam(":ttarih",         BuyukHarf($_POST["ttarih"]) );
    $SORGU->bindParam(":kgtoplam",       BuyukHarf($_POST["kgtoplam"]) );
    $SORGU->bindParam(":tyetkiliad",     BuyukHarf($_POST["tyetkiliad"]) );
    $SORGU->bindParam(":tyetkilitel",    BuyukHarf($_POST["tyetkilitel"]) );
    $SORGU->bindParam(":tyetkilieposta", BuyukHarf($_POST["tyetkilieposta"]) );
    $SORGU->bindParam(":tsondurum",      BuyukHarf($_POST["tsondurum"]) );
    $SORGU->bindParam(":tiskonto",       BuyukHarf($_POST["tiskonto"]) );
    $SORGU->bindParam(":tresimli",       BuyukHarf($_POST["tresimli"]) );
    $SORGU->bindParam(":tsart1",         BuyukHarf($_POST["tsart1"]) );
    $SORGU->bindParam(":tsart2",         BuyukHarf($_POST["tsart2"]) );
    $SORGU->bindParam(":tsart3",         BuyukHarf($_POST["tsart3"]) );
    $SORGU->bindParam(":tsart4",         BuyukHarf($_POST["tsart4"]) );
    $SORGU->bindParam(":tparabirimi",    BuyukHarf($_POST["tparabirimi"]) );
    $SORGU->bindParam(":tnotlar",        BuyukHarf($_POST["tnotlar"]) );
    $SORGU->bindParam(":tarih",          $tarih);
    $SORGU->bindParam(":EditID",         $TEKLIFID);
    $SORGU->execute();



		// KALEMLER İÇİN ÇALIŞALIM
		// KALEMLER İÇİN ÇALIŞALIM
		// KALEMLER İÇİN ÇALIŞALIM
    foreach ($_POST["kadi"] as $K => $V) {

			$KalemID = intval($_POST["kalem_id"][$K]);

    	if( $_POST["ksira"][$K] == "SİL" or $_POST["ksira"][$K] == "sil"  ) {
    		// Kalem silme
				$DB->exec("DELETE FROM kalemler WHERE id = '{$KalemID}' ");
				continue;
    	}

    	if( $_POST["kalem_id"][$K] == "" ) {
    		// Kalem ekleme
				$SORGU = $DB->prepare("INSERT INTO kalemler SET
					teklifno    = :TeklifNo,
					sirano      = :ksira,
					resimid     = :kresimid,
					urunadi     = :kadi,
					en          = :kenn,
					boy         = :kboy,
					yukseklik   = :kyuk,
					miktar      = :kmiktar,
					birimi      = :kbadi,
					birimfiyati = :kbfiyat,
					toplam      = :ktoplam
				");
		    // ADIM 2 / B
		    $SORGU->bindParam(":TeklifNo", $TEKLIFID);
		    $SORGU->bindParam(":ksira",    BuyukHarf($_POST["ksira"]  [$K]) );
		    $SORGU->bindParam(":kresimid", BuyukHarf($_POST["kresimid"][$K]) );
		    $SORGU->bindParam(":kadi",     BuyukHarf($_POST["kadi"]   [$K]) );
		    $SORGU->bindParam(":kenn",     BuyukHarf($_POST["kenn"]   [$K]) );
		    $SORGU->bindParam(":kboy",     BuyukHarf($_POST["kboy"]   [$K]) );
		    $SORGU->bindParam(":kyuk",     BuyukHarf($_POST["kyuk"]   [$K]) );
		    $SORGU->bindParam(":kmiktar",  BuyukHarf($_POST["kmiktar"][$K]) );
		    $SORGU->bindParam(":kbadi",    BuyukHarf($_POST["kbadi"]  [$K]) );
		    $SORGU->bindParam(":kbfiyat",  BuyukHarf($_POST["kbfiyat"][$K]) );
		    $SORGU->bindParam(":ktoplam",  BuyukHarf($_POST["ktoplam"][$K]) );
		    $SORGU->execute();
				continue;
    	}

    	if( $_POST["kalem_id"][$K] > 0 ) {
    		// Kalem güncelleme
				$SORGU = $DB->prepare("UPDATE kalemler SET
					teklifno    = :TeklifNo,
					sirano      = :ksira,
					resimid     = :kresimid,
					urunadi     = :kadi,
					en          = :kenn,
					boy         = :kboy,
					yukseklik   = :kyuk,
					miktar      = :kmiktar,
					birimi      = :kbadi,
					birimfiyati = :kbfiyat,
					toplam      = :ktoplam
					WHERE id = :ID
				");
		    // ADIM 2 / B
		    $SORGU->bindParam(":TeklifNo", $TEKLIFID);
		    $SORGU->bindParam(":ksira",    BuyukHarf($_POST["ksira"]  [$K]) );
		    $SORGU->bindParam(":kresimid", BuyukHarf($_POST["kresimid"][$K]) );
		    $SORGU->bindParam(":kadi",     BuyukHarf($_POST["kadi"]   [$K]) );
		    $SORGU->bindParam(":kenn",     BuyukHarf($_POST["kenn"]   [$K]) );
		    $SORGU->bindParam(":kboy",     BuyukHarf($_POST["kboy"]   [$K]) );
		    $SORGU->bindParam(":kyuk",     BuyukHarf($_POST["kyuk"]   [$K]) );
		    $SORGU->bindParam(":kmiktar",  BuyukHarf($_POST["kmiktar"][$K]) );
		    $SORGU->bindParam(":kbadi",    BuyukHarf($_POST["kbadi"]  [$K]) );
		    $SORGU->bindParam(":kbfiyat",  BuyukHarf($_POST["kbfiyat"][$K]) );
		    $SORGU->bindParam(":ktoplam",  BuyukHarf($_POST["ktoplam"][$K]) );
		    $SORGU->bindParam(":ID",       $KalemID );
		    $SORGU->execute();
				continue;
    	}

    } // foreach

    // Teklif tutarı sahasını güncelleyelim
		$DB->exec("UPDATE teklifler
							 SET tekliftutari = (SELECT SUM(toplam) as TOPLAM FROM kalemler WHERE teklifno = '{$TEKLIFID}')
							 WHERE id = {$TEKLIFID}");

		/*
    echo "<h1>$TEKLIFID Nolu kayıt başarıyla eklendi/güncellendi</h1>";
    echo "<br><br><br>";
    echo "<p>3 saniye içinde Ana Sayfaya yönleneceksiniz...</p>";
    // İşlem tamam. 3sn bekleyip, Ana sayfaya yönlendirelim.
    header("Refresh:3; url=teklif.goster.php?id=$TEKLIFID");
    */

    header("location: teklif.goster.php?id=$TEKLIFID");
    die();
}

