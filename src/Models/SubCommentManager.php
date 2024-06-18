<?php
namespace Project\Models;

use Project\Models\SubComment;

class SubCommentManager extends Manager
{
    public function getSubCommentsFormBlog(int $id_comment): array // Get all sub-comments with id comment
    {
        $result = $this->bdd->prepare("SELECT id_sub_comment, id_comment, sub_comment.id_user, user.username, datetime_sub_comment, content_sub_comment FROM sub_comment JOIN user ON sub_comment.id_user = user.id_user WHERE id_comment = ? ORDER BY datetime_sub_comment");
        $result->execute(array($id_comment));
        return $result->fetchAll(\PDO::FETCH_CLASS, "Project\Models\SubComment");
    }
    public function store(int $id_comment, string $datetime): void // create a new sub-comment with id comment
    {
        $result = $this->bdd->prepare("INSERT INTO sub_comment (id_comment, id_user, datetime_sub_comment, content_sub_comment) VALUES (?, ?, ?, ?)");
        $result->execute(
            array(
                $id_comment,
                $_SESSION["user"]["id"],
                $datetime,
                $_POST["content_sub_comment"],
            )
        );
    }
}