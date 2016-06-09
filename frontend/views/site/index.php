<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\Html;

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

        <?php /* @var $post yeesoft\post\models\Post */ ?>
        <?php foreach ($posts as $post) : ?>
            <div class="post clearfix">
                <h2>
                    <a href="<?= Url::to(["/site/{$post->slug}"]) ?>">
                        <?= $post->title ?>
                    </a>
                </h2>

                <p class="text-justify">
                    <?= $post->getThumbnail(['class' => 'thumbnail pull-left', 'style' => 'width: 160px; margin: 0 7px 7px 0']) ?>
                    <?= $post->shortContent ?>
                </p>

                <div class="clearfix" style="margin-bottom: 10px;">
                    <div class="pull-left">
                        <?php if ($post->category): ?>
                            <b><?= Yii::t('yee/post', 'Posted in') ?></b>
                            <a href="<?= Url::to(['/category/index', 'slug' => $post->category->slug]) ?>">"<?= $post->category->title ?>"</a>
                        <?php endif; ?>
                    </div>
                    <div class="pull-right">
                        <?php $tags = $post->tags; ?>
                        <?php if (!empty($tags)): ?>
                            <b><?= Yii::t('yee/post', 'Tags') ?>:</b>
                            <?php foreach ($tags as $tag): ?>
                                <?= Html::a($tag->title, ['/tag/index', 'slug' => $tag->slug], ['class' => 'label label-primary']) ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <span class="pull-right"><?= Yii::t('yee', 'Published') ?> by <b><?= $post->author->username ?></b> on <b><?= $post->publishedDate ?></b></span>

            </div>
        <?php endforeach; ?>

        <div class="text-center">
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        </div>

    </div>
</div>
