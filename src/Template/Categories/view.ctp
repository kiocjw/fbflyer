  <section id="inner-page" class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row mTop-20">
                        <div class="categories view large-9 medium-8 columns content">
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
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="tab-1">
                                                    <div class="section-title-wr">
                                                        <h4 class="section-title left">
                                                      <?= __('Category Name') ?>
                                                    </h4>
                                                        <p class="lead">
                                                            <?= h($category->category) ?>
                                                        </p>
                                                        </div>
                                                    <div class="section-title-wr">
                                                        <h4 class="section-title left">
                                                      <?= __('Status') ?>
                                                    </h4>
                                                        <p class="lead">
                                                            <?=nl2br(h($category->status)) ?>
                                                        </p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- /tab content -->
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
