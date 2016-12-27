<section id="page" class="container mBtm-50">
    <div class="row">
        <div class="col-sm-8 mTop-30">
            <div class="inner-wrap frameLR bg-white shadow clearfix ">
                <hr data-symbol="OUR LOCATION">
                <div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.748461189101!2d100.25448331477219!3d5.301893496153724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304a9556863cb461%3A0xe78dac69f7e5d4fe!2sTop+Kit+Technology!5e0!3m2!1sen!2ssg!4v1482805994983" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <hr data-symbol="CONTACT FORM">
                <!-- widget -->
                <div class="widget contact-widget">
                    <h4 class="widget-title">
                        Your data will be safe!
                    </h4>

                        <?= $this->Form->create($contact) ?>
                            <?= $this->Form->input('name',array('div'=>array('class'=>'form-group'),'class' => 'form-control')) ?>
                            <?= $this->Form->input('email',array('div'=>array('class'=>'form-group'),'class' => 'form-control')) ?>
                            <?= $this->Form->input('message',array('type' => 'textarea','div'=>array('class'=>'form-group'),'class' => 'form-control')) ?>
                        <br>
                        <p class="contact-button clearfix">
                            <?= $this->Form->button(__('Submit'),array('div'=>array('class'=>'form-group'),'class' => 'btn btn-primary'))?>
                        </p>
                    
                        <?= $this->Form->end() ?>
                    
                    <div id="response">
                    </div>
                </div>
                <!-- punica-contact-widget -->
            </div>
            <!-- /inner wrap -->
        </div>
        <div class="col-sm-4 sidebar">
                    <div class="inner-side shadow mTop-0">
                        <!-- /widget -->
                        <div class="widget">
                            <hr class="mBtm-50 mTop-30" data-symbol="ADDRESS">
                            <address>
                  Top Kit Technology
                                <br>
Blk Asoka, 8-16,
                                 <br>
Lengkok Kelicap,
                                <br>
11900 Bayan Lepas, Penang.
                  <br>
                </address>
                        </div>
                                                <div class="widget">
                            <hr class="mBtm-50 mTop-30" data-symbol="CONTACT PERSON">
                            <address>
+6012-536 8600 
                                <br>
Mr. Loh (Business Manager)
                  <br>
                </address>
                        </div>
                        <div class="widget">
                            <hr class="mBtm-50 mTop-30" data-symbol="WORKSPACE">
                            <div class="responsive-video">
                                <div class="fluid-width-video-wrapper" style="padding-top: 56.2%;">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/jHQGyMBtE9Y" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>

                        </div>


                    </div>
              </div>
        <!-- /col 4 - sidebar -->
    </div>

</section>

