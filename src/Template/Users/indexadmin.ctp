<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
       <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow mTop-30">
             <hr data-symbol="<?= __('Merchants') ?>">
              <div class="row">
                   <?php if (isset($users)){foreach ($users as $user): ?>
                   <?php if (isset($user->company)){?>
                        <div class="col-sm-6">
                  <div class="deal-entry  orange">
                      <span class="bought">
                      <i class="ti-tag">
                      </i>
                      <?php if (isset($user->status)){switch($user->status):case 0:echo ("Pending");break;case 1:echo ("Approved");break;case 2:echo ("Reworked");break;case 3:echo ("Rejected");break;endswitch;}?>
                    </span>
                
                    <div class="title">
                      <a href="#" target="_blank" title="ATLETIKA 3 mēnešu abonements">
                        <?= h($user->company->company_name) ?>
                      </a>
                    </div>
                    <div class="entry-content">
                      <div class="prices clearfix">
                      <div class="procent">
                        <?=nl2br(h("Brand: ".$user->company->brand)) ?>
                      </div>
                    </div>

                        <p>
                        <?=nl2br(h("SSM: ".$user->company->SSM)) ?>
                      </p>
                    </div>
                    <!--/.entry content -->
                    <footer class="info_bar clearfix">
                      <ul class="unstyled list-inline row">
                        <li class="time col-sm-7 col-xs-6 col-lg-8">

                          <?= h($user->company->business_person_in_charge) ?>
                          </br>
                          <?=nl2br(h($user->company->telephone))  ?>
                          </br>
                          <?= h($user->email) ?>
                          </br>
                          <?= h($user->company->business_addres) ?>
                        </li>
                        <li class="info_link col-sm-5 col-xs-6 col-lg-4">
                            <?= $this->Html->link(__('Approve/Reject'), ['action' => 'approveadmin', $user->id],array('class'=>'btn btn-block btn-default btn-raised btn-sm')) ?>                                              
                        </li>
                      </ul>
                    </footer>
                  </div>
                </div>
                    
                    <?php }endforeach; }?>
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
      

