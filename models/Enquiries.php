<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enquiries".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $contact_number
 * @property int $no_of_house
 * @property string $location
 * @property int $status_id
 * @property string $avalability
 * @property int $property_type_id
 * @property int $bedroos
 * @property int $bathrooms
 * @property double $area
 * @property string $furnishing_status
 * @property string $rent_expectation
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 * @property int $plan_id
 * @property string $timestamp
 *
 * @property Plans $plan
 * @property PropertyTypes $propertyType
 * @property PropertyStatus $status
 */
class Enquiries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enquiries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'contact_number', 'no_of_house', 'location', 'status_id', 'property_type_id', 'bedroos', 'bathrooms', 'area', 'furnishing_status', 'city', 'state', 'country', 'zipcode'], 'required'],
            [['no_of_house', 'status_id', 'property_type_id', 'bedroos', 'bathrooms', 'plan_id'], 'integer'],
            [['avalability', 'timestamp'], 'safe'],
            [['area'], 'number'],
            [['first_name', 'last_name', 'email', 'location', 'furnishing_status', 'address', 'city', 'state', 'country'], 'string', 'max' => 255],
            [['contact_number'], 'string', 'max' => 11],
            [['rent_expectation', 'zipcode'], 'string', 'max' => 10],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plans::className(), 'targetAttribute' => ['plan_id' => 'id']],
            [['property_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyTypes::className(), 'targetAttribute' => ['property_type_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'contact_number' => 'Contact Number',
            'no_of_house' => 'No Of House',
            'location' => 'Location',
            'status_id' => 'Status ID',
            'avalability' => 'Avalability',
            'property_type_id' => 'Property Type ID',
            'bedroos' => 'Bedroos',
            'bathrooms' => 'Bathrooms',
            'area' => 'Area',
            'furnishing_status' => 'Furnishing Status',
            'rent_expectation' => 'Rent Expectation',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'zipcode' => 'Zipcode',
            'plan_id' => 'Plan ID',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plans::className(), ['id' => 'plan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyType()
    {
        return $this->hasOne(PropertyTypes::className(), ['id' => 'property_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(PropertyStatus::className(), ['id' => 'status_id']);
    }
}
