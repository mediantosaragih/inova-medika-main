<?php

use app\models\Informasi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\InformasiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Informasi Pembayaran ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'kode_pasien',
            // 'nik',
            // 'tanggal',
            // 'jenis_kelamin',
            [
                'attribute' => 'kode_tindakan',
                'value' => 'tindakan.nama_tindakan',
            ],
            'harga',
            'status',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{update}', // specify the button to display
                'buttons' => [
                    'update' => function ($url, $model, $key) { // customize the "update" button
                        return Html::a('<span class="glyphicon glyphicon-usd"></span> Bayar', $url, [
                            'title' => Yii::t('yii', 'Bayar'),
                            'class' => 'btn btn-success', // add a CSS class to the button
                        ]);
                    }
                ],
                'urlCreator' => function ($action, Informasi $model, $key, $index, $column) {
                    if ($action === 'update') { // modify the URL for the "update" action
                        return Url::toRoute(['bayar', 'id' => $model->id]); // replace "update" with "bayar"
                    } else {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                }
            ],
        ],
    ]); ?>


</div>
