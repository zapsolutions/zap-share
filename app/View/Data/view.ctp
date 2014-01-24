<div class="data view">
<h2><?php echo __('Datum'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($datum['Datum']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo h($datum['Datum']['key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($datum['Datum']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($datum['Datum']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($datum['Project']['name'], array('controller' => 'projects', 'action' => 'view', $datum['Project']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Datum'), array('action' => 'edit', $datum['Datum']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Datum'), array('action' => 'delete', $datum['Datum']['id']), null, __('Are you sure you want to delete # %s?', $datum['Datum']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Data'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Datum'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
