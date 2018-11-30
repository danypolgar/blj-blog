
<?php include 'models/model.makeblog.php' ?>
<h1 class="form-title">Dani Blog</h1>
<?php include 'views/view.navigation.php' ?>
<br>

<h1 class="form-title">Dani Blog</h1>


     <h1>Blog</h1><br>
     <form   action="index.php?page=makeblog" method="post">
        <label for="name"> Name:</label><input class="form-control" id="name" type="text" name="name"><br>
        <label for="title"> Titel:</label><input class="form-control" id="title" type="text" name="title"><br>
        <label for="post"> Text:</label><textarea class="form-control" id="post"  name="post" rows="10"></textarea><br>
        <div><label for="image"> Bild:</label>
        <input class="form-control" type="text" id="image" name="image"></div><br>
        <input class="btn btn-primary" type="submit" id="submit" name="speichern">
        <a href="#" class="btn">Abbrechen</a><br>
        <br>
    </form>