<?php

namespace backend\controllers;

use Yii;
use backend\models\TbDepartamentoSearch;
use backend\models\TbDepartaments;
use kartik\mpdf\Pdf;


class RelatoriodepartamentoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new TbDepartamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReport()
    {
        $searchModel = new TbDepartamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $content= $this->renderPartial('view-pdf', [
            'dataProvider' => $dataProvider,
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
            'options' => ['title' => 'Krajee Report Title'],
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
