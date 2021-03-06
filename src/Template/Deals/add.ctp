<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
                <div class="col-md-6">
                    <h3 class="dark-grey">Add Deal</h3>
                    
                        <?= $this->Form->create($deal, ['type' => 'file']) ?>
                        <?php
                                echo $this->Form->input('photo', array('type' => 'file', 'multiple' => true),array('div'=>array('class'=>'form-group'),'class' => 'btn btn-primary'));
                                echo $this->Form->input('photo_dir', ['type' => 'hidden']);
                                echo $this->Form->input('title',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
								echo $this->Form->input('description',array('type' => 'textarea','div'=>array('class'=>'form-group'),'class' => 'form-control'));
								echo $this->Form->input('actual_price',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
								echo $this->Form->input('promo_price',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
								echo $this->Form->input('saved_amount',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
								echo $this->Form->input('discount_percentage',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
								echo $this->Form->input('deals_start_date',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
								echo $this->Form->input('deals_end_date',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                echo $this->Form->input('redeem_start_date',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
								echo $this->Form->input('redeem_end_date',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
								echo $this->Form->input('additional_info',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                echo $this->Form->input('categories_id', ['options' => $categories],array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                echo $this->Form->input('merchants._ids', ['options' => $merchants]);
                        ?>
                        <?= $this->Form->button(__('Submit'),array('div'=>array('class'=>'form-group'),'class' => 'btn btn-primary'))?>
                        <?= $this->Form->end() ?>
                 </div>
            </div>
            <!-- /inner wrap -->
        </div>
    </div>
</section>