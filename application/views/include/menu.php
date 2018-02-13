 <!-- <li class="start active open"> -->
   <li class="start ">
              <a href="<?php echo base_url('dashboard/index')?>">         
                <!-- <span class="selected"></span> -->
              <i class="icon-home"></i>
              Dashboard</a>
        </li>
        <?php if (!is_designer()) {
          ?>
        <li class="start ">
              <a href="<?php echo base_url('/plans')?>">
              <i class="icon-briefcase"></i>
              Plans</a>
        </li>
        <?php
        } ?>
        <li class="start ">
              <a href="<?= base_url('orders/orderstatus/inprogress'); ?>">
              <i class="icon-briefcase"></i>
              Running projects</a>
        </li>
        <li class="start ">
              <a href="<?php echo base_url('orders/orderstatus/done')?>">
              <i class="icon-briefcase"></i>
              Complete projects</a>
        </li>
        <?php if(is_admin()){ ?>
        <li class="start ">
              <a href="<?php echo base_url('blogs')?>">
              <i class="icon-briefcase"></i>
              Blogs</a>
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
              Mail Box</a>
        </li>
