<!DOCTYPE html>
 <html lang="de">
 <head>
 <link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
 <style>

 .wrapper {
    margin-top: 2em;
    width: 80%;
    max-width: 550px;
    margin: 2em auto 0;
}

 body{
    font-family: 'Yantramanav', sans-serif;
}

label, #submit {
    display: inline-block;
    width: 100px;
    margin-bottom: 5px;
}

#submit{
    margin-left: 100px;
}

.errorbox{
    color: red;
    margin-left: 5px;
}

.errordiv{
    border-style: solid;
    border-color: red;
    border-radius: 5px;
    background: #ffd4d4;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: #B3000C;
  color: white;
}

.topnav .icon {
  display: none;
}

    .wrapper {
    margin-top: 2em;
    width: 80%;
    max-width: 550px;
    margin: 2em auto 0;
}

.form-title {
    margin-bottom: .7em;
}

.form-label {
    margin-top: .7em;
    margin-bottom: .3em;
}

fieldset {
    margin-top: 2em;
}

.form-legend {
    margin-bottom: .75em;
}

.form-legend + .form-group > .form-label:first-child {
    margin-top: 0;
}

.option-group {
    margin-top: 2em;
}

.form-actions {
    padding-top: 1em;
    border-top: 1px solid #eee;
    margin-top: 1em;
    margin-bottom: 2em;
}

.form-actions a {
    text-decoration: none;
    color: black;
}

 </style>
 </head>
 <body class = "wrapper">
 <?php
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=posts', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$isNameValid = true;
$isTitleValid = true;
$isPostValid = true;
?>
 <h1 class="form-title">Dani Blog</h1>

<div class="topnav" id="myTopnav">
<a href="http://10.20.16.104/php/blogpost/blog/makeblog.php" class="active">Blog erstellen</a>
<a href="http://10.20.16.104/php/blogpost/blog/index.php">Blog lesen</a>
<a href="http://10.20.16.104/php/blogpost/blog/otherblogs.php">Andere Blogs</a>
</div><br>

<div class="wrapper">

<h2 class="form-title">BLJ-Blogs</h2>
<h4>Hier sind die anderen Blogs:</h4>
<?php
$user = 'guest';
$pass = 'blj12345';
$dbh = new PDO('mysql:host=10.20.16.102;dbname=blogdb', $user, $pass);

$stmt = $dbh->prepare('SELECT * FROM andereblogs');
$stmt->execute();

foreach($stmt as $output){?>
<div class="form-actions">
    <a href="http://<?= htmlspecialchars($output['ip'], ENT_QUOTES, "UTF-8");
    ?><?= htmlspecialchars($output['pfad'], ENT_QUOTES, "UTF-8");
    ?>"><?= htmlspecialchars($output['name'], ENT_QUOTES, "UTF-8");
    ?></a>
    
</div>
<?php
}
?>
</div>



</body>
</html>