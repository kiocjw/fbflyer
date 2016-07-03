<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
                <div class="col-md-6">
                    <h3 class="dark-grey">Add Merchant</h3>
                    
                        <?= $this->Form->create($merchant, ['type' => 'file']) ?>
                        <?php
                                echo $this->Form->input('photo', ['type' => 'file'],array('div'=>array('class'=>'form-group'),'class' => 'btn btn-primary'));

                                echo $this->Form->input('photo_dir', ['type' => 'hidden']);
                                echo $this->Form->input('company_name',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
			?>	<label for="description">Description</label> <?php
                                echo $this->Form->textarea('description',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                echo $this->Form->input('address',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                echo $this->Form->input('website',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                echo $this->Form->input('email',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                echo $this->Form->input('phone',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                echo $this->Form->input('longitude',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                echo $this->Form->input('latitude',array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                         ?>
                        <?= $this->Form->button(__('Submit'),array('div'=>array('class'=>'form-group'),'class' => 'btn btn-primary'))?>
                        <?= $this->Form->end() ?>
                 </div>
            </div>
            <!-- /inner wrap -->
        </div>
    </div>
</section>