  <section id="inner-page" class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="post-media">
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img class="img-responsive" alt="Merchant" src=<?= "/".h($merchant->photo_dir).h($merchant->photo) ?>>
                                </li>
                            </ul>
                        </div>
                        <!--/.carousel sinc -->
                    </div>
                    <!--/.post media -->
                    <div class="row mTop-20">
                        <div class="merchants view large-9 medium-8 columns content">
                        <div class="col-sm-12">

                            <div class="widget-inner bg-white shadow mBtm-20">
                                <div role="tabpanel" id="tabs" class="tabbable responsive">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#tab-1" aria-controls="home" role="tab" data-toggle="tab">
                          Overview
                        </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#map" aria-controls="map" role="tab" data-toggle="tab">
                          Map &amp; Directions
                        </a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="tab-1">
                                                    <div class="section-title-wr">
                                                        <h4 class="section-title left">
                                                      <?= __('Company Name') ?>
                                                    </h4>
                                                        <p class="lead">
                                                            <?= h($merchant->company_name) ?>
                                                        </p>
                                                        </div>
                                                    <div class="section-title-wr">
                                                        <h4 class="section-title left">
                                                      <?= __('Description') ?>
                                                    </h4>
                                                        <p class="lead">
                                                            <?=nl2br(h($merchant->description)) ?>
                                                        </p>
                                                        </div>
                                                    <div class="section-title-wr">
                                                        <h4 class="section-title left">
                                                      <?= __('Website') ?>
                                                    </h4>
                                                        <p class="lead">
                                                            <?= h($merchant->website) ?>
                                                          </p>
                                                    </div>
                                                    <div class="section-title-wr">
                                                        <h4 class="section-title left">
                                                     <?= __('Email') ?>
                                                    </h4>
                                                        <p class="lead">
                                                            <?= h($merchant->email) ?>
                                                          </p>
                                                    </div>
                                                    <div class="section-title-wr">
                                                        <h4 class="section-title left">
                                                      <?= __('Phone') ?>
                                                    </h4>
                                                        <p class="lead">
                                                            <?=nl2br(h($merchant->phone))  ?>
                                                          </p>
                                                    </div>
                                                    <div class="section-title-wr">
                                                                <h4 class="section-title left">
                                                              <?= __('Address') ?>
                                                            </h4>
                                                                <p class="lead">
                                                                    <?= h($merchant->address) ?>
                                                                  </p>
                                                    </div>
                                                </div>
                                                <!-- /tab content -->
                                                <div role="tabpanel" class="tab-pane" id="map">
                                                    <!-- Google map, just iframe for now -->
                                                    <div class="google-maps">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7098.94326104394!2d78.0430654485247!3d27.172909818538997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1385710909804" width="600" height="450" style="border:0">
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
                    </div>
                </div>
            </div>
          </div>
            <!-- /main row -->
        </section>
       

