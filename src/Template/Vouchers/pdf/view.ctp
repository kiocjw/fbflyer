
<?php $path=getcwd();  $path= str_replace("webroot","",$path);?>


<div class="container">  

    <div class="row" id="blue">
        <div class="col-md-6 col-md-offset-3">            
            <div class="panel panel-primary coupon">          
              <div class="panel-body" align="center">
                <div id="head">
                <?php echo $this->Html->image($path.'/webroot/images/logo.png' , ['fullBase' => true]);?>
                </div>
                <br>
                <?php echo $this->Html->image($path.h($voucher->deal->photo_dir).h($voucher->deal->photo), ['class'=>"coupon-img img-rounded", 'fullBase' => true]);?>
                <br>
                <b><?php echo $voucher->deal->title; ?></b>
                <br>
                <?php echo $voucher->deal->description; ?>
                <br>
                <br>
                <?php echo $this->Html->image($path.'webroot\\files\\Vouchers\\'.$voucher->id.'.png' , ['fullBase' => true]);?>
                 <br>
                <?php echo $voucher->code;?>
                <div id="footer">
                        <p>
                            <strong>
                                Copyright 2016 
                            </strong> FBFLYER
                            <i class="ti-heart">
                            </i>
                            <strong>
                                by FBFYLER
                            </strong>
                        </p>
                </div>            
            </div>
        </div>
    </div>
   
</div>