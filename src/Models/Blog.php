<?php
namespace Project\Models;

class Blog
{
    private int $id_blog;
    private int $id_user;
    private string $username;
    private string $title_blog;
    private string $description_blog;
    private string $file_blog;
    private string $datetime_blog;
    private array $comments;
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
    public function settitle_blog($title_blog): void
    {
        $this->title_blog = $title_blog;
    }
    public function gettitle_blog(): string
    {
        return $this->title_blog;
    }
    public function setdescription_blog($description_blog): void
    {
        $this->description_blog = $description_blog;
    }
    public function getdescription_blog(): string
    {
        return $this->description_blog;
    }
    public function setfile_blog($file_blog): void
    {
        $this->file_blog = $file_blog;
    }
    public function getfile_blog(): string
    {
        return $this->file_blog;
    }
    public function setdatetime_blog($datetime_blog): void
    {
        $this->datetime_blog = $datetime_blog;
    }
    public function getdatetime_blog(): string
    {
        return $this->datetime_blog;
    }
    public function getComments(): array
    {
        if (isset($this->comments)) {
            return $this->comments;
        } else {
            // If the comments are not in the comments table, I'll get them back.
            $manager = new CommentManager();
            $this->comments = $manager->getCommentsFormBlog($this->id_blog);
            return $this->comments;
        }
    }
}