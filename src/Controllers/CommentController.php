<?php
namespace Project\Controllers;

class CommentController extends Controller
{
    public function store(int $id_blog)
    {
        $this->commentManager->store($id_blog);
        echo json_encode(['success' => true]);
    }
}