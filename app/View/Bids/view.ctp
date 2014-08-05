<div class="bids view">
<h2><?php echo __('Bid'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bid['Bid']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vehicle'); ?></dt>
		<dd>
			<?php echo h($bid['Bid']['vehicle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vehicle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bid['Vehicle']['id'], array('controller' => 'vehicles', 'action' => 'view', $bid['Vehicle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($bid['Bid']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo h($bid['Bid']['user']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($bid['Bid']['time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bid'), array('action' => 'edit', $bid['Bid']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bid'), array('action' => 'delete', $bid['Bid']['id']), array(), __('Are you sure you want to delete # %s?', $bid['Bid']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bids'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bid'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('controller' => 'vehicles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('controller' => 'vehicles', 'action' => 'add')); ?> </li>
	</ul>
</div>
