<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model common\models\Commodities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="commodities-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'quantity')->textInput() ?>
    <?= $form->field($model, 'price')->textInput() ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?= $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]) ?>

    <?php echo $form->field($model, 'category_id')->dropDownList( common\models\Categories::getItems(), [
        'prompt' => 'Select Category'])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
