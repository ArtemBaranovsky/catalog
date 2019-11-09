<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Commodities */

$this->title = 'Update Commodities: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Commodities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="commodities-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
