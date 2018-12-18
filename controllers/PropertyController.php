<?php

namespace app\controllers;

use app\models\Property;
use yii\db\Query;
use yii\data\ActiveDataProvider;

class PropertyController extends \yii\web\Controller
{

    public function actionIndex($slug)
    {

        if(isset($slug)) {
            $property = Property::find()->where(['slug' => $slug])->one();
            if($property) {
                return $this->render('index', ['property' => $property]);
            }
            else {
                return $this->redirect(['site/error']);
            }
        }
        else {
            return $this->redirect(['site/']);
        }
    }

    public function actionView($slug)
    {
        if(isset($slug)) {
            $property = Property::find()->where(['slug' => $slug])->one();
            if($property) {
                return $this->render('index', ['property' => $property]);
            }
            else {
                return $this->redirect(['site/error']);
            }
        }
        else {
            return $this->redirect(['site/']);
        }
    }

}
