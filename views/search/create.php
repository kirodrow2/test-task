<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Parse */

$this->title = 'Create Parse';
$this->params['breadcrumbs'][] = ['label' => 'Parses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
