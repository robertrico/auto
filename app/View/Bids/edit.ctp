<div class="bids form">
<?php echo $this->Form->create('Bid'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bid'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('vehicle');
		echo $this->Form->input('vehicle_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('user');
		echo $this->Form->input('time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bid.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Bid.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bids'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('controller' => 'vehicles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('controller' => 'vehicles', 'action' => 'add')); ?> </li>
	</ul>
</div>
