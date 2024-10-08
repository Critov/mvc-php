<?php
namespace app\controllers;
use app\core\Render;
use app\models\UserModel;

class UserController extends BaseController
{
    public function userHomepage()
    {
        if(isset($this->parameters['id']))
        {
            $id = $this->parameters['id'];
            $user = new UserModel();
            $user->setUserId($id);
            $data = $user->readUser();
            if($data != null)
            {
                $this->parameters['name'] = $data['name'];
                $this->parameters['lastName'] = $data['lastName'];
                $this->parameters['age'] = $data['age'];
            }
            else
            {
                $this->parameters['error'] = 'Usuário não encontrado.';
            }
        }
        else
        {
            $this->parameters['name'] = '';
            $this->parameters['lastName'] = '';
            $this->parameters['age'] = '';
        }
        $this->render('user');
    }
}