<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DitbangVideo $ditbangVideo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ditbang Video'), ['action' => 'edit', $ditbangVideo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ditbang Video'), ['action' => 'delete', $ditbangVideo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ditbangVideo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ditbang Videos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ditbang Video'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ditbangVideos view content">
            <h3><?= h($ditbangVideo->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($ditbangVideo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($ditbangVideo->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('File') ?></th>
                    <td><?= h($ditbangVideo->file) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($ditbangVideo->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
