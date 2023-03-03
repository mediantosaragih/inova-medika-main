<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property string $nama_lengkap
 * @property int $nik
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property int $no_hp
 * @property int $kode_tindakan
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'nik', 'jenis_kelamin', 'alamat', 'no_hp', 'kode_tindakan'], 'required'],
            [['nik', 'no_hp', 'kode_tindakan'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama_lengkap', 'jenis_kelamin', 'alamat'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_lengkap' => 'Nama Lengkap',
            'nik' => 'Nik',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
            'kode_tindakan' => 'Kode Tindakan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id' => 'kode_tindakan']);
    }
}
