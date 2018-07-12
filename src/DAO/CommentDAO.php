<?php

namespace App\src\DAO;

class CommentDAO extends DAO
{
    public function getCommentsFromArticle($id)
    {
        $sql = 'SELECT id, author, comment_content, comment_date FROM comments WHERE post_id = ? ORDER BY id DESC';
        $result = $this->sql($sql, [$id]);
        return $result;
    }

    public function setNewComment($id, $name, $comment)
    {
        $sql = 'INSERT INTO comments (post_id, author, comment_content, comment_date) VALUES (:post_id, :author, :comment_content, NOW())';
        $parameters = array(
            'post_id' => $id,
            'author' => $name,
            'comment_content' => $comment
        );
        $result = $this->sql($sql, $parameters);
    }

}