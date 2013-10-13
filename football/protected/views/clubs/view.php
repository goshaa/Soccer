<?php


$this->menu=array(
    array('label'=>'Új Játékos leigazolása', 'url'=>array('players', 'id'=>$model->club_id)),
    array('label'=>'Klubok listázása', 'url'=>array('admin')),
	array('label'=>'Klub szerkesztése', 'url'=>array('update', 'id'=>$model->club_id)),
	array('label'=>'Klub törlése', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->club_id),'confirm'=>'Biztos, hogy törölni szeretné ezt a klubot?')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'year_of_foundation',
		'date_created',
		'date_updated',
	),
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'football-players-grid',
	'dataProvider'=>$players,
	'columns'=>array(
		'first_name',
		'last_name',
		'nationality',
        array('name'=>'club_id', 'header'=>'Klub', 'value'=>'$data->club->name'),
		array('name'=>'birth_date', 'header'=>'Életkor', 'value'=>'$data->getAge()'),
		'date_created',
		'date_updated',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'Yii::app()->createUrl("clubs/deletePlayer",array("player_id"=>$data->player_id))',                      
                ),                    
            ),
		),
	),
)); ?>

