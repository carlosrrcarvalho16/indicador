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

    public function strMonth($mes) {
        if ( is_numeric($mes) ) {
            if ( $mes == 01 ) {
                $mesnum = "Janeiro";
            }
            elseif ( $mes == 02 ) {
                $mesnum = "Fevereiro";
            }
            elseif ( $mes == 03 ) {
                $mesnum = "Março";
            }
            elseif ( $mes == 04 ) {
                $mesnum = "Abril";
            }
            elseif ( $mes == 05 ) {
                $mesnum = "Maio";
            }
            elseif ( $mes == 06 ) {
                $mesnum = "Junho";
            }
            elseif ( $mes == 07 ) {
                $mesnum = "Julho";
            }
            elseif ( $mes == 8 ) {
                $mesnum = "Agosto";
            }
            elseif ( $mes == 9 ) {
                $mesnum = "Setembro";
            }
            elseif ( $mes == 10 ) {
                $mesnum = "Outubro";
            }
            elseif ( $mes == 11 ) {
                $mesnum = "Novembro";
            }
            elseif ( $mes == 12 ) {
                $mesnum = "Dezembro";
            }
        }
        else {
            $mes = strtolower($mes);
            if ( $mes == 'jan' || $mes == 'janeiro' || $mes == 'january' ) {
                $mesnum = 01;
            }
            elseif ( $mes == 'fev' || $mes == 'fevereiro' || $mes == 'feb' || $mes == 'february' ) {
                $mesnum = 02;
            }
            elseif ( $mes == 'mar' || $mes == 'mar&ccedil;o' || $mes == 'march' ) {
                $mesnum = 03;
            }
            elseif ( $mes == 'abr' || $mes == 'abril' || $mes == 'apr' || $mes == 'april' ) {
                $mesnum = 04;
            }
            elseif ( $mes == 'mai' || $mes == 'maio' || $mes == 'may' ) {
                $mesnum = 05;
            }
            elseif ( $mes == 'jun' || $mes == 'junho' || $mes == 'june' ) {
                $mesnum = 06;
            }
            elseif ( $mes == 'jul' || $mes == 'julho' || $mes == 'july' ) {
                $mesnum = 07;
            }
            if ( $mes == 'ago' || $mes == 'agosto' || $mes == 'aug' || $mes == 'august' ) {
                $mesnum = 8;
            }
            elseif ( $mes == 'set' || $mes == 'setembro' || $mes == 'sep' || $mes == 'september' ) {
                $mesnum = 9;
            }
            elseif ( $mes == 'out' || $mes == 'outubro' || $mes == 'oct' || $mes == 'october' ) {
                $mesnum = 10;
            }
            elseif ( $mes == 'nov' || $mes == 'novembro' || $mes == 'november' ) {
                $mesnum = 11;
            }
            elseif ( $mes == 'dez' || $mes == 'dezembro' || $mes == 'dec' || $mes == 'december' ) {
                $mesnum = 12;
            }
        }
        return $mesnum;
    }
}