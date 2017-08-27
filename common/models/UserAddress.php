<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "db_user_address".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $number
 * @property string $building
 * @property string $soi
 * @property string $road
 * @property string $mu
 * @property string $district
 * @property string $amphoe
 * @property string $province
 * @property string $zipcode
 * @property string $note
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_user_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'number', 'district', 'amphoe', 'province', 'zipcode'], 'required'],
            [['id_user'], 'integer'],
            [['note'], 'string'],
            [['number', 'building', 'soi', 'road', 'mu', 'district', 'amphoe', 'province', 'zipcode'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'number' => 'Number',
            'building' => 'Building',
            'soi' => 'Soi',
            'road' => 'Road',
            'mu' => 'Mu',
            'district' => 'District',
            'amphoe' => 'Amphoe',
            'province' => 'Province',
            'zipcode' => 'Zipcode',
            'note' => 'Note',
        ];
    }
}
