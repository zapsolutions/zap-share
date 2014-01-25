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
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Project">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Add</button>
						</span>
					</div>
				</li>
			</ul>
		</li>
<?php endforeach; ?>
</ul>
<div class="row">
	<div class="col-md-12">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Client">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Add</button>
			</span>
		</div>
	</div>
</div>