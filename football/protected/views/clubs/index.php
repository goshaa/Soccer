<?php
$this->breadcrumbs=array(
	'Clubs',
);

$this->menu=array(
	array('label'=>'Create Clubs', 'url'=>array('create')),
	array('label'=>'Manage Clubs', 'url'=>array('admin')),
);
?>

<h1>Clubs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
