<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Pasien $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['L' => 'Laki-laki', 'P' => 'Perempuan'], ['prompt' => 'Pilih Jenis Kelamin']) ?>


    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput() ?>

    <?php
    $dataPost=ArrayHelper::map(\app\models\Tindakan::find()->asArray()->all(), 'id', 'nama_tindakan');
	echo $form->field($model, 'kode_tindakan')
        ->dropDownList(
            $dataPost,    
            ['prompt' => 'Pilih Tindakan'],       
            ['id'=>'kode_tindakan']
        );
    ?>        
<br>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
