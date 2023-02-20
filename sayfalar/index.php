<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }

include "inc/header.php";

?>
<div class="container">
	<div class="row">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Anasayfa
						<div class="clear"></div>
					</div>
					<div class="panel-body">
						<div class="alert alert-info">

							<? if($ayarlar->haber_duyuru != ''){ ?>
							<h3 style="text-align: center;"><strong><span style="color: blue;">SİSTEM HAKKINDA BİLGİLER LÜTFEN OKUYUNUZ!</span></strong></h3>

							<hr>
							<center><p><span style="color: #ffffff;"><strong><? echo $ayarlar->haber_duyuru;?></strong></span></p></center>

							<?php } ?>
						</div>
						<!--
						<div class="panel panel-primary">
							<div class="panel-heading">
								Fiyat Listesi
								<div class="clear"></div>
							</div>
							<div class="panel-body">

								<?php
								$uyeof		= json_decode(base64_decode($hesap->ozel_fiyatlar),1);
								$i			= 0;
								$sql		= $db->query("SELECT DISTINCT kategoriler.id,kategoriler.baslik, kategoriler.icon FROM kategoriler INNER JOIN urunler ON kategoriler.id=urunler.kategori_id WHERE kategoriler.durum=0 AND urunler.durum=0 ORDER BY kategoriler.sira ASC");
								while($row	= $sql->fetch(PDO::FETCH_OBJ)){
									?>


									<table class="table table-striped table-bordered table-condensed">
										<thead>
											<tr>
												<th>#</th>
												<th>Hizmet Adı</th>
												<th>Min Miktar</th>
												<th>Max Miktar</th>
												<th>Ücret</th>
											</tr>
										</thead>
										<body>
											<?php
											$sql2		= $db->query("SELECT baslik,min_adet,max_adet,tutar FROM urunler WHERE durum=0 AND kategori_id=".$row->id." ORDER BY sira ASC");
											while($row2	= $sql2->fetch(PDO::FETCH_OBJ)){
												$i			+=1;

$ofiyat		= ($hesap->ozel_fiyatlar == '') ? null : $uyeof[$row->id];  // Özel Adet başı fiyat
$fiyat		= ($ofiyat == '') ? $row2->tutar : $ofiyat; // Özel Adet başı fiyat
$ozel		= ($ofiyat == '') ? 0 : 1; // Özel fiyat olup olmadığını kontrol ediyoruz...
$fiyat		= $gvn->para_int($fiyat); // Adet başı fiyat

/*
$min_cekim	= (($row2->min_adet * $fiyat) / 1000);
$min_cekim  = $gvn->para_int($min_cekim);

$max_cekim	= (($row2->max_adet * $fiyat) / 1000);
$max_cekim  = $gvn->para_int($max_cekim);
*/

?>
<tr>
	<td><?=$i;?></td>
	<td><?=$row2->baslik;?></td>
<? /*
<td><?=$gvn->para_str($min_cekim);?> <i class="fa fa-try"></i></td>
<td><?=$gvn->para_str($max_cekim);?> <i class="fa fa-try"></i></td>
*/ ?>
<td width="5%"><?=$row2->min_adet;?></td>
<td width="5%"><?=$row2->max_adet;?></td>
<td <?=($ozel == 1) ? 'data-toggle="tooltip" title="Size Özel Fiyat"': ''; ?>>1000 adeti <?=$gvn->para_str($fiyat);?> <i class="fa fa-try"></i></td>
</tr>
<?
}
?>
</tbody>
</table>
<?php } ?>
</div>
</div>-->
<div class="row">

	<?php
	$topsp		= $db->query("SELECT COUNT(id) as count FROM siparisler WHERE durum=1 AND acid=".$hesap->id)->fetch(PDO::FETCH_OBJ)->count;
	?>
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="panel panel-primary panel-colorful">
			<div class="panel-body text-center">
				<p class="text-uppercase mar-btm text-sm">TAMAMLANAN SİPARİŞ</p>
				<hr>
				<p class="h2 text-thin"><?=$topsp;?></p>
			</div>
		</div>
	</div>
	


	<?php
	$topod		= $db->query("SELECT SUM(tutar) as ctutar FROM bakiyeler WHERE durum=1 AND acid=".$hesap->id)->fetch(PDO::FETCH_OBJ)->ctutar;
	?>
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="panel panel-primary panel-colorful">
			<div class="panel-body text-center">
				<p class="text-uppercase mar-btm text-sm">YÜKLENEN BAKİYE</p>
				<hr>
				<p class="h2 text-thin"><?=$gvn->para_str($topod);?> <i class="fa fa-try"></i></p>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="panel panel-primary panel-colorful">
			<div class="panel-body text-center">
				<p class="text-uppercase mar-btm text-sm">GÜNCEL BAKİYE</p>
				<hr>
				<p class="h2 text-thin"><?=$gvn->para_str($hesap->bakiye);?> <i class="fa fa-try"></i></p>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
	$(function () {
		var servisler = '';
		$("select#servis").html('');
		$.getJSON('api/services/instagram', function (data) {
			$.each(data, function (index, element) {
				servisler += '<option value="' + element.id + '">' + element.name + '</option>';
			});
			$("select#servis").html(servisler);
		});
	});
</script>

<div class="clear"></div>
</div>
</body>
</html>

<? include "inc/footer.php"; ?>