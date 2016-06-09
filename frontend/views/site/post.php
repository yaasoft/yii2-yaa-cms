<?php
/* @var $this yii\web\View */

use yeesoft\comments\widgets\Comments;
use yeesoft\post\models\Post;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $post yeesoft\post\models\Post */

$this->title = $post->title;
$this->params['breadcrumbs'][] = $post->title;
?>

<div class="post">
    <h1><?= Html::encode($post->title) ?></h1>

    <div><?= $post->getThumbnail() ?><?= $post->content ?></div>

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
<?php if ($post->comment_status == Post::COMMENT_STATUS_OPEN): ?>
    <?php echo Comments::widget(['model' => 'post', 'model_id' => $post->id]); ?>
<?php endif; ?>