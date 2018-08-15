<?php

$this->title = $user->username;
$this->params['breadcrumbs'][] = $this->title;
?>
Felhasználónév: <b><?=$user->username?></b><br>
E-mail cím: <b><?=$user->email?></b>
<hr>
<h2>Posztok</h2>

<?php
foreach ($user->posts as $post) {
    echo "<a href='".\yii\helpers\Url::to(['post/post', 'id' => $post->id])."'><h1>".$post->title."</h1></a>";
    echo "<h3>".$post->prolog."</h3>";
}
?>