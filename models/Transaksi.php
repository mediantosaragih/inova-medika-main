<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property int $id
 * @property int $kode_pasien
 * @property string $nama_pasien
 * @property int|null $nik
 * @property string $tanggal
 * @property string $jenis_kelamin
 * @property string $nama_tindakan
 * @property int|null $harga
 * @property string $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $kode_tindakan
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_pasien', 'tanggal', 'kode_tindakan', 'status'], 'required'],
            [['nik', 'harga'], 'integer'],
            [['tanggal', 'created_at', 'updated_at'], 'safe'],
            [['kode_pasien', 'jenis_kelamin', 'kode_tindakan', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_pasien' => 'Kode Pasien',
            'nik' => 'Nik',
            'tanggal' => 'Tanggal',
            'jenis_kelamin' => 'Jenis Kelamin',
            'kode_tindakan' => 'Kode Tindakan',
            'harga' => 'Harga',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id' => 'kode_tindakan']);
    }
    public function getTransaksi()
    {
        return $this->hasOne(Tindakan::class, ['id' => 'kode_pasien']);
    }
}

