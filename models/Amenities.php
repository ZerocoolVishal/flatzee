<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "amenities".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 *
 * @property BedroomAmenities[] $bedroomAmenities
 */
class Amenities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'amenities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'icon'], 'required'],
            [['name', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'icon' => 'Icon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBedroomAmenities()
    {
        return $this->hasMany(BedroomAmenities::className(), ['amenity_ir' => 'id']);
    }
}
