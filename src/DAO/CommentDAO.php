<?php

namespace App\src\DAO;

class CommentDAO extends DAO
{
    public function getCommentsFromArticle($id)
    {
        $sql = 'SELECT id, author, comment, date_comment FROM comments WHERE post_id = ?';
        $result = $this->sql($sql, [$id]);
        return $result;
    }

    public function setNewComment()
    {
        $sql = 'INSERT INTO comments(post_id, author, comment, date_comment) VALUES(?, ?, ?, NOW())';
    }

}