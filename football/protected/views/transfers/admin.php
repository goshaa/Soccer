<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('transfers-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Átigazolások kezelése</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'transfers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'player_id', 'header'=>'Játékos', 'value'=>'$data->player->first_name." ".$data->player->last_name'),
		array('name'=>'from_club_id', 'header'=>'Honnan', 'value'=>'$data->fromClub->name'),
		array('name'=>'to_club_id', 'header'=>'Hová', 'value'=>'$data->toClub->name'),
		'transfer_date',
		'payment',
		'date_created',
		'date_updated',
		array(
			'class'=>'CButtonColumn',
            'template' => '{view} {delete}'
		),
	),
)); ?>
