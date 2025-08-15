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
                    <h2 class=""><?= __('Tambah Role') ?></h2>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end">
                        <?= $this->Html->link(__('Kembali ke Daftar Role'), ['action' => 'index'], ['class' => 'btn btn-light-primary btn-sm']) ?>
                    </div>
                </div>
            </div>

            <div class="card-body pt-15">
                <?= $this->Form->create($role, ['class' => 'form']) ?>
                <fieldset>
                    <div class="mb-10 col-md-5">
                        <?= $this->Form->control('name', [
                            'class' => 'form-control form-control-solid',
                            'label' => ['class' => 'form-label fw-bold', 'text' => __('Nama Role')],
                            'placeholder' => __('Masukkan Nama Role'),
                        ]) ?>
                    </div>
                </fieldset>
                <div class="d-flex justify-content-end">
                    <?= $this->Form->button(__('Simpan'), ['class' => 'btn btn-primary btn-sm']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
