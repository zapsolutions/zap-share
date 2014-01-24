<ul>
	<?php foreach ($clients as $client): ?>
		<li>
			<a class="list-group-item" href="#" data-id="<?php echo $client['Client']['id']; ?>"><?php echo $client['Client']['name']; ?></a>
			<ul>
				<?php foreach ($client['Project'] as $project): ?>
					<li>
						<a class="list-group-item" href="#"><?php echo $project['name']; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</li>
	<?php endforeach; ?>
</ul>