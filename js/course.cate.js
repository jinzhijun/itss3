function category(url){
	var parentid=getUrlParam('cateid');
	var pid=getUrlParam('pid');
	
	if(parentid==null) parentid=0;
	if(pid==null) pid=0;
	
	$.ajax({
		url:"teacher/json/cate.php",
		dataType:"json",
		type:"post",
		success: function(e){
			var data=e.d;
			$('#cate').append('<span>分类：</span><a href="'+url+'?cateid='+pid+'&pid=0">全部</a>')
			for(var i=0; i<data.length; i++){
				var d=data[i];
				if(d.parentid==parentid){
					$('#cate').append('<a href="'+url+'?cateid='+d.id+'&pid='+d.parentid+'">'+d.name+'</a>');
					}
				}
			var html=$('#cate').text();
			if(html==='分类：全部'){
				for(var i=0; i<data.length; i++){
					var d=data[i];
					if(d.parentid==pid){
						if(d.id==parentid){
							$('#cate').append('<a href="'+url+'?cateid='+d.id+'&pid='+d.parentid+'" id="t'+d.id+'" style="color:red">'+d.name+'</a>');
							}else{
								$('#cate').append('<a href="'+url+'?cateid='+d.id+'&pid='+d.parentid+'" id="t'+d.id+'">'+d.name+'</a>');
								}
						}
					}
				}
			}
		});
	}

function getUrlParam(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	var r = window.location.search.substr(1).match(reg);  //匹配目标参数
	if (r != null) return unescape(r[2]); return null; //返回参数值
	}
