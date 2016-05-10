<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>无标题文档</title>
<style>
body{margin:45px 0; padding:0;}
*{font-family:'微软雅黑'; font-size:12px;}
a{text-decoration:none;}
ul{margin:0; padding:0; overflow:hidden;}
li{list-style:none;}
header{position:fixed; z-index:1; top:0; left:0; width:100%; height:45px; background:#eee;}
header li{width:33%; height:45px; float:left;}
header li a{display:block; text-align:center; font:13px/44px '微软雅黑'; color:#444; border-left:#ddd solid 1px; border-bottom:#ddd solid 1px;}
header li.on{background:#fff;}
header li.on a{border-bottom:#fff solid 1px;}
footer{position:fixed; z-index:1; bottom:0; left:0; width:100%; height:45px; background:#fff; border-top:#ddd solid 1px; box-shadow:1px 1px 5px #ccc;}
footer li{width:25%; float:left;}
footer li a{display:block; text-align:center; font:12px/70px '微软雅黑'; color:#444;}

#cate{position:fixed; z-index:0; top:0; left:0; width:20%; height:100%; background:#eee;}
#cate ul{margin:45px 0; overflow:auto; height:100%;}
#cate ul h1{margin:0; padding:0 20px; font:13px/40px '微软雅黑'; background:#e1e1e1;}
#cate ul li{height:45px;}
#cate ul li a{font:12px/45px '微软雅黑'; display:block; border-right:#ddd solid 1px; border-bottom:#ddd solid 1px; color:#444; padding:0 20px;}
#cate ul li.on a{background:#fff; border-left:orange solid 3px; border-right:#fff solid 1px;}

#content{padding-left:20%;}
#content ul{overflow:hidden;}
#content ul li{border-bottom:#f1f1f1 solid 1px;}
#content #c{border:#ddd dotted 1px; border-radius:100px;}
</style>
</head>

<body>
<header>
	<ul>
    	<li class="on"><a href="javascript:;">早餐</a></li>
    	<li style="width:34%;"><a href="javascript:;">午餐</a></li>
    	<li><a href="javascript:;">晚餐</a></li>
    </ul>
</header>

<section id="cate">
	<ul>
    	<h1>主菜单</h1>
    	<li class="on"><a href="#">A套餐</a></li>
    	<li><a href="#">B套餐</a></li>
    </ul>
</section>

<section id="content">
	<ul>
    	<li>
        	<img src="" width="20" height="20" id="c">
            <p>
            	<b></b>
            </p>
        </li>
    </ul>
</section>

<footer>
	<ul>
    	<li><a href="#">首页</a></li>
    	<li><a href="#">拼单</a></li>
    	<li><a href="#">秒杀</a></li>
    	<li><a href="#">我的</a></li>
    </ul>
</footer>
</body>
</html>