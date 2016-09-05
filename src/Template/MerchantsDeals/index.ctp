<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Merchants Deal'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Deals'), ['controller' => 'Deals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deal'), ['controller' => 'Deals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantsDeals index large-9 medium-8 columns content">
    <h3><?= __('Merchants Deals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('merchants_id') ?></th>
                <th><?= $this->Paginator->sort('deals_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchantsDeals as $merchantsDeal): ?>
            <tr>
                <td><?= $this->Number->format($merchantsDeal->id) ?></td>
                <td><?= $merchantsDeal->has('merchant') ? $this->Html->link($merchantsDeal->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantsDeal->merchant->id]) : '' ?></td>
                <td><?= $merchantsDeal->has('deal') ? $this->Html->link($merchantsDeal->deal->title, ['controller' => 'Deals', 'action' => 'view', $merchantsDeal->deal->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $merchantsDeal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchantsDeal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchantsDeal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantsDeal->id)]) ?>
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
