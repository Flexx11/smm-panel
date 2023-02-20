<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }
if($hesap->tipi != 1){
header("Location:index.php"); 
die();
}
include "inc/header.php";


?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
         Üyeler
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

      <br>
    
      <div class="row"><!-- /.col -->

        <div class="col-md-12">
		<button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?do=toplu_mail';"><i class="fa fa-envelope"></i> Toplu Mail Gönder</button>
		<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#telefon_list"><i class="fa fa-phone"></i> GSM Listesi</button>
		<br />
		<br />


		<?php
		$sil		= $gvn->rakam($_GET["sil"]);
		if($sil != '' AND $sil != 1 AND DEMO == false){
		$silq		= $db->prepare("DELETE FROM uyeler WHERE id=?");
		$silq->execute(array($sil));
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
		
		$sql		= "SELECT * FROM uyeler WHERE tipi=0 ORDER BY id DESC";
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
                <th>Adı Soyadı</th>
                <th>Kullanıcı Adı</th>
                <th>E-Posta</th>
                <th>Son Giriş Tarih</th>
                <th>GSM</th>
                <th>Bakiyesi</th>
               <th align="center" width="20%">Kontroller</th>
              </tr>
            </thead>
            <tbody>
             
			 <?php
			 $i			= 0;
			 $gsmler	= array();
			 while($row	= $query->fetch(PDO::FETCH_OBJ)){
			 $i			+=1;
			 if($row->telefon != ''){
			 $gsmler[]	= $row->telefon;
			 }
			 ?>
			 <tr>
                <td><?=$i;?></td>
				<td><? echo $row->adsoyad;?></td>
				<td><? echo $row->username;?></td>
				<td><? echo $row->email;?></td>
				<td><? echo date("d.m.Y H:i",strtotime($row->son_giris_tarih));?></td>
				<td><? echo ($row->telefon == '') ? '<strong>Yok</strong>' : $row->telefon;?></td>
				<td><? echo $gvn->para_str($row->bakiye);?></td>
        
				<td>
				<button type="button" class="btn btn-info" onclick="window.location.href='index.php?do=uye&id=<?=$row->id;?>';"><i class="fa fa-eye"></i> Görüntüle</button>
				<button type="button" class="btn btn-primary" onclick="window.location.href='index.php?do=uyeler&sil=<?=$row->id;?>';"><i class="fa fa-trash-o"></i> Sil</button>
				</td>
              </tr>
			  <?
			 }
			 ?>
            </tbody>
          </table>
		  <div id="uyeler_status"></div>

<? }else{ ?>
<b style="color:#aa1818;">Herhangi bir üye bulunmuyor.</b> <br />
<? } ?> 

<?php
if($toplam > 500){
echo $pagent->listele('index.php?do=uyeler&git=',$gvn->rakam($_GET["git"]),$qry['basdan'],$qry['kadar'],'btn-success',$query);
}
?>






        </div> <!-- /.col -->

      </div> <!-- /.row -->


      <br><br>


      <div class="row"><!-- /.col --><!-- /.col -->

      </div> <!-- /.row -->


      <br><br>

      <div class="row"><!-- /.col --><!-- /.col -->

      </div> <!-- /.row -->



    </div> <!-- /.content-container -->
      
  </div> <!-- /.content -->

</div> <!-- /.container -->


<?php include "inc/footer.php"; ?>