<div class="row">
	<div class="col-md-12">
		<h2><?php echo $project['Project']['name']; ?></h2>
		<?php if (empty($data)): ?>
			<p>No data is associated with this project yet.</p>
		<?php else: ?>
			<ul class="list-group">
			<?php foreach ($data as $datum): ?>
				<li class="list-group-item">
					<div class="row">
						<div class="col-md-3">
							<?php echo $datum['Datum']['key'];?>
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
								echo $this->Html->link('Delete',
									[
										'controller' => 'data',
										'action' => 'delete',
										$datum['Datum']['id']
									],
									[
										'class' => 'btn btn-default'
									]
								);
								?>
							</div>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</div>
