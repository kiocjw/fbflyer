<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
                <div class="col-md-6">
                    <h3 class="dark-grey">Edit Profile</h3>
                        <?= $this->Form->create($user); ?>
                            <?php
                                                            if($user->status==1)
                                                            {
                                                                echo $this->Form->input('current password',array('type' => 'password','div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                                echo $this->Form->input('new password (Optional)',array('type' => 'password','div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                                echo $this->Form->input('confirm new password (Optional)',array('type' => 'password','div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            }
                                                            echo $this->Form->input('company.company_name',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.brand',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.business_address',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.SSM',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.telephone',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('company.business_person_in_charge',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                            ?>
                        <?= $this->Form->button(__('Submit'),array('div'=>array('class'=>'form-group'),'class' => 'btn btn-primary')) ?>
                    <?= $this->Form->end() ?>   
              
                  </div>
                    
            </div>
            <!-- /inner wrap -->
        </div>
    </div>
</section>
