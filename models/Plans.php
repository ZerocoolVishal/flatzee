<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plans".
 *
 * @property int $id
 * @property string $plan_name
 * @property string $plan_type
 * @property string $comission
 * @property string $description
 *
 * @property Enquiries[] $enquiries
 * @property PropertyOwner[] $propertyOwners
 */
class Plans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_name', 'plan_type', 'comission', 'description'], 'required'],
            [['plan_name', 'plan_type', 'comission', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plan_name' => 'Plan Name',
            'plan_type' => 'Plan Type',
            'comission' => 'Comission',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnquiries()
    {
        return $this->hasMany(Enquiries::className(), ['plan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyOwners()
    {
        return $this->hasMany(PropertyOwner::className(), ['plan_id' => 'id']);
    }
}
