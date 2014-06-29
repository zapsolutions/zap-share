<div class="row">
	<?=
	$this->Form->create('Datum', [
		'inputDefaults' => [
			'div' => false,
			'label' => false
		]
	]);
	?>
	<?= $this->Form->input('id'); ?> 
	<div class="form-group">
		<?= $this->Form->input('key', ['class' => 'form-control']); ?>
	</div>
	<div class="form-group">
		<?= $this->Form->input('value', ['class' => 'form-control']); ?>
	</div>
	<div class="form-group">
		<?= $this->Form->hidden('project_id'); ?>
		<?= $this->Form->button('Save', ['class' => 'btn btn-default']) ?>
	</div>
</div>
