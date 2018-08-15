<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php
        foreach ($posts as $post) {
            echo "<a href='".\yii\helpers\Url::to(['post/post', 'id' => $post->id])."'><h1>".$post->title."</h1></a>";
            echo "<h3>".$post->prolog."</h3>";
            echo "<p>Készítette: <a href='".\yii\helpers\Url::to(['user/user', 'id' => $post->user->id])."'>".$post->user->username." - ".$post->user->email."</a>  | Megtekintve ".$post->viewed." alkalommal.</p>";
        }

        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
    ?>

    <a href="<?=\yii\helpers\Url::to(['post/newpost'])?>" class="btn btn-primary">Új post</a>
</div>
