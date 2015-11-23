<?php
	session_start();
	require_once("includes/php/functions.php");
	require_once("includes/php/global_vars.php");
?>
<!doctype html>
<html lang="en">
<head>
	<title><?php print $logo; ?></title>
	<!-- <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'> -->
	<!-- Play PHP custom css -->
	<link rel="stylesheet" href="includes/css/style.css">
	<link rel="stylesheet" href="includes/css/bootstrap.css">
	<link rel="stylesheet" href="includes/css/font-awesome.min.css">
	<link rel="stylesheet" href="includes/css/alertify.core.css">
	<link rel="stylesheet" href="includes/css/alertify.default.css">
	<!-- Play PHP custom css ends -->
	<script src="includes/js/jquery-1.11.1.min.js"></script>
	<!-- Editor Files -->
	<script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
	<script src="includes/js/emmet.js"></script>
	<script src="src-noconflict/ext-emmet.js"></script>
	<script src="includes/js/alertify.min.js"></script>
</head>
<body>
<?php require_once("includes/php/topMenu.php"); ?>