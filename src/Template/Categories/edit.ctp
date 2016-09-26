<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
                <div class="col-md-6">
                    <h3 class="dark-grey"><?= __('Edit Category') ?></h3>
                        <?= $this->Form->create($category, ['type' => 'file']); ?>
                            <?php
                                echo $this->Form->input('category',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                            ?>
                        <?= $this->Form->button(__('Submit'),array('div'=>array('class'=>'form-group'),'class' => 'btn btn-primary')) ?>
                    <?= $this->Form->end() ?>   
                     <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $category->id],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
                            ,array('div'=>array('class'=>'form-group'),'class' => 'btn btn-primary'))
                        ?>
                        
                  </div>
                    
            </div>
            <!-- /inner wrap -->
        </div>
    </div>
</section>