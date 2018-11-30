<?php 
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=posts', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $isNameValid = true;
    $isTitleValid = true;
    $isPostValid = true;

    $stmt = $dbh->prepare('SELECT * FROM posts');
    $stmt->execute();
    $allPosts = $stmt->fetchAll();