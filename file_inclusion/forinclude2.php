<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="./css/result.css" rel="stylesheet">
<title>文件包含漏洞</title>
</head>
<body>
<h1>限制路径的文件包含漏洞</h1>
<form action="include2.php" method="get" >
<input type="text" name="file" placeholder="想要包含的文件(比如:hello.php)"/>
<input type="submit"  value="包含这个文件"/>
</form>
</body>
</html>