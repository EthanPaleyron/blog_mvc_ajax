<?php
namespace Project\Controllers;

class BlogController extends Controller
{
    public function store(): void
    {
        $this->validator->validate([
            "title_blog" => ["required", "max:60"],
            "description_blog" => ["required", "max:850"]
        ]);
        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors() && isset($_FILES["file_blog"])) {
            // Adds a random number to the image name
            $file = rand(0, 10000000000) . $_FILES["file_blog"]["name"];
            // Moves the image to the files folder
            move_uploaded_file($_FILES["file_blog"]["tmp_name"], "../public/files/" . $file);
            // Date and time of post creation
            $datetime = date("Y-m-d H:i:s");
            $this->blogManager->store($file, $datetime);
            header("Location: /");
        } else {
            header("Location: /App/create-new-blog/");
        }
    }
    public function update(int $id_blog): void
    {
    }
    public function delete(int $id_blog): void
    {
    }
}