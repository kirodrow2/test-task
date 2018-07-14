<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parse-index">
<?php \yii\widgets\Pjax::begin()?>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'post',
    ]); ?>


    <?= $form->field($searchModel, 'price_start') ?>
    <?= $form->field($searchModel, 'price_end') ?>
    <?= $form->field($searchModel, 'searchTitle') ?>



    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>

    </div>


    <?php ActiveForm::end(); ?>

    <?php if(!empty(Yii::$app->request->post('Search')['price_start'])){
        echo 'Начальная цена: '.Yii::$app->request->post('Search')['price_start'];
    }?>
    <?php if(!empty(Yii::$app->request->post('Search')['price_end'])){
        echo 'Конечная цена: '.Yii::$app->request->post('Search')['price_end'];
    }?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title:ntext',
            'content:ntext',
            'price:ntext',
            'phone',
            /*'summ',*/
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end()?>
</div>
