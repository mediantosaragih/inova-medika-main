<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Informasi $model */

$this->title = 'Create Informasi';
$this->params['breadcrumbs'][] = ['label' => 'Informasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
