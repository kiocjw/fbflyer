<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="companies view large-9 medium-8 columns content">
    <h3><?= h($company->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Telephone') ?></th>
            <td><?= h($company->telephone) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $company->has('user') ? $this->Html->link($company->user->id, ['controller' => 'Users', 'action' => 'view', $company->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($company->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Company Name') ?></h4>
        <?= $this->Text->autoParagraph(h($company->company_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Brand') ?></h4>
        <?= $this->Text->autoParagraph(h($company->brand)); ?>
    </div>
    <div class="row">
        <h4><?= __('Business Address') ?></h4>
        <?= $this->Text->autoParagraph(h($company->business_address)); ?>
    </div>
    <div class="row">
        <h4><?= __('SSM') ?></h4>
        <?= $this->Text->autoParagraph(h($company->SSM)); ?>
    </div>
    <div class="row">
        <h4><?= __('Business Person In Charge') ?></h4>
        <?= $this->Text->autoParagraph(h($company->business_person_in_charge)); ?>
    </div>
</div>
