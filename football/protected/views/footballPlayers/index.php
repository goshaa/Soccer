<?php
$this->breadcrumbs=array(
	'Football Players',
);

$this->menu=array(
	array('label'=>'Create FootballPlayers', 'url'=>array('create')),
	array('label'=>'Manage FootballPlayers', 'url'=>array('admin')),
);
?>

<h1>Football Players</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
