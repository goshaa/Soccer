<?php


$this->menu=array(
	array('label'=>'Átigazolások listázása', 'url'=>array('admin')),
	array('label'=>'Átigazolás törlése', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->transfer_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'player_id', 'value'=>$model->player->first_name." ".$model->player->last_name),
		array('name'=>'from_club_id', 'value'=>$model->fromClub->name),
		array('name'=>'to_club_id', 'value'=>$model->toClub->name),
		'transfer_date',
		'payment',
		'date_created',
		'date_updated',
	),
)); ?>
