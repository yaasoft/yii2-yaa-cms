<?php

namespace backend\controllers;

class DashboardController extends \yeesoft\dashboard\controllers\DashboardController
{

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionElements()
    {
        return $this->render('elements');
    }

}
