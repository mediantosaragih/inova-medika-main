<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Informasi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="informasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['Lunas' => 'Lunas', 'Belum Lunas' => 'Belum Lunas'], ['prompt' => 'Status']) ?>

    <br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
