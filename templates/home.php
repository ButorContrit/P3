<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jean Forteroche - Billet simple pour l'Alaska">
    <meta name="author" content="Jean Forteroche">

    <title>Billet simple pour l'Alaska</title>

</head>

<body>

<h1>Billet simple pour l'Alaska</h1>

<?php
$article = new \App\src\DAO\ArticleDAO();
$articles = $article->getArticles();
while( $data = $articles->fetch())
{
    ?>
    <div class="text-left">
        <h2><a href="index.php?route=article&id=<?= $data['id'];?>"><?= $data['title'];?></a></h2>
        <p><?= $data['content'];?></p>
        <p>Créé le <?= $data['date_post'];?></p>
    </div>
    <br>
<?php
}
$articles->closeCursor();
?>

</body>
</html>
