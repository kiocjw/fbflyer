<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
                <div class="col-md-6">
                    <h3 class="dark-grey"><?= __('Login Admin') ?></h3>
			        <?= $this->Form->create() ?>
                    <?=  $this->Form->input('role', ['type' => 'hidden', 'value' => 1])?>
                    <?= $this->Form->input('email',array('div'=>array('class'=>'form-group'),'class' => 'form-control')) ?>
                    <?= $this->Form->input('password',array('div'=>array('class'=>'form-group'),'class' => 'form-control')) ?>
                    <!--<?= $this->Form->button('Forget Password',array('div'=>array('class'=>'form-group'),'class' => 'btn btn-link')) ?>-->
                    <?= $this->Form->submit('Login',array('div'=>array('class'=>'form-group'),'class' => 'btn btn-primary')) ?>
                    <?= $this->Form->end() ?>                    
                </div>

                <div class="mBtm-20 visible-xs">
                </div>
            </div>
            <!-- /inner wrap -->
        </div>
    </div>
</section>

