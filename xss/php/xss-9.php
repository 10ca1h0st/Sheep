<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>XSS-9</title>
</head>
<body>
<form action="" method="get" >
<input type="text" name="xss_input"  id="id1"/>
<input type="button" value="Submit" onclick="run();"/>
</form>
</br>
<div id="d1"></div>
<script>
function run(){
//使用js获取表单输入，创建图片,循环过滤alert关键字
var c= document.getElementById("id1").value;
while(c.replace(/alert/,"")!=c)
	c=c.replace(/alert/,"");
//var c='1.jpg';
 //document.getElementById("d1").innerHTML="<img src='http://baike.baidu.com/cms/rc/240x112dierzhou.jpg'>";
document.getElementById("d1").innerHTML="<img src="+c+">\"";

 //answer:5 onerror =\u0061\u006c\u0065\u0072\u0074('xss')
}
</script>
</body>
</br>
</html>