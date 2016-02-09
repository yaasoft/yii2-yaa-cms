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

                <p class="text-justify">
                    <?= $post->getThumbnail(['class' => 'thumbnail pull-left', 'style' => 'width: 160px; margin: 0 7px 7px 0']) ?>
                    <?= $post->shortContent ?>
                </p>
                <a href="<?= yii\helpers\Url::to(["/site/{$post->slug}"]) ?>"><?= Yii::t('yee', 'Read more') ?></a>
                <span class="pull-right"><?= Yii::t('yee', 'Published') ?> <b><?= $post->publishedDate ?></b></span>
            </div>
        <?php endforeach; ?>

        <div class="text-center">
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        </div>

    </div>
</div>
