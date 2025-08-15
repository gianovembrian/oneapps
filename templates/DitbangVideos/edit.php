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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ditbangVideo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ditbangVideo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ditbang Videos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ditbangVideos form content">
            <?= $this->Form->create($ditbangVideo) ?>
            <fieldset>
                <legend><?= __('Edit Ditbang Video') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('file');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
