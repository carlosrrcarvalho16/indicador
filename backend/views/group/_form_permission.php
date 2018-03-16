<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['action' => '/group/updatepermission?id=' . $group->name]); ?>
<div class="box-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php
                $checkedList = [];
                foreach ($group->authitemchildren as $permission) {
                    $checkedList[] = $permission->child;
                }
                $group->permissions = $checkedList;
                $permissions = ArrayHelper::map($permissions, 'name','name');
                echo $form->field($group, 'permissions')->checkboxList($permissions, [
                            'item' =>
                                function ($index, $label, $name, $checked, $value) {
                                    return Html::checkbox($name, $checked, [
                                        'value' => $value,
                                        'label' => '<label for="' . $label . '">' . $label . '</label>',
                                        'labelOptions' => [
                                            'class' => 'ckbox ckbox-primary col-md-4',
                                        ],
                                        //'id' => $label,
                                    ]);
                                },
                            'separator'=>false,
                            'template'=>'<div class="items">{input}{label}</div>'
                ]);
                ?>
                <div class="help-block"></div>
            </div>
        </div>
    </div>
</div>
<div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>