<div class="vehicles form">
<?php echo $this->Form->create('Vehicle'); ?>
	<fieldset>
		<legend><?php echo __('Edit Vehicle'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('make');
		echo $this->Form->input('model');
		echo $this->Form->input('year');
		echo $this->Form->input('current_bid');
		echo $this->Form->input('sold_for');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Vehicle.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Vehicle.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bids'), array('controller' => 'bids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bid'), array('controller' => 'bids', 'action' => 'add')); ?> </li>
	</ul>
</div>
