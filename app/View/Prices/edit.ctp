<div class="prices form">
<?php echo $this->Form->create('Price'); ?>
	<fieldset>
		<legend><?php echo __('Edit Price'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('purchased');
		echo $this->Form->input('sold');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Price.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Price.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Prices'), array('action' => 'index')); ?></li>
	</ul>
</div>
