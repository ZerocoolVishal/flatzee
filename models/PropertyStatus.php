<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property_status".
 *
 * @property int $id
 * @property string $status_title
 *
 * @property Enquiries[] $enquiries
 * @property Property[] $properties
 */
class PropertyStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_title'], 'required'],
            [['status_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_title' => 'Status Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnquiries()
    {
        return $this->hasMany(Enquiries::className(), ['status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany(Property::className(), ['current_status' => 'id']);
    }
}
