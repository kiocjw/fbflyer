        <section id="inner-page" class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-7">
                    <div class="post-media">
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img class="img-responsive" alt="Deal" src=<?= "/".h($deal->photo_dir).h($deal->photo) ?>>
                                </li>
                            </ul>
                        </div>
                        <!--/slider -->
                        <!--
                        <div id="carousel" class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="http://placehold.it/200x130" alt="" />
                                </li>
                                <li>
                                    <img src="http://placehold.it/200x130" alt="" />
                                </li>
                                <li>
                                    <img src="http://placehold.it/200x130" alt="" />
                                </li>
                                <li>
                                    <img src="http://placehold.it/200x130" alt="" />
                                </li>
                                <li>
                                    <img src="http://placehold.it/200x130" alt="" />
                                </li>
                                <li>
                                    <img src="http://placehold.it/200x130" alt="" />
                                </li>
                            </ul>
                        </div>
                        -->
                        <!--/.carousel sinc -->
                    </div>
                    <!--/.post media -->
                    <div class="row mTop-20">

                        <div class="col-sm-4 col-lg-3 bg-light">
                            <article class="side-details">

                                <div class="what-you-get">
                                    <h4 class="border">
                                      What You Get
                                    </h4>
                      

                                    <p>
                                        <strong>
                                            Policies and Fees
                                      </strong>
                                    </p>




                                </div>

                            </article>


                        </div>
                        <!-- /col 5 -->
                        <div class="col-sm-5 col-lg-9">

                            <div class="widget-inner bg-white shadow mBtm-20">
                                <div role="tabpanel" id="tabs" class="tabbable responsive">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#tab-1" aria-controls="home" role="tab" data-toggle="tab">
                                              Overview
                                            </a>
                                        </li>
                        <!--
                                        <li role="presentation">
                                            <a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">
                          reviews
                        </a>
                                        </li>
                                        -->
                                        <li role="presentation">
                                            <a href="#map" aria-controls="map" role="tab" data-toggle="tab">
                          Map &amp; Directions
                        </a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="tab-1">
                                                    <h4>
                                                        Description
                                                  </h4>
                                                  <p class="lead">
                                                        <?=nl2br(h($deal->description)) ?>
                                                  </p>
                                                    <h4>
                                                        Available Branch
                                                  </h4>
                                                    <p class="lead">
                                                    <?php if (!empty($deal->merchants)): ?>
                                                    <table cellpadding="0" cellspacing="0">
                                                        <?php foreach ($deal->merchants as $merchants): ?>
                                                        <tr>
                                                            <td><?= h($merchants->company_name) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?= h($merchants->address) ?></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </table>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- /tab content -->
                                                <!--
                                                <div role="tabpanel" class="tab-pane" id="reviews">
                                                    <section class="tab-content">
                                                   
                                                        <div class="comment clearfix">
                                                            <div class="comment-avatar">
                                                                <img src="images/avatar-2.jpg" alt="avatar">
                                                            </div>
                                                            <header>
                                                                <h3>
                                                        Really Nice!
                                                      </h3>
                                                                <div class="comment-meta stars">
                                                                    <i class="ti-star">
                                                        </i>
                                                                    <i class="ti-star">
                                                        </i>
                                                                    <i class="ti-star">
                                                        </i>
                                                                    <i class="ti-start">
                                                        </i>
                                                                    <i class="ti-star">
                                                        </i> | Today, 10:31
                                                                </div>
                                                  
                                                            </header>
                                                            <div class="comment-content">
                                                                <div class="comment-body clearfix">
                                                                    <p>
                                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                    </p>
                                                                    <a href="#l" class="btn btn-sm btn-default  btn-raised ripple-effect pull-right">
                                                                        <i class="fa fa-reply">
                                                          </i> Reply
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                     
                                                        <div class="comment clearfix">
                                                            <div class="comment-avatar">
                                                                <img src="http://placehold.it/80x80" alt="avatar">
                                                            </div>
                                                            <header>
                                                                <h3>
                                                        Worth to Buy!
                                                      </h3>
                                                                <div class="comment-meta stars">
                                                                    <i class="ti-star">
                                                        </i>
                                                                    <i class="ti-star">
                                                        </i>
                                                                    <i class="ti-star">
                                                        </i>
                                                                    <i class="ti-start">
                                                        </i>
                                                                    <i class="ti-star">
                                                        </i> | Today, 10:31
                                                                </div>
                                                           
                                                            </header>
                                                            <div class="comment-content">
                                                                <div class="comment-body clearfix">
                                                                    <p>
                                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                    </p>
                                                                    <a href="#l" class="btn btn-sm btn-default  btn-raised ripple-effect pull-right">
                                                                        <i class="fa fa-reply">
                                                          </i> Reply
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <h4 class="margin-bottom-20">
                                                    Post a Comment
                                                  </h4>
                                                        <form action="#" method="post" id="comment-form" class="comments" novalidate="novalidate">
                                                            <fieldset>
                                                                <div class="row space-xs">
                                                                    <div class="col-md-6">
                                                                        <div>
                                                                            <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div>
                                                                            <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="space-xs">
                                                                    <div>
                                                                        <textarea rows="8" name="message" id="message" placeholder="Write comment here ..." class="form-control">
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                                <p>
                                                                    <button type="submit" class="btn btn-green btn-raised ripple-effect">
                                                                        Submit Comment
                                                                    </button>
                                                                </p>
                                                            </fieldset>
                                                            <p class="form-allowed-tags">
                                                                You may use these
                                                                <abbr>
                                                        HTML
                                                      </abbr> tags and attributes:
                                                                <br>
                                                                <br>

                                                                <code>
                                                        &lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; 
                                                      </code>
                                                            </p>
                                                        </form>
                                                    </section>
                                                </div>
                                                -->
                                                <div role="tabpanel" class="tab-pane" id="map">
                                                    <!-- Google map, just iframe for now -->
                                                    <div class="google-maps">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7098.94326104394!2d78.0430654485247!3d27.172909818538997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1385710909804" width="600" height="450" frameborder="0" style="border:0">
                                                        </iframe>
                                                    </div>
                                                    <!-- /google map -->
                                                </div>
                                                <!-- /tab -->
                                            </div>
                                        </div>
                                        <!--/tabs -->
                                    </div>
                                    <!-- /inner widget -->
                                </div>
                            </div>


                        </div>
                        <!-- col 7 -->
                    </div>
                </div>
                <!-- /col 8 -->
                <div class="col-sm-4">
                    <div class="widget-inner bg-white shadow">
                        <div class="buyPanel animated fadeInLeft bg-white Aligner text-center">
                            <div class="content">
                                <div class="deal-content">
                                    <h3>
                                      <?= h($deal->title) ?>
                                    </h3>
                                </div>
                                <div class="price">
                                    <h1 class="ti-money">
                                          <?= $this->Number->format($deal->promo_price) ?>    
                                    </h1>
                                </div>
                                <div class="buy-now mBtm-30">
                                     
                                      <?php echo $this->Form->create(null, ['url' => ['controller' => 'Vouchers', 'action' => 'add']]); ?>
                                      <?php echo $this->Form->input('deals_id', ['type' => 'hidden', 'value' => h($deal->id)]);?>
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
                                      <?php if ($isExpired==0 && $isStarted==0){ $enable='';}else{$enable=' disabled';}?>                                    
                                      <?= $this->Form->submit('BUY NOW',array('div'=>array('class'=>'form-group'),'class' => 'btn btn-danger btn-lg btn-raised ripple-effect'.$enable)) ?>
                                      <?= $this->Form->end() ?>
                                </div>
                                <div class="dealAttributes">
                                    <div class="valueInfo bg-light shadow">
                                        <div class="value">
                                            <p class="ti-money value">
                                                <?= $this->Number->format($deal->actual_price) ?>
                                            </p>
                                            <p class="text">
                                                Value
                                            </p>
                                        </div>
                                        <div class="discount">
                                            <p class="value">
                                                <?= $this->Number->format($deal->discount_percentage) ?>%
                                            </p>
                                            <p class="text">
                                                Discount
                                            </p>
                                        </div>
                                        <div class="save">
                                            <p class="ti-money value">
                                                <?= $this->Number->format($deal->saved_amount) ?>
                                            </p>
                                            <p class="text">
                                                SAVINGS
                                            </p>
                                        </div>
                                    </div>
                                    <div class="timeLeft text-center">
                                        <p>
                                            REMAINING TIME:
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
                            </div>
                        </div>
                    </div>
                    <!--/inner widget -->
                    <div class="smallFrame shadow bg-white">
                        <i class="ti-shopping-cart">
                  </i>
                        <div class="content">
                            <strong>
                              <?= $this->Number->format($deal->purchased_number) ?> deals
                            </strong> Purchased
                        </div>
                    </div>
                    <div class="terms-and-conditions bg-white shadow mTop-20">
                        <div class="widget-inner">
                            <hr data-symbol="ADDITIONAL INFO">
                            <div class="content">
                                <ul class="tick">
                                    <li>
                                     <?= h($deal->additional_info) ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /widget inner -->
                    </div>
                    <!--
                    <div class="widget">
                        <div class="deal-entry green deal-entry-sm mTop-20">
                            <div class="offer-discount">
                                -71%
                            </div>
                            <div class="image ripple-effect">
                                <a href="#" target="_blank" title="#">
                                    <img src="http://placehold.it/700x420" alt="#" class="img-responsive">
                                </a>
                                <span class="bought">
                        <i class="ti-tag">
                        </i>
                        21
                      </span>
                                <div class="caption">
                                    <h5 class="media-heading">
                          <a href="#">
                            Plaza Resort Hotel &amp; SPA
                          </a>
                        </h5>
                                </div>
                            </div>
                            <footer class="info_bar clearfix">
                                <div class="prices clearfix">
                                    <div class="procent">
                                        -71%
                                    </div>
                                    <div class="price">
                                        <i class="ti-money">
                          </i>

                                        <b>
                            54,00
                          </b>
                                    </div>
                                    <div class="old-price">
                                        <span>
                            <i class="ti-money">
                            </i>
                            171,00
                          </span>
                                    </div>
                                </div>
                            </footer>
                        </div>
     
                        <div class="deal-entry green deal-entry-sm">
                            <div class="offer-discount">
                                -71%
                            </div>
                            <div class="image ripple-effect">
                                <a href="#" target="_blank" title="#">
                                    <img src="http://placehold.it/700x420" alt="#" class="img-responsive">
                                </a>
                                <span class="bought">
                        <i class="ti-tag">
                        </i>
                        21
                      </span>
                                <div class="caption">
                                    <h5 class="media-heading">
                          <a href="#">
                            Plaza Resort Hotel &amp; SPA
                          </a>
                        </h5>
                                </div>
                            </div>
                            <footer class="info_bar clearfix">
                                <div class="prices clearfix">
                                    <div class="procent">
                                        -71%
                                    </div>
                                    <div class="price">
                                        <i class="ti-money">
                          </i>

                                        <b>
                            54,00
                          </b>
                                    </div>
                                    <div class="old-price">
                                        <span>
                            <i class="ti-money">
                            </i>
                            171,00
                          </span>
                                    </div>
                                </div>
                            </footer>
                        </div>
                
                    </div>
                    -->
                    <!-- /.widget -->
                </div>
                <!-- /col 4 - sidebar -->

            </div>
            <!-- /main row -->
        </section>


<!-- 
<div class="deals view large-9 medium-8 columns content">
    <h3><?= h($deal->title) ?></h3>
    <div class="related">
        <h4><?= __('Related Merchants') ?></h4>
        <?php if (!empty($deal->merchants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Photo Dir') ?></th>
                <th><?= __('Company Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Website') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('Latitude') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Users Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($deal->merchants as $merchants): ?>
            <tr>
                <td><?= h($merchants->id) ?></td>
                <td><?= h($merchants->photo) ?></td>
                <td><?= h($merchants->photo_dir) ?></td>
                <td><?= h($merchants->company_name) ?></td>
                <td><?= h($merchants->description) ?></td>
                <td><?= h($merchants->address) ?></td>
                <td><?= h($merchants->website) ?></td>
                <td><?= h($merchants->email) ?></td>
                <td><?= h($merchants->phone) ?></td>
                <td><?= h($merchants->longitude) ?></td>
                <td><?= h($merchants->latitude) ?></td>
                <td><?= h($merchants->created) ?></td>
                <td><?= h($merchants->modified) ?></td>
                <td><?= h($merchants->status) ?></td>
                <td><?= h($merchants->users_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Merchants', 'action' => 'view', $merchants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Merchants', 'action' => 'edit', $merchants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Merchants', 'action' => 'delete', $merchants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
-->