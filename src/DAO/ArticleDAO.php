<?php

namespace App\src\DAO;

class ArticleDAO extends DAO
{
    public function getArticles()
    {
        $sql = 'SELECT id, title, content, date_post FROM posts ORDER BY id DESC';
        $result = $this->sql($sql);
        return $result;
    }

    public function getArticle($idArt)
    {
        $sql = 'SELECT id, title, content, date_post FROM posts WHERE id = ?';
        $result = $this->sql($sql, [$idArt]);
        return $result;
    }
}