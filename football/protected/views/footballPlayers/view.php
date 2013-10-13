<?php

$this->menu=array(
	array('label'=>'Játékosok listázása', 'url'=>array('admin')),
	array('label'=>'Új Játékos hozzáadása', 'url'=>array('create')),
	array('label'=>'Játékos szerkesztése', 'url'=>array('update', 'id'=>$model->player_id)),
	array('label'=>'Játékos törlése', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->player_id),'confirm'=>'Biztos, hogy törölni akarja a játékost?')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'first_name',
		'last_name',
		'nationality',
        array('name'=>'name', 'value'=>$model->club->name),
		'birth_date',
		'date_created',
		'date_updated',
	),
)); ?>
