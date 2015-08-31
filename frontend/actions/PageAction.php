<?php

namespace frontend\actions;

/**
 * Description of PageAction
 */
class PageAction extends \yii\web\ViewAction
{
    public $slug;
    public $page;

    public function run()
    {
        $this->controller->action = $this;
        return $this->controller->render('page', ['page' => $this->page]);
    }
}