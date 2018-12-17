<?php

namespace app\controllers;

use app\models\Property;
use yii\data\ActiveDataProvider;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $query = Property::find();

        $provider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('index', ['provider' => $provider]);
    }

}
