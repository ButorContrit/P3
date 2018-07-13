<?php

namespace App\src\controller;


use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;

class FrontController {

    public function home() {
        $article = new ArticleDAO();
        $articles = $article->getArticles();
        require '../templates/home.php';
    }

    public function article($id) {
        $article = new ArticleDAO();
        $articles = $article->getArticle($id);
        $comment = new CommentDAO();
        $comments=$comment->getCommentsFromArticle($id);
        require '../templates/single.php';
    }

    public function alert($id) {
        $comment = new CommentDAO();
        $oneComment=$comment->getOneComment($id);
        require '../templates/comment_alert.php';
    }

} 