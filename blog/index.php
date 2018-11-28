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
    $title = $_POST['title']??'';
    $post = $_POST['post']??'';
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
        $stmt = $dbh->prepare("INSERT INTO posts (created_by, post_title, post_text) VALUES(:name, :title, :post)");
        $stmt->execute([':name' => $name, ':title' => $title, ':post' => $post]);
    }
}
?>





     <h1>Blog</h1><br>
     <form action="index.php" method="post">
        <label for="name"> Name:</label><input id="name" type="text" name="name"><br>
        <label for="title"> Title:</label><input id="title" type="text" name="title"><br>
        <label for="post"> Text:</label><textarea id="post"  name="post" rows="10"></textarea><br>
        <input type="submit" id="submit" name="speichern"><br>
    </form>

<?php
$stmt = $dbh->prepare('SELECT * FROM posts');
    $stmt->execute();
    
    foreach($stmt as $output){?>
        <div class="form-actions">
            <h2><?= htmlspecialchars($output['created_by'], ENT_QUOTES, "UTF-8"); ?></h2>
            <h4><?= htmlspecialchars($output['post_title'], ENT_QUOTES, "UTF-8"); ?></h4>
            <p><?= htmlspecialchars($output['post_text'], ENT_QUOTES, "UTF-8"); ?></p>    
            <p><?= htmlspecialchars($output['created_at'], ENT_QUOTES, "UTF-8"); ?></p>
            <hr>

        </div>
        <?php
    }
foreach($stmt->fetchAll() as $x) {
    var_dump($x);
}
 ?>
 </body>
 
 </html>