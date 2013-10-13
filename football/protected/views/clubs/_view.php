<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('club_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->club_id), array('view', 'id'=>$data->club_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_of_foundation')); ?>:</b>
	<?php echo CHtml::encode($data->year_of_foundation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_updated')); ?>:</b>
	<?php echo CHtml::encode($data->date_updated); ?>
	<br />
    
</div>