<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AppType> $appType
 */
?>
<div class="appType index content">
    <?= $this->Html->link(__('New App Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('App Type') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appType as $appType): ?>
                <tr>
                    <td><?= h($appType->id) ?></td>
                    <td><?= h($appType->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $appType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appType->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
