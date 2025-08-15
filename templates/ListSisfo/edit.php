<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-2">
                <div class="card-title">
                    <h3 class="">
                        <i class="bi bi-laptop fs-3"></i>&nbsp;Edit Daftar Sistem Informasi
                    </h3>
                </div>
            </div>

            <div class="card-body pt-5">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <?= $this->Form->create($listSisfo, ['enctype' => 'multipart/form-data', 'class' => 'form']) ?>

                        <?= $this->Form->control('user_id', ['type' => 'hidden', 'value' => $identity->id]) ?>
                        <?= $this->Form->control('unit_kerja_id', ['type' => 'hidden', 'value' => $identity->unit_kerja_id]) ?>

                        <!-- Nama Sistem Informasi -->
                        <div class="d-flex flex-column mb-5 pt-10 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Nama Sistem Informasi</label>
                            <div class="d-flex align-items-center">
                                <input type="text" id="system_name" class="form-control form-control-solid" placeholder="Nama Sistem Informasi" name="system_name" value="<?= h($listSisfo->system_name) ?>" required>
                            </div>
                        </div>

                        <!-- URL (DNS) -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="required fs-5 fw-bold mb-2">URL (DNS)</label>
                            <div class="d-flex align-items-center">
                                <input type="text" id="domain" class="form-control form-control-solid" placeholder="Masukan alamat Domain" name="domain" value="<?= h($listSisfo->domain) ?>" required>
                            </div>
                        </div>

                        <!-- Deskripsi Sistem -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <?= $this->Form->label('description', __('Deskripsi Sistem'), ['class' => 'required fs-5 fw-bold mb-2']) ?>
                            <?= $this->Form->textarea('description', [
                                'class' => 'form-control form-control-solid',
                                'required' => true,
                                'placeholder' => __('Deskripsi'),
                                'rows' => 3,
                                'value' => h($listSisfo->description)
                            ]) ?>
                        </div>

                        <!-- Tipe Sistem Informasi -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Tipe Sistem Informasi</label>
                            <div class="d-flex align-items-center">
                                <span class="input-group-text bg-white" >
                                    <i class="bi bi-code-slash"></i>
                                </span>
                                <select id="app_type_id" name="app_type_id" class="form-select" required style="height: 35px">
                                    <option value="" disabled>-- Pilih Tipe Sistem --</option>
                                    <?php foreach ($appTypes as $key => $value): ?>
                                        <option value="<?= $key ?>" <?= $key == $listSisfo->app_type_id ? 'selected' : '' ?>>
                                            <?= $value ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Status Pengembangan -->
                        <div class="d-flex flex-column mb-5 fv-row"  >
                            <label class="required fs-5 fw-bold mb-2">Status Pengembangan</label>
                            <div class="d-flex align-items-center">
                                <span class="input-group-text bg-white" >
                                    <i class="bi bi-gear"></i>
                                </span>
                                <select id="dev_status" class="form-select form-control-solid" name="dev_status" required style="height: 35px">
                                    <option value="" disabled>-- Pilih Status Pengembangan --</option>
                                    <option value="Development" <?= $listSisfo->dev_status == 'Development' ? 'selected' : '' ?>>Development</option>
                                    <option value="Deployment" <?= $listSisfo->dev_status == 'Deployment' ? 'selected' : '' ?>>Deployment</option>
                                    <option value="Production" <?= $listSisfo->dev_status == 'Production' ? 'selected' : '' ?>>Production</option>
                                </select>
                            </div>
                        </div>

                        <!-- Alamat IP -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Alamat IP</label>
                            <?php 
                                $ipParts = explode('.', $listSisfo->ip_address);
                                $ipParts = array_pad($ipParts, 4, ''); // Pad to ensure 4 parts
                            ?>
                            <div class="d-flex align-items-center">
                                <input type="text" id="ip_part1" class="form-control form-control-solid text-center" maxlength="3" value="<?= h($ipParts[0]) ?>" style="width: 100px;" required>
                                <span class="mx-1">.</span>
                                <input type="text" id="ip_part2" class="form-control form-control-solid text-center" maxlength="3" value="<?= h($ipParts[1]) ?>" style="width: 100px;" required>
                                <span class="mx-1">.</span>
                                <input type="text" id="ip_part3" class="form-control form-control-solid text-center" maxlength="3" value="<?= h($ipParts[2]) ?>" style="width: 100px;" required>
                                <span class="mx-1">.</span>
                                <input type="text" id="ip_part4" class="form-control form-control-solid text-center" maxlength="3" value="<?= h($ipParts[3]) ?>" style="width: 100px;" required>

                                  <div id="ip-error" class="text-danger mt-2" style="display: none;">Alamat IP tidak valid.</div>
                                 <input type="hidden" id="ip_address" name="ip_address" value="<?=$listSisfo->ip_address?>" required>
                            </div>
                        </div>

                        <!-- Bahasa Pemrograman -->
                        <div class="d-flex flex-column mb-15 fv-row" style="height: 42px">
                            <label class="required fs-5 fw-bold mb-2">Bahasa Pemrograman</label>
                            <select id="program_lang" class="form-select form-control-solid" name="program_lang" required>
                                <option value="" disabled>-- Pilih Bahasa Pemrograman --</option>
                                <option value="Python" <?= $listSisfo->program_lang == 'Python' ? 'selected' : '' ?>>Python</option>
                                <option value="JavaScript" <?= $listSisfo->program_lang == 'JavaScript' ? 'selected' : '' ?>>JavaScript</option>
                                <option value="PHP" <?= $listSisfo->program_lang == 'PHP' ? 'selected' : '' ?>>PHP</option>
                                <option value="lainnya" <?= $listSisfo->program_lang == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
                            </select>
                        </div>

                        <div class="d-flex flex-column mb-5 fv-row" id="other-lang-container" style="display: none;">
                            <div class="d-flex align-items-center">
                                <input type="text" id="other_program_lang" class="form-control form-control-solid" placeholder="Masukkan Bahasa Pemrograman Lainnya" name="other_program_lang" value="<?=$listSisfo->other_program_lang?>">
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Versi Bahasa Pemrograman</label>
                            <div class="d-flex align-items-center">

                                <input type="text" id="program_lang_ver" class="form-control form-control-solid" placeholder="Masukkan Versi Bahasa Pemrograman" name="program_lang_ver" value="<?=$listSisfo->program_lang_ver?>" required>
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-5 fv-row">
                            <?= $this->Form->label('framework', __('Framework'), ['class' => ' fs-5 fw-bold mb-2']) ?>
                            <?= $this->Form->control('framework', [
                                'class' => 'form-control form-control-solid',
                                'label' => false,
                                'placeholder' => __('Nama Framework'),
                                'value' => $listSisfo->framework
                            ]) ?>
                        </div>

                       <?php
                        $dbmsOptions = [
                            '' => '-- Pilih DBMS --',
                            'MySQL' => 'MySQL',
                            'PostgreSQL' => 'PostgreSQL',
                            'Oracle' => 'Oracle',
                            'Microsoft SQL Server' => 'Microsoft SQL Server',
                            'MongoDB' => 'MongoDB',
                            'SQLite' => 'SQLite',
                            'MariaDB' => 'MariaDB',
                            'IBM Db2' => 'IBM Db2',
                            'Amazon Aurora' => 'Amazon Aurora',
                            'Redis' => 'Redis',
                            'Others' => 'Lainnya',
                        ];
                        ?>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <?= $this->Form->label('framework', __('Database Management System'), ['class' => ' fs-5 fw-bold mb-2']) ?>
                            <?= $this->Form->control('dbms', [
                                'type' => 'select',
                                'options' => $dbmsOptions,
                                'default' => $listSisfo->dbms,
                                'label' => false,
                                'required' => true,
                                'class' => 'form-select form-control-solid',
                                'id' => 'dbms-select', // Add an ID for easy targeting in JavaScript
                                'style' => 'height: 42px;' // Set the height to 42px
                                ]) ?>

                            <div class="align-items-center mt-3 other-dbms-container" style="display: <?= $listSisfo->dbms === 'Others' ? 'inline' : 'none' ?>;">
                                <input type="text" id="other_dbms" class="form-control form-control-solid" placeholder="Masukkan DBMS Lainnya" name="other_dbms" value="<?= $listSisfo->other_dbms ?>">
                            </div>
                        </div>
                
                        <div class="d-flex flex-column mb-5 fv-row">
                            <?= $this->Form->label('developer', __('Pengembang'), ['class' => 'required fs-5 fw-bold mb-2']) ?>
                            <div class="pt-1 mb-5"><small><i>Masukan nama unit jika dikembangkan secara mandiri oleh Unit, dan masukan nama pihak ke-3 jika dikembangkan oleh pihak ke-3 contoh : PT.XYZ </i></small>
                                <?= $this->Form->control('developer', [
                                    'class' => 'form-control form-control-solid',
                                    'label' => false,
                                    'placeholder' => __('Nama Pengembang')
                                ]) ?>
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="fs-5 fw-bold mb-2">
                                Upload Dokumen Surat Izin Pengembangan Sistem, Pengajuan Domain dan Dokumen Pendukung Lainnya (PDF)
                            </label>

                            <!-- Container for displaying existing files -->
                            <div id="existing-files-container">
                                <?php if (!empty($listSisfo->listsisfo_files)): ?>
                                    <?php foreach ($listSisfo->listsisfo_files as $file): ?>
                                        <div class="d-flex align-items-center mb-2 col-md-6">
                                            <?= $this->Html->link(
                                                '<i class="bi bi-file-earmark-pdf"></i> ' . h($file->file_name),
                                                ['controller' => 'Listsisfo', 'action' => 'download', $file->id],
                                                ['escape' => false, 'class' => 'btn btn-light-primary']
                                            ) ?>
                                            <button type="button" class="btn btn-light-danger ms-2 remove-existing-file" data-file-id="<?= $file->id ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada file yang diupload.</span>
                                <?php endif; ?>
                            </div>

                            <!-- File upload input container -->
                            <div id="file-upload-container">
                                <div class="d-flex align-items-center mb-2 col-md-4">
                                    <input type="file" name="files[]" accept=".pdf" class="form-control form-control-solid" />
                                    <button type="button" class="btn btn-light-danger ms-2 remove-file" style="display: none;">
                                        <i class="bi bi-trash"></i> 
                                    </button>
                                </div>
                            </div>
                            <button type="button" id="add-file" class="btn btn-light-success mt-5 col-md-2">
                                <i class="bi bi-plus-circle"></i> Tambah
                            </button>
                            <small class="text-muted">Hanya file PDF dengan ukuran maksimal 5MB yang diperbolehkan.</small>
                        </div>

                        <script>
                            $(document).ready(function () {
                                // Add new file input
                                $('#add-file').on('click', function () {
                                    const newFileInput = `
                                    <div class="d-flex align-items-center mb-2 col-md-4">
                                    <input type="file" name="files[]" accept=".pdf" class="form-control form-control-solid" />
                                    <button type="button" class="btn btn-light-danger ms-2 remove-file">
                                    <i class="bi bi-trash"></i> 
                                    </button>
                                    </div>`;
                                    $('#file-upload-container').append(newFileInput);
                                });

                                // Remove file input
                                $(document).on('click', '.remove-file', function () {
                                    $(this).parent().remove();
                                });

                                // Handle existing file removal
                                $(document).on('click', '.remove-existing-file', function () {
                                    const fileId = $(this).data('file-id');
                                    if (confirm('Apakah Anda yakin ingin menghapus file ini?')) {
                                        $.ajax({
                                            url: '<?= $this->Url->build(['controller' => 'ListSisfo', 'action' => 'deleteFile']); ?>',
                                            method: 'POST',
                                            data: { fileId: fileId },
                                            success: function (response) {
                                                if (response.success) {
                                                    alert('File berhasil dihapus.');
                                                    location.reload();
                                                } else {
                                                    alert('Gagal menghapus file.');
                                                }
                                            }
                                        });
                                    }
                                });
                            });
                        </script>


                       <div class="d-flex flex-column mb-5 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Status Sistem</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input 
                                        class="form-check-input" 
                                        type="radio" 
                                        name="is_active" 
                                        id="status_aktif" 
                                        value="1" 
                                        <?= $listSisfo->is_active == 1 ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="status_aktif">Aktif</label>
                                </div>
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="radio" 
                                        name="is_active" 
                                        id="status_tidak_aktif" 
                                        value="2" 
                                        <?= $listSisfo->is_active == 2 ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="status_tidak_aktif">Tidak Aktif</label>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <!-- Tambahan nilai lainnya disesuaikan dengan $listSisfo -->

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-default" onclick="window.location.href='/listSisfo'"><?= __('Kembali') ?></button>
                            <?= $this->Form->button(__('Simpan'), ['class' => 'btn btn-primary']) ?>
                        </div>

                        <?= $this->Form->end() ?>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

     function updateIPAddress() {
            const part1 = $('#ip_part1').val();
            const part2 = $('#ip_part2').val();
            const part3 = $('#ip_part3').val();
            const part4 = $('#ip_part4').val();

            // Combine the parts into a single IP address
            const ipAddress = `${part1}.${part2}.${part3}.${part4}`;
            
            // Update the hidden input field
            $('#ip_address').val(ipAddress);
        }

        // Attach event listener to each IP part input
        $('#ip_part1, #ip_part2, #ip_part3, #ip_part4').on('input', function () {
            updateIPAddress();
        });


    $(document).ready(function () {
    $('#dbms-select').on('change', function () {
        let values = $(this).val();

        if (values === 'Others') {
            console.log('show');
            $('.other-dbms-container').show();
        } else {
            console.log('hide');
            $('.other-dbms-container').hide();
        }
    });

    // Trigger change event on page load to handle default selection
    $('#dbms-select').trigger('change');
});

</script>
