<div class="row">
	<div class="col-md-12">
		<h2><?php echo $project['Project']['name']; ?></h2>
		<?php if (empty($data)): ?>
			<p>No data is associated with this project yet.</p>
		<?php else: ?>
			<?php foreach ($data as $datum): ?>
				<div class="row">
					<p><strong><?php echo $datum['Datum']['key'];?>:</strong>&nbsp;&nbsp;<?php echo $datum['Datum']['value']; ?></p>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>