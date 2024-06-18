<?php
namespace Project\Controllers;

class SubCommentController extends Controller
{
    public function store(int $id_comment)
    {
        $this->subCommentManager->store($id_comment);
        echo json_encode(['success' => true]);
    }
}