
<?php $path= str_replace("webroot",".",h($voucher->deal->photo_dir));?>


<div class="container">  

    <div class="row" id="blue">
        <div class="col-md-6 col-md-offset-3">            
            <div class="panel panel-primary coupon">          
              <div class="panel-body" align="center">
                <div id="head">
                <img id="logo" src="<?='./images/logo.png'?>" alt="Logo">
                
                </div>
                <br>
                <img id="logo" src="<?=$path.h($voucher->deal->photo)?>" alt="Voucher" class="coupon-img img-rounded">
                <br>
                <b><?php echo $voucher->deal->title; ?></b>
                <br>
                <?php echo $voucher->deal->description; ?>
                <br>
                <br>
                 <img id="logo" src="<?='./files/Vouchers/'.$voucher->id.'.png'?>" alt="QRCode">
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