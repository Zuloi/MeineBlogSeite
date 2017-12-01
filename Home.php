<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=§, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../blog/blog.css" rel="stylesheet" />
  <title>Document</title>
</head>
<body>

<?php $page0 = $_GET['page'] ?? 'home';?>

<?php include 'views/'. $page0 . '.view.php';?>

<div style="clear: both;"></div>

<?php include 'views/footers/'. $page0 . '.footer.php';?>

</body>
</html>
