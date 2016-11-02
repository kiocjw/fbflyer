<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Voucher'), ['action' => 'edit', $voucher->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Voucher'), ['action' => 'delete', $voucher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $voucher->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vouchers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Voucher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Deals'), ['controller' => 'Deals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deal'), ['controller' => 'Deals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vouchers view large-9 medium-8 columns content">
    <h3><?= h($voucher->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($voucher->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deal') ?></th>
            <td><?= $voucher->has('deal') ? $this->Html->link($voucher->deal->title, ['controller' => 'Deals', 'action' => 'view', $voucher->deal->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($voucher->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($voucher->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Users Id') ?></th>
            <td><?= $this->Number->format($voucher->users_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($voucher->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($voucher->modified) ?></td>
        </tr>
    </table>
</div>
