<?php
$this->pageTitle=Yii::app()->name . ' - Hiba';
$this->breadcrumbs=array(
	'Hiba',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>