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
    <?= $this->Html->css('style.css') ?>

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
            <div class="top-bar bg-light hdden-xs">
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
                                -->
                                <li class="active">

                                    <?php

                                    if (!isset($role))
                                    {
                                          echo $this->Html->link("Sign In", ['controller' => 'users','action' => 'login']);
                                    }
                                    elseif ($role!='3')
                                    {
                                          echo $this->Html->link("Sign In", ['controller' => 'users','action' => 'login']);
                                    }
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    if (!isset($role))
                                    {
                                          echo $this->Html->link("Sign Up", ['controller' => 'users','action' => 'add']);
                                    }
                                    elseif ($role!='3')
                                    {
                                          echo $this->Html->link("Sign Up", ['controller' => 'users','action' => 'add']);
                                    }
                                    ?>
                                </li>
                                <!--
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
                                    if($role=='3')
                                     {
                                          echo $this->Html->link("View Profile", ['controller' => 'users','action' => 'profile']);
                                          echo "</li>";
                                          echo "<li>";
                                          echo $this->Html->link("Edit Profile", ['controller' => 'users','action' => 'edit']);
                                          echo "</li>";
                                          echo "<li>";
                                          echo $this->Html->link("Shopping Cart", ['controller' => 'shopping-carts','action' => 'index']);
                                          echo "</li>";
                                          echo "<li>";
                                          echo $this->Html->link("Logout", ['controller' => 'users','action' => 'logout']);
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
                            <a href="\" class="navbar-brand logo">
                                <img src="/webroot/images/logo.png" alt="logo" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-sm-9">
                            <?php echo $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'result'],'type' => 'get']);?>
                            <div class="search-form">

                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php echo $this->Form->input('title',array('label' => false ,'class'=>'form-control','placeholder'=>"Search Deals & Coupons" )); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col 4 -->

                                <div class="col-sm-4">
                                    
                                    <?php echo $this->Form->input('category', ['label' => false ,'options' => $categories,'empty' => 'Select your category'],array('class'=>'form-control')); ?>
                                </div>
                                <!-- /.col 3 -->
                                <div class="col-sm-4">
                                    <?php echo $this->Form->button('Search Deals', array('class'=>'btn btn-raised ripple-effect btn-default btn-block')); ?>
                                </div>
                                <!-- /.col 1 -->

                            </div>
                            <?php echo $this->Form->end(); ?>

                        
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
                                     <li>
                                         <?php
                                            echo $this->Html->link($this->Html->tag('i',"", array('class' => 'ti-home'))."Home", ['controller' => 'users','action' => 'index'],array('escape'=>false));
                                          ?>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><!--aria-expanded="false"-->
                                            <i class="ti-list-ol">
                                                </i> Category
                                            <span class="caret">
                                            </span>
                                        </a>
                                        
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <?php 
                                                    echo $this->Html->link("All", ['controller' => 'users','action' => 'result']);
                                                ?>
                                            </li>
                                            <?php if (isset($categories)){foreach ($categories as $key => $category): ?>
                                            
                                            <li>
                                                <?php echo $this->Html->link( $category,array(
                                                "controller" => "users",
                                                "action" => "result",
                                                "?" => array("category" => $key)
                                            )); ?>
                                            </li>
                                            <?php endforeach; }?>

                                        </ul>

                                    </li>

                                    <li>
                                         <?php
                                            echo $this->Html->link($this->Html->tag('i',"", array('class' => 'ti-info'))."About Us", ['controller' => 'about','action' => ''],array('escape'=>false));
                                          ?>
                                    </li>

                                    <li>
                                         <?php
                                            echo $this->Html->link($this->Html->tag('i',"", array('class' => 'ti-email'))."Contact Us", ['controller' => 'contacts','action' => ''],array('escape'=>false));
                                          ?>
                                    </li>
                                    <!--
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" ><!--aria-expanded="false"-->
                                    <!--
                                            <i class=" ti-clipboard">
                                                </i> Pages
                                            <span class="caret">
                                                </span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="details_2.html">
                                                        Deal Page 1
                                                    </a>
                                            </li>
                                            <li>
                                                <a href="details.html">
                                                        Deal Page 2
                                                    </a>
                                            </li>
                                            <li>
                                                <a href="results.html">
                                                        Search Results
                                                    </a>
                                            </li>
                                            <li>
                                                <a href="contact.html">
                                                        Contact
                                                    </a>
                                            </li>
                                            <li>
                                                <a href="faq.html">
                                                        FAQ page
                                                    </a>
                                            </li>
                                            <li>
                                                <a href="sumbit.html">
                                                        Sumbit deal
                                                    </a>
                                            </li>
                                            <li>
                                                <a href="registration.html">
                                                        Registration
                                                    </a>
                                            </li>
                                            <li>
                                                <a href="cart.html">
                                                        Cart Page
                                                    </a>
                                            </li>
                                            <li>
                                                <a href="checkout.html">
                                                        Checkout
                                                    </a>
                                            </li>
                                            <li>
                                                <a href="features.html">
                                                        Shortcodes
                                                    </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="results.html">
                                            <i class=" ti-list-ol">
                                                </i> Categories
                                        </a>
                                    </li>
                                    <li>
                                        <a href="sumbit.html">
                                            <i class="ti-settings">
                                                </i> Sumbit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.html">
                                            <i class="ti-email">
                                                </i> Contact
                                        </a>
                                    </li>
                                    -->
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
                        if (!isset($role))
                        {
                                    echo $this->Html->link("Merchant", ['controller' => 'users','action' => 'loginmerchant'],array('class' => 'btn btn-raised btn-success ripple-effect btn-lg'));
                                    echo $this->Html->link("Admin", ['controller' => 'admins','action' => 'login'],array('class' => 'btn btn-raised btn-default ripple-effect btn-lg'));
                        }
                        elseif ($role!='3')
                        {
                                    echo $this->Html->link("Merchant", ['controller' => 'users','action' => 'loginmerchant'],array('class' => 'btn btn-raised btn-success ripple-effect btn-lg'));
                                    echo $this->Html->link("Admin", ['controller' => 'admins','action' => 'login'],array('class' => 'btn btn-raised btn-default ripple-effect btn-lg'));
                        }
                        ?>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <h3>
                            Welcome to FBFLYER
                        </h3>
                        <p>
                         <?php
                        if (!isset($role))
                        {
                                 echo "Please click on \"Merchant\" button if you are Merchant.<br>Please click on \"Admin\" button if you are Admin";
                        }
                        elseif ($role!='3')
                        {
                                  echo "Please click on \"Merchant\" button if you are Merchant.<br>Please click on \"Admin\" button if you are Admin";     
                        }
                        ?>
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
