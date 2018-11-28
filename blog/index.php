<!DOCTYPE html>
 <html lang="de">
 <head>
 <style>
 body{
    font-family: roboto;
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
 
 </style>
   
 <title>Blog</title>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 </head>
 <body>

<?php
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=posts', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
if (isset($_POST["speichern"])) {
    $name = $_POST['name'] ??'';
    $title = $_POST['title']??'';
    $post = $_POST['post']??'';
    ?> <div class=errordiv> <?php
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

    


    $stmt = $dbh->prepare("INSERT INTO `posts` (created_by, post_title, post_text) VALUES(:crby, :poti, :potx)");
    $stmt->execute([':crby' => $name, ':poti' => $title, ':potx' => $post]);



   } 
   
   ?> 
   </div> 




     <h1>Blog</h1><br>
     <form action="index.php" method="post">
        <label for="name"> Name:</label><input id="name" type="text" name="name"><br>
        <label for="title"> Title:</label><input id="title" type="text" name="title"><br>
        <label for="post"> Text:</label><textarea id="post" name="post" rows = "4" cols = "50"></textarea><br>
        <input type="submit" id="submit" name="speichern"><br>
    </form>
 </body>
 
 </html>