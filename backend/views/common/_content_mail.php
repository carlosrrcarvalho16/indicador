<?php 
$header = Yii::$app->helper->tableContentMail($fields, 'header');
echo $header;

$coverage = Yii::$app->helper->tableContentMail($fields, 'coverage', ['width-column1' => '75%', 'width-column2' => '25%', 'align-column2' => 'right']);
echo $coverage;

$franchise = Yii::$app->helper->tableContentMail($fields, 'franchise', ['width-column1' => '50%', 'width-column2' => '50%', 'align-column2' => 'right']);
echo $franchise;
?>

<?php 
if(isset($fields['condition_pay'])){
    $key                     = array_keys($fields['condition_pay']);
    $key                     = $key[0];
    $fields['condition_pay'] = $fields['condition_pay'][$key];
    $valor_a_vista           = '';
    if($key == '[valor_a_vista]'){
        $valor_a_vista = $fields['condition_pay'][0]['value'];
    }else{
?>
        <p><strong>&gt;&gt;&gt; Formas de Pagamento:</strong></p>
        <?= Yii::$app->controller->renderPartial('//conditionpay/_' . strtolower($provider), ['condition_pay' => $fields['condition_pay'][0]['value']]); ?>
<?php 
    }

    if($key == '[valor_a_vista]'){
        $content = str_replace($key, $valor_a_vista, $content);
    }else{
        $content = str_replace("<h1>&Agrave; vista: R$ [valor_a_vista]</h1>", "", $content);
    }

}

echo $content;

?>