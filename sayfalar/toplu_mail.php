<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }
include "inc/header.php";

$emailler		= $db->query("SELECT email FROM uyeler WHERE durum=0 ORDER BY id DESC");
$toplam			= $emailler->rowCount();

?>

      <div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Üyelere Toplu Mail Gönder
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



								
								<div class="alert alert-info" role="alert">Toplu e-posta servisinin çalışabilmesi için "<B>Ayarlar / Smtp Ayarları</B>" bölümünden gerekli yapılandırmaları yapmanız gerekmektedir. Aksi halde gönderim yapılamaz.</div>
								
									
                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=toplu_email" onsubmit="return false;" enctype="multipart/form-data">
                                        
                                    
									<div class="form-group">
                                            <label for="konu" class="col-sm-3 control-label">E-Posta Konu</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="konu" name="konu" value="" placeholder="">
                                        </div>
                                        </div>
										
										
									<div class="form-group">
                                         <label for="gonderilenler" class="col-sm-3 control-label">Gönderilecek E-Posta Listesi</label>
                                         <div class="col-sm-9">
										 <textarea class="form-control" rows="5" id="gonderilenler" name="gonderilenler"><?php
										 $i			= 0;
										 while($row = $emailler->fetch(PDO::FETCH_OBJ)){
										 $i			= $i+1;
										 echo $row->email;
										 echo ($i != $toplam) ? "\n" : '';
										 }
										 ?></textarea>
                                         </div>
                                         </div>
										
										
									<div class="form-group">
                                            <label for="mesaj" class="col-sm-1 control-label">İçerik</label>
                                            <div class="col-sm-11">
											<textarea id="icerik1" class="thetinymce form-control" rows="9" id="mesaj" name="mesaj"></textarea>
                                        </div>
                                        </div>
										
										
										
										<div class="form-group">
										<div class="col-sm-11">
                                            Sisteme kayıtlı toplam <b><?=$toplam;?></b> adet e-posta bulunmaktadır.
                                        </div>
                                        </div>
										
										<div id="forms_status"></div>
										
                                        
									<div align="right">
                                        <button type="submit" class="btn btn-info" onclick="MailSubmit();">Toplu Mail Gönder</button>
                                    </div>
									
									</form>
									<script>
									function MailSubmit(){
									AjaxFormS2('forms','forms_status',2);
									}
									</script>
									



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

<? include "inc/footer.php"; ?>