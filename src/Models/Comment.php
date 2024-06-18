<?php
namespace Project\Models;

class Comment
{
    private int $id_comment;
    private int $id_blog;
    private int $id_user;
    private string $username;
    private string $datetime_comment;
    private string $content_comment;
    private array $sub_comments;
    public function setid_comment($id_comment): void
    {
        $this->id_comment = $id_comment;
    }
    public function getid_comment(): int
    {
        return $this->id_comment;
    }
    public function setid_blog($id_blog): void
    {
        $this->id_blog = $id_blog;
    }
    public function getid_blog(): int
    {
        return $this->id_blog;
    }
    public function setid_user($id_user): void
    {
        $this->id_user = $id_user;
    }
    public function getid_user(): int
    {
        return $this->id_user;
    }
    public function setusername($username): void
    {
        $this->username = $username;
    }
    public function getusername(): string
    {
        return $this->username;
    }
    public function setdatetime_comment($datetime_comment): void
    {
        $this->datetime_comment = $datetime_comment;
    }
    public function getdatetime_comment(): string
    {
        return $this->datetime_comment;
    }
    public function setcontent_comment($content_comment): void
    {
        $this->content_comment = $content_comment;
    }
    public function getcontent_comment(): string
    {
        return $this->content_comment;
    }
    public function getSubComments(): array
    {
        if (isset($this->sub_comments)) {
            return $this->sub_comments;
        } else {
            // If the sub-comments are not in the sub-comments table, I'll get them back.
            $manager = new SubCommentManager();
            $this->sub_comments = $manager->getSubCommentsFormBlog($this->id_comment);
            return $this->sub_comments;
        }
    }
}