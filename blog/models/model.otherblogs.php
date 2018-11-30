<?php
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=posts', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$isNameValid = true;
$isTitleValid = true;
$isPostValid = true;
?>
 

<div class="wrapper">

<?php
$user = 'guest';
$pass = 'blj12345';
$dbh = new PDO('mysql:host=10.20.16.102;dbname=blogdb', $user, $pass);

$stmt = $dbh->prepare('SELECT * FROM andereblogs');
$stmt->execute(); ?>