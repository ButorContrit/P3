<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mon super blog - Un article">
    <meta name="author" content="Jean Forteroche">
    <title>Mon blog</title>
</head>

<body>

        <h1>Mon blog</h1>
        <p class="lead">En construction</p>
        <?php

        $article = new \App\src\DAO\ArticleDAO();
        $articles = $article->getArticle($_GET['id']);
        $data = $articles->fetch();
        ?>
        <div class="text-left">
            <h2><?= $data['title'];?></h2>
            <p><?= $data['content'];?></p>
            <p>Créé le <?= $data['date_post'];?></p>
        </div>
        <?php
        $articles->closeCursor();
        ?>
        <a href="index.php">Retour à l'accueil</a>

</body>