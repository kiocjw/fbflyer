<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
            <?= $this->Form->create($user) ?>
                <div class="col-md-6">
                        <h3 class="dark-grey"><?= __('Register Merchant') ?></h3>
                    <?php
                                                            echo $this->Form->input('role', ['type' => 'hidden', 'value' => 2]);
                                                            echo $this->Form->input('email',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('password',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                        
                                                            echo $this->Form->input('company.company_name',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.brand',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.business_address',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.SSM',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.telephone',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.business_person_in_charge',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.bank_name', array(
                                                                'selected' => 'AFFIN BANK',
                                                                'options' => array(
                                                                    'AFFIN BANK' =>'AFFIN BANK',
                                                                    'ALLIANCE BANK' =>'ALLIANCE BANK',
                                                                    'ALLIANCE ISLAMIC BANK' =>'ALLIANCE ISLAMIC BANK',
                                                                    'AL RAJHI BANK' =>'AL RAJHI BANK',
                                                                    'AM BANK' =>'AM BANK',
                                                                    'BANK ISLAM' =>'BANK ISLAM',
                                                                    'BANK SIMPANAN NATIONAL' =>'BANK SIMPANAN NATIONAL',
                                                                    'CIMB' =>'CIMB',
                                                                    'CITIBANK' =>'CITIBANK',
                                                                    'DBS BANK' =>'DBS BANK',
                                                                    'HONG LEONG BANK' =>'HONG LEONG BANK',
                                                                    'HONG LEONG ISLAMIC BANK' =>'HONG LEONG ISLAMIC BANK',
                                                                    'HSBC' =>'HSBC',
                                                                    'MAYBANK' =>'MAYBANK',
                                                                    'MUAMALAT BANK' =>'MUAMALAT BANK',
                                                                    'OCBC BANK' =>'OCBC BANK',
                                                                    'POSB BANK' =>'POSB BANK',
                                                                    'PUBLIC BANK' =>'PUBLIC BANK',
                                                                    'RHB BANK' =>'RHB BANK',
                                                                    'UOB' =>'UOB',
                                                                    'SCOTIA BANK' =>'SCOTIA BANK',
                                                                    'STANDARD CHARTERED' =>'STANDARD CHARTERED'
                                                                    )
                                                            ,'div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.bank_account_holder',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.bank_account_no',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                    
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
