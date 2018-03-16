<?php

namespace backend\models;

use Yii;

class Identity extends \yii\base\Model
{
    public static function getUser(){
    	return Yii::$app->user->identity;
    }

    public static function getCompany(){
    	return Yii::$app->user->identity->id_company;
    }
}