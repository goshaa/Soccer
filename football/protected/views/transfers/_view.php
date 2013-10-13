<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('transfer_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->transfer_id), array('view', 'id'=>$data->transfer_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('player_id')); ?>:</b>
	<?php echo CHtml::encode($data->player_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_club_id')); ?>:</b>
	<?php echo CHtml::encode($data->from_club_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_club_id')); ?>:</b>
	<?php echo CHtml::encode($data->to_club_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transfer_date')); ?>:</b>
	<?php echo CHtml::encode($data->transfer_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment')); ?>:</b>
	<?php echo CHtml::encode($data->payment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_updated')); ?>:</b>
	<?php echo CHtml::encode($data->date_updated); ?>
	<br />

	*/ ?>

</div>