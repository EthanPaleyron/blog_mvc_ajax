<?php
namespace Project\Models;

use Project\Models\Comment;

class CommentManager extends Manager
{
    public function getCommentsFormBlog(int $id_blog): array // Get all comments with id blog
    {
        $result = $this->bdd->prepare("SELECT id_comment, id_blog, user.id_user, user.username, datetime_comment, content_comment FROM comment JOIN user ON comment.id_user = user.id_user WHERE id_blog = ? ORDER BY datetime_comment");
        $result->execute(array($id_blog));
        return $result->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Comment");
    }
    public function store(int $id_blog): void // create a new comment with id blog
    {
        $result = $this->bdd->prepare("INSERT INTO comment (id_blog, id_user, datetime_comment, content_comment) VALUES (?, ?, NOW(), ?)");
        $result->execute(
            array(
                $id_blog,
                $_SESSION["user"]["id"],
                $_POST["content_comment"],
            )
        );
    }
}