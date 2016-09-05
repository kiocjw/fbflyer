<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Merchants Deal'), ['action' => 'edit', $merchantsDeal->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Merchants Deal'), ['action' => 'delete', $merchantsDeal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantsDeal->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Merchants Deals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchants Deal'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Deals'), ['controller' => 'Deals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deal'), ['controller' => 'Deals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="merchantsDeals view large-9 medium-8 columns content">
    <h3><?= h($merchantsDeal->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Merchant') ?></th>
            <td><?= $merchantsDeal->has('merchant') ? $this->Html->link($merchantsDeal->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantsDeal->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Deal') ?></th>
            <td><?= $merchantsDeal->has('deal') ? $this->Html->link($merchantsDeal->deal->title, ['controller' => 'Deals', 'action' => 'view', $merchantsDeal->deal->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchantsDeal->id) ?></td>
        </tr>
    </table>
</div>
