<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<title>Our Blog</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
</head>

<body>
	<div class="container">
		<?php require_once (__VIEW . "/Layout/header.php"); ?>
		<div class="row">

            <?php require_once (__VIEW . "/{$page}.php"); ?>

		</div>
		<div class="footer">
			Copyright &copy; <strong>파일 관리자</strong> All rights reserved.
		</div>
	</div>
</body>

</html>