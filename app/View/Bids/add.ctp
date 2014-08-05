<div class="bids form">
<?php echo $this->Form->create('Bid'); ?>
	<fieldset>
		<legend><?php echo __('Add Bid'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Bids'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('controller' => 'vehicles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('controller' => 'vehicles', 'action' => 'add')); ?> </li>
	</ul>
</div>
