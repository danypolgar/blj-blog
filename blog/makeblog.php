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
    
if (isset($_POST["speichern"])) {
    $name = $_POST['name'] ??'';
    $title = $_POST['title'] ??'';
    $post = $_POST['post'] ??'';
    $image = trim($_POST['image'] ??'');


    if(empty($name)){
        ?> <p class=errorbox>Bitte geben Sie Ihr Name an.</p> <?php
        $isNameValid = false;
    }
    if(empty($title)){
        ?> <p class=errorbox>Bitte schreiben Sie ein Titel.</p> <?php
        $isTitleValid = false;
    }
    if(empty($post)){
       ?> <p class=errorbox>Bitte schreiben Sie eine Nachticht.</p> <?php
       $isPostValid = false;
    }
    

    
    if($isNameValid===true && $isTitleValid===true && $isPostValid===true){
        $stmt = $dbh->prepare("INSERT INTO posts (created_by, post_title, post_text, post_image) VALUES(:name, :title, :post, :post_image)");
        $stmt->execute([':name' => $name, ':title' => $title, ':post' => $post, ':post_image' => $image]);
    }
}
?>

 
  
  
  

    <h1 class="form-title">Dani Blog</h1>

    <div class="topnav" id="myTopnav">
    <a href="http://10.20.16.104/php/blogpost/blog/makeblog.php" class="active">Blog erstellen</a>
    <a href="http://10.20.16.104/php/blogpost/blog/index.php">Blog lesen</a>
    <a href="http://10.20.16.104/php/blogpost/blog/otherblogs.php">Andere Blogs</a>
    </div><br>

     <h1>Blog</h1><br>
     <form   action="index.php" method="post">
        <label for="name"> Name:</label><input class="form-control" id="name" type="text" name="name"><br>
        <label for="title"> Titel:</label><input class="form-control" id="title" type="text" name="title"><br>
        <label for="post"> Text:</label><textarea class="form-control" id="post"  name="post" rows="10"></textarea><br>
        <div><label for="image"> Bild:</label>
        <input class="form-control" type="text" id="image" name="image"></div><br>
        <input class="btn btn-primary" type="submit" id="submit" name="speichern">
        <a href="#" class="btn">Abbrechen</a><br>
        <br>
    </form>
    </body>
    </html>