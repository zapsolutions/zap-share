<ul class="nav nav-pills nav-stacked">
<?php foreach ($clients as $client): ?>
		<li>
			<a class="client" href="#" data-id="<?php echo $client['Client']['id']; ?>" data-state="inactive">
				<i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $client['Client']['name']; ?>
			</a>
			<ul class="nav nav-list">
			<?php foreach ($client['Project'] as $project): ?>
				<li><a class="project" data-id="<?php echo $project['id']; ?>" href="#"><?php echo $project['name']; ?></a></li>
			<?php endforeach; ?>
			</ul>
		</li>
<?php endforeach; ?>
</ul>