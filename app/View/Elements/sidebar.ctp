<ul class="nav nav-pills nav-stacked">
<?php foreach ($clients as $client): ?>
	<?php $activeMenu = $this->Session->read('Sidebar.active'); ?>
	<?php if ($activeMenu == $client['Client']['id']): ?>
		<li class="active">
	<?php else: ?>
		<li>
	<?php endif; ?>
		<?php if ($activeMenu == $client['Client']['id']): ?>
			<a class="client" href="#" data-id="<?php echo $client['Client']['id']; ?>" data-state="active">
		<?php else: ?>
			<a class="client" href="#" data-id="<?php echo $client['Client']['id']; ?>" data-state="inactive">
		<?php endif; ?>
				<i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $client['Client']['name']; ?>
			</a>
			<ul class="nav nav-pills nav-stacked">
				<?php foreach ($client['Project'] as $project): ?>
					<li>
						<?php
						echo $this->Html->link($project['name'],
							[
								'controller' => 'data',
								'action' => 'project',
								$project['id']
							],
							[
								'class' => 'project'
							]
						);
						?>
					</li>
				<?php endforeach; ?>
				<li>
					<?php echo $this->Form->create('Project', ['controller' => 'project', 'action' => 'add', 'class' => 'client-add']); ?>
					<div class="input-group">
						<?php
						echo $this->Form->input('name', [
							'class' => 'form-control',
							'placeholder' => 'Project',
							'label' => false,
							'div' => false
						]);
						echo $this->Form->hidden('client_id', ['value' => $client['Client']['id']]);
						?>
						<span class="input-group-btn">
							<?php echo $this->Form->button('Add', ['class' => 'btn btn-default']) ?>
						</span>
					</div>
					<?php echo $this->Form->end(); ?>
				</li>
			</ul>
		</li>
<?php endforeach; ?>
</ul>
<div id="client-add" class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Client', ['controller' => 'client', 'action' => 'add']); ?>
		<div class="input-group">
			<?php
				echo $this->Form->input('name', [
					'class' => 'form-control',
					'placeholder' => 'Client',
					'label' => false,
					'div' => false
				]);
				echo $this->Form->hidden('client_id', ['value' => $client['Client']['id']]);
			?>
			<span class="input-group-btn">
				<?php echo $this->Form->button('Add', ['class' => 'btn btn-default']); ?>
			</span>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>