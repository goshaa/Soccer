<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transfers-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">A <span class="required">*</span>-al jelölt mezők kitöltése kötelező.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'player_id'); ?>
        <?php echo $form->dropDownList($model,'player_id', CHtml::listData(FootballPlayers::model()->findAll(array('order' => 'concat(first_name, " ", last_name)')),'player_id', 'name'));?>
		<?php echo $form->error($model,'player_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from_club_id'); ?>
		<?php echo $form->dropDownList($model,'from_club_id', CHtml::listData(Clubs::model()->findAll(array('order' => 'name')),'club_id','name'));?>
		<?php echo $form->error($model,'from_club_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to_club_id'); ?>
		<?php echo $form->dropDownList($model,'to_club_id', CHtml::listData(Clubs::model()->findAll(array('order' => 'name')),'club_id','name'));?>
		<?php echo $form->error($model,'to_club_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transfer_date'); ?>
		<?php echo $form->textField($model,'transfer_date'); ?>
		<?php echo $form->error($model,'transfer_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment'); ?>
		<?php echo $form->textField($model,'payment',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'payment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Új hozzáadása' : 'Mentés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->