<ul class="nav nav-pills nav-stacked">
<?php foreach ($clients as $client): ?>
	<?php $activeMenu = $this->Session->read('Sidebar.active'); ?>
	<?php if ($activeMenu == $client['Client']['id']): ?>
		<li class="active">
	<?php else: ?>
		<li>
	<?php endif; ?>
		<?php if ($activeMenu == $client['Client']['id']): ?>
			<a class="client" data-id="<?= $client['Client']['id'] ?>" data-state="active">
		<?php else: ?>
			<a class="client" data-id="<?= $client['Client']['id'] ?>" data-state="inactive">
		<?php endif; ?>
				<i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $client['Client']['name']; ?>
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
								'class' => 'project'
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