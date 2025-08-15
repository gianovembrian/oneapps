<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-2">
                <div class="card-title">
                    <h3 class="">
                        <i class="bi bi-laptop fs-3"></i>&nbsp;Detail Daftar Sistem Informasi
                    </h3>
                </div>
            </div>

            <div class="card-body pt-5">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">

                        <!-- Nama Sistem Informasi -->
                        <div class="d-flex flex-column mb-5 pt-10 fv-row">
                            <label class="fs-5 fw-bold mb-2">Nama Sistem Informasi</label>
                            <div class="form-control form-control-solid">
                                <?= h($listSisfo->system_name) ?>
                            </div>
                        </div>

                        <!-- URL (DNS) -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">URL (DNS)</label>
                            <div class="form-control form-control-solid">
                                <?= h($listSisfo->domain) ?>
                            </div>
                        </div>

                        <!-- Deskripsi Sistem -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">Deskripsi Sistem</label>
                            <div class="form-control form-control-solid">
                                <?= nl2br(h($listSisfo->description)) ?>
                            </div>
                        </div>

                        <!-- Tipe Sistem Informasi -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">Tipe Sistem Informasi</label>
                            <div class="form-control form-control-solid">
                                <?= h($appTypes[$listSisfo->app_type_id] ?? 'Tidak Diketahui') ?>
                            </div>
                        </div>

                        <!-- Status Pengembangan -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">Status Pengembangan</label>
                            <div class="form-control form-control-solid">
                                <?= h($listSisfo->dev_status) ?>
                            </div>
                        </div>

                        <!-- Alamat IP -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">Alamat IP</label>
                            <div class="form-control form-control-solid">
                                <?= h($listSisfo->ip_address) ?>
                            </div>
                        </div>

                        <!-- Bahasa Pemrograman -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">Bahasa Pemrograman</label>
                            <div class="form-control form-control-solid">
                                <?= h($listSisfo->program_lang) ?>
                                <?php if ($listSisfo->program_lang == 'lainnya' && !empty($listSisfo->other_program_lang)): ?>
                                    (<?= h($listSisfo->other_program_lang) ?>)
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Versi Bahasa Pemrograman -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">Versi Bahasa Pemrograman</label>
                            <div class="form-control form-control-solid">
                                <?= h($listSisfo->program_lang_ver) ?>
                            </div>
                        </div>

                        <!-- Framework -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">Framework</label>
                            <div class="form-control form-control-solid">
                                <?= h($listSisfo->framework) ?>
                            </div>
                        </div>

                        <!-- DBMS -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">DBMS</label>
                            <div class="form-control form-control-solid">
                                <?= h($listSisfo->dbms) ?>
                                <?php if ($listSisfo->dbms == 'Others' && !empty($listSisfo->other_dbms)): ?>
                                    (<?= h($listSisfo->other_dbms) ?>)
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Pengembang -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">Pengembang</label>
                            <div class="form-control form-control-solid">
                                <?= h($listSisfo->developer) ?>
                            </div>
                        </div>

                        <!-- Status Sistem -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">Status Sistem</label>
                            <div class="form-control form-control-solid">
                                <?= $listSisfo->is_active == 1 ? 'Aktif' : 'Tidak Aktif' ?>
                            </div>
                        </div>

                        <!-- Dokumen Section -->
                       <!-- Status Sistem -->

                       <!-- Dokumen Section -->
                       <div class="d-flex flex-column mb-5 fv-row">
                        <label class="fs-5 fw-bold mb-2">Dokumen</label>
                        <div>
                            <?php if (!empty($listSisfo->listsisfo_files)): ?>
                                <?php foreach ($listSisfo->listsisfo_files as $file): ?>
                                    <div class="mb-2">
                                        <?= $this->Html->link(
                                            '<i class="fas fa-download"></i> ' ,
                                            ['controller' => 'listSisfo', 'action' => 'download', $file->id],
                                            ['class' => 'btn btn-sm btn-light-info', 'escape' => false]
                                        ) ?> :
                                        <?= $file->file_name ?> 

                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="text-muted">No File</div>
                            <?php endif; ?>
                        </div>
                    </div>


                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" onclick="window.history.back();"><?= __('Kembali') ?></button>
                            <a href="/listSisfo/edit/<?= $listSisfo->id ?>" type="button" class="btn btn-warning" ><?= __('Ubah Data') ?></a>
                        </div>

                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>
