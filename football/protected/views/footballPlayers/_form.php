<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'football-players-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">A <span class="required">*</span>-al jelölt mezők kitöltése kötelező.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nationality'); ?>
		<?php echo $form->textField($model,'nationality',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nationality'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->dropDownList($model,'club_id', CHtml::listData(Clubs::model()->findAll(array('order' => 'name')),'club_id','name'));?>
		<?php echo $form->error($model,'club_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birth_date'); ?>
		<?php echo $form->textField($model,'birth_date'); ?>
		<?php echo $form->error($model,'birth_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Új hozzáadása' : 'Mentés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->