<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
            <?= $this->Form->create($user) ?>
                <div class="col-md-6">
                        <h3 class="dark-grey"><?= __('Register User') ?></h3>
                    <?php
                                                            echo $this->Form->input('role', ['type' => 'hidden', 'value' => 3]);
                                                            echo $this->Form->input('title',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('first_name',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('middle_name',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('last_name',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('email',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('password',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                        ?>
                </div>

                <div class="mBtm-20 visible-xs">
                </div>

                <div class="col-md-6">
                    <h3 class="dark-grey">Terms and Conditions</h3>
                    <p>
                        By clicking on "Register" you agree to our Terms and Conditions
                    </p>                  
                
                <?= $this->Form->submit('Register',array('div'=>array('class'=>'form-group'),'class' => 'btn btn-danger btn-lg btn-raised ripple-effect')) ?>
                <?= $this->Form->end() ?>
                </div>
                <div class="col-md-6">
                 <p>
                           <br>
                 </p>
                </div> 
                <div class="col-md-6">
                 <p>
                            Already have an account on Facebook? Use it to sign in to FBFlyer Malaysia!
                 </p>   
                 <?php echo $this->Facebook->loginLink($options = ['div'=>array('class'=>'form-group'),'class' => 'btn btn-primary btn-lg btn-raised ripple-effect']); ?>             
                </div>
            </div>
            <!-- /inner wrap -->
        </div>
    </div>

</section>