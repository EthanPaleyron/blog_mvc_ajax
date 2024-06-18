<?php
namespace Project\Controllers;

use Project\Validator;
use Project\Models\UserManager;
use Project\Models\BlogManager;
use Project\Models\CommentManager;
use Project\Models\SubCommentManager;

abstract class Controller
{
    protected Validator $validator;
    protected UserManager $userManager;
    protected BlogManager $blogManager;
    protected CommentManager $commentManager;
    protected SubCommentManager $subCommentManager;
    public function __construct()
    {
        $this->validator = new Validator();
        $this->userManager = new UserManager();
        $this->blogManager = new BlogManager();
        $this->commentManager = new CommentManager();
        $this->subCommentManager = new SubCommentManager();
    }
}