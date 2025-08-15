<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IndikatorKinerja $indikatorKinerja
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $indikatorKinerja->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $indikatorKinerja->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Indikator Kinerja'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="indikatorKinerja form content">
            <?= $this->Form->create($indikatorKinerja) ?>
            <fieldset>
                <legend><?= __('Edit Indikator Kinerja') ?></legend>
                <?php
                    echo $this->Form->control('no_sk');
                    echo $this->Form->control('judul_sk');
                    echo $this->Form->control('tanggal_sk', ['empty' => true]);
                    echo $this->Form->control('unit_pengusul');
                    echo $this->Form->control('nip');
                    echo $this->Form->control('nama');
                    echo $this->Form->control('posisi');
                    echo $this->Form->control('kode_indikator');
                    echo $this->Form->control('status_sk');
                    echo $this->Form->control('jenis_penugasan');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
