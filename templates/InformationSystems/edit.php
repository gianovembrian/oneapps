<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformationSystem $informationSystem
 * @var string[]|\Cake\Collection\CollectionInterface $appTypes
 * @var string[]|\Cake\Collection\CollectionInterface $programmingLanguages
 * @var string[]|\Cake\Collection\CollectionInterface $frameworks
 * @var string[]|\Cake\Collection\CollectionInterface $dbms
 * @var string[]|\Cake\Collection\CollectionInterface $containerTechnologies
 * @var string[]|\Cake\Collection\CollectionInterface $devopsTools
 * @var string[]|\Cake\Collection\CollectionInterface $securityTools
 * @var string[]|\Cake\Collection\CollectionInterface $webServers
 */
?>
<!-- CSS: Select2 & Font Awesome -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
    .form-control-solid {
        background-color: #fff;
        border: 1px solid #e7eaef;
        transition: all 0.2s ease-in-out;
    }

    .form-control-solid:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .15);
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #0d6efd;
        margin-bottom: .8rem;
    }

    .detail-item {
        transition: box-shadow .15s ease;
    }

    .detail-item:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
    }
</style>

<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <?= $this->Form->create($informationSystem, ['id' => 'form-head']) ?>
        <div class="row">
            <!-- CARD 1: Informasi Utama -->
            <div class="col-md-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header border-2 d-flex justify-content-between align-items-center">
                        <h3 class="card-title m-0">
                            <i class="fa-solid fa-edit me-2"></i>Edit Sistem Informasi: <?= h($informationSystem->system_name) ?>
                        </h3>
                    </div>

                    <div class="card-body pt-4">
                        <fieldset>
                            <h4 class="section-title"><i class="fa-solid fa-circle-info me-2 mb-6 mt-6"></i>Informasi Utama Sistem</h4>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <?= $this->Form->control('system_name', ['class' => 'form-control', 'label' => 'Nama Sistem Informasi (Utama)']) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $this->Form->control('repo_url', ['class' => 'form-control', 'label' => 'Repository URL']) ?>
                                </div>
                                <div class="col-12">
                                    <?= $this->Form->control('description', ['class' => 'form-control', 'rows' => 3, 'label' => 'Deskripsi Sistem']) ?>
                                </div>
                                <div class="col-md-4">
                                    <?= $this->Form->control('app_type_id', ['options' => $appTypes, 'class' => 'form-select select2-single', 'label' => 'Jenis Sistem']) ?>
                                </div>
                                <div class="col-md-4">
                                    <?= $this->Form->control('dev_status', ['options' => ['Development' => 'Development', 'Staging' => 'Staging', 'Production' => 'Production'], 'empty' => '-- Pilih --', 'class' => 'form-select select2-single', 'label' => 'Status Pengembangan']) ?>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <div class="form-check mt-3">
                                        <?= $this->Form->checkbox('is_cicd_pipeline', ['class' => 'form-check-input']) ?>
                                        <label class="form-check-label">CI/CD Pipeline integrated</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>

            <!-- CARD 2: Detail Sistem -->
            <div class="col-md-12">
                <div class="card" id="detail-section">
                    <div class="card-header border-2 d-flex justify-content-between align-items-center">
                        <h3 class="card-title m-0">
                            Detail Aplikasi
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="details-wrapper">
                            <?php foreach ($informationSystem->information_system_details as $index => $detail) : ?>
                            <div class="detail-item border rounded p-4 mb-4 bg-white">
                                <?= $this->Form->hidden("information_system_details.{$index}.id") ?>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <?= $this->Form->control("information_system_details.{$index}.system_name", ['class' => 'form-control form-control-solid', 'label' => 'Judul Sub Sistem']) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?= $this->Form->control("information_system_details.{$index}.app_type_id", ['options' => $appTypes, 'class' => 'form-select form-control-solid select2-single', 'label' => 'Tipe Aplikasi', 'empty' => '-- Pilih --']) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?= $this->Form->control("information_system_details.{$index}.dev_status", ['options' => ['Development' => 'Development', 'Staging' => 'Staging', 'Production' => 'Production'], 'empty' => '-- Pilih --', 'class' => 'form-select form-control-solid select2-single', 'label' => 'Status Pengembangan']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $this->Form->control("information_system_details.{$index}.ip_address", ['class' => 'form-control form-control-solid', 'label' => 'IP Address']) ?>
                                    </div>

                                    <div class="col-12 mt-2"><strong>Backend</strong></div>
                                    <div class="col-md-3">
                                        <?= $this->Form->control("information_system_details.{$index}.backend_programming_language_id", ['options' => $programmingLanguages, 'class' => 'form-select form-control-solid select2-single', 'label' => 'Bahasa Backend', 'empty' => '-- Pilih --']) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?= $this->Form->control("information_system_details.{$index}.backend_program_lang_ver", ['class' => 'form-control form-control-solid', 'label' => 'Versi Bahasa']) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?= $this->Form->control("information_system_details.{$index}.framework_backend", ['options' => $frameworks, 'class' => 'form-select form-control-solid select2-single', 'label' => 'Framework Backend', 'empty' => '-- Pilih --']) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?= $this->Form->control("information_system_details.{$index}.framework_backend_ver", ['class' => 'form-control form-control-solid', 'label' => 'Versi Framework']) ?>
                                    </div>

                                    <div class="col-12 mt-2"><strong>Frontend</strong></div>
                                    <div class="col-md-3">
                                         <?= $this->Form->control("information_system_details.{$index}.frontend_programming_language_id", ['options' => $programmingLanguages, 'class' => 'form-select form-control-solid select2-single', 'label' => 'Bahasa Frontend', 'empty' => '-- Pilih --']) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?= $this->Form->control("information_system_details.{$index}.frontend_program_lang_ver", ['class' => 'form-control form-control-solid', 'label' => 'Versi Bahasa']) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?= $this->Form->control("information_system_details.{$index}.framework_frontend", ['options' => $frameworks, 'class' => 'form-select form-control-solid select2-single', 'label' => 'Framework Frontend', 'empty' => '-- Pilih --']) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?= $this->Form->control("information_system_details.{$index}.framework_frontend_ver", ['class' => 'form-control form-control-solid', 'label' => 'Versi Framework']) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?= $this->Form->control("information_system_details.{$index}.other_program_lang", ['class' => 'form-control form-control-solid', 'label' => 'Bahasa Lainnya']) ?>
                                    </div>

                                    <div class="col-12 mt-2"><strong>Database</strong></div>
                                    <div class="col-md-4">
                                        <?= $this->Form->control("information_system_details.{$index}.dbms_id", ['options' => $dbms, 'class' => 'form-select form-control-solid select2-single', 'label' => 'DBMS', 'empty' => '-- Pilih --']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $this->Form->control("information_system_details.{$index}.dbms_ver", ['class' => 'form-control form-control-solid', 'label' => 'Versi DBMS']) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $this->Form->control("information_system_details.{$index}.other_dbms", ['class' => 'form-control form-control-solid', 'label' => 'DBMS Lainnya']) ?>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <?= $this->Form->control("information_system_details.{$index}.container_tech_id", ['options' => $containerTechnologies, 'class' => 'form-select form-control-solid select2-multiple', 'multiple' => true, 'label' => 'Container Tools']) ?>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <?= $this->Form->control("information_system_details.{$index}.devops_tool_id", ['options' => $devopsTools, 'class' => 'form-select form-control-solid select2-multiple', 'multiple' => true, 'label' => 'DevOps Tools']) ?>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <?= $this->Form->control("information_system_details.{$index}.security_tool_id", ['options' => $securityTools, 'class' => 'form-select form-control-solid select2-multiple', 'multiple' => true, 'label' => 'Security Tools']) ?>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <?= $this->Form->control("information_system_details.{$index}.web_server_id", ['options' => $webServers, 'class' => 'form-select form-control-solid select2-single', 'label' => 'Web Server', 'empty' => '-- Pilih --']) ?>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <?= $this->Form->control("information_system_details.{$index}.developer", ['class' => 'form-control form-control-solid', 'label' => 'Pengembang']) ?>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <?= $this->Form->control("information_system_details.{$index}.pic", ['class' => 'form-control form-control-solid', 'label' => 'PIC']) ?>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <?= $this->Form->control("information_system_details.{$index}.description", ['class' => 'form-control form-control-solid', 'rows' => 3, 'label' => 'Deskripsi Detail']) ?>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <?= $this->Form->control("information_system_details.{$index}.is_active", ['type' => 'radio', 'options' => [1 => 'Aktif', 0 => 'Tidak Aktif'], 'label' => 'Status Sistem']) ?>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <?= $this->Form->control("information_system_details.{$index}.domain", ['class' => 'form-control form-control-solid', 'label' => 'DNS / Domain']) ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="text-end mt-4">
                            <?= $this->Form->button(__('Simpan Perubahan'), ['class' => 'btn btn-success px-5']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<!-- JS: jQuery & Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function() {
        $('.select2-single').select2({
            theme: 'bootstrap4',
            allowClear: true
        });
        $('.select2-multiple').select2({
            theme: 'bootstrap4',
            allowClear: true
        });
    });
</script>
