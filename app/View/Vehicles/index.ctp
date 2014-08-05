<div>
	<h2><?php echo __('Vehicles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th class="actions"><?php echo __('Actions'); ?></th>
			<th><?php //echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('make'); ?></th>
			<th><?php echo $this->Paginator->sort('model'); ?></th>
			<th><?php echo $this->Paginator->sort('year'); ?></th>
			<th><?php echo $this->Paginator->sort('current_bid'); ?></th>
			<th><?php echo "Highest Bidder"; ?></th>
			<th><?php echo $this->Paginator->sort('sold_for'); ?></th>
			
	</tr>
	</thead>
	<tbody>
	<?php foreach ($vehicles as $vehicle): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('View Me!'), array('action' => 'view', $vehicle['Vehicle']['id'])); ?>
		</td>
		<td><?php //echo h($vehicle['Vehicle']['id']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['make']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['model']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['year']); ?>&nbsp;</td>
		<td>$<?php echo h($vehicle['Vehicle']['current_bid']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['high_bidder']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['sold_for']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<?php echo $vehicle['Vehicle']['created']; ?>

