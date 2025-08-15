<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-2">
                <div class="card-title">
                    <h2 class=""><?= __('Edit Role') ?></h2>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end">
                        <?= $this->Html->link(__('Kembali ke Daftar Role'), ['action' => 'index'], ['class' => 'btn btn-light-primary btn-sm']) ?>
                        <?= $this->Form->postLink(
                            __('Hapus Role'),
                            ['action' => 'delete', $role->id],
                            [
                                'confirm' => __('Apakah Anda yakin ingin menghapus Role dengan ID # {0}?', $role->id),
                                'class' => 'btn btn-danger btn-sm ms-3'
                            ]
                        ) ?>
                    </div>
                </div>
            </div>

            <div class="card-body pt-15">
                <?= $this->Form->create($role, ['class' => 'form']) ?>
                <fieldset>
                    <legend class="text-muted fw-bold fs-6"><?= __('Ubah Informasi Role') ?></legend>
                    <div class="mb-10">
                        <?= $this->Form->control('name', [
                            'class' => 'form-control form-control-solid',
                            'label' => ['class' => 'form-label fw-bold', 'text' => __('Nama Role')],
                            'placeholder' => __('Masukkan Nama Role'),
                        ]) ?>
                    </div>
                </fieldset>
                <div class="d-flex justify-content-end">
                    <?= $this->Form->button(__('Simpan Perubahan'), ['class' => 'btn btn-primary btn-sm']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
