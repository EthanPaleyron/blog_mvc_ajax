<?php
namespace Project\Models;

use Project\Models\Blog;

class BlogManager extends Manager
{
    public function getAll(): array // Get all blogs
    {
        $result = $this->bdd->query("SELECT id_blog, blog.id_user, user.username, title_blog, description_blog, file_blog, datetime_blog FROM blog JOIN user ON blog.id_user = user.id_user ORDER BY datetime_blog");
        return $result->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Blog");
    }
    public function getBlogWithId(int $id_blog): Blog // Get blog with id blog
    {
        $result = $this->bdd->prepare("SELECT id_blog, blog.id_user, user.username, title_blog, description_blog, file_blog, datetime_blog FROM blog JOIN user ON blog.id_user = user.id_user WHERE id_blog = ?");
        $result->execute(
            array(
                $id_blog,
            )
        );
        $result->setFetchMode(\PDO::FETCH_CLASS, "Project\Models\Blog");
        return $result->fetch();
    }
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
    public function update(int $id_blog, string $file, string $datetime): void // update a blog with user id
    {
        $result = $this->bdd->prepare("UPDATE blog SET title_blog = ?, description_blog = ?, file_blog = ?, datetime_blog = ? WHERE id_blog = ? AND id_user = ?");
        $result->execute(
            array(
                $_POST["title_blog"],
                $_POST["description_blog"],
                $file,
                $datetime,
                $id_blog,
                $_SESSION["user"]["id"],
            )
        );
    }
    public function delete(int $id_blog): void // delete a blog with user id
    {
        $result = $this->bdd->prepare("DELETE FROM blog WHERE id_blog = ?");
        $result->execute(
            array(
                $id_blog
            )
        );
    }
}