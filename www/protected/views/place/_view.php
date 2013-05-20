<?php
/* @var $this PlaceController */
/* @var $data Place */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typeid')); ?>:</b>
	<?php echo CHtml::encode($data->typeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_lat')); ?>:</b>
	<?php echo CHtml::encode($data->location_lat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_lng')); ?>:</b>
	<?php echo CHtml::encode($data->location_lng); ?>
	<br />


</div>