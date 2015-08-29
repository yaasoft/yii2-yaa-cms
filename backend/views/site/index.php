<?php
/* @var $this yii\web\View */

$this->title = 'Yee Control Panel';
?>
<div class="site-index">
    <div class="body-content">
        <br/>

        <div class="row">

            <?= \yeesoft\comment\widgets\dashboard\Comments::widget(); ?>

            <?= \yeesoft\widgets\dashboard\Info::widget(); ?>

            <?= \yeesoft\media\widgets\dashboard\Media::widget(['position' => 'right']); ?>

            <?= \yeesoft\post\widgets\dashboard\Posts::widget(); ?>

            <?= \yeesoft\user\widgets\dashboard\Users::widget(); ?>

        </div>
    </div>
</div>
