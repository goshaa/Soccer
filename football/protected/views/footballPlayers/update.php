<?php

$this->menu=array(
	array('label'=>'Játékosok listázása', 'url'=>array('admin')),
	array('label'=>'Új Játékos hozzáadása', 'url'=>array('create')),
);
?>

<h1>Játékos szerkesztése</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>