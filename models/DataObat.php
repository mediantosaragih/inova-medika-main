<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_obat".
 *
 * @property int $id
 * @property string $nama
 * @property string $kode
 * @property int $stok
 * @property string $harga
 */
class DataObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'kode', 'stok', 'harga'], 'required'],
            [['stok'], 'integer'],
            [['nama', 'kode', 'harga'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'kode' => 'Kode',
            'stok' => 'Stok',
            'harga' => 'Harga',
        ];
    }
}
