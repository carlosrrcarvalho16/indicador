<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl  = '@web';
    public $css = [
        'css/bootstrap.min.css',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.min.css',
        'plugins/iCheck/all.css',
        'plugins/select2/select2.min.css',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'css/site.css',
        'css/theme.css',
        'css/admin-forms.css',
        
    ];
    public $js = [
        'js/bootstrap/bootstrap.min.js',
        '//code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
        // '//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js',
        /*'plugins/jQuery/jQuery-2.1.4.min.js',*/
        'plugins/maskmoney/jquery.maskMoney.min.js',
        'plugins/sparkline/jquery.sparkline.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/fastclick/fastclick.min.js',
        'plugins/chartjs/Chart.min.js',
        'plugins/iCheck/icheck.min.js',
        'plugins/input-mask/jquery.inputmask.js',
        'plugins/input-mask/jquery.inputmask.date.extensions.js',
        'plugins/input-mask/jquery.inputmask.extensions.js',
        'plugins/input-mask/jquery.inputmask.numeric.extensions.js',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'plugins/ckeditor/ckeditor.js',
        'plugins/select2/select2.full.min.js',
        'js/app.js',
        'js/dashboard2.js',
        'dist/js/demo.js',
        'dist/js/jquery/dist/jquery.min.js',
        'dist/js/datatables.net/js/jquery.dataTables.min.js',
        'dist/js/datatables.net-bs/js/dataTables.bootstrap.min.js',
        'dist/js/fastclick/lib/fastclick.js',
        'dist/js/adminlte.min.js',
        
        

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
