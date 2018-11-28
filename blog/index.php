<!DOCTYPE html>

<?php



$errors  = [];
$name    = $_POST['name']    ?? '';
$email   = $_POST['email']   ?? '';
$phone   = $_POST['phone']   ?? '';
$people  = $_POST['people']  ?? '';
$hotel   = $_POST['hotel']   ?? '';
$program = $_POST['program'] ?? '';
$shuttle = $_POST['shuttle'] ?? '';
$note    = $_POST['note']    ?? '';



?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
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

.error-box {
    color: red;
    background-color: rgb(250, 220, 220);
    border: 1px solid red;
    border-radius: 10px;
    padding-top: 10px;
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
    </style>
</head>
<body>
    <div class="wrapper">

        <h1 class="form-title">Dani Blog</h1>

        <div class="topnav" id="myTopnav">
  <a href="#home" class="active">Blog erstellen</a>
  <a href="#news">Blog lesen</a>
  <a href="#contact">Andere</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

        <?php if (count($errors) > 0): ?>
            <ul class="errors">
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>


        <form action="aufgabe7.2.php" method="post">

            <fieldset>
                
                <div class="form-group">
                    <label class="form-label" for="name">Ihr Name</label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>
                
            </fieldset>

            <fieldset>
                
                
                <div class="form-group">
                    <label for="note" class="form-label"></label>Ihr Blog Beitrag
                    <textarea name="note" id="note" rows="10" class="form-control"></textarea>
                </div>

            </fieldset>
      
            <div class="form-actions">
                <input class="btn btn-primary" type="submit" value="Hochladen">
                <a href="http://www.google.com" class="btn">Abbrechen</a>
            </div>

        </form>
    </div>
</body>
</html>