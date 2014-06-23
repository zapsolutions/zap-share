<div class="data form">
	<?=
	$this->Form->create('Datum', [
		'inputDefaults' => [
			'div' => false,
			'label' => false
		]
	]);
	?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('key', ['class' => 'form-control']);
		echo $this->Form->input('value', ['class' => 'form-control']);
		echo $this->Form->hidden('project_id');
	?>
	<?= $this->Form->button('Save', ['class' => 'btn btn-default']) ?>
</div>
