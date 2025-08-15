<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppType $appType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List App Type'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="appType form content">
            <?= $this->Form->create($appType) ?>
            <fieldset>
                <legend><?= __('Edit App Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
