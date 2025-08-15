<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\IndikatorKinerja> $indikatorKinerja
 */
?>
<div class="indikatorKinerja index content">
    <?= $this->Html->link(__('New Indikator Kinerja'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Indikator Kinerja') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('no_sk') ?></th>
                    <th><?= $this->Paginator->sort('tanggal_sk') ?></th>
                    <th><?= $this->Paginator->sort('unit_pengusul') ?></th>
                    <th><?= $this->Paginator->sort('nip') ?></th>
                    <th><?= $this->Paginator->sort('nama') ?></th>
                    <th><?= $this->Paginator->sort('posisi') ?></th>
                    <th><?= $this->Paginator->sort('kode_indikator') ?></th>
                    <th><?= $this->Paginator->sort('status_sk') ?></th>
                    <th><?= $this->Paginator->sort('jenis_penugasan') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($indikatorKinerja as $indikatorKinerja): ?>
                <tr>
                    <td><?= h($indikatorKinerja->id) ?></td>
                    <td><?= h($indikatorKinerja->no_sk) ?></td>
                    <td><?= h($indikatorKinerja->tanggal_sk) ?></td>
                    <td><?= h($indikatorKinerja->unit_pengusul) ?></td>
                    <td><?= h($indikatorKinerja->nip) ?></td>
                    <td><?= h($indikatorKinerja->nama) ?></td>
                    <td><?= h($indikatorKinerja->posisi) ?></td>
                    <td><?= $indikatorKinerja->kode_indikator === null ? '' : $this->Number->format($indikatorKinerja->kode_indikator) ?></td>
                    <td><?= h($indikatorKinerja->status_sk) ?></td>
                    <td><?= h($indikatorKinerja->jenis_penugasan) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $indikatorKinerja->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $indikatorKinerja->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $indikatorKinerja->id], ['confirm' => __('Are you sure you want to delete # {0}?', $indikatorKinerja->id)]) ?>
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
