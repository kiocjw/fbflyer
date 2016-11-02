<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $voucher->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $voucher->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vouchers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Deals'), ['controller' => 'Deals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deal'), ['controller' => 'Deals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vouchers form large-9 medium-8 columns content">
    <?= $this->Form->create($voucher) ?>
    <fieldset>
        <legend><?= __('Edit Voucher') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('status');
            echo $this->Form->input('deals_id', ['options' => $deals]);
            echo $this->Form->input('users_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
