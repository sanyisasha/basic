<?php

$this->title = $post->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?=$post->title?></h1>
<h3><?=$post->prolog?></h3>
<p><?=nl2br($post->text)?></p>
Készítette: <a href="<?=\yii\helpers\Url::to(['user/user', 'id' => $post->user->id])?>"><?=$post->user->username?> - <?=$post->user->email?></a> | Megtekintve <?=$post->viewed?> alkalommal.