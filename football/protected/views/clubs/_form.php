<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clubs-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">A <span class="required">*</span>-al jelölt mezők kitöltése kötelező.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_of_foundation'); ?>
		<?php echo $form->textField($model,'year_of_foundation',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'year_of_foundation'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Új hozzáadása' : 'Mentés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->