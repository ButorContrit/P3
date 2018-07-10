<?php
/**
 * Created by PhpStorm.
 * User: Lucile Rutkowski
 * Date: 10/07/2018
 * Time: 10:28
 */

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

} 