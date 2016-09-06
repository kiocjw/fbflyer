<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
            <?= $this->Form->create($category) ?>
                <div class="col-md-6">
                        <h3 class="dark-grey"><?= __('Edit Category') ?></h3>
                    <?php
                                                            echo $this->Form->input('category',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                                            echo $this->Form->input('status',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
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
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
    </ul>
</nav>
