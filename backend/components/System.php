<?php

namespace backend\components;

use backend\models\Identity;

use Yii;
use yii\base\Component;

class System extends Component{

    public function getUser() {
        return Yii::$app->user->ID;
    }

    public function calcPercentual($prazo, $abertura) {
        return 76;
    }
}