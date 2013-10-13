<?php
$this->breadcrumbs=array(
	'Transfers',
);

$this->menu=array(
	array('label'=>'Create Transfers', 'url'=>array('create')),
	array('label'=>'Manage Transfers', 'url'=>array('admin')),
);
?>

<h1>Transfers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
