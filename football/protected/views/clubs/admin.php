<?php


$this->menu=array(
	array('label'=>'Klubok listázása', 'url'=>array('admin')),
	array('label'=>'Új Klub hozzáadása', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('clubs-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Klubok kezelése</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clubs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'year_of_foundation',
		'date_created',
		'date_updated',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
