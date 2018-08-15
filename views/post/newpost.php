<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Új Poszt';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([
    'id' => 'newpost-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-10\">{input}\n{error}</div>\n",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>


<?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'prolog')->textInput() ?>

<?= $form->field($model, 'text')->textarea() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Új post', ['class' => 'btn btn-primary', 'name' => 'newpost-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>