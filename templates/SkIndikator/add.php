<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SkIndikator $skIndikator
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sk Indikator'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="skIndikator form content">
            <?= $this->Form->create($skIndikator) ?>
            <fieldset>
                <legend><?= __('Add Sk Indikator') ?></legend>
                <?php
                    echo $this->Form->control('nip');
                    echo $this->Form->control('nama');
                    echo $this->Form->control('posisi');
                    echo $this->Form->control('kode_indikator');
                    echo $this->Form->control('tahun');
                    echo $this->Form->control('jumlah_sk');
                    echo $this->Form->control('status');
                    echo $this->Form->control('jenis_penugasan');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
