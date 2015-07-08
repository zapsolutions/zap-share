<ul class="nav nav-pills nav-stacked">
	<div class="row">
		<div class="form-group">
			<input type="text" id="ClientSearch" name="search_input" placeholder="Search for clients or projects..." class="form-control search-client-input" />
		</div>
	</div>
<?php foreach ($clients as $client): ?>
	<?php $activeMenu = $this->Session->read('Sidebar.active'); ?>
	<?php 
	$row_classes = 'client-row';
	$row_state = 'inactive';
	$collapse_icon = 'fa-plus';
	if ($activeMenu === $client['Client']['id']) {
		$row_classes .= ' active';
		$row_state = 'active';
		$collapse_icon = 'fa-minus';
	}
	?>
	<li class="<?= $row_classes; ?>">
		<a class="client" data-id="<?= $client['Client']['id'] ?>" data-state="<?= $row_state; ?>" data-client-name="<?= $client['Client']['name'] ?>">
			<i class="fa <?= $collapse_icon; ?> collapse-icon"></i>&nbsp;&nbsp;<?= $client['Client']['name'] ?>
		</a>
		<ul class="nav nav-pills nav-stacked">
			<?php foreach ($client['Project'] as $project): ?>
				<li>
					<?=
					$this->Html->link($project['name'],
						[
							'controller' => 'data',
							'action' => 'project',
							$project['id']
						],
						[
							'class' => 'project',
							'data-project-name' => $project['name']
						]
					)
					?>
				</li>
			<?php endforeach; ?>
			<li>
				<?=
				$this->Form->create('Project', [
					'controller' => 'project',
					'action' => 'add',
					'class' => 'client-add',
					'inputDefaults' => [
						'div' => false,
						'label' => false
					]
				])
				?>
				<div class="input-group">
					<?=
					$this->Form->input('name', [
						'class' => 'form-control',
						'placeholder' => 'Project',
					])
					?>
					<?= $this->Form->hidden('client_id', ['value' => $client['Client']['id']]) ?>
					<span class="input-group-btn">
						<?= $this->Form->button('Add', ['class' => 'btn btn-default']) ?>
					</span>
				</div>
				<?= $this->Form->end() ?>
			</li>
		</ul>
	</li>
<?php endforeach; ?>
</ul>
<div id="client-add" class="row">
	<div class="col-md-12">
		<?=
		$this->Form->create('Client', [
			'controller' => 'client',
			'action' => 'add',
			'inputDefaults' => [
				'div' => false,
				'label' => false
			]
		])
		?>
		<div class="input-group">
			<?=
			$this->Form->input('name', [
				'class' => 'form-control',
				'placeholder' => 'Client',
			])
			?>
			<?= $this->Form->hidden('client_id', ['value' => $client['Client']['id']]) ?>
			<span class="input-group-btn">
				<?= $this->Form->button('Add', ['class' => 'btn btn-default']) ?>
			</span>
		</div>
		<?= $this->Form->end() ?>
	</div>
</div>