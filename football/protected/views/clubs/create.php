<?php

$this->menu=array(
	array('label'=>'Klubok listázása', 'url'=>array('admin')),
);
?>

<h1>Új Klub létrehozása</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>