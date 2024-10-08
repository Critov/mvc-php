<?php
namespace app\controllers;
class HomeController extends BaseController
{
    public function viewHomepage()
    {
        $this->render('home');
    }
}