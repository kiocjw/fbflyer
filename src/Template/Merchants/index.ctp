<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
       <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow mTop-30">
             <hr data-symbol="<?= __('Merchants') ?>">
              <div class="row">
                   <?php foreach ($merchants as $merchant): ?>
                        <div class="col-sm-6">
                  <div class="deal-entry  orange">
                    <div class="image">
                      <a href="#" target="_blank" title="#">
                          <img src="<?= "/".h($merchant->photo_dir).h($merchant->photo) ?>" alt="#" class="img-responsive">
                      </a>
                    </div>
                    <!-- /.image -->
                    <div class="title">
                      <a href="#" target="_blank" title="ATLETIKA 3 mēnešu abonements">
                        <?= h($merchant->company_name) ?>
                      </a>
                    </div>
                    <div class="entry-content">
                      <div class="prices clearfix">
                        <div class="price">
                          <b>

                          </b>
                        </div>
         
                      </div>
                      <p>
                        <?=nl2br(h($merchant->description)) ?>
                      </p>
                    </div>
                    <!--/.entry content -->
                    <footer class="info_bar clearfix">
                      <ul class="unstyled list-inline row">
                        <li class="time col-sm-7 col-xs-6 col-lg-8">
                          <?=nl2br(h($merchant->phone))  ?>
                          </br>
                          <?= h($merchant->email) ?>
                          </br>
                          <?= h($merchant->address) ?>
                        </li>
                        <li class="info_link col-sm-5 col-xs-6 col-lg-4">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchant->id],array('class'=>'btn btn-block btn-default btn-raised btn-sm')) ?>                         
                            <?= $this->Html->link(__('View Detail'), ['action' => 'view', $merchant->id],array('class'=>'btn btn-block btn-default btn-raised btn-sm')) ?>
                            <?= $this->Html->link(__('View Website'),h($merchant->website),array('class'=>'btn btn-block btn-default btn-raised btn-sm')) ?>
                        </li>
                      </ul>
                    </footer>
                  </div>
                </div>
                    
                    <?php endforeach; ?>
                </div>      
            </div>
       </div>  
    </div>
    <!--/.row -->
        <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</section>
      

