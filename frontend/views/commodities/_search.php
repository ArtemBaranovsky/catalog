<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CommoditiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="commodities-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    --><?//= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>
<!--    --><?//= $form->field($model, 'quantity') ?>
    <?= $form->field($model, 'price') ?>
    <?= $form->field($model, 'description') ?>

    <?= $form->field($model/*->categories*/, 'category_id')->dropDownList($model->getCategoryList(), [
        'prompt' => 'Select Category'
    ])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
