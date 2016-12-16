<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
            <?= $this->Form->create($company) ?>
                <div class="col-md-6">
                        <h3 class="dark-grey"><?= __('Add Company') ?></h3>
                    <?php
                                                            echo $this->Form->input('company_name',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('brand',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('business_address',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('SSM',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('telephone',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('business_person_in_charge',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('bank_name',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('bank_account_holder',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('bank_account_no',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('users_id', ['options' => $users],array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                        ?>
                </div>

                <div class="mBtm-20 visible-xs">
                </div>

                <div class="col-md-6">
                    <h3 class="dark-grey">Terms and Conditions</h3>
                    <p>
                        By clicking on "Register" you agree to our Terms and Conditions
                    </p>                  
                </div>
            <?= $this->Form->submit('Register',array('div'=>array('class'=>'form-group'),'class' => 'btn btn-danger btn-lg btn-raised ripple-effect')) ?>
            <?= $this->Form->end() ?>
        </div>
            <!-- /inner wrap -->
        </div>
    </div>

</section>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
