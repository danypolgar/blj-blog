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





     <h1>Blog</h1><br>
     <form action="index.php" method="post">
        <label for="name"> Name:</label><input id="name" type="text" name="name"><br>
        <label for="title"> Title:</label><input id="title" type="text" name="title"><br>
        <label for="post"> Text:</label><textarea id="post"  name="post" rows="10"></textarea><br>
        <input type="submit" id="submit" name="speichern"><br>
        <div><label for="image">Bild</label>
        <input class="form-control" type="text" id="image" name="image"></div>
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
            <?php if( htmlspecialchars($output['post_image'], ENT_QUOTES, "UTF-8") !== ''){
            ?><img class="post_images" src="<?= htmlspecialchars($output['post_image'], ENT_QUOTES, "UTF-8"); ?>" onError="this.src='ersatzbild.png';" alt="Bild nicht verfügbar" /><?php
        }
        ?>     
            <hr>

        </div>
        <?php
    }
foreach($stmt->fetchAll() as $x) {
    var_dump($x);
}

 ?>
 <div class="wrapper">

<h2 class="form-title">BLJ-Blogs</h2>
<h4>Hier sind die anderen Blogs:</h4>
<?php
$user = 'guest';
$pass = 'blj12345';
$dbh = new PDO('mysql:host=10.20.16.101;dbname=blogdb', $user, $pass);

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