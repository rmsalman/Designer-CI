<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <?php $setting = setting_all();?>
  
  <link rel="icon" href="<?php echo base_url((setting_all('favicon'))?'assets/images/'.setting_all('favicon'):'assets/images/favicon.ico');?>">
  <title><?php echo (setting_all('website'))?setting_all('website'):'Dasboard';?></title>

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css'); ?>">
  <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-black-light.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-black-light.css');?>">
    <!--  <link rel="stylesheet" href="<?php echo base_url('assets/css/blue.css');?>">-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/buttons.dataTables.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/daterangepicker.css'); ?>" />


<!-- matronic -->

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/global/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo base_url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/global/plugins/fullcalendar/fullcalendar.min.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/global/plugins/jqvmap/jqvmap/jqvmap.css');?>" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?php echo base_url('assets/admin/pages/css/tasks.css');?>" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url('assets/global/css/components.css');?>" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/global/css/plugins.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/admin/layout/css/layout.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/admin/layout/css/themes/darkblue.css');?>" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url('assets/admin/layout/css/custom.css');?>" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->


<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
  .form {
    margin-top: 0;
}
</style>

  </head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid" data-base-url="<?php echo base_url(); ?>">
<!-- BEGIN HEADER -->
<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner">
    <!-- BEGIN LOGO -->
    <div class="page-logo">

      <a href="<?php echo base_url(); ?>">
             <?php $logo =  (setting_all('logo'))?setting_all('logo'):'logo.png'; ?>
              <img  class="logo-default" src="<?php echo base_url().'assets/images/'.$logo; ?>">
            </a>
      <div class="menu-toggler sidebar-toggler hide">
      </div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="top-menu">
      <ul class="nav navbar-nav pull-right">

        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
        <li class="dropdown dropdown-user">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <?php 
                 $profile_pic =  'user.png';
                 if(isset($this->session->userdata('user_details')[0]->profile_pic) && file_exists('assets/images/'.$this->session->userdata('user_details')[0]->profile_pic))
                              {
                                 $profile_pic = $this->session->userdata('user_details')[0]->profile_pic;
                              }?>

                               <img class="img-circle" src="<?php echo base_url().'assets/images/'.$profile_pic;?>"  alt="User Image">
                            <span class="username username-hide-on-mobile"><?php echo isset($this->session->userdata('user_details')[0]->name)?$this->session->userdata('user_details')[0]->name:'';?></span>

          <i class="fa fa-angle-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-default">
            <li>
              <a href="inbox.html">
              <i class="icon-envelope-open"></i>Inbox 
              <span class="badge badge-danger">
              3 </span>
              </a>
            </li>
            <li>
              <a href="page_todo.html">
              <i class="icon-briefcase"></i>Plans 
              <span class="badge badge-success">
              7 </span>
              </a>
            </li>
            <li class="divider">
            </li>
            <li><a href="<?php echo base_url('user/profile');?>"><i class="fa fa-user mr10"></i>My Account</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url('user/logout');?>"><i class="fa fa-power-off mr10"></i> Sign Out</a></li>
          </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
      </ul>
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">




  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
      <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
      <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
      <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
      <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
      <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
      <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper">
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
          <div class="sidebar-toggler">
          </div>
          <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper">
          <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
          <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
          <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
          <!-- <form class="sidebar-search " action="extra_search.html" method="POST">
            <a href="javascript:;" class="remove">
            <i class="icon-close"></i>
            </a>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
              <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
              </span>
            </div>
          </form> -->
          <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <!-- <li class="start active open">
          <a href="javascript:;">
          <i class="icon-home"></i>
          <span class="title">Dashboard</span>
          <span class="selected"></span>
          <span class="arrow open"></span>
          </a>
          <ul class="sub-menu">
            <li class="active">
              <a href="index-admin.html">
              <i class="icon-bar-chart"></i>
              Default Dashboard</a>
            </li>
            <li>
              <a href="index_2.html">
              <i class="icon-bulb"></i>
              New Dashboard #1</a>
            </li>
            <li>
              <a href="index_3.html">
              <i class="icon-graph"></i>
              New Dashboard #2</a>
            </li>
          </ul>
        </li>  -->
        <li class="start active open">
              <a href="<?php echo base_url()?>">         
                <span class="selected"></span>
              <i class="icon-home"></i>
              Dashboard</a>
        </li>
        <li class="start ">
              <a href="<?php echo base_url('/plans')?>">
              <i class="icon-briefcase"></i>
              Plans</a>
        </li>
        <li class="start ">
              <a href="<?php echo base_url('/orders/pending')?>">
              <i class="icon-briefcase"></i>
              Running projects</a>
        </li>
        <li class="start ">
              <a href="<?php echo base_url('/orders/completed')?>">
              <i class="icon-briefcase"></i>
              Complete projects</a>
        </li>
        <li class="start ">
              <a href="<?php echo base_url('/users')?>">
              <i class="icon-briefcase"></i>
              Clients</a>
        <li class="start ">
              <a href="<?php echo base_url('/plans/designers')?>">
              <i class="icon-briefcase"></i>
              Designers</a>
        </li>
        <li class="start ">
              <a href="<?php echo base_url('/mailbox')?>">
              <i class="icon-briefcase"></i>
              Mail Box</a>
        </li>
  <li class="<?=($this->router->method==="profile")?"active":"not-active"?>"> 
                <a href="<?php echo base_url('user/profile');?>"> <i class="fa fa-user"></i> <span>My Account</span></a>
                </li>                
                <?php $this->load->view("include/menu");?> 
                
               
               <?php if(CheckPermission("users", "own_read")){ ?>
                    <li class="<?=($this->router->method==="userTable")?"active":"not-active"?>"> 
                        <a href="<?php echo base_url();?>user/userTable"> <i class="fa fa-users"></i> <span>Users</span></a>
                    </li>    
                <?php } 
                 if(isset($this->session->userdata('user_details')[0]->user_type) && $this->session->userdata('user_details')[0]->user_type == 'admin'){ ?>    
                    <li class="<?=($this->router->class==="setting")?"active":"not-active"?>">
                        <a href="<?php echo base_url("setting"); ?>"><i class="fa fa-cogs"></i> <span>Settings</span></a>
                    </li>
         
                    <li class="<?php echo ($this->router->class==="Templates")?"active":"not-active"?>">
                        <a href="<?php echo base_url("Templates"); ?>"><i class="fa fa-cubes"></i> <span>Templates</span></a>
                    </li>
                  <?php }  if(CheckPermission("invoice", "own_read")){ ?>   
                    <li class="<?=($this->router->class==="invoice")?"active":"not-active"?>">
                        <a href="<?php echo base_url("invoice/view"); ?>"><i class="fa fa-list-alt"></i> <span>Invoice</span></a>
                    </li>

               <?php  } ?>



      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <!-- END SIDEBAR -->