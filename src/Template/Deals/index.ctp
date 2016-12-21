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
                       <a href="<?= "/deals/view/".h($deal->id) ?>" target="_blank" title="#">
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
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deal->id],array('class'=>'btn btn-block btn-default btn-raised btn-sm')) ?>                         
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
      