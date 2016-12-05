
    <h3><?= __($title) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('ID') ?></th>
                <th scope="col"><?= __('CODE') ?></th>
                <th scope="col"><?= __('MERCHANT') ?></th>
                <th scope="col"><?= __('CREATED') ?></th>
                <th scope="col"><?= __('STATUS') ?></th>
                <th scope="col"><?= __('DEAL PRICE') ?></th>
                <th scope="col"><?= __('70% PAYOUT') ?></th>
                
            </tr>
        </thead>
        <tbody>
            <?php $total=0;?>
            <?php foreach ($vouchers as $voucher): ?>
            <tr>
                <?php $total+=$voucher->deal->promo_price*.7;?>
                <td><?= $this->Number->format($voucher->id) ?></td>
                <td><?= $this->Html->link($voucher->code, ['controller' => 'vouchers','action' => 'view', $voucher->id, '_ext' => 'pdf', '_full' => true]) ?></td>
                <td><?= h($voucher->deal->user->company->company_name) ?></td>
                <td><?= h($voucher->created) ?></td>
                <td><?php if($voucher->status==1){echo "CLAIMED";}else{echo "ACTIVE";} ?></td>
                <td><?= $this->Number->currency($voucher->deal->promo_price,"MYR")?></td>
                <td><?= $this->Number->currency($voucher->deal->promo_price*.7,"MYR") ?></td>              
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="6"><?= __('Total') ?></td>
                <td><?= $this->Number->currency($total,"MYR") ?></td>
            </tr>
        </tbody>
    </table>

