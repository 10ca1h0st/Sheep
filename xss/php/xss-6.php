html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>XSS-6</title>
</head>
<body>
<?php
$name = $_GET["name"];
$name = htmlspecialchars($name);
?>
<input type='text' name='name' value='<?php echo $name?>'>
<!-- answer:name=' onmouseover='alert('xss')-->
</body>
</br>
</html>