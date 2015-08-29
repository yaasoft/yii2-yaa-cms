<?php
namespace backend\controllers;

use yeesoft\controllers\admin\BaseController;

class SiteController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}