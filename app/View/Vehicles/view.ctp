<?php echo $this->Html->script('viewj'); ?>
<div class="vehicles view">
<h2><?php echo __('Vehicle'); ?></h2>
	<dl>
		<!--<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['id']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Make'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['make']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Bid'); ?></dt>
		<dd>
			$<?php echo h($vehicle['Vehicle']['current_bid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('High Bidder'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['high_bidder']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sold For'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['sold_for']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expires'); ?></dt>
		<dd>
			<?php echo $date = date("Y-m-d H:i:s", time() + (14*86400)); ?>
			<?php //echo h($vehicle['Vehicle']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<div>
		<?php echo $this->Html->image($vehicle['Vehicle']['img'], array('alt'=>'Test')); ?>
		<p><?php echo h($vehicle['Vehicle']['description']); ?></p>
	</div>
</div>
<div class="actions">
	<?php $this->Logged->bidcheck($this->Session->read('Auth'),$vehicle); ?>
	
</div>


