<?php

namespace backend\components;

use backend\models\Identity;

use Yii;
use yii\base\Component;

class System extends Component{

    public function getUser() {
        return Yii::$app->user->ID;
    }

    /**
     * @param $prazo
     * @param $abertura
     * @return int
     */
    public function calcPercentual($prazo, $abertura) {

        	$diferenca = 0;
        	$diasCorridos = 0;
        	$percentual = 0;
        	$date1= date_create($abertura); //Data da abertura
    		$date2= date_create($prazo);	//Data do prazo
    		$date3= date_create(date('d-m-Y'));	//Data atual
    		$diferenca = date_diff($date1,$date2)->format('%a');	//Diferença entre abertura e prazo
    		$diasCorridos = date_diff($date1,$date3)->format('%a'); //Dif. entre abertura até data atual

            if($diferenca==0){
                $percentual =0;
            }else{
                $percentual = ($diasCorridos/$diferenca)*100;
            }

        return intval($percentual);
    }
    public function valorPercentual($dividendo, $divisor) {
            if($divisor==0){
                $percentual =100;
            }else{
                $percentual = (1-($dividendo/$divisor))*100;
            }
        return intval($percentual);
    }
    
}