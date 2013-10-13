<?php

$this->menu=array(
	array('label'=>'Új Játékos hozzáadása', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('football-players-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Játékosok kezelése</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'football-players-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'first_name',
		'last_name',
		'nationality',
        array('name'=>'club_id', 'header'=>'Klub', 'value'=>'$data->club->name'),
		array('name'=>'birth_date', 'header'=>'Életkor', 'value'=>'$data->getAge()'),
		'date_created',
		'date_updated',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
