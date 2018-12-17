<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bedroom".
 *
 * @property int $id
 * @property int $property_id
 *
 * @property Property $property
 * @property BedroomAmenities[] $bedroomAmenities
 */
class Bedroom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bedroom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['property_id'], 'required'],
            [['property_id'], 'integer'],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => Property::className(), 'targetAttribute' => ['property_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'property_id' => 'Property ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'property_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBedroomAmenities()
    {
        return $this->hasMany(BedroomAmenities::className(), ['bedroom_id' => 'id']);
    }
}
