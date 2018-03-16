<?php

namespace backend\components;

use Yii;
use yii\base\Component;

class Formmat extends Component{

	const DATE_FORMAT     = 'php:Y-m-d';
	const DATETIME_FORMAT = 'php:Y-m-d H:i:s';
	const TIME_FORMAT     = 'php:H:i:s';

	const DATE_SHOW     = 'php:d/m/Y';
	const DATETIME_SHOW = 'php:d/m/Y H:i';
	const TIME_SHOW     = 'php:H:i';
 
    public function convert($dateStr, $type='date', $format = null) {
        if ($type === 'datetime'):
              $fmt = ($format == null) ? self::DATETIME_FORMAT : $format;
              $date = explode("/", $dateStr);
              if(isset($date[2])):
                return $date[2] . "-" . $date[1] . "-" . $date[0] . " " . date('H:i:s');
              else:
                return $dateStr;
              endif;
        elseif ($type === 'time'):
            $fmt = ($format == null) ? self::TIME_FORMAT : $format;
        else:
            $fmt = ($format == null) ? self::DATE_FORMAT : $format;
            $date = explode("/", $dateStr);
            if(isset($date[2])):
              return $date[2] . "-" . $date[1] . "-" . $date[0];
            endif;
        endif;
        return \Yii::$app->formatter->asDate($dateStr, $fmt);
    }

    public function showDate($dateStr, $type='date', $format = null) {

        $space = explode(' ', $dateStr);
        $data1 = explode('-', $space[0]);

        if(count($data1) == 1)
          return '';

        if(isset($space[1])):
          $data2 = explode(':', $space[1]);
        else:
          $data2[0] = "00";
          $data2[1] = "00";
        endif;

        if ($type === 'diames'):
            return $data1[2] . '/' . $data1[1];
        elseif ($type === 'datetime'):
            return $data1[2] . '/' . $data1[1] . '/' . $data1[0] . ' ' . $data2[0] . ':' . $data2[1];
        elseif ($type === 'time'):
            return $data2[0] . ':' . $data2[1];
        else:
            return $data1[2] . '/' . $data1[1] . '/' . $data1[0];
        endif;
    }

    public function formatCellPhone($cellphone, $ddd='51'){
      if(!empty($cellphone)):
        $cellphone = $this->clearCaracteres($cellphone);
        // $cellphone = (strlen($cellphone) == 7 ? "3{$cellphone}" : (strlen($cellphone) == 8) ? "9{$cellphone}" : $cellphone);
        $cellphone = (strlen($cellphone) == 7 ? "3{$cellphone}" : $cellphone);
        if(strlen($cellphone) == 8 && substr($cellphone, 0, 1) != 3)
          $cellphone = "9{$cellphone}";
        $cellphone = "({$ddd}) " . substr($cellphone, 0, 4) . "-" . substr($cellphone, 4, 5);
      endif;

      return $cellphone;
    }

    public function formatCpf($cpf){
      $cpf = $this->clearCaracteres($cpf);
      if(!empty($cpf)):
        $cpf = str_pad($cpf, 11, "0", STR_PAD_LEFT);
        $cpf = substr($cpf, 0, 3) . "." . substr($cpf, 3, 3) . "." . substr($cpf, 6, 3) . "." . substr($cpf, 9, 2);
      endif;
      return $cpf;
    }

    public function formatCep($cep){
      if(!empty($cep)):
        $cep = $this->clearCaracteres($cep);
        $cep = substr($cep, 0, 5) . "-" . substr($cep, 5, 3);
      endif;

      return $cep;
    }

    public function clearCaracteres($cellphone){
      $cellphone = str_replace(['-', '.', ',', '(', ')'], "", $cellphone);
      return $cellphone;
    }

    public function makeClickable($text) {
        $regex = '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#';
        return preg_replace_callback($regex, function ($matches) {
            return "<a href=\"{$matches[0]}\" target=\"_blank\" title=\"{$matches[0]}\">{$matches[0]}</a>";
        }, $text);
    }

    public function percentual($parcial, $total){
      $percentual = ( $parcial * 100 ) / $total;
      return round($percentual);
    }

    public function formatMoney($valor){
      $valor = str_replace(".", "", $valor);
      $valor = str_replace(",", ".", $valor);
      return $valor;
    }

    public function maskMoney($valor){
      $valor = number_format($valor, 2,',','.');
      return $valor;
    }

    public function formatDateYmd($date){
      try {
        $result = explode("/", $date);
        if(count($result) == 3)
          $date = $result[2] . "-" . $result[1] . "-" . $result[0];
        return $date;
      } catch (Exception $e) {
        echo "<pre style='text-align:left'>";
        print_r($e->getMessage());
        die;
      }
    }

    //Mapfre
    public function separarValores($string){
      $result = explode(".", $string);
      if(count($result) > 1){
        $string = substr($result[0], 0, -1);
        $value = substr($result[0], -1) . "." . $result[1];
      }else{
        $result = explode(",", $string);
        if(count($result) > 1){
          $string = substr($result[0], 0, -3);
          $value = substr($result[0], -3) . "." . $result[1];
        } 
      }
      $arrValue['string'] = trim($string);
      $arrValue['value']  = trim($value);
      return $arrValue;
    }

    //Allianz
    public function separarColunas($field, $separador=[]){
      if(count($separador) > 0){
        $response = [];
        for($i=0;$i<count($separador);$i++){
          $result = explode($separador[$i], $field);
          $response[$i] = $result[0] . " " .$separador[$i];
          $field = trim($result[1]);
        }
        if(!empty($field)){
          $response[$i] = $field;
        }
      }else{
        $result   = explode(" ", $field);
        $response = [];
        $num      = 1;
        for($i=0;$i<count($result);$i++){
          $is_numeric = str_replace([".", ","], "", $result[$i]);
          if(!is_numeric($is_numeric)){
            $response[0] = (isset($response[0]) ? $response[0] . " " : "") . $result[$i];
          }else{
            $response[$num] = $result[$i];
            $num++;
          }
        }
      }
      return $response;
    }
}