<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
            <?= $this->Form->create() ?>
                <div class="col-md-6">
                        <h3 class="dark-grey"><?= __('Login Merchant') ?></h3>
                        <?=  $this->Form->input('role', ['type' => 'hidden', 'value' => 2])?>
                        <?= $this->Form->input('email',array('div'=>array('class'=>'form-group'),'class' => 'form-control')) ?>
                        <?= $this->Form->input('password',array('div'=>array('class'=>'form-group'),'class' => 'form-control')) ?>
                        <!--<?= $this->Form->button('Forget Password',array('div'=>array('class'=>'form-group'),'class' => 'btn btn-link')) ?>-->
                        <?= $this->Form->submit('Login',array('div'=>array('class'=>'form-group'),'class' => 'btn btn-primary')) ?>
                </div>

                <div class="mBtm-20 visible-xs">
                </div>
                <div class="col-md-6">
                    <h3 class="dark-grey">Not Yet Register?</h3>
                    <p>
                        Sign Up!
                    </p>      
                    <?php
                        echo $this->Html->link("Sign Up", ['controller' => 'Users','action' => 'addmerchant'],array('class' => 'btn btn-raised btn-danger ripple-effect btn-lg'))
                    ?>           
                </div>
                <?= $this->Form->end() ?>  
        </div>
            <!-- /inner wrap -->
        </div>
    </div>

</section>
