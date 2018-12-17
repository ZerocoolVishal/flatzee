<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bedroom_amenities".
 *
 * @property int $id
 * @property int $bedroom_id
 * @property int $amenity_ir
 *
 * @property Bedroom $bedroom
 * @property Amenities $amenityIr
 */
class BedroomAmenities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bedroom_amenities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bedroom_id', 'amenity_ir'], 'required'],
            [['bedroom_id', 'amenity_ir'], 'integer'],
            [['bedroom_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bedroom::className(), 'targetAttribute' => ['bedroom_id' => 'id']],
            [['amenity_ir'], 'exist', 'skipOnError' => true, 'targetClass' => Amenities::className(), 'targetAttribute' => ['amenity_ir' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bedroom_id' => 'Bedroom ID',
            'amenity_ir' => 'Amenity Ir',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBedroom()
    {
        return $this->hasOne(Bedroom::className(), ['id' => 'bedroom_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmenityIr()
    {
        return $this->hasOne(Amenities::className(), ['id' => 'amenity_ir']);
    }
}
