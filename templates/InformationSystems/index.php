<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InformationSystem> $informationSystems
 */
?>

<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-2">
                <div class="card-title">
                    <h3 class="">
                        <i class="bi bi-laptop fs-3"></i>&nbsp;Daftar Sistem Informasi
                    </h3>
                </div>
                <div class="card-toolbar">
                    <?= $this->Html->link(
                        '<i class="bi bi-plus-circle"></i> Tambah Sistem',
                        ['action' => 'add'],
                        ['class' => 'btn btn-primary', 'escape' => false]
                    ) ?>
                </div>
            </div>

            <div class="card-body pt-5">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('system_name', 'Nama Sistem') ?></th>
                                <th><?= $this->Paginator->sort('user_id', 'Pengguna') ?></th>
                                <th><?= $this->Paginator->sort('app_type_id', 'Jenis Aplikasi') ?></th>
                                <th><?= $this->Paginator->sort('system_status', 'Status Sistem') ?></th>
                                <th><?= $this->Paginator->sort('document_path', 'Dokumen') ?></th>
                                <th><?= $this->Paginator->sort('is_cicd_pipeline', 'CI/CD?') ?></th>
                                <th><?= $this->Paginator->sort('created_at', 'Dibuat') ?></th>
                                <th><?= $this->Paginator->sort('updated_at', 'Diperbarui') ?></th>
                                <th class="text-center"><?= __('Aksi') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($informationSystems as $informationSystem): ?>
                            <tr>
                                <td><?= h($informationSystem->id) ?></td>
                                <td><?= h($informationSystem->system_name) ?></td>
                                <td>
                                    <?= $informationSystem->hasValue('user') ?
                                        $this->Html->link($informationSystem->user->name, [
                                            'controller' => 'Users', 'action' => 'view', $informationSystem->user->id
                                        ]) : '' ?>
                                </td>
                                <td>
                                    <?= $informationSystem->hasValue('app_type') ?
                                        $this->Html->link($informationSystem->app_type->name, [
                                            'controller' => 'AppTypes', 'action' => 'view', $informationSystem->app_type->id
                                        ]) : '' ?>
                                </td>
                                <td><?= h($informationSystem->system_status) ?></td>
                                <td><?= h($informationSystem->document_path) ?></td>
                                <td><?= $informationSystem->is_cicd_pipeline ? 'Ya' : 'Tidak' ?></td>
                                <td><?= h($informationSystem->created_at) ?></td>
                                <td><?= h($informationSystem->updated_at) ?></td>
                                <td class="text-center">
                                    <?= $this->Html->link('<i class="bi bi-eye"></i>', ['action' => 'view', $informationSystem->id], [
                                        'class' => 'btn btn-sm btn-info', 'escape' => false, 'title' => 'Lihat'
                                    ]) ?>
                                    <?= $this->Html->link('<i class="bi bi-pencil"></i>', ['action' => 'edit', $informationSystem->id], [
                                        'class' => 'btn btn-sm btn-warning', 'escape' => false, 'title' => 'Edit'
                                    ]) ?>
                                    <?= $this->Form->postLink('<i class="bi bi-trash"></i>', ['action' => 'delete', $informationSystem->id], [
                                        'class' => 'btn btn-sm btn-danger',
                                        'escape' => false,
                                        'title' => 'Hapus',
                                        'confirm' => __('Yakin ingin menghapus {0}?', $informationSystem->system_name)
                                    ]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="paginator mt-3">
                    <ul class="pagination justify-content-center">
                        <?= $this->Paginator->first('<< ' . __('Pertama')) ?>
                        <?= $this->Paginator->prev('< ' . __('Sebelumnya')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('Berikutnya') . ' >') ?>
                        <?= $this->Paginator->last(__('Terakhir') . ' >>') ?>
                    </ul>
                    <p class="text-center">
                        <?= $this->Paginator->counter(
                            __('Halaman {{page}} dari {{pages}}, menampilkan {{current}} dari total {{count}} data')
                        ) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
