<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>

Выберите количество страниц для парсинга realt.by/sale/offices/
<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'post',
]); ?>


<?= $form->field($model, 'pages') ?>




<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

</div>

<?php ActiveForm::end(); ?>
