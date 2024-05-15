<?php
namespace Project\Models;

use Project\Models\Blog;

class BlogManager extends Manager
{
    public function store(string $file, string $datetime): void // create a new blog with user id
    {
        $result = $this->bdd->prepare("INSERT INTO blog (id_user, title_blog, description_blog, file_blog, datetime_blog) VALUES (?,?,?,?,?)");
        $result->execute(
            array(
                $_SESSION["user"]["id"],
                $_POST["title_blog"],
                $_POST["description_blog"],
                $file,
                $datetime,
            )
        );
    }
}