<?php
namespace Project\Controllers;

class ViewController extends Controller
{
    public function showHome(): void
    {
        $blogs = $this->blogManager->getAll();
        // redirection to the homepage
        require VIEWS . 'index.php';
    }
    public function showLogin(): void
    {
        // if the user is logged in, he is redirected to the homepage
        if (isset($_SESSION["user"]["username"])) {
            header("Location: /");
        }
        require VIEWS . 'Auth/login.php';
    }
    public function showRegister(): void
    {
        // if the user is logged in, he is redirected to the homepage
        if (isset($_SESSION["user"]["username"])) {
            header("Location: /");
        }
        require VIEWS . 'Auth/register.php';
    }
    public function showCreateBlog(): void
    {
        // if the user is not logged in, he is redirected to the homepage
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /");
        }
        require VIEWS . 'App/createBlog.php';
    }
    public function showUpdateBlog(int $id_blog, int $id_user): void
    {
        // if the user is not logged in, he is redirected to the homepage
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /");
        }
        // if the user id is not identical, he is redirected to the homepage
        if ($_SESSION["user"]["id"] !== $id_user) {
            header("Location: /");
        }
        $blog = $this->blogManager->getBlogWithId($id_blog);
        require VIEWS . 'App/updateBlog.php';
    }
}