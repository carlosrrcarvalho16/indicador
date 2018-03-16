<?php

namespace backend\components;

use Yii;
use yii\base\Component;

class Helper extends Component{

  /*const ARR_TITLES = [
    'header'        => '',
    'coverage'      => 'Coberturas',
    'franchise'     => 'Franquias',
    'condition_pay' => 'Formas de Pagamento'
  ];*/

  public static $ARR_TITLES = [
    'header'        => '',
    'coverage'      => 'Coberturas',
    'franchise'     => 'Franquias',
    'condition_pay' => 'Formas de Pagamento'
  ];

  public function tableContentMail($fields, $chave, $params = []){
      
      $html      = '';
      $asterisks = [];

      if(isset($fields[$chave])){

        if(!empty(self::$ARR_TITLES[$chave])){
          $html .= '<p><strong>&gt;&gt;&gt; ' . self::$ARR_TITLES[$chave] . ' :</strong></p>';
        }

        $width_column1 = (isset($params['width-column1']) ? $params['width-column1'] : '25%');
        $width_column2 = (isset($params['width-column2']) ? $params['width-column2'] : '75%');
        $align_column2 = (isset($params['align-column2']) ? $params['align-column2'] : 'left');

        $html .= '<table border="1" cellpadding="1" cellspacing="1" style="width:750px">';
        $html .= '  <tbody>';
        foreach ($fields[$chave] as $key => $field) {
          if(count($field) == 1){

            $field = $field[0];

            if(isset($field['asterisk']))
              $asterisks[] = $field['asterisk'];

            $html .= '<tr>';
            $html .= '    <td style="width: ' . $width_column1 . '">' . $field['name'] . '</td>';
            $html .= '   <td style="width: ' . $width_column2 . '; text-align: ' . $align_column2 . '">' . $field['value'] . '&nbsp;&nbsp;</td>';
            $html .= '</tr>';

          }else{

            $html .= '<tr>';
            $html .= '    <td style="width: ' . $width_column1 . '">' . $key . '</td>';
            $html .= '    <td style="width: ' . $width_column2 . '">';
            $html .= '        <table border="0" cellpadding="0" cellspacing="0" style="width:550px">';
                    foreach($field as $row){
                      if(isset($row['asterisk']))
                        $asterisks[] = $row['asterisk'];
                      $html .= '<tr>';
                      $html .= '    <td style="width: 75%">' . $row['name'] . '</td>';
                      $html .= '    <td style="width: 25%">&nbsp;&nbsp;' . $row['value'] . '</td>';
                      $html .= '</tr>';
                    }
                    $html .= '</table>';
                $html .= '</td>';
            $html .= '</tr>';

          }
        }
        $html .= '</tbody>';
        $html .= '</table>';
        if(count($asterisks) > 0){
            foreach ($asterisks as $asterisk){
                $html .= '<p>' . $asterisk . '</p>';
            }
        }
      }
      return $html;
  }
}