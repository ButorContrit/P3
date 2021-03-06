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

        <form method = "post" action="index.php?route=article&id=<?=$_GET['id']?>">
        <?php

        $form = new \App\src\DAO\FormDAO(array(
            'name'=>'Votre nom',
            'comment'=>'Votre commentaire'
        ));

        echo $form->input('name');

        echo $form->textarea('comment');

        echo $form->submit();

        ?>
        </form>

        <?php
            if (isset($_POST['name']) AND isset($_POST['comment']))
                {
                    if (!empty($_POST['name']) AND !empty($_POST['comment']))
                    {
                        $id = $_GET['id'];
                        $name = $_POST['name'];
                        $comment = $_POST['comment'];
                        $comment_DAO = new \App\src\DAO\CommentDAO();
                        $comment_DAO->setNewComment($id, $name, $comment);
                    }
                    else
                    {
                        echo 'Tous les champs doivent être remplis.';
                    }
                }
        ?>

        <?php
        while($data = $comments->fetch())
        {
            ?>
            <div class="text-left">
                <p>Le <?= $data['comment_date'];?>, <strong><?= $data['author'];?></strong> a écrit:</p>
                <p><?= $data['comment_content'];?></p>
                <p>
                    <form method="post" action="<?= 'index.php?route=comment_alert&id=' . $data['id'] . '';?>">

                    <?php
                    if (!isset($_POST['comment_alert']))
                    {
                        $comment_id = $data['id'];
                        $form = new \App\src\DAO\FormDAO(array(
                            'name' => 'comment_alert'
                        ));

                        echo $form->hidden('comment_alert', $comment_id);
                        echo $form->submit_signaler();
                    }
                    ?>

                    </form>
                </p>

                    <?php
                    if (isset($_POST['comment_alert']))
                    {
                        echo 'Etes-vous sûr de vouloir signaler ce commantaire?';

                        echo '<form method="post" action="index.php?route=comment_alert&id=' . $data['id'] . '">';

                        $comment_id = $data['id'];
                        $form = new \App\src\DAO\FormDAO(array(
                            'name'=>'comment_alert_step_2'
                        ));

                        echo $form->hidden('comment_alert_step_2', $comment_id);
                        echo $form->submit_signaler();

                        echo '</form>';

                    }
                    ?>

                    <?php
                    if (isset($_POST['comment_alert_step_2']))
                    {
                        $comment_id = $data['id'];
                        $form = new \App\src\DAO\FormDAO(array(
                            'name' => 'comment_alert'
                        ));
                        $comment_DAO = new \App\src\DAO\CommentDAO();
                        $comment_DAO->commentAlert($_POST['comment_alert_step_2']);
                    }
                    ?>
            </div>
            <br>
        <?php
        }
        $comments->closeCursor();
        ?>

        <a href="index.php">Retour à l'accueil</a>

</body>