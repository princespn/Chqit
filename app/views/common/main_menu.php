<ul class="nav main">
	<li>
	<a href="#">Imports Listing</a>
		<ul>
			 <li><?php //echo $this->Html->link(__('UK Listing', true), array('controller' => 'projects', 'action' => 'import')); ?></li>
             <li><?php //echo $this->Html->link(__('France Listing', true), array('controller' => 'listings', 'action' => 'import')); ?></li>
			 <li><?php //echo $this->Html->link(__('Germany Listing', true), array('controller' => 'german_listings', 'action' => 'import')); ?></li>
              
		</ul>	
	</li>
	<li>
		<li><a href="#">Exports Listing</a>
		<ul>
          <li><?php //echo $this->Html->link(__('UK Listing', true), array('controller' => 'projects', 'action' => 'index')); ?></li>
          <li><?php //echo $this->Html->link(__('France Listing', true), array('controller' => 'listings', 'action' => 'index')); ?></li>
		  <li><?php //echo $this->Html->link(__('Germany Listing', true), array('controller' => 'german_listings', 'action' => 'index')); ?></li>
        </ul>
	</li>
	<li>
	<?php echo anchor('user/index', 'My Account'); ?>
		       <ul>
            <li class="green"><?php echo anchor('user/login', 'login'); ?></li>
			<?php if($this->session->userdata('user_id')=='1') { ?>
			<li><?php echo anchor('user/register', 'register'); ?></li>
            <?php } ?>
            <li><?php echo anchor('user/logout', 'Logout'); ?></li>            
			</ul>
	</li>
	<li style="float:right;"><a href="#"><b>Welcome Back,</b><?php echo $this->session->userdata('username'); ?></a></li>
</ul>
