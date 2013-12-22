<?php

class UsersController extends Controller
{
    public function actionIndex()
    {
        $model = new UsersModel();

        if (isset($_POST['Auth'])) {
            if ($model->authUser($_POST['Auth'])) {
                header('Location: /');
            } else {
                $response = 'Не правильный логин или пароль';
            }
        }

        $this->view->render('user/signIn', 'templateView',
            array(
                'response' => $response,
                'data' => $model->attributeLabels('Auth')
            )
        );
    }

    public function actionSignUp()
    {
        $model = new UsersModel();

        if (isset($_POST['Registration'])) {
            if ($model->issetUser($_POST['Registration'])) {
                if ($model->signUpUser($_POST['Registration'])) {
                    $response = 'Вы успешно зарегистрировались! &nbsp; <a href="/users/">Войти???</a>';
                } else {
                    $response = 'При регистрации произошла ошибка';
                }
            } else {
                $response = 'Такой пользователь уже есть в базе данных';
            }
        }

        $this->view->render('user/signUp', 'templateView',
            array(
                'response' => $response,
                'data' => $model->attributeLabels('Registration')
            )
        );
    }

    public function actionPasswordRecover()
    {
        $model = new UsersModel();

        if (isset($_POST['Recover'])) {
            if ($model->recoverUser($_POST['Recover'])) {
                $response = 'На ваш емайл было отправлено сообщение с новым паролем';
            } else {
                $response = 'Ошибка пользователь с такм email не был найден';
            }
        }

        $this->view->render('user/recoverPassword', 'templateView',
            array(
                'response' => $response,
                'data' => $model->attributeLabels('Recover')
            )
        );
    }

    public function actionLogout()
    {
        session_destroy();
        header('Location: /');
    }
}