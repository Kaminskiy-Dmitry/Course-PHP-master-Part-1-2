<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController {

    public function signupAction(){
        if (!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form-data'] = $data;
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if ($user->save('user')){
                    $_SESSION['success'] = 'Пользователь зарегистрирован';
                    
                } else{
                    $_SESSION['error'] = 'Ошибка';
                }
            }
            redirect();
        }
        $this->setMeta('Registration');
    }

    public function loginAction(){
        if(isset($_SESSION['user'])){
            header("location:/");
            exit();
        }
        if (!empty($_POST)){
            $user = new User();
            if ($user->login()){
                $_SESSION['success'] = 'You are successfully logged in';
            } else {
                $_SESSION['error'] = 'Login or password entered incorrectly';
            }
            redirect();
        }
        $this->setMeta('Login');
    }

    public function logoutAction(){
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }

}