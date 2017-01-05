<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
                <div class="col-md-6">
                    <h3 class="dark-grey"><?= __('Approve  Deals') ?></h3>
                        <?= $this->Form->create($deal); ?>
                            <?php
                            echo    $this->Form->input('status', array('label' => __('Approve'),'options' => array('0' => __('Disapproved'),'1' => __('Approved'),'2' => __('Reworked'),'3' => __('Rejected')),'div'=>array('class'=>'form-group'),'class' => 'form-control'));
                            echo    $this->Form->input('percentage_of_rebate',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                            echo    $this->Form->input('remark',array('type' => 'textarea','label' => __('Remark'),'div'=>array('class'=>'form-group'),'class' => 'form-control'));
                            ?>
                        <?= $this->Form->button(__('Submit'),array('div'=>array('class'=>'form-group'),'class' => 'btn btn-primary')) ?>
                        <?= $this->Form->end() ?>   
                        
                  </div>
                    
            </div>
            <!-- /inner wrap -->
        </div>
    </div>
</section>