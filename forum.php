<?php
include 'classes/class_forum.php';

$forum = new Forum();
?>
<html>
    <head>
        <title>Fórum</title>
    </head>
    <body>
        <form method="post" action="forum.php">
            <input type="text" name="postagem" placeholder="Faça sua pergunta..." title="Postagem">
            <input type="submit" value="->">
        </form>

        <?php

        ?>
    </body>
</html>
