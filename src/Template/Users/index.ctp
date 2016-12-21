<div class="container">
          <div class="row">
            <div class="col-sm-3 sidebar">
                        <div class="bg-white shadow">
              
              
                          <div class="widget-menu">
                 
                
                            <div class="cat-text">
                                 <?php echo $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'result'],'type' => 'get']);?>
                                 <?php echo $this->Form->input('title',array('label' => false ,'class'=>'form-control','placeholder'=>"Search Deals & Coupons" )); ?>
                                 <?php echo $this->Form->end(); ?>
                            </div>
               
                            <!-- Sidebar navigation -->

                            <ul class="nav sidebar-nav">

           
                                <!--<li class="dropdown"> -->
                                <li>
                                <!--<a class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown">-->
                                <a class="ripple-effect" href="#">

                                  <i class="ti-shine">
                                  </i>
                                  Travel
                                  <span class="sidebar-badge">
                                    <!--10-->
                                  </span>
                                  <!--
                                    <b class="caret">
                                    </b>
                                   -->
                                </a>
                                <!--
                                <ul class="dropdown-menu">
                                  <li>
                                    <a href="#" tabindex="-1">
                                      Europe
                                      <span class="sidebar-badge">
                                        12
                                      </span>
                                    </a>
                                  </li>
                     
                                </ul>
                                -->
                              </li>
                  
    
                              <li>
                                <a href="#">
                                  <i class="ti-gift">
                                  </i>
                                  Gifts
                                  <span class="sidebar-badge">
                                    <!--10-->
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="ti-shopping-cart">
                                  </i>
                                  Products
                                  <span class="sidebar-badge">
                                    <!--10-->
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="ti-ticket">
                                  </i>
                                  Tickets
                                  <span class="sidebar-badge badge-circle">
                                    <!--10-->
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="ti-pulse">
                                  </i>
                                  Health
                                  <span class="sidebar-badge badge-circle">
                                    <!--10-->
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="ti-direction-alt">
                                  </i>
                                  Things To Do
                                  <span class="sidebar-badge badge-circle">
                                    <!--10-->
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="ti-cut">
                                  </i>
                                  Fashion
                                  <span class="sidebar-badge badge-circle">
                                   <!--10-->
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="ti-music-alt">
                                  </i>
                                  Fun Stuff
                                  <span class="sidebar-badge badge-circle">
                                    <!--10-->
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="ti-harddrives">
                                  </i>
                                  Electronics
                                  <span class="sidebar-badge badge-circle">
                                    <!--10-->
                                  </span>
                                </a>
                              </li>
                            </ul>
                            <!-- Sidebar divider -->
                          </div>
                          <!-- /.widget -->
              
             
              
                        </div>
                        <!-- /col 4 - sidebar -->
                      </div>
            <div class="col-sm-9">
                <div class="slider">
                  <div class="row">
                    <div id="grid-slider" class="flexslider">
                      <ul class="slides">
                        <?php if (isset($deals)){foreach ($deals as $deal): ?>
                        <?php
                        $now = new DateTime();
                        $date2 = $deal->deals_end_date;
                        $date3 = $deal->deals_start_date;
                        $difference = $now->diff($date2);
                        $difference2 = $date3->diff($now);
                        $isExpired = 0;
                        $isStarted = 0;
                        if ($difference->invert == 1) 
                        {
                           $isExpired = 1;                
                           $difference = $date2->diff($date2);
                        }
                        if ($difference2->invert == 1) 
                        {
                           $isStarted = 1;                
                           $difference = $date2->diff($date2);
                        }
                           
                        ?>                
                        <li>
                          <div class="col-sm-7 col-lg-7 omega">
                              <article class="bg-image entry-lg" data-image-src="<?= "/".h(str_replace("\\", "/", $deal->photo_dir)).h(str_replace("\\", "/",$deal->photo)) ?>">
                               <!--<div class="deal-short-entry">
                               
                                  <p class="lead">
                                   
                                  </p>
                                
                              </div>
                                -->
                            </article>
                          </div>
                          <div class="col-sm-5 col-lg-5 alpha entry-lg">
                            <div class="buyPanel animated fadeInLeft bg-white Aligner shadow">
                              <div class="content">
                                <div class="deal-content">
                                  <h3>
                                    <?= h($deal->title) ?>
                                  </h3>
                                  <p>
                                    <?= h($deal->description) ?>
                                  </p>
                                </div>
                                <ul class="deal-price list-unstyled list-inline">
                                  <li class="price ti-money">
                                    <h3>
                                      <?= h($deal->promo_price) ?>
                                    </h3>
                                  </li>
                                  <li class="buy-now">
                                      <?php echo $this->Form->create(null, ['url' => ['controller' => 'Vouchers', 'action' => 'add']]); ?>
                                      <?php echo $this->Form->input('deals_id', ['type' => 'hidden', 'value' => h($deal->id)]);?>   
                                      <?php if ($isExpired==0 && $isStarted==0){ $enable='';}else{$enable=' disabled';}?>                                   
                                      <?= $this->Form->submit('BUY NOW',array('div'=>array('class'=>'form-group'),'class' => 'btn btn-danger btn-lg btn-raised ripple-effect'.$enable)) ?>
                                      <?= $this->Form->end() ?>
                                  </li>
                                </ul>
                                <div class="dealAttributes">
                                  <div class="valueInfo bg-light shadow">
                                    <div class="value">
                                      <p class="value ti-money">
                                        <?= h($deal->actual_price) ?>
                                      </p>
                                      <p class="text">
                                        Value
                                      </p>
                                    </div>
                                    <div class="discount">
                                      <p class="value">
                                         <?= h($deal->discount_percentage) ?>%
                                      </p>
                                      <p class="text">
                                        Discount
                                      </p>
                                    </div>
                                    <div class="save">
                                      <p class="value ti-money">
                                        <?= h($deal->saved_amount) ?>
                                      </p>
                                      <p class="text">
                                        SAVINGS
                                      </p>
                                    </div>
                                  </div>
                                  <!-- /.value info -->
                                  <div class="timeLeft text-center">
                                    <p>
                                      Hurry up Only a few deals left
                                    </p>
                                    <span class="time">
                                      <i class="ti-timer color-green">
                                      </i>
                                      <?php if ($isExpired==0 && $isStarted==0){ ?>
                                      <b>
                                        <?= h($difference->format('%d'))?> 
                                      </b>
                                      day(s)
                                      <b>
                                       <?= h($difference->format('%h'))?> 
                                      </b>
                                      hour(s)
                                      <b>
                                        <?= h($difference->format('%i'))?> 
                                      </b>
                                      min(s)
                                    <?php
                                    }
                                    else if($isExpired!=0)
                                    {
                                        echo "Expired";
                                    }
                                    else if($isStarted!=0)
                                    {
                                        echo "Coming Soon";
                                    }
                                    ?>
                                    </span>
                                  </div>
                                  <ul class="statistic list-unstyled list-inline">
                                    <li>
                                      <i class="ti-tag">
                                      </i>
                                      <b>
                                        <?= h($deal->purchased_number) ?>
                                      </b>
                                      Bought
                                    </li>

                                  </ul>
                                  <!--<div class="social-sharing text-center" data-permalink="http://labs.carsonshold.com/social-sharing-buttons"> -->
                                    <!-- https://developers.facebook.com/docs/plugins/share-button/ -->
                                    <!--<a target="_blank" href="http://www.facebook.com/sharer.php?u=http://themeforest.net/user/codenpixel" class="share-facebook">
                                      <span class="icon icon-facebook">
                                      </span>
                                      <span class="share-title">
                                        Share
                                      </span>
                                      <span class="share-count is-loaded">288</span>
                                    </a>
                                    -->
                                    <!-- https://dev.twitter.com/docs/intents -->
                                    <!--
                                    <a target="_blank" href="http://twitter.com/share?url=http://themeforest.net/user/codenpixel" class="share-twitter">
                                      <span class="icon icon-twitter">
                                      </span>
                                      <span class="share-title">
                                        Tweet
                                      </span>
                                      <span class="share-count is-loaded">78</span>
                                    </a>
                                    
                                  </div>
                                    -->
                                  <!--/.social sharing -->
                                </div>
                              </div>
                            </div>
                            <!-- /#buypanel -->
                          </div>
                        </li>
                         <?php endforeach; }?>
                      </ul>
                    </div>
                  </div>       
                </div>
                <!-- /slider --> 
            </div><!-- /.col -9  -->             
          </div><!-- /.row -->
</div><!-- /.container -->
      
<!-- /#page ends -->
<section id="page" class="container mTop-30 mBtm-50">
    <!--/.row -->
    <hr data-symbol="DEALS">
              <div class="row">
                <?php if (isset($deals)){foreach ($deals as $deal): ?>
                <?php
                $now = new DateTime();
                $date2 = $deal->deals_end_date;
                $date3 = $deal->deals_start_date;
                $difference = $now->diff($date2);
                $difference2 = $date3->diff($now);
                $isExpired = 0;
                $isStarted = 0;
                if ($difference->invert == 1) 
                {
                    $isExpired = 1;                
                    $difference = $date2->diff($date2);
                }
                if ($difference2->invert == 1) 
                {
                    $isStarted = 1;                
                    $difference = $date2->diff($date2);
                }
                           
                ?>
                <div class="col-sm-6">
                  <div class="deal-entry  orange">
                    <div class="offer-discount">
                      <?= h($deal->discount_percentage) ?>%
                    </div>
                    <div class="image">
                       <a href="<?= "/users/view/".h($deal->id) ?>" target="_blank" title="#">
                          <img src="<?= "/".h($deal->photo_dir).h($deal->photo) ?>" alt="#" class="img-responsive">
                      </a>
                      <span class="bought">
                        <i class="ti-tag">
                        </i>
                        <?= h($deal->purchased_number) ?>
                      </span>
                    </div>
                    <!-- /.image -->
                    <div class="title">
                      <a href="#" target="_blank" title="ATLETIKA 3 mēnešu abonements">
                        <?= h($deal->title) ?>
                      </a>
                    </div>
                    <div class="entry-content">
                      <div class="prices clearfix">
                        <div class="procent">
                          Saving <?= h($deal->saved_amount) ?>
                        </div>
                        <div class="price">
                          <i class="ti-money">
                          </i>
                          
                          <b>
                            <?= h($deal->promo_price) ?>
                          </b>
                        </div>
                        <div class="old-price">
                          <span>
                            <i class="ti-money">
                            </i>
                            <?= h($deal->actual_price) ?>
                          </span>
                        </div>
                      </div>
                      <p>
                        <?= h($deal->description) ?>
                      </p>
                    </div>
                    <!--/.entry content -->
                    <footer class="info_bar clearfix">
                      <ul class="unstyled list-inline row">
                        <li class="time col-sm-7 col-xs-6 col-lg-8">
                          <i class="ti-timer">
                          </i>
                         
                           <?php if ($isExpired==0 && $isStarted==0){ ?>
                              <b>
                                <?= h($difference->format('%d'))?> 
                              </b>
                              day(s)
                              <b>
                               <?= h($difference->format('%h'))?> 
                              </b>
                              hour(s)
                              <b>
                                <?= h($difference->format('%i'))?> 
                              </b>
                              min(s)
                            <?php 
                            }
                            else if($isExpired!=0)
                            {
                                echo "Expired";
                            }
                            else if($isStarted!=0)
                            {
                                echo "Coming Soon";
                            }
                            ?>
                        </li>
                        <li class="info_link col-sm-5 col-xs-6 col-lg-4">                         
                            <?= $this->Html->link(__('View Deal'), ['action' => 'view', $deal->id],array('class'=>'btn btn-block btn-default btn-raised btn-sm')) ?>
                        </li>
                      </ul>
                    </footer>
                  </div>
                </div>
                <?php endforeach; }?>
              </div>
        <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</section>
