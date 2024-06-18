<?php
namespace Project\Models;

class Comment
{
    private int $id_sub_comment;
    private int $id_comment;
    private int $id_user;
    private string $datetime_sub_comment;
    private string $content_sub_comment;
    public function setid_sub_comment($id_sub_comment): void
    {
        $this->id_sub_comment = $id_sub_comment;
    }
    public function getid_sub_comment(): int
    {
        return $this->id_sub_comment;
    }
    public function setid_comment($id_comment): void
    {
        $this->id_comment = $id_comment;
    }
    public function getid_comment(): int
    {
        return $this->id_comment;
    }
    public function setid_user($id_user): void
    {
        $this->id_user = $id_user;
    }
    public function getid_user(): int
    {
        return $this->id_user;
    }
    public function setdatetime_sub_comment($datetime_sub_comment): void
    {
        $this->datetime_sub_comment = $datetime_sub_comment;
    }
    public function getdatetime_sub_comment(): string
    {
        return $this->datetime_sub_comment;
    }
    public function setcontent_sub_comment($content_sub_comment): void
    {
        $this->content_sub_comment = $content_sub_comment;
    }
    public function getcontent_sub_comment(): string
    {
        return $this->content_sub_comment;
    }
}