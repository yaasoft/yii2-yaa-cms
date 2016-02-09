<?php
/* @var $this yii\web\View */

use yeesoft\comments\widgets\Comments;
use yeesoft\post\models\Post;
use yii\helpers\Html;

$this->title = $post->title;
$this->params['breadcrumbs'][] = $post->title;
?>

    <div class="post">
        <h1><?= Html::encode($post->title) ?></h1>

        <div><?= $post->getThumbnail() ?><?= $post->content ?></div>
    </div>
<?php if ($post->comment_status == Post::COMMENT_STATUS_OPEN): ?>
    <?php echo Comments::widget(['model' => 'post', 'model_id' => $post->id]); ?>
<?php endif; ?>