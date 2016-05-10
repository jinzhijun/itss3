$(function(){
	$.ajax({
		type: "post", 
		url: "json/menu_json.php",
		dataType: "json", 
		success: function(e){
			var data=e.d;
			for(var i=0; i<data.length; i++){
				var o=data[i];
				if(o.parentid==0){
					$('#menu').append('<li id="m'+o.id+'"><b>'+o.menu+'</b></li>')
					}else{
						$('#menu #m'+o.parentid).append('<a href="'+o.url+'" id="url'+o.id+'">'+o.menu+'</a>')
						}
				}
			$('#menu li b').click(function(){
				$('#menu li').removeClass('on');
				$(this).parent('li').addClass('on');
				});
			$('#url'+request('menu')).parent('li').addClass('on').find('b').click();
			$('#url'+request('menu')).css({color:'#29c7ca', opacity:1})
			},
		error: function (XMLHttpRequest, textStatus, errorThrown){}
		});
	});

function request(name){ 
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); 
	var r = window.location.search.substr(1).match(reg); 
	if (r != null) return unescape(r[2]); return null; 
	} 