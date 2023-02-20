<!--
<footer class="footer"> 

  <div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Alt Kısım
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

        <h4><?=$ayarlar->site_adi;?></h4>

        <br>

        <p><?=$ayarlar->slogan;?></p>  

        <hr>    

        <p>&copy; <?=date("Y");?> Tüm hakları saklıdır.</p>

      </div>  /.col 


    </div> .row

  </div>  /.container 
  
</footer> -->

  
  <!--[if lt IE 9]>
  <script src="./js/libs/excanvas.compiled.js"></script>
  <![endif]-->
  
  <!-- Plugin JS -->
  <script src="./js/plugins/icheck/jquery.icheck.js"></script>
  <script src="./js/plugins/select2/select2.js"></script>
  <script src="./js/libs/raphael-2.1.2.min.js"></script>
  <script src="./js/plugins/morris/morris.min.js"></script>
  <script src="./js/plugins/sparkline/jquery.sparkline.min.js"></script>
  <script src="./js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="./js/plugins/fullcalendar/fullcalendar.min.js"></script>

  <!-- App JS -->
  <script src="./js/target-admin.js"></script>
  
  <!-- Plugin JS -->
  <script src="./js/demos/dashboard.js"></script>
  <script src="./js/demos/calendar.js"></script>
  <script src="./js/demos/charts/morris/area.js"></script>
  <script src="./js/demos/charts/morris/donut.js"></script>
<script src="tinymce/tinymce.min.js"></script>
<script type="application/x-javascript">
tinymce.init({
  selector:"#icerik1, #icerik2, #icerik3",
    height: 300,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  });
</script>



<link rel="stylesheet"  type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip();
  
  $('.akilli_liste').DataTable();
});
</script>


  <!-- Ekstra -->
<? $fonk->ekstra(false,false,true); ?>


<? global $gsmler; ?>
<!-- Modal -->
<div class="modal fade" id="telefon_list" tabindex="-1" role="dialog" aria-labelledby="telefon_listLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="telefon_listLabel">Telefon Listesi</h4>
      </div>
      <div class="modal-body">
       <textarea class="form-control"><?=implode("\n",$gsmler);?></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>
  
</body>
</html>
