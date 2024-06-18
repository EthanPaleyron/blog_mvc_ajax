<?php
namespace Project\Controllers;

class CommentController extends Controller
{
    public function store(int $id_blog)
    {
        $datetime = date("Y-m-d H:i:s");
        $this->commentManager->store($id_blog, $datetime);
        echo json_encode(['success' => true, 'id' => $this->commentManager->getBdd()->lastInsertId(), 'datetime' => $datetime, 'date' => date("Y/m/d")]);
    }
}