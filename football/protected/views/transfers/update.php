<?php

$this->menu=array(
	array('label'=>'Átigazolások listázása', 'url'=>array('admin')),
	array('label'=>'Új Átigazolás hozzáadása', 'url'=>array('create')),
);
?>

<h1>Átigazolás szerkesztése</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>