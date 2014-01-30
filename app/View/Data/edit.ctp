<div class="data form">
<?php echo $this->Form->create('Datum'); ?>
	<fieldset>
		<legend><?php echo __('Edit Datum'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('key');
		echo $this->Form->input('value');
		echo $this->Form->hidden('project_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
