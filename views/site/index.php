<?php
use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;

// retrieve data from database
$transactions = Yii::$app->db->createCommand('SELECT COALESCE(SUM(id), 0) as id, months.month 
    FROM (SELECT 1 as month UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 
        UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12) as months
    LEFT JOIN inovamedika.transaksi ON months.month = MONTH(tanggal)
    GROUP BY months.month')->queryAll();

// format data for ChartJS
$data = ArrayHelper::toArray($transactions, [
    'yii\db\ActiveRecord' => [
        'id',
        'month'
    ],
]);

// convert month number to month name
$monthNames = [
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
];

foreach ($data as &$item) {
    $item['month'] = $monthNames[$item['month'] - 1];
}

// generate ChartJS widget
echo ChartJs::widget([
    'type' => 'bar',
    'options' => [
        'height' => 400,
        'width' => 400
    ],
    'data' => [
        'labels' => ArrayHelper::getColumn($data, 'month'),
        'datasets' => [
            [
                'label' => "Total Transactions",
                'backgroundColor' => "rgba(50,40,30,10)",
                'borderColor' => "rgba(179,181,198,1)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => ArrayHelper::getColumn($data, 'id')
            ]
        ]
    ]
]);

?>