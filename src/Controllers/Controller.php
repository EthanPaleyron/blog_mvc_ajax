<?php
namespace Project\Controllers;

use Project\Validator;
use Project\Models\UserManager;
use Project\Models\BlogManager;

abstract class Controller
{
    protected Validator $validator;
    protected UserManager $userManager;
    protected BlogManager $blogManager;
    public function __construct()
    {
        $this->validator = new Validator();
        $this->userManager = new UserManager();
        $this->blogManager = new BlogManager();
    }
}