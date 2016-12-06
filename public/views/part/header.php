<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php print base_url('resources/img/favicon.png') ?>">
    <title><?php print $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="author" content="Fika Ridaul Maulayya">
    <meta name="robots" content="no-cache">
    <meta name="description" content="<?php if(isset($descriptions)) { echo $descriptions; } ?>">
    <meta name="keywords" content="<?php if(isset($keywords)) { echo $keywords; } ?>">
    <meta property="og:url" content="http://localhost/pondokkode//">
    <meta property="og:site_name" content="Penanda Shop">
    <meta property="og:title" content="<?php if(isset($title)) { echo $title; } ?>">
    <meta property="og:description" content="<?php if(isset($descriptions)) { echo $descriptions; } ?>">
    <meta property="og:image" content="">
    <meta property="twitter:site" content="@penanda_shop">
    <meta property="twitter:site:id" content="">
    <meta property="twitter:card" content="summary">
    <meta property="twitter:title" content="<?php if(isset($title)) { echo $title; } ?>">
    <meta property="twitter:description" content="<?php if(isset($descriptions)) { echo $descriptions; } ?>">
    <meta property="twitter:image:src" content="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php print base_url('resources/css/font-awesome/css/font-awesome.css') ?>">
    <link rel="stylesheet" href="<?php print base_url('resources/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php print base_url('resources/css/jumbotron.css') ?>">
    <link rel="stylesheet" href="<?php print base_url('resources/css/toastr.css') ?>">
  </head>
  <body>
    <div id="app">
    <nav class="penandaku-navbar navbar navbar-inverse navbar-fixed-top" style="border-top: 3px solid green;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" style="position: relative;float: right;padding: 9px 10px;margin-top: 17px;margin-right: 1px;margin-bottom: 8px;background-color: rgb(127, 127, 133);background-image: none;border: 1px solid #7f7f85;border-radius: 4px;" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="penandaku-logo-navbar" href="<?php print base_url() ?>">
               <img class="penandaku-logo" src="<?php print base_url('resources/img/logo.png') ?>" alt="" /></a>
          </a>
          <span class="green-color" style="color: green"><strong> BETA </strong></span>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php if($this->session->userdata('auth_id')) { ?>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a class="dropdown-toggle" style="padding-top: 11px;line-height: 30px;padding-bottom:9px;" data-toggle="dropdown" href="#"><img src="<?php echo base_url('resources/avatar/'.$this->session->userdata('foto').'') ?>" width="45" height="45" alt="" style="border-radius:25px" class="avatar alignnone photo avatar-default"> <?php print $this->session->userdata('nama'); ?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu" style="min-width:200px;">
                  <div style="color:#333;margin-left:17px">Signed in as</div>
                  <div style="color:#333;margin-left:17px;font-weight: 500;"><?php print $this->session->userdata('username'); ?></div>
                  <li class="divider"></li>
                  <li><a href="<?php print base_url() ?>admin/dashboard/"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a href="<?php print base_url() ?>admin/label/"><i class="fa fa-shopping-cart"></i> Your Order </a></li>
                  <li><a href="<?php print base_url() ?>admin/bookmark/"><i class="fa fa-shopping-basket"></i> Your Products</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php print base_url() ?>admin/setting/"><i class="fa fa-cogs"></i> Setting</a></li>
                  <li><a href="<?php print base_url() ?>admin/dashboard/logout/"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          <?php }else{ ?>
              <ul class="nav navbar-nav navbar-right" style="margin-top: 8px;font-family: Roboto;font-weight: 300;font-size: 18px;margin-right: 0px">
                  <li><a href="<?php print base_url() ?>about/" style="<?php if(isset($about)) { echo 'color: #333'; } ?>"><i class="fa fa-user-circle"></i> About</a></li>
                  <li><a href="<?php print base_url() ?>products/" style="<?php if(isset($products)) { echo 'color:#333'; } ?>"><i class="fa fa-shopping-basket"></i> Products</a></li>
                  <li><a href="<?php print base_url() ?>help/" style="<?php if(isset($help)) { echo 'color:#333'; } ?>"><i class="fa fa-question-circle-o"></i> Help</a></li>
                  <li><a href="<?php print base_url() ?>contact/" style="<?php if(isset($contact)) { echo 'color:#333'; } ?>"><i class="fa fa-envelope-o"></i> Contact</a></li>
              </ul>
         <?php } ?>
        </div>
      </div>
    </nav>
