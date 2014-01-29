<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-9">
				<h3 class="panel-title"><?php echo $project['Project']['name']; ?></h3>
			</div>
			<div class="col-md-3 projects-actions">
				<?php
				echo $this->Html->link('Edit',
					[
						'controller' => 'projects',
						'action' => 'edit',
						$project['Project']['id']
					],
					[
						'class' => 'btn btn-default'
					]
				);
				?>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<?php if (empty($data)): ?>
					<ul class="list-group">
						<li class="list-group-item">
							<p>No data is associated with this project yet.</p>
						</li>
				<?php else: ?>
					<ul class="list-group">
					<?php foreach ($data as $datum): ?>
						<li class="list-group-item">
							<div class="row">
								<div class="col-md-3">
									<strong><?php echo $datum['Datum']['key'];?></strong>
								</div>
								<div class="col-md-6">
									<?php echo $datum['Datum']['value']; ?>
								</div>
								<div class="col-md-3 data-actions">
									<div class="btn-group">
										<?php
										echo $this->Html->link('Edit',
											[
												'controller' => 'data',
												'action' => 'edit',
												$datum['Datum']['id']
											],
											[
												'class' => 'btn btn-default'
											]
										);
										?>
										<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $datum['Datum']['id']), ['class' => 'btn btn-default'], __('Are you sure you want to delete this?', $datum['Datum']['id'])); ?>
									</div>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>
				<li class="list-group-item">
						<div class="row">
							<div class="col-md-3">
								<?php echo $this->Form->create('Datum', ['controller' => 'data', 'action' => 'add']); ?>
								<?php
								echo $this->Form->input('key', [
									'placeholder' => 'Key',
									'class' => 'form-control',
									'label' => false,
									'div' => false
								]);
								?>
							</div>
							<div class="col-md-6">
								<?php
								echo $this->Form->input('value', [
									'placeholder' => 'Value',
									'class' => 'form-control',
									'label' => false,
									'div' => false
								]);
								?>
							</div>
							<div class="col-md-3 data-actions">
								<?php
								echo $this->Form->hidden('project_id', ['value' => $project['Project']['id']]);
								echo $this->Form->button('Add',
										[
											'class' => 'btn btn-default'
										]
									);
								?>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
