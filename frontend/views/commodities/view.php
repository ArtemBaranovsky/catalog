<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Commodities */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Commodities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="commodities-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'title',
            [
                'attribute'=>'lead_photo',
                'value'=> (Yii::$app->homeUrl . $model->lead_photo),
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'description',
//            'category_id',
            [
                'label' => 'Category_id',
                'value' => $model->category->title,
            ],
            [
                'label' => 'price',
                'value' => $model->price . " грн.",
            ],

        ],
    ]) ?>

</div>
