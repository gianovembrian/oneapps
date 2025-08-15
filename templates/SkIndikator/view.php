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
            <?= $this->Html->link(__('Edit Sk Indikator'), ['action' => 'edit', $skIndikator->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sk Indikator'), ['action' => 'delete', $skIndikator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skIndikator->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sk Indikator'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sk Indikator'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="skIndikator view content">
            <h3><?= h($skIndikator->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($skIndikator->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nip') ?></th>
                    <td><?= h($skIndikator->nip) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nama') ?></th>
                    <td><?= h($skIndikator->nama) ?></td>
                </tr>
                <tr>
                    <th><?= __('Posisi') ?></th>
                    <td><?= h($skIndikator->posisi) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($skIndikator->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jenis Penugasan') ?></th>
                    <td><?= h($skIndikator->jenis_penugasan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kode Indikator') ?></th>
                    <td><?= $skIndikator->kode_indikator === null ? '' : $this->Number->format($skIndikator->kode_indikator) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tahun') ?></th>
                    <td><?= $skIndikator->tahun === null ? '' : $this->Number->format($skIndikator->tahun) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jumlah Sk') ?></th>
                    <td><?= $skIndikator->jumlah_sk === null ? '' : $this->Number->format($skIndikator->jumlah_sk) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
