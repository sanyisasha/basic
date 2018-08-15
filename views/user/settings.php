<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Beállítások';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>


    <?php $form = ActiveForm::begin([
        'id' => 'settings-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'value' => $user->username]) ?>

    <?= $form->field($model, 'email')->input("emmail", ['value' => $user->email]) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'password2')->passwordInput() ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Módosítás', ['class' => 'btn btn-primary', 'name' => 'settings-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
