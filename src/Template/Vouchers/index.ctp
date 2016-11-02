<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Voucher'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Deals'), ['controller' => 'Deals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deal'), ['controller' => 'Deals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vouchers index large-9 medium-8 columns content">
    <h3><?= __('Vouchers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deals_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vouchers as $voucher): ?>
            <tr>
                <td><?= $this->Number->format($voucher->id) ?></td>
                <td><?= h($voucher->code) ?></td>
                <td><?= h($voucher->created) ?></td>
                <td><?= h($voucher->modified) ?></td>
                <td><?= $this->Number->format($voucher->status) ?></td>
                <td><?= $voucher->has('deal') ? $this->Html->link($voucher->deal->title, ['controller' => 'Deals', 'action' => 'view', $voucher->deal->id]) : '' ?></td>
                <td><?= $this->Number->format($voucher->users_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $voucher->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $voucher->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $voucher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $voucher->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
