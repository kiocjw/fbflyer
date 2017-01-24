<section id="page">
    <div class="container">

        <!-- Cart -->
        <div class="cart shadow">

            <!-- Cart Contents -->
            <table class="cart-contents">
                <thead>
                    <tr>
                        <th class="hidden-xs">
                            Image
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Qty
                        </th>
                        <th class="hidden-xs">
                            Price
                        </th>
                        <th>
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $subtotal=0;?>
                    <?php foreach ($shoppingCarts as $shoppingCart): ?>
                    <?php $subtotal+=$shoppingCart->deal->promo_price*$shoppingCart->quantity;?>
                    <tr>
                        <td class="image hidden-xs">
                            <img src="<?= "/".h($shoppingCart->deal->photo_dir).h($shoppingCart->deal->photo) ?>" alt="product">
                        </td>
                        <td class="details">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <?= $shoppingCart->has('deal') ? $this->Html->link($shoppingCart->deal->title, ['controller' => 'Deals', 'action' => 'view', $shoppingCart->deal->id]) : '' ?>
                                    <div class="rating">
                                    </div>
                                    <span>
                                    </span>
                                </div>
                                <div class="action pull-right">
                                    <div class="clearfix">
                                        
                                        
                                        <!--
                                        <button class="btn-primary btn-raised ripple-effect">
                                        <i class="ti-reload">
                                        </i>
                                        </button>
                                        -->
                                       
                                        

                                        <button class="btn-danger btn-raised ripple-effect">
                                         <?php
                                            echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'ti-trash')), ['action' => 'delete', $shoppingCart->id],['escape' => false,'confirm' => __('Are you sure you want to delete the deal?'),['class' => 'btn-danger btn-raised ripple-effect']])
                                         ?>
                                        </button>
                                        <?= $this->Form->create("", array('url'=>array('controller'=>'shopping-carts', 'action'=>'edit', $shoppingCart->id))) ?>
                                        <?= $this->Form->button($this->Html->tag('i', '', array('class' => 'ti-marker')),['class' => 'btn-default btn-raised ripple-effect']) ?>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="qty">

                                        
                                        <?php 
                                        echo $this->Form->input('quantity',['label' => false,'value'=>$shoppingCart->quantity]);
                                        ?>
                                        <?= $this->Form->end() ?> 
                        </td>
                        <td class="unit-price hidden-xs ti-money">
                                <?= h($shoppingCart->deal->promo_price) ?>
                        </td>
                        <td class="total-price ti-money">
                            <?= h($shoppingCart->deal->promo_price*$shoppingCart->quantity) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
            <!-- /Cart Contents -->

            <!-- Cart Summary -->
            <table class="cart-summary">
                <tbody>
                    <tr>
                        <td class="terms">

                            <h5>
                                <i class="ti-info-alt">
                                </i>
                                our return policy
                            </h5>
                            <p>
                                If you are not 100% satisfied with your purchase, you can return the product and get a full refund or exchange the product for another one, be it similar or not.
                            </p>
                        </td>
                        <td class="totals">

                            <table class="cart-totals">
                                <tbody>
                                    <tr>
                                        <td>
                                            Sub Total
                                        </td>
                                        <td class="price ti-money">
                                             <?= h($subtotal) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Shipping
                                        </td>
                                        <td class="price ti-money">
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            VAT
                                        </td>
                                        <td class="price ti-money">
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart-total">
                                            total
                                        </td>
                                        <td class="cart-total price ti-money">
                                             <?= h($subtotal) ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- /Cart Summary -->

        </div>
        <!-- /Cart -->

        <!-- Cart Buttons -->
        <div class="cart-buttons clearfix mBtm-30 col-sm-12">
            <?= $this->Form->create("", array('url'=>array('controller'=>'vouchers', 'action'=>'add'))) ?>
            <label  for="points" style="float: right;left:0px;" >Points (Your Point: <?=$points?>)</label>
            <div class="clearfix">
           </div>
            <?php 
            echo $this->Form->input('points',['div'=>array('class'=>'input form-group'),'class' => 'form-control','type' => 'number','label'=> false,
              'min' => 0,
              'max' => $points,
              'value'=>0]);
            ?>
           <div class="clearfix">
           </div>

            <?= $this->Form->button($this->Html->tag('i', '', array('class' => 'ti-shopping-cart')).'Checkout',['class' => 'btn btn-raised btn-primary ripple-effect checkout']) ?>                                     
            <?= $this->Form->end() ?> 
            <a class="btn btn-raised btn-success ripple-effect checkout" href="/users">
                <i class="ti-plus">
                </i> continue shopping
            </a>
        </div>

        <!-- /Cart Buttons -->

    </div>
</section>