
<h1 class="form-title">Dani Blog</h1>
<?php include 'views/view.navigation.php' ?>
<?php include 'models/model.otherblogs.php' ?>

<br>
<div class="wrapper">
<h2 class="form-title">BLJ-Blogs</h2>
<h4>Hier sind die anderen Blogs:</h4></div>

<?php

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