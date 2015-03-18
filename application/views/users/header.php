<html>
<head>
<title><?php echo $title?></title>
<style>



 a {
	color:#222222;
	font-family:georgia,times;
	font-size:24px;
	font-weight:normal;
	line-height:1.2em;
	color:black;
	text-decoration:none;
	text-decoration: underline;
	
}


}
</style>
</head>
<body>
<h1><?php echo $title;?></h1>

<?php if (isset($uid)) { ?>
<a href = "../posts/viewall">Posts</a> <br>


<?php } ?>