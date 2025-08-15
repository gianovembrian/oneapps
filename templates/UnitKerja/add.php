<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnitKerja $unitKerja
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Unit Kerja'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="unitKerja form content">
            <?= $this->Form->create($unitKerja) ?>
            <fieldset>
                <legend><?= __('Add Unit Kerja') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('code');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
