<section id="page" class="container mTop-30 mBtm-50">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body frameLR bg-white shadow space-sm">
                <div class="col-md-6">
                        <h3 class="dark-grey"><?= __('Generate Payout') ?></h3>                   
                        <?= $this->Form->create() ?>
                    
                        <?php
                                echo $this->Form->label('Start Date');
                                echo $this->Form->datetime('Start Date', [
                                    'year' => [
                                        'class' => 'year-classname',
                                    ],
                                    'month' => [
                                        'class' => 'month-class',
                                        'data-type' => 'month',
                                    ],
                                    'value' => !empty($item->date) ? $item->date->format('Y-m-d') : date('Y-m-d')
                                ],array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
                                echo $this->Form->label('End Date');
                                echo $this->Form->datetime('End Date', [
                                    'year' => [
                                        'class' => 'year-classname',
                                    ],
                                    'month' => [
                                        'class' => 'month-class',
                                        'data-type' => 'month',
                                    ],
                                    'value' => !empty($item->date) ? $item->date->format('Y-m-d H:i:s') : date('Y-m-d  H:i:s')
                                ],array('div'=>array('class'=>'form-group'),'class' => 'form-control'));
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

<script type="text/javascript">
$(function() {
	$("#format").change(function() { $('#datepicker2').datepicker('option', {dateFormat: $(this).val()}); });
});
</script>