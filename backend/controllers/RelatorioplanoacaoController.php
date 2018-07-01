<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
//use backend\models\TbDepartamentoSearch;
//use backend\models\TbDepartaments;

use backend\models\TbPlanoAcao;
use backend\models\TbPlanoAcaoSearch;
use kartik\mpdf\Pdf;
use yii\filters\AccessControl;


class RelatorioplanoacaoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $ano = Yii::$app->session->get('ANO_DASH');
        $reportPlanoAcao   = TbPlanoAcao::getReportplanoacao($ano);


        return $this->render('index', [
            'reportPlanoAcao' => $reportPlanoAcao,
        ]);
    }

    public function actionReport()
    {
        $ano = Yii::$app->session->get('ANO_DASH');
        $reportPlanoAcao   = TbPlanoAcao::getReportplanoacao($ano);

        $content= $this->renderPartial('view-pdf', [
            'reportPlanoAcao' => $reportPlanoAcao,
        ]);

        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Carlos Carvalho'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Gerado por: '. Yii::$app->user->identity->name . ' || Data ' . date('d/m/Y h:i:s a', time())],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
       return $pdf->render();


    }


}
