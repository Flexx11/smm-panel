var i = 0;
var dur = 0;
var sure = 0;
var gizleme = 0;
function titreme() {
	if(dur == 0) {
		if(i == 0) {
			$(".msg").css("right", "3px");
			i = 1;
		} else {
			$(".msg").css("right", "0");
			i = 0;
		}
	} else {
		$(".msg").css("right", "0");
	}
}
setInterval(titreme, 80);

function gizle() {
	sure = 1;
	if(gizleme == 0) {
		$(".msg").fadeOut();
		setTimeout(function() {
			$(".msg").remove();
		}, 2000);
	}
}
$(function()
{
	
	$("#tip").change(function() {
		var tip = $("#tip").val();
		var id = $("#id").val();
		var path = window.location.origin+"/d";
		$.post(path, {"action":"listele", "tip":tip, "id":id}, function(e) {
			if(e == "-9") {
				$("#messagePanel").html('<div style="margin-top: 10px; text-align: center; color: red;">Ürün bulunamadı!</div>');
				$("#action_type").html("<option>Hesap Tipi Seçiniz</option>");
			} else {
				$("#messagePanel").html("");
				$("#action_type").html("<option>Ürün Seçiniz</option>"+e);
			}
			$('#comments').hide();
			$('#action_quantity').show();
			$('#div_action_quantity').show();
		});
	});
	
	$("#action_type").change(function() {
		$('#comments').hide();
		$('#action_quantity').show();
		$('#div_action_quantity').show();
		if($(this).find("option:selected").data('opt') == "yorum") {
			$('#action_quantity').hide();
			$('#div_action_quantity').hide();
			$("#comments").show();
		} else if($(this).find("option:selected").data('opt') == "paket") {
			$('#action_quantity').hide();
			$('#div_action_quantity').hide();
			$("#comments").hide();
		}
	});
	var url = window.location;
    var element = $('ul.nav li a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
	setTimeout(function() {
		dur = 1;
	}, 500);
	setTimeout(function() {
		gizle();
	}, 5000);
	
	$(".msg").mouseenter(function() {
		gizleme = 1;
	});
	$(".msg").mouseleave(function() {
		gizleme = 0;
		if(sure == 1) {
			gizle();
		}
	});
	$('#action_type').change(function()
	{
		placeholder();
	});
});
function isNumberKey(evt)
{
	var value = $(this).index()
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
	return true;
}
