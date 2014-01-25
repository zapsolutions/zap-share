<ul class="nav nav-pills nav-stacked">
<?php foreach ($clients as $client): ?>
		<li>
			<a class="client" href="#" data-id="<?php echo $client['Client']['id']; ?>" data-state="inactive">
				<i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $client['Client']['name']; ?>
			</a>
			<ul class="nav nav-pills nav-stacked">
				<?php foreach ($client['Project'] as $project): ?>
					<li><a class="project" data-id="<?php echo $project['id']; ?>" href="#"><?php echo $project['name']; ?></a></li>
				<?php endforeach; ?>
				<li>
					<?php echo $this->Form->create('Project', ['controller' => 'project', 'action' => 'add']); ?>
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
<div class="row">
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