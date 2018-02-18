<?php 
  $notices = notices();
?>
 <!-- <li class="start active open"> -->
   <li class="start ">
              <a href="<?php echo base_url('dashboard/index')?>">         
                <!-- <span class="selected"></span> -->
              <i class="icon-home"></i>
              Dashboard</a>
        </li>
        <?php if (is_user()) {
          ?>
        <li class="start ">
              <a href="<?php echo base_url('/plans')?>">
              <i class="icon-briefcase"></i>
              Plans <?php if(!empty($notices['all_plans']->total)){ ?><span class="badge badge-roundless badge-danger"><?= $notices['all_plans']->total; ?></span><?php } ?></a>
        </li>
        <?php
        } ?>

        <?php if (is_admin()) {
          ?>

        <li class="start">
              <a href="<?php echo base_url('plans/allplans')?>">
              <i class="icon-briefcase"></i>
              Plans </a>
        </li>
        
        <li class="start ">
              <a href="<?php echo base_url('showcase/purchased')?>">
              <i class="fa fa-suitcase"></i>
              ShowCase</a>
        </li>
        <?php
        } ?>

        <li class="start">
              <a href="<?= base_url('orders/orderstatus/inprogress'); ?>">
              <i class="fa fa-clock-o fa-spin "></i>
              Inprogress projects 
              <?php if(!empty($notices['progress_orders'][0]->orders)){ ?><span class="badge badge-roundless badge-danger"><?= $notices['progress_orders'][0]->orders; ?></span><?php } ?>
          </a>
        </li>
        <li class="start">
              <a href="<?php echo base_url('orders/orderstatus/done')?>">
              <i class="fa fa-smile-o"></i>
              Complete projects
              <?php if(!empty($notices['completed_orders'][0]->orders)){ ?><span class="badge badge-roundless badge-danger"><?= $notices['completed_orders'][0]->orders; ?></span><?php } ?>
            </a>
        </li>
        <?php if(is_admin()){ ?>
        <li class="start ">
              <a href="<?php echo base_url('blogs')?>">
              <i class="icon-speech"></i>
              Blogs</a>
        </li>
        <?php } ?>
        <?php if(is_admin()){ ?>
        <li class="start ">
              <a href="<?php echo base_url('blogs/comments')?>">
              <i class="fa fa-comments"></i>
              Comments <?php if(!empty($notices['all_comments']->total)){ ?><span class="badge badge-roundless badge-danger"><?= $notices['all_comments']->total; ?></span><?php } ?></a>
        </li>
        <?php } ?>
    <!--     <li class="start ">
              <a href="<?php echo base_url('/users')?>">
              <i class="icon-briefcase"></i>
              Clients</a>
        <li class="start ">
              <a href="<?php echo base_url('/plans/designers')?>">
              <i class="icon-briefcase"></i>
              Designers</a>
        </li> -->
        <li class="start ">
              <a href="<?php echo base_url('/mailbox')?>">
              <i class="icon-envelope"></i>              
              Mail Box  <?php if(!empty($notices['all_recieved']->total)){ ?><span class="badge badge-roundless badge-danger"><?= $notices['all_recieved']->total; ?></span><?php } ?>
            </a>
        </li>

        <li class="<?=($this->router->method==="profile")?"active":"not-active"?>"> 
          <a href="<?php echo base_url('user/profile');?>"> <i class="fa fa-user"></i> <span>My Account</span></a>
        </li>      
         <?php if(CheckPermission("users", "own_read")){ ?>
            <li class="<?=($this->router->method==="userTable")?"active":"not-active"?>"> 
                <a href="<?php echo base_url();?>user/userTable"> <i class="fa fa-users"></i> <span>Users</span>
                
                  <?php if(!empty($notices['all_users']->total)){ ?><span class="badge badge-roundless badge-danger"><?= $notices['all_users']->total - 1; ?></span><?php } ?>
                </a>
            </li>    
          <?php } 
         if(isset($this->session->userdata('user_details')[0]->user_type) && $this->session->userdata('user_details')[0]->user_type == 'admin'){ ?>    
            <li class="<?=($this->router->class==="setting")?"active":"not-active"?>">
                <a href="<?php echo base_url("setting"); ?>"><i class="fa fa-cogs"></i> <span>Settings</span></a>
            </li>
          <?php }  ?>