<?php

class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->view->render('site/index', 'templateView');
    }

    public function actionError()
    {
        $this->view->render('site/error ', 'templateView');
    }
}