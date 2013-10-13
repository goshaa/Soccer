<?php

$this->menu=array(
	array('label'=>'Átigazolások listázása', 'url'=>array('admin')),
);
?>

<h1>Új Átigazolás létrehozása</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>