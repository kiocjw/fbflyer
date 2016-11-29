<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'FBFlyer';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    

    <!--
     $this->Html->css('base.css') ?>
     $this->Html->css('cake.css') ?>
    -->
    <?= $this->Html->script('jquery.min'); ?>
    <?= $this->Html->script('common');  ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('themify-icons.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>
    <?= $this->Html->css('../owl.carousel/assets/owl.carousel.css') ?>
    <?= $this->Html->css('animate.min.css') ?>
    <?= $this->Html->css('animsition.css') ?>
    <?= $this->Html->css('plugins.min.css') ?>
    <?= $this->Html->css('style_admin.css') ?>

    <!-- JS files -->
	<?php
		echo $this->Html->script('jquery.min.js');
		echo $this->Html->script('kupon.js');
		echo $this->Html->script('bootstrap.min.js');
        echo $this->Html->script('jquery.animsition.min.js');
        echo $this->Html->script('../owl.carousel/owl.carousel.js');
        echo $this->Html->script('jquery.flexslider-min.js');
        echo $this->Html->script('plugins.js');
	?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?php echo $this->Facebook->initJsSDK(); ?>
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!-- /#header -->
        <header>
            <div class="top-bar bg-orange hdden-xs">
                <div class="container">
                    <div class="row">
                        <!--
                        <div class="col-sm-6 list-inline list-unstyled no-margin hidden-xs">
                            <p class="no-margin">
                                Have any questions?
                                <strong>
                                        +080 124 880
                                    </strong> or mail@codenpixel.com
                            </p>
                        </div>
                        -->
                        <div class="pull-right col-sm-6">
                            <ul class="list-inline list-unstyled pull-right">
                                <!--
                                <li class="active">
                                    <a href="#">
                                        <i class="ti-cart">
                                            </i> Faq
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Sign In
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Sign Up
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-shopping-cart">
                                            </i> Cart
                                    </a>
                                </li>
                                -->
                                <li>
                                <?php
                                if (isset($role))
                                {
                                    if($role=='1')
                                     {
                                          echo $this->Html->link("Logout", ['controller' => 'admins','action' => 'logout']);
                                     }
                                }
                                ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="" class="navbar-brand logo">
                                <img src="/webroot/images/logo.png" alt="logo" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nav-wrap">
                <div class="nav-wrap-holder">
                    <div class="container" id="nav_wrapper">
                        <nav class="navbar navbar-static-top nav-white" id="main_navbar" role="navigation">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar">
                                    <span class="sr-only">
                                            Toggle navigation
                                        </span>
                                    <span class="icon-bar">
                                        </span>
                                    <span class="icon-bar">
                                        </span>
                                    <span class="icon-bar">
                                        </span>
                                </button>

                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="Navbar">
                                <!-- regular link -->
                                <ul class="nav navbar-nav navbar-left">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><!--aria-expanded="false"-->
                                            <i class="ti-home">
                                                </i> Merchants
                                            <span class="caret">
                                                </span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                               <?php echo $this->Html->link("ALL MERCHANTS", ['controller' => 'users','action' => 'indexadmin']);?>
                                            </li>
                                            <li>
                                               <?php echo $this->Html->link("PENDING MERCHANTS", ['controller' => 'users','action' => 'indexadmin',0]);?>
                                            </li>
                                            <li>
                                               <?php echo $this->Html->link("APPROVED MERCHANTS", ['controller' => 'users','action' => 'indexadmin',1]);?>
                                            </li>
                                            <li>
                                               <?php echo $this->Html->link("REWORKED MERCHANTS", ['controller' => 'users','action' => 'indexadmin',2]);?>
                                            </li>
                                            <li>
                                               <?php echo $this->Html->link("REJECTED MERCHANTS", ['controller' => 'users','action' => 'indexadmin',3]);?>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><!--aria-expanded="false"-->
                                            <i class="ti-direction">
                                                </i> Outlets
                                            <span class="caret">
                                                </span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                               <?php echo $this->Html->link("ALL OUTLETS", ['controller' => 'merchants','action' => 'index']);?>
                                            </li>

                                            <li>
                                               <?php echo $this->Html->link("NEW OUTLET", ['controller' => 'merchants','action' => 'add']);?>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><!--aria-expanded="false"-->
                                            <i class="ti-tag">
                                                </i> Categories
                                            <span class="caret">
                                                </span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                               <?php echo $this->Html->link("ALL CATEGORIES", ['controller' => 'categories','action' => 'index']);?>
                                            </li>

                                            <li>
                                               <?php echo $this->Html->link("NEW CATEGORY", ['controller' => 'categories','action' => 'add']);?>
                                            </li>

                                        </ul>
                                    </li>
                                    <li>
                                         <?php
                                            echo $this->Html->link($this->Html->tag('i',"", array('class' => 'ti-tag'))."Payout", ['controller' => 'vouchers','action' => 'payout'],array('escape'=>false));
                                          ?>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- /.div nav wrap holder -->
            </div>
            <!-- /#nav wrap -->
        </header>
        <!-- /#header -->

        <!-- /#section render from ctp-->
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        <!-- /#section render from ctp-->

        <!-- /#page ends -->
       
        <div class="cta-box clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                        <?php
                                   echo $this->Html->link("Merchant", ['controller' => 'users','action' => 'loginmerchant'],array('class' => 'btn btn-raised btn-success ripple-effect btn-lg'));
                                   echo $this->Html->link("User", ['controller' => 'users','action' => 'login'],array('class' => 'btn btn-primary btn-default ripple-effect btn-lg'));
                        ?>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <h3>
                            Welcome to FBFLYER
                        </h3>
                        <p>
                            Please click on "Merchant" button if you are Merchant.
                        <br>
                            Please click on "User" button if you are User.
                        </p>
                    </div>
                </div>
            </div>
        </div>
     
        <!-- /#page ends -->

        <!-- /#footer -->
        <footer id="footer">
            <!---
            <div class="container">
                <div class="col-sm-4">
                    <img src="/webroot/images/logo-dark.png" alt="#" class="img-responsive logo">
                    <p>
                        Kupon,travel deals &amp; publishing,with minimal design. We provide you with the latest fresh inspiration straight from the industrie.
                    </p>
                </div>
                <div class="col-sm-4">
                    <h5>
                        COMMON TAGS
                    </h5>
                    <ul class="tags">
                        <li>
                            <a href="#" class="tag">
                                Vacation
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tag">
                                Rentals
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tag">
                                Deals
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tag">
                                Travel deals
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tag">
                                Vacation deals
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tag">
                                Adriatic coast
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tag">
                                Europe
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tag">
                                Island
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>
                        CATEGORIES
                    </h5>
                    <ul class="list-unstyled">
                        <li>
                            Vacation Deals
                        </li>
                        <li>
                            Online Deals
                        </li>
                        <li>
                            Digital goods
                        </li>
                        <li>
                            Travel Deals
                        </li>
                        <li>
                            Hotel deals
                        </li>
                        <li>
                            Featured
                        </li>
                        <li>
                            All Categories ..
                        </li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>
                        ABOUT US
                    </h5>
                    <ul class="list-unstyled">
                        <li>
                            Available Jobs
                        </li>
                        <li>
                            Sumbit Deal
                        </li>
                        <li>
                            Contact Us
                        </li>
                        <li>
                            History
                        </li>
                        <li>
                            Impressium
                        </li>
                    </ul>
                </div>
            </div>
            -->
            <div class="btmFooter">
                <div class="container">
                    <div class="col-sm-7">
                        <p>
                            <strong>
                                Copyright 2016 
                            </strong> FBFLYER
                            <i class="ti-heart">
                            </i>
                            <strong>
                                by FBFYLER
                            </strong>
                        </p>
                    </div>
                    <div class="col-sm-5">
                        <ul class="pay-opt pull-right list-inline list-unstyled">
                            <li>
                                <a href="#" title="#">
                                    <img src="/webroot/images/amz-icon.png" class="img-responsive" alt="amazon">
                                </a>
                            </li>
                            <li>
                                <a href="#" title="#">
                                    <img src="/webroot/images/paypal-icon.png" class="img-responsive" alt="paypal">
                                </a>
                            </li>
                            <li>
                                <a href="#" title="#">
                                    <img src="/webroot/images/ax-icon.png" class="img-responsive" alt="ax">
                                </a>
                            </li>
                            <li>
                                <a href="#" title="#">
                                    <img src="/webroot/images/mb-icon.png" class="img-responsive" alt="mb">
                                </a>
                            </li>
                            <li>
                                <a href="#" title="#">
                                    <img src="/webroot/images/mst-icon.png" class="img-responsive" alt="mst">
                                </a>
                            </li>
                            <li>
                                <a href="#" title="#">
                                    <img src="/webroot/images/mstr-icon.png" class="img-responsive" alt="master">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
         <!-- /#footer -->
    </div>
</body>
</html>
