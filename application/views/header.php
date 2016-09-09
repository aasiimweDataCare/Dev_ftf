<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 9/20/2015
 * Time: 1:28 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

$user_name = ($this->session->userdata['user_name']);
$page_name = ($this->session->userdata['page_name']);
if (empty($user_name)) {
    redirect('LoginController');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-config" content="<?= base_url() ?>assets/xml/browserconfig.xml"/>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/icons/favicon.ico">
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.png">
    <link href="<?= base_url() ?>css/nta.css" media="all" rel="stylesheet" type="text/css">
    <title>CPMA-MIS <?= $page_name; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?= base_url() ?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="<?= base_url() ?>dist/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?= base_url() ?>bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <script>
        function showHideMenu() {
            var div = document.getElementById("menuContainer");
            if (div.style.display !== "none") {
                div.style.display = "none";
            }
            else {
                div.style.display = "block";
            }
        }
    </script>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <img src="<?= base_url() ?>assets/images/header2.gif">


        </div>

        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" onclick="showHideMenu()" href="#">vertical Menu
                    <i class="fa fa-caret-down"></i>
                </a>
            </li>

            <!--<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
            </li>-->

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>-->
                    <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>-->
                    <!--<li class="divider"></li>-->
                    <li><a href="#" onclick="location.href='<?= site_url('LoginController/logout') ?>'"><i
                                class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
