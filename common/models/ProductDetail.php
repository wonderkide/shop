<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "db_product_detail".
 *
 * @property integer $id
 * @property integer $id_product
 * @property string $color
 * @property string $images
 * @property string $size
 * @property string $quantity
 * @property string $all
 */
class ProductDetail extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_product_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'images'], 'required'],
            [['id_product'], 'integer'],
            [['images', 'size', 'quantity', 'all'], 'string'],
            [['color'], 'string', 'max' => 64],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 10],
            ['imageFile', 'required', 'on' => 'new-size'],
            ['all', 'required', 'on' => ['new-size', 'update-size']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
            'color' => 'Color',
            'images' => 'Images',
            'size' => 'Size',
            'quantity' => 'Quantity',
            'all' => 'all',
        ];
    }
}
