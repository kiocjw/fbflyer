        <section id="inner-page" class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <!--/.post media -->
                    <div class="row mTop-20">
                        <!-- /col 5 -->
                        <div class="col-sm-5 col-lg-12">

                            <div class="widget-inner bg-white shadow mBtm-20">
                                <div role="tabpanel" id="tabs" class="tabbable responsive">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#tab-1" aria-controls="home" role="tab" data-toggle="tab">
                                              Profile
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="tab-1">
                                                <?= $this->Form->create($user); ?>
                                                    <?php
                                                    echo $this->Form->input('title',array('div'=>array('class'=>'form-group'),'class' => 'form-control','readonly' => 'readonly'));
                                                    echo $this->Form->input('first_name',array('div'=>array('class'=>'form-group'),'class' => 'form-control','readonly' => 'readonly'));
                                                    echo $this->Form->input('middle_name',array('div'=>array('class'=>'form-group'),'class' => 'form-control','readonly' => 'readonly'));
                                                    echo $this->Form->input('last_name',array('div'=>array('class'=>'form-group'),'class' => 'form-control','readonly' => 'readonly'));
                                                    echo $this->Form->input('points',array('div'=>array('class'=>'form-group'),'class' => 'form-control','readonly' => 'readonly'));
                                                    ?>
                                                <?= $this->Form->end() ?> 
                                                </div>
                                               
                                                <div role="tabpanel" class="tab-pane" id="map">
                                                    <!-- Google map, just iframe for now -->
                                                    <div class="google-maps">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7098.94326104394!2d78.0430654485247!3d27.172909818538997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1385710909804" width="600" height="450" frameborder="0" style="border:0">
                                                        </iframe>
                                                    </div>
                                                    <!-- /google map -->
                                                </div>
                                                <!-- /tab -->
                                            </div>
                                        </div>
                                        <!--/tabs -->
                                    </div>
                                    <!-- /inner widget -->
                                </div>
                            </div>


                        </div>
                        <!-- col 7 -->
                    </div>
                </div>
                <!-- /col 8 -->
            <!-- /main row -->
        </section>
