<?php

$this->menu=array(
	array('label'=>'Játékosok listázása', 'url'=>array('admin')),
);
?>

<h1>Új játékos hozzáadása</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>