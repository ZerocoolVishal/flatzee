<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $negotiable
 * @property int $price
 * @property int $no_of_bedrooms
 * @property string $bathroom
 * @property string $balconies
 * @property string $society
 * @property double $super_area
 * @property double $build_up_area
 * @property double $carpet_area
 * @property string $furnished_status
 * @property string $car_parking
 * @property int $floor
 * @property int $total_floor
 * @property string $facing
 * @property string $description
 * @property double $monthly_maintenance
 * @property double $security_deposit
 * @property string $location
 * @property string $landmarks
 * @property int $age_of_construction
 * @property string $available_since
 * @property int $available_to
 * @property int $type
 * @property int $current_status
 * @property int $property_owner_id
 * @property string $date_added
 *
 * @property Appointment[] $appointments
 * @property Bedroom[] $bedrooms
 * @property Images[] $images
 * @property PropertyTypes $type0
 * @property PropertyStatus $currentStatus
 * @property PropertyOwner $propertyOwner
 */
class Property extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'negotiable', 'price', 'no_of_bedrooms', 'bathroom', 'balconies', 'society', 'super_area', 'build_up_area', 'carpet_area', 'furnished_status', 'car_parking', 'floor', 'total_floor', 'facing', 'description', 'monthly_maintenance', 'security_deposit', 'location', 'landmarks', 'age_of_construction', 'available_since', 'available_to', 'type', 'current_status', 'property_owner_id', 'date_added'], 'required'],
            [['price', 'no_of_bedrooms', 'floor', 'total_floor', 'age_of_construction', 'available_to', 'type', 'current_status', 'property_owner_id'], 'integer'],
            [['super_area', 'build_up_area', 'carpet_area', 'monthly_maintenance', 'security_deposit'], 'number'],
            [['date_added'], 'safe'],
            [['title', 'slug', 'negotiable', 'bathroom', 'balconies', 'society', 'furnished_status', 'car_parking', 'facing', 'location', 'landmarks', 'available_since'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1000],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyTypes::className(), 'targetAttribute' => ['type' => 'id']],
            [['current_status'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyStatus::className(), 'targetAttribute' => ['current_status' => 'id']],
            [['property_owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyOwner::className(), 'targetAttribute' => ['property_owner_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'negotiable' => 'Negotiable',
            'price' => 'Price',
            'no_of_bedrooms' => 'No Of Bedrooms',
            'bathroom' => 'Bathroom',
            'balconies' => 'Balconies',
            'society' => 'Society',
            'super_area' => 'Super Area',
            'build_up_area' => 'Build Up Area',
            'carpet_area' => 'Carpet Area',
            'furnished_status' => 'Furnished Status',
            'car_parking' => 'Car Parking',
            'floor' => 'Floor',
            'total_floor' => 'Total Floor',
            'facing' => 'Facing',
            'description' => 'Description',
            'monthly_maintenance' => 'Monthly Maintenance',
            'security_deposit' => 'Security Deposit',
            'location' => 'Location',
            'landmarks' => 'Landmarks',
            'age_of_construction' => 'Age Of Construction',
            'available_since' => 'Available Since',
            'available_to' => 'Available To',
            'type' => 'Type',
            'current_status' => 'Current Status',
            'property_owner_id' => 'Property Owner ID',
            'date_added' => 'Date Added',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['property_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBedrooms()
    {
        return $this->hasMany(Bedroom::className(), ['property_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['property_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(PropertyTypes::className(), ['id' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrentStatus()
    {
        return $this->hasOne(PropertyStatus::className(), ['id' => 'current_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyOwner()
    {
        return $this->hasOne(PropertyOwner::className(), ['id' => 'property_owner_id']);
    }
}
