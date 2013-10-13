<?php


$this->menu=array(
	array('label'=>'Klubok listázása', 'url'=>array('admin')),
	array('label'=>'Új Klub hozzáadása', 'url'=>array('create')),
);
?>

<h1>Klub szerkesztése</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>