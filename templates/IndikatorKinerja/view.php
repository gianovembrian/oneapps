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
            <?= $this->Html->link(__('Edit Indikator Kinerja'), ['action' => 'edit', $indikatorKinerja->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Indikator Kinerja'), ['action' => 'delete', $indikatorKinerja->id], ['confirm' => __('Are you sure you want to delete # {0}?', $indikatorKinerja->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Indikator Kinerja'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Indikator Kinerja'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="indikatorKinerja view content">
            <h3><?= h($indikatorKinerja->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($indikatorKinerja->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('No Sk') ?></th>
                    <td><?= h($indikatorKinerja->no_sk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit Pengusul') ?></th>
                    <td><?= h($indikatorKinerja->unit_pengusul) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nip') ?></th>
                    <td><?= h($indikatorKinerja->nip) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nama') ?></th>
                    <td><?= h($indikatorKinerja->nama) ?></td>
                </tr>
                <tr>
                    <th><?= __('Posisi') ?></th>
                    <td><?= h($indikatorKinerja->posisi) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status Sk') ?></th>
                    <td><?= h($indikatorKinerja->status_sk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jenis Penugasan') ?></th>
                    <td><?= h($indikatorKinerja->jenis_penugasan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kode Indikator') ?></th>
                    <td><?= $indikatorKinerja->kode_indikator === null ? '' : $this->Number->format($indikatorKinerja->kode_indikator) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tanggal Sk') ?></th>
                    <td><?= h($indikatorKinerja->tanggal_sk) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Judul Sk') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($indikatorKinerja->judul_sk)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
