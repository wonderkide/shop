<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "db_main_menu".
 *
 * @property integer $id
 * @property string $label
 * @property string $url
 * @property integer $parent
 * @property integer $sort
 * @property integer $active
 */
class MainMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_main_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'url', 'parent', 'sort', 'active'], 'required'],
            [['parent', 'sort', 'active'], 'integer'],
            [['label', 'url'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'url' => 'Url',
            'parent' => 'Parent',
            'sort' => 'Sort',
            'active' => 'Active',
        ];
    }
}
