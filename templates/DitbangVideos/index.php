<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DitbangVideo> $ditbangVideos
 */
?>
<div class="ditbangVideos index content">
    <?= $this->Html->link(__('New Ditbang Video'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ditbang Videos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('file') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ditbangVideos as $ditbangVideo): ?>
                <tr>
                    <td><?= h($ditbangVideo->id) ?></td>
                    <td><?= h($ditbangVideo->title) ?></td>
                    <td><?= h($ditbangVideo->file) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ditbangVideo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ditbangVideo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ditbangVideo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ditbangVideo->id)]) ?>
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
