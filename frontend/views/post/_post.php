<?php

/* @var $this \yii\web\View */
/* @var $post \common\models\Post */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;
?>

<article class="post-item">

    <div class="post-title">
        <?= Html::a(Html::encode($post->title),
            ['/post/view', 'id' => $post->id, 'slug' => $post->slug]
        ) ?>
    </div>

    <div class="post-info">
        <?= Yii::t('post', 'Date publication:') ?> <?= Yii::$app->formatter->asDatetime($post->updated_at, 'short'); ?><span class="margin-line">|</span>
        <?= Yii::t('post', 'Author:') ?> <?= Html::a(Html::encode($post->user->username), ['profile/view', 'id' => $post->user->id]); ?>
    </div>

    <?= HtmlPurifier::process(Markdown::process($post->body, 'gfm-comment')) ?>

    <?= Html::a(Yii::t('post', 'read more...'), ['/post/view', 'id' => $post->id, 'slug' => $post->slug], ['class' => 'btn btn-default btn-sm']) ?>

</article>