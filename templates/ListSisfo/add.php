<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ListSisfo $listSisfo
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>

<!-- Include jQuery (if not already included) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Include select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<style>
    /* Adjust the height and padding for select2 and the icon */
    .input-group-select2 {
        display: flex;
        align-items: center;
    }

    .input-group-select2 .input-group-text {
        height: 38px; /* Same height as the select2 field */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.375rem 0.75rem;
    }

    /* Fix select2 height to match input-group-text */
    .select2-container .select2-selection--single {
        height: 38px !important; /* Adjust to match the icon's height */
        padding: 0.375rem 0.75rem !important;
        display: flex;
        align-items: center;
    }

    /* Ensure select2 input field is aligned */
    .select2-selection__rendered {
        line-height: 2.2 !important; /* Adjust to center text vertically */
    }
</style>

<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-2">
                <div class="card-title">
                    <h3 class="">
                        <i class="bi bi-laptop fs-3"></i>&nbsp;Tambah Daftar Sistem Informasi
                    </h3>
                </div>
            </div>

            <div class="card-body pt-5">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <?= $this->Form->create($listSisfo, ['enctype' => 'multipart/form-data', 'class' => 'form']) ?>


                        <?php
                            echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => $identity->id]);
                            echo $this->Form->control('unit_kerja_id', ['type' => 'hidden', 'value' => $identity->unit_kerja_id]);
                        ?>
                        <!-- <input type="hidden" name="user_id" value="<?=$identity->id?>"> -->
                        <!-- <input type="hidden" name="unit_kerja_id" value="<?=$identity->unit_kerja_id?>"> -->

                        <div class="d-flex flex-column mb-5 pt-10 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Nama Sistem Informasi</label>
                            <div class="d-flex align-items-center">
                                <input type="text" id="system_name" class="form-control form-control-solid" placeholder="Nama Sistem Informasi" name="system_name">
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="required fs-5 fw-bold mb-2">URL (DNS)</label>
                            <div class="d-flex align-items-center">
                                <input type="text" id="domain" class="form-control form-control-solid" placeholder="Masukan alamat Domain" name="domain">
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-5 fv-row">
                            <?= $this->Form->label('description', __('Deskripsi Sistem'), ['class' => 'required fs-5 fw-bold mb-2']) ?>
                            <?= $this->Form->control('description', [
                                'type' => 'textarea',
                                'class' => 'form-control form-control-solid',
                                'label' => false,
                                'placeholder' => __('Deskripsi'),
                                'rows' => 3
                            ]) ?>
                        </div>


                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Tipe Sistem Informasi</label>
                            <div class="d-flex align-items-center">
                               <span class="input-group-text bg-white" style="height: auto;">
                                <i class="bi bi-code-slash"></i>
                            </span>
                            <select id="app_type_id" name="app_type_id" class="form-select">
                                <option value="" disabled selected>-- Pilih Tipe Sistem --</option>
                                <?php foreach ($appTypes as $key => $value): ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-column mb-5 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Status Pengembangan</label>
                        <div class="d-flex align-items-center">
                            <span class="input-group-text bg-white" style="height: auto;">
                                <i class="bi bi-gear"></i>
                            </span>
                            <select id="dev_status" class="form-select form-control-solid" name="dev_status">
                                <option value="" disabled selected>-- Pilih Status Pengembangan --</option>
                                <option value="Development">Development</option>
                                <option value="Deployment">Deployment</option>
                                <option value="Production">Production</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-column mb-5 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Alamat IP</label>
                        <div class="d-flex align-items-center">
                            <input type="text" id="ip_part1" class="form-control form-control-solid text-center" maxlength="3" placeholder="0" style="width: 100px;">
                            <span class="mx-1">.</span>

                            <input type="text" id="ip_part2" class="form-control form-control-solid text-center" maxlength="3" placeholder="0" style="width: 100px;">
                            <span class="mx-1">.</span>

                            <input type="text" id="ip_part3" class="form-control form-control-solid text-center" maxlength="3" placeholder="0" style="width: 100px;">
                            <span class="mx-1">.</span>

                            <input type="text" id="ip_part4" class="form-control form-control-solid text-center" maxlength="3" placeholder="0" style="width: 100px;">
                        </div>
                        <div id="ip-error" class="text-danger mt-2" style="display: none;">Alamat IP tidak valid.</div>
                        <input type="hidden" id="ip_address" name="ip_address">
                    </div>

                    <div class="d-flex flex-column mb-5 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Bahasa Pemrograman</label>
                        <div class="d-flex align-items-center">
                            <span class="input-group-text bg-white" style="height: auto;">
                                <i class="bi bi-code-slash"></i>
                            </span>
                            <select id="program_lang" class="form-select form-control-solid" name="program_lang">
                                <option value="" disabled selected>-- Pilih Bahasa Pemrograman --</option>
                                <option value="Python">Python</option>
                                <option value="JavaScript">JavaScript</option>
                                <option value="Java">Java</option>
                                <option value="Java">Dart</option>
                                <option value="C#">C#</option>
                                <option value="C++">C++</option>
                                <option value="TypeScript">TypeScript</option>
                                <option value="PHP">PHP</option>
                                <option value="Swift">Swift</option>
                                <option value="Ruby">Ruby</option>
                                <option value="Go">Go</option>
                                <option value="lainnya">Lainnya</option> 
                            </select>
                        </div>
                    </div>

                    <div class="flex-column mb-5 fv-row" id="other-lang-container" style="display: none;">
                        <div class="d-flex align-items-center">
                            <input type="text" id="other_program_lang" class="form-control form-control-solid" placeholder="Masukkan Bahasa Pemrograman Lainnya" name="other_program_lang">
                        </div>
                    </div>

                    <div class="d-flex flex-column mb-5 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Versi Bahasa Pemrograman</label>
                        <div class="d-flex align-items-center">

                            <input type="text" id="program_lang_ver" class="form-control form-control-solid" placeholder="Masukkan Versi Bahasa Pemrograman" name="program_lang_ver">
                        </div>
                    </div>
                    <!-- Framework -->
                    <div class="d-flex flex-column mb-5 fv-row">
                        <?= $this->Form->label('framework', __('Framework'), ['class' => ' fs-5 fw-bold mb-2']) ?>
                        <?= $this->Form->control('framework', [
                            'class' => 'form-control form-control-solid',
                            'label' => false,
                            'placeholder' => __('Nama Framework')
                        ]) ?>
                    </div>

                    <!-- DBMS Selection -->
                    <div class="d-flex flex-column mb-5 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Database Management System</label>
                        <div class="d-flex align-items-center">
                            <span class="input-group-text bg-white" style="height: auto;">
                                <i class="bi bi-server"></i>
                            </span>
                            <select id="dbms" class="form-select form-control-solid" name="dbms">
                                <option value="" disabled selected>-- Pilih DBMS --</option>
                                <option value="MySQL">MySQL</option>
                                <option value="PostgreSQL">PostgreSQL</option>
                                <option value="Oracle">Oracle</option>
                                <option value="Microsoft SQL Server">Microsoft SQL Server</option>
                                <option value="MongoDB">MongoDB</option>
                                <option value="SQLite">SQLite</option>
                                <option value="MariaDB">MariaDB</option>
                                <option value="IBM Db2">IBM Db2</option>
                                <option value="Amazon Aurora">Amazon Aurora</option>
                                <option value="Redis">Redis</option>
                                <option value="Others">Lainnya</option>
                            </select>
                        </div>

                        <div id="other-dbms-container" class="align-items-center mt-3" style="display: none;">
                            <input type="text" id="other_dbms" class="form-control form-control-solid" placeholder="Masukkan DBMS Lainnya" name="other_dbms">
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#dbms').on('change', function() {
                                if ($(this).val() === 'Others') {
                                    $('#other-dbms-container').show();
                                } else {
                                    $('#other-dbms-container').hide();
                                    $('#other_dbms').val('');
                                }
                            });
                        });
                    </script>

                    <!-- Developer -->
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
                        <label class="required fs-5 fw-bold mb-2">Upload Dokumen (PDF)</label>
                        <div class="d-flex align-items-center">
                            <input type="file" id="documents" name="documents[]" class="form-control form-control-solid" multiple accept=".pdf">
                        </div>
                        <small class="text-muted">Hanya file PDF, maksimal 5MB per file.</small>
                        <div id="file-error" class="text-danger mt-2" style="display: none;">Terdapat file yang tidak valid atau melebihi ukuran maksimal.</div>
                    </div>


                    <div class="d-flex flex-column mb-5 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Status Sistem</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="is_active" id="status_aktif" value="1">
                                <label class="form-check-label" for="status_aktif">Aktif</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_active" id="status_tidak_aktif" value="2">
                                <label class="form-check-label" for="status_tidak_aktif">Tidak Aktif</label>
                            </div>
                        </div>
                    </div>
                    <hr />

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                         <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-default" onclick="window.location.href='/listSisfo'">
                                <?= __('Cancel') ?>
                            </button>
                        </div>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
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
    $(document).ready(function() {
        $('#program_lang').select2({
            placeholder: "-- Pilih Bahasa Pemrograman --",
            allowClear: true,
            width: '100%' 
        });

        $('#app_type_id').select2({
            placeholder: "-- Pilih Tipe Sistem --",
            allowClear: true,
            width: '100%' 
        });

        $('#dev_status').select2({
            placeholder: "-- Pilih Status Pengembangan --",
            allowClear: true,
            width: 'resolve'
        });


        $('#dbms').select2({
            placeholder: "-- Pilih DBMS --",
            allowClear: true,
            width: 'resolve'
        });

         // Regular expression for validating IP address
        const ipRegex = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;

      // Function to update the hidden IP address field
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
         // Hide the 'Bahasa Lainnya' input field initially

        // Listen for changes on the 'program_lang' dropdown
        $('#program_lang').on('change', function() {
            if ($(this).val() === 'lainnya') {
                // Show the additional input for "Other"
                $('#other-lang-container').slideDown();
                $('#other-lang-container').show();
            } else {
                // Hide the additional input if "Other" is not selected
                $('#other-lang-container').slideUp();
                $('#other-lang-container').hide();
            }
        });


    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#documents').on('change', function() {
        let files = this.files;
        let valid = true;
        let errorMessage = '';

        for (let i = 0; i < files.length; i++) {
            if (files[i].type !== 'application/pdf') {
                valid = false;
                errorMessage = 'Hanya file PDF yang diperbolehkan.';
                break;
            }
            if (files[i].size > 5 * 1024 * 1024) { // 5MB
                valid = false;
                errorMessage = 'Ukuran setiap file tidak boleh lebih dari 5MB.';
                break;
            }
        }

        if (!valid) {
            $('#file-error').text(errorMessage).show();
            $(this).val(''); // Reset file input
        } else {
            $('#file-error').hide();
        }
    });
});

</script>
