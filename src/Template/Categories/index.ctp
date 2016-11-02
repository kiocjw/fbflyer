<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
       <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow mTop-30">
             <hr data-symbol="<?= __('Categories') ?>">
              <div class="row">
                   <?php if (isset($categories)){foreach ($categories as $category): ?>
                        <div class="col-sm-6">
                  <div class="deal-entry  orange">
                    <!-- /.image -->
                    <div class="title">
                      <a href="#" target="_blank" title="ATLETIKA 3 mēnešu abonements">
                        <?= h($category->category) ?>
                      </a>
                    </div>
                    <div class="entry-content">
                      <div class="prices clearfix">
                        <div class="price">
                          <b>

                          </b>
                        </div>
         
                      </div>
                    </div>
                    <!--/.entry content -->
                    <footer class="info_bar clearfix">
                      <ul class="unstyled list-inline row">
                        <li class="time col-sm-7 col-xs-6 col-lg-8">
                          Status: <?=nl2br(h($category->status))  ?>
                          </br>
                          Created: <?= h($category->created) ?>
                          </br>
                          Modified: <?= h($category->modified) ?>
                        </li>
                        <li class="info_link col-sm-5 col-xs-6 col-lg-4">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id],array('class'=>'btn btn-block btn-default btn-raised btn-sm')) ?>                         
                        </li>
                      </ul>
                    </footer>
                  </div>
                </div>
                    
                    <?php endforeach; }?>
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