<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama_tindakan
 * @property int $harga
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Tindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama_tindakan', 'harga'], 'required'],
            [['harga'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode', 'nama_tindakan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama_tindakan' => 'Nama Tindakan',
            'harga' => 'Harga',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
