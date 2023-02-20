<?php include "functions.php";

// require 'apiclass.php';
   /*
   $order = $api->order(array('service' => 1, 'link' => 'http://instagram/test', 'quantity' => '100'));
   $status = $api->status($order->order); # return status, charge, remains, start count
   */



   $apiler		= array();
   $apilersq	= $db->query("SELECT * FROM apiler ORDER BY id ASC");
   while($row	= $apilersq->fetch(PDO::FETCH_OBJ)){
   $apiler[$row->id] = new Api($row->url,$row->keyy);
   }
   // echo "asd";
   $siparisler	= $db->query("SELECT DISTINCT siparisler.* FROM siparisler INNER JOIN urunler ON siparisler.urun_id=urunler.id WHERE siparisler.durum=0 AND siparisler.adurum=1 AND siparisler.oid != 0 ORDER BY siparisler.id ASC");
   while($row	= $siparisler->fetch(PDO::FETCH_OBJ)){

      // print_r($row);


   $urun		= $db->query("SELECT api_id,api_servis FROM urunler WHERE id=".$row->urun_id)->fetch(PDO::FETCH_OBJ);
   $api			= $db->query("SELECT id FROM apiler WHERE id=".$urun->api_id)->fetch(PDO::FETCH_OBJ);
   $servis		= $db->query("SELECT servis_no FROM api_servisler WHERE id=".$urun->api_servis)->fetch(PDO::FETCH_OBJ);
   
   $sorgu = $apiler[$api->id]->status($row->oid);
   // print_r($sorgu);

   if ($sorgu->status == "Completed") {
      // echo "comp";
      $db->query("UPDATE siparisler SET durum = 1 WHERE id=".$row->id);

   }

   if ($sorgu->status == "Partial") {
      
      $kalan = $sorgu->remains;

      if ($kalan != 0) {
         $tt = $row->toplam_tutar;
         $miktar = $row->miktar;
         $iade = ($tt / $miktar) * $kalan;
         $db->query("UPDATE uyeler SET bakiye = bakiye+".$iade." WHERE id=".$row->acid);
      }
      $db->query("UPDATE siparisler SET durum = 3, iade = '$miktar', iade_tutar = '$iade' WHERE id=".$row->id);
      // echo "part".$iade;

   }

   if ($sorgu->status == "Canceled") {
      
      $kalan = $sorgu->remains;

      if ($kalan != 0) {
         $tt = $row->toplam_tutar;
         $db->query("UPDATE uyeler SET bakiye = bakiye+".$tt." WHERE id=".$row->acid);
      }
      // echo "canc";
      $db->query("UPDATE siparisler SET durum = 2 WHERE id=".$row->id);

   }
   
   // $conf		= array('service' => $servis->servis_no, 'link' => $row->baglanti, 'quantity' => $row->miktar);
   // $response 	= $apiler[$api->id]->order($conf);
   // if($response->error == '' AND count($response) > 0){
   // $oid			= $response->order;
   // $adurum		= 1;
   // }else{
   // $errortext	= $response->error;
   // $adurum		= 2;
   // $oid			= 0;
   // }
   
   
   // $ordup		= $db->prepare("UPDATE siparisler SET adurum=?,aresponse=?,oid=? WHERE id=".$row->id);
   // $ordup->execute(array($adurum,$errortext,$oid));
   
   
   }
   
   
   