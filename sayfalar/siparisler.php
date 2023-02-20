<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }

include "inc/header.php"; 
$durum	= $gvn->rakam($_GET["durum"]);

if($hesap->tipi == 0 AND DEMO == false){
	if($durum == ''){
		$db->query("UPDATE siparisler SET sdurum='1' WHERE sdurum=0 AND acid=".$hesap->id);
	}elseif($durum == 1){
		$db->query("UPDATE siparisler SET sdurum='1' WHERE sdurum=0 AND durum=1 AND acid=".$hesap->id);
	}elseif($durum == 2){
		$db->query("UPDATE siparisler SET sdurum='1' WHERE sdurum=0 AND durum=2 AND acid=".$hesap->id);
	}
}

?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Sipariş Geçmişi
					<div class="clear"></div>
				</div>
				<div class="panel-body">
					<style>
					.column-id {width:10%;}
					.column-subject {width:5%;}
					.column-message {width:20%;}
					.column-status {width:5%;}
					.column-created_at {width:15%;}
					.column-act {width:2%;}

					th,tr {text-align:center;}
				</style>
				<div class="table-responsive">


 <div class="row"><!-- /.col -->

        <div class="col-md-12">
		<? if($hesap->tipi != 1){ ?>
		<button type="button" class="btn btn-secondary" onclick="window.location.href='index.php';"><i class="fa fa-plus"></i> Yeni Sipariş Ver</button>
		<br />
		<br />
<?php 
if (isset($_GET["durum"])) {
	$xs = 1;
}else{
	$xs = 0;
}
 ?>
		  <ul class="nav nav-pills">
		    <li <?=($xs == 0) ? 'class="active"':''?>><a href="index.php?do=siparisler">Tüm Siparişler</a></li>
		    <li <?=($durum == 0 && $xs == 1) ? 'class="active"':''?>><a href="index.php?do=siparisler&durum=0">Bekleyen Siparişler</a></li>
		    <li <?=($durum == 1) ? 'class="active"':''?>><a href="index.php?do=siparisler&durum=1">Tamamlanan Siparişler <?=($bild_d1 > 0 ) ? '<span class="badge btn-primary">'.$bild_d1.'</span>' : ''; ?></a></li>
		    <li <?=($durum == 3) ? 'class="active"':''?>><a href="index.php?do=siparisler&durum=3">Kısmen Tamamlanan Siparişler <?=($bild_d3 > 0 ) ? '<span class="badge btn-primary">'.$bild_d3.'</span>' : ''; ?></a></li>
		    <li <?=($durum == 2) ? 'class="active"':''?>><a href="index.php?do=siparisler&durum=2">İptal Edilen Siparişler <?=($bild_d2 > 0 ) ? '<span class="badge btn-primary">'.$bild_d2.'</span>' : ''; ?></a></li>
		  </ul>

		<? } ?>
		
		<?php
		
		if($hesap->tipi == 1 AND DEMO == false){ 
		$sil		= $gvn->rakam($_GET["sil"]);
		$onayla		= $gvn->rakam($_GET["onayla"]);
		$reddet		= $gvn->rakam($_GET["reddet"]);
		
		
		if($sil != ''){
		$urun		= $db->query("SELECT acid, toplam_tutar FROM siparisler WHERE id=".$sil)->fetch(PDO::FETCH_OBJ);

		$db->query("UPDATE uyeler SET bakiye = bakiye+".$urun->toplam_tutar." WHERE id='".$urun->acid."'");


		// print_r($budur);

		$silq		= $db->prepare("DELETE FROM siparisler WHERE id=?");
		$silq->execute(array($sil));
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
		
		if($onayla != ''){
		$sorgula		= $db->prepare("SELECT acid,toplam_tutar FROM siparisler WHERE id=?");
		$sorgula->execute(array($onayla));
		if($sorgula->rowCount() > 0){
		$sprs			= $sorgula->fetch(PDO::FETCH_OBJ);
		$acc			= $db->query("SELECT id,bakiye FROM uyeler WHERE id=".$sprs->acid)->fetch(PDO::FETCH_OBJ);
		if($acc->bakiye < $sprs->toplam_tutar){
		$fonk->hata("Üyenin bakiyesi yetersiz olduğu için onaylanamıyor. <br /> Üyenin Bakiyesi: <strong>".$gvn->para_str($acc->bakiye)."</strong> TL dir.");
		}else{
		// $db->query("UPDATE uyeler SET bakiye=bakiye-".$sprs->toplam_tutar." WHERE id=".$acc->id);
		$db->query("UPDATE siparisler SET durum='1',sdurum='0' WHERE id=".$onayla);
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
		}
		}
		
		if($reddet != ''){
		$urun		= $db->query("SELECT acid, toplam_tutar FROM siparisler WHERE id=".$reddet)->fetch(PDO::FETCH_OBJ);
		$db->query("UPDATE uyeler SET bakiye = bakiye+".$urun->toplam_tutar." WHERE id='".$urun->acid."'");
		$reddt		= $db->prepare("UPDATE siparisler SET durum='2',sdurum='0' WHERE id=?");
		$reddt->execute(array($reddet));
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
		
		}
		
			 $drm	= '';
			 $drm	= ($durum == 0 AND $durum != '') ?  'durum=0': $drm;
			 $drm	= ($durum == 1) ?  'durum=1': $drm;
			 $drm	= ($durum == 2) ?  'durum=2': $drm;
			 $drm	= ($durum == 3) ?  'durum=3': $drm;
			 
			 if($durum != ''){
			 $whr 	= ($hesap->tipi == 1) ? "WHERE ".$drm : "WHERE ".$drm." AND acid=".$hesap->id;
			 }else{
			 $whr 	= ($hesap->tipi == 1) ?  "" : "WHERE acid=".$hesap->id;
			 }
			 $sql		= "SELECT * FROM siparisler ".$whr." ORDER BY durum ASC, id DESC";
			 
		$qry		= $pagent->sql_query($sql,$gvn->rakam($_GET["git"]),500);
		$query 		= $db->query($qry['sql']);
		$adet		= $query->rowCount();
		$toplam		= $db->query($sql)->rowCount();
		if($toplam > 0 ){
		?>
          <table class="table table-bordered table-highlight akilli_liste">
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <? if($hesap->tipi == 1){?><th>Hesap</th><? } ?>
                <th>Ürün</th>
                <th>Miktar</th>
                <th>Tutar</th>
                <th>Tarih</th>
                <th>Durum</th>
                <th align="center" width="20%">Kontroller</th>
              </tr>
            </thead>
            <tbody>
             
			 <?php
			 $i			= 0;
			 while($row	= $query->fetch(PDO::FETCH_OBJ)){
			 $i			+=1;
			 if($hesap->tipi == 1){
			 $gonderen	= $db->query("SELECT adsoyad,id FROM uyeler WHERE id=".$row->acid)->fetch(PDO::FETCH_OBJ);
			 }
			 $urun		= $db->query("SELECT id,baslik FROM urunler WHERE id=".$row->urun_id)->fetch(PDO::FETCH_OBJ);
			 ?>
			 <tr>
                <td><?=$i;?></td>
                <td><?=$row->id;?></td>
                <? if($hesap->tipi == 1){?><td><?=$gonderen->adsoyad;?></td><?}?>
                <td><?=$urun->baslik;?></td>
                <td><?=$row->miktar;?></td>
				<td><strong><?=$gvn->para_str($row->toplam_tutar);?> TL</strong> <br /><?=($row->ozel == 1) ? 'Ü.Ö.Fiyat' : 'N.Fiyat';?></td>
                <td><?=date("d.m.Y H:i",strtotime($row->tarih));?></td>
                <td><?php
	  if($row->durum == 0){
	  ?><strong style="color:#36F">Bekleniyor</strong><?
	  }elseif($row->durum == 1){
	  ?><strong style="color:green">Tamamlandı</strong><?
	  }elseif($row->durum == 2){
	  ?><strong style="color: red">İptal Edildi</strong><?
	  }elseif($row->durum == 3){
	  ?><strong style="color: #ce1af2">Kısmen Tamamlandı</strong><?
	  }
	  ?></td>
                <td>
				<button data-toggle="tooltip" title="Görüntüle" type="button" class="btn btn-info" onclick="window.location.href='index.php?do=siparis&id=<?=$row->id;?>';"><i class="fa fa-eye"></i> </button>
				<? if($hesap->tipi == 1){?><button data-toggle="tooltip" title="Onayla" type="button" class="btn btn-success" onclick="if(confirm('Siparişi onaylamak istiyor musunuz ?')){window.location.href='index.php?do=siparisler&onayla=<?=$row->id;?>';}"><i class="fa fa-check"></i> </button><? } ?>
				<? if($hesap->tipi == 1){?><button data-toggle="tooltip" title="İptal Et" type="button" class="btn btn-warning" onclick="if(confirm('Siparişi iptal etmek istiyor musunuz ?')){window.location.href='index.php?do=siparisler&reddet=<?=$row->id;?>';}"><i class="fa fa-ban"></i> </button><? } ?>
				<? if($hesap->tipi == 1){?><button data-toggle="tooltip" title="Kaldır" type="button" class="btn btn-danger" onclick="if(confirm('Siparişi silmek istiyor musunuz ?')){window.location.href='index.php?do=siparisler&durum=<?=$durum;?>&sil=<?=$row->id;?>';}"><i class="fa fa-trash-o"></i> </button><? } ?>
				</td>
              </tr>
			  <?
			 }
			 ?>
            </tbody>
          </table>              




<? }else{ ?>
<b style="color:#aa1818;">Herhangi bir sipariş bulunmuyor.</b> <br />
<? } ?> 

<?php
if($toplam > 500){
echo $pagent->listele('index.php?do=siparisler&durum='.$durum.'&git=',$gvn->rakam($_GET["git"]),$qry['basdan'],$qry['kadar'],'btn-success',$query);
}
?>




										</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php #include "inc/footer.php"; ?>