function AjaxFormS(FORMID,SONUCID){
$("#"+SONUCID).fadeOut(400);
$("#"+FORMID).ajaxForm({
target: '#'+SONUCID,
complete:function(){
$("#"+SONUCID).fadeIn(400);
}
}).submit();
	
}

function AjaxFormS2(FORMID,SONUCID,TURU){
$("#"+SONUCID).fadeOut(400);

if(TURU == 1){
$('#icerik1').html( tinymce.get('icerik1').getContent() );
$('#icerik2').html( tinymce.get('icerik2').getContent() );
$('#icerik3').html( tinymce.get('icerik3').getContent() );
}else if (TURU == 2){
$('#icerik1').html( tinymce.get('icerik1').getContent() );
}

$("#"+FORMID).ajaxForm({
target: '#'+SONUCID,
complete:function(){
$("#"+SONUCID).fadeIn(400);
}
}).submit();
	
}


function ajaxHere(nere,load_content){
$("#"+load_content).html('');
$.get(nere, function(data, status){
$("#"+load_content).html(data);
});
}