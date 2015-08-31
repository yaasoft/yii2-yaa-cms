<?php

namespace frontend\actions;

/**
 * Description of PostAction
 */
class PostAction extends \yii\web\ViewAction
{
    public $slug;
    public $post;

    public function run()
    {
        $this->controller->action = $this;
        return $this->controller->render('post', ['post' => $this->post]);
    }
}