<?php

use yii\widgets\LinkPager;

/* @var $this yii\web\View */

$this->title = 'Homepage';
?>
<div class="site-index">

    <?php if (Yii::$app->getRequest()->getQueryParam('page') <= 1) : ?>
        <div class="jumbotron">
            <h1>Congratulations!</h1>

            <p class="lead">You have successfully created your Yii-powered application.</p>

            <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
        </div>
    <?php endif; ?>

    <div class="body-content">

        <?php foreach ($posts as $post) : ?>
            <div class="post clearfix">
                <h2><?= $post->title ?></h2>

                <p><?= mb_substr($post->content, 0, 256, 'UTF-8'); ?>...</p>
                <a href="<?= yii\helpers\Url::to(["/site/{$post->slug}"]) ?>">Read more</a>
                <span class="pull-right">
                    Published <b><?= Yii::$app->formatter->asDate($post->published_at) ?></b>
                </span>
            </div>
        <?php endforeach; ?>

        <div class="text-center">
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        </div>

    </div>
</div>
