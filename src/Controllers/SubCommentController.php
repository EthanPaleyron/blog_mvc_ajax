<?php
namespace Project\Controllers;

class SubCommentController extends Controller
{
    public function store(int $id_comment)
    {
        $datetime = date("Y-m-d H:i:s");
        $this->subCommentManager->store($id_comment, $datetime);
        echo json_encode(['success' => true, 'datetime' => $datetime, 'date' => date("Y/m/d")]);
    }
}