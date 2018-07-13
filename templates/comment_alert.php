<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jean Forteroche - Signaler un commentaire">
    <meta name="author" content="Jean Forteroche">

    <title>Billet simple pour l'Alaska</title>

</head>

<body>

<h1>Signaler un commentaire</h1>

    <?php
    if (isset($_POST['comment_alert_step_2']))
    {
        $comment_id = $_GET['id'];
        $form = new \App\src\DAO\FormDAO(array(
            'name' => 'comment_alert'
        ));
        $comment_DAO = new \App\src\DAO\CommentDAO();
        $comment_DAO->commentAlert($_POST['comment_alert_step_2']);

        echo 'Merci d\'avoir pris le temps de signaler ce commentaire. Jean Forteroche va le regarder de près!';
    }
    else
    {
        $data = $oneComment->fetch();
        ?>
        <div class="text-left">
        <p>"<?= $data['comment_content'];?>"</p>
        <p>(écrit par <strong><?= $data['author'];?></strong> le <?= $data['comment_date'];?>)</p>
        <p>
        <?php
        $oneComment->closeCursor();

        echo 'Etes-vous sûr de vouloir signaler ce commentaire?';
        echo '<form method="post" action="index.php?route=comment_alert&id=' . $_GET['id'] . '">';
        $comment_id = $_GET['id'];
        $form = new \App\src\DAO\FormDAO(array(
            'name'=>'comment_alert_step_2'
        ));

        echo $form->hidden('comment_alert_step_2', $comment_id);
        echo $form->submit_signaler();
        echo '</form>';

    }
    ?>

        <p><a href="index.php">Retour à l'accueil</a></p>

</body>
</html>
