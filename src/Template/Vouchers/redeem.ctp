<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
            <?= $this->Form->create() ?>
                <div class="col-md-6">
                        <h3 class="dark-grey"><?= __('Redeem Voucher') ?></h3>
                        <?= $this->Form->input('code',array('div'=>array('class'=>'form-group'),'class' => 'form-control')) ?>
                        <?= $this->Form->submit('Validate',array('name' => 'btn','div'=>array('class'=>'form-group'),'style'=>'margin-top: 10px;float: left; width: 150px','class' => 'btn btn-primary')); ?>
                        <?php echo " "?>
                        <?= $this->Form->submit('Redeem',array('name' => 'btn','div'=>array('class'=>'form-group'),'style'=> 'margin-top: 10px; margin-left: 10px;width: 150px','class' => 'btn btn-primary')) ?>
                </div>

                <div class="mBtm-20 visible-xs">
                </div>
                <div class="col-md-6">
                </div>
                <?= $this->Form->end() ?>  
        </div>
            <!-- /inner wrap -->
        </div>
    </div>

</section>
