<!DOCTYPE html>
<!--
Template Name: Materialize - Material Design Admin Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://themeforest.net/item/materialize-material-design-admin-template/11446068?ref=pixinvent
Renew Support: https://themeforest.net/item/materialize-material-design-admin-template/11446068?ref=pixinvent
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-modern-menu-template/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Oct 2020 08:18:14 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title><?= $title; ?></title>
    <link rel="apple-touch-icon" href="<?= base_url('assets/vendor/') ?>app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/image/logo/kabbogor.png'); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/') ?>app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/') ?>app-assets/css/themes/vertical-modern-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/') ?>app-assets/css/themes/vertical-modern-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/') ?>app-assets/css/pages/login.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/') ?>app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>">
    <link rel="stylesheet" href="">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    
</head>
<!-- END: Head-->

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 1-column login-bg   blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">

<div class="error-data" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
