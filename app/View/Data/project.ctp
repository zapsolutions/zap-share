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
								<button type="button" class="btn btn-default">Edit</button>
								<button type="button" class="btn btn-default">Delete</button>
							</div>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</div>
