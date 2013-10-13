<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transfers-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">A <span class="required">*</span>-al jelölt mezők kitöltése kötelező.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($transfer,'player_id'); ?>
        <?php echo $form->dropDownList($transfer,'player_id', CHtml::listData($players_array,'player_id', 'name'));?>
      </div>
    <div class="row">
        <?php echo $form->labelEx($transfer,'payment'); ?>
		<?php echo $form->textField($transfer,'payment',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($transfer,'payment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Leigazolás'); ?>
	</div>

<?php $this->endWidget(); ?>
    
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'football-players-grid',
	'dataProvider'=>$players,
	'columns'=>array(
		'first_name',
		'last_name',
		'nationality',
        array('name'=>'club_id', 'header'=>'Klub', 'value'=>'$data->club->name'),
		array('name'=>'birth_date', 'header'=>'Életkor', 'value'=>'$data->getAge()'),
		array(
			'class'=>'CButtonColumn',
            'template'=>'',
		),
	),
)); ?>

</div><!-- form -->