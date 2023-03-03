<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Transaksi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $dataPost=ArrayHelper::map(\app\models\Pasien::find()->asArray()->all(), 'id', 'nama_lengkap');
	echo $form->field($model, 'kode_pasien')
        ->dropDownList(
            $dataPost,    
            ['prompt' => 'Nama Pasien'],       
            ['id'=>'kode_pasien']
        );
    ?>  

    <?= $form->field($model, 'nik')->textInput() ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['L' => 'Laki-laki', 'P' => 'Perempuan'], ['prompt' => 'Pilih Jenis Kelamin']) ?>

    <?php
    $dataPost=ArrayHelper::map(\app\models\Tindakan::find()->asArray()->all(), 'id', 'nama_tindakan');
	echo $form->field($model, 'kode_tindakan')
        ->dropDownList(
            $dataPost,    
            ['prompt' => 'Pilih Tindakan'],       
            ['id'=>'kode_tindakan']
        );
    ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['Belum Lunas' => 'Belum Lunas'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
