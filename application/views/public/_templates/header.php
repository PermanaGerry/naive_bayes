<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url($assets_public_dir . '/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!-- DataTable core CSS -->
  <link href="<?php echo base_url($assets_public_dir . '/css/addons/dataTable/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url($assets_public_dir . '/css/mdb.min.css'); ?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo base_url($assets_public_dir . '/css/style.css'); ?>" rel="stylesheet">
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body data-spy="scroll" data-target=".navbar" data-offset="50">