<?php

namespace app\controllers;

use app\models\Property;
use yii\data\ActiveDataProvider;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $propertyList = Property::find()->all();

        $locality = \Yii::$app->request->get('locality');
        if(isset($locality)) {
            $propertyList = Property::find()->where(['location' => $locality])->all();
        }
        return $this->render('index', [
            'locality' => $locality,
            'propertyList' => $propertyList
        ]);
    }
}
