<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parse */

$this->title = 'Update Parse: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Parses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
