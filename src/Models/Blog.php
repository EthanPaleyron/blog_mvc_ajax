<?php
namespace Project\Models;

class Blog
{
    private int $id_blog;
    private int $id_user;
    private string $title_blog;
    private string $description_blog;
    private string $date_blog;
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
    public function setdate_blog($date_blog): void
    {
        $this->date_blog = $date_blog;
    }
    public function getdate_blog(): string
    {
        return $this->date_blog;
    }
}