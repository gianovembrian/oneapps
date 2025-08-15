<?php

/**
 * Variabel dari Controller:
 * $appTypes, $programmingLanguages, $frameworks, $dbms,
 * $containerTechnologies, $devopsTools, $securityTools, $webServers
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

    /* Perbaiki tampilan Select2 multiple */
    .select2-container--bootstrap4 .select2-selection--multiple {
        min-height: 38px;
        padding: 2px 6px;
        border-radius: 0.5rem;
        /* lebih rounded */
        border-color: #ced4da;
    }

    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
        background-color: #e9f2ff;
        /* biru soft */
        border: none;
        color: #0d6efd;
        padding: 4px 10px;
        margin-top: 4px;
        margin-right: 4px;
        border-radius: 1rem;
        /* pill */
        font-size: 0.85rem;
    }

    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
        color: #0d6efd;
        margin-right: 4px;
        font-weight: bold;
    }

    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__rendered {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    /* Styling pilihan multiple agar pill & remove icon lebih rapi */
    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
        background-color: #e9f3ff;
        color: #0d6efd;
        border: none;
        border-radius: 50px;
        padding: 4px 8px 4px 28px;
        margin-top: 4px;
        margin-right: 4px;
        position: relative;
        font-size: 0.9rem;
    }

    /* Remove icon */
    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
        position: absolute;
        left: 8px;
        top: 50%;
        transform: translateY(-50%);
        color: #0d6efd;
        background: transparent;
        border: none;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
    }

    /* Hover efek untuk remove icon */
    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: #ff4d4d;
    }
</style>

<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="row">
            <!-- CARD 1: Informasi Utama -->
            <div class="col-md-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header border-2 d-flex justify-content-between align-items-center">
                        <h3 class="card-title m-0">
                            <i class="fa-solid fa-laptop-code me-2"></i>Tambah Daftar Sistem Informasi
                        </h3>
                        <!-- <button type="button" class="btn btn-outline-secondary btn-sm"
                    onclick="window.location.href='<?= $this->Url->build(['controller' => 'InformationSystems', 'action' => 'index']) ?>'">
                    <i class="fa-solid fa-xmark me-1"></i> Cancel
                </button> -->
                    </div>

                    <div class="card-body pt-4">
                        <form id="form-head" method="post">
                            <fieldset>
                                <h4 class="section-title"><i class="fa-solid fa-circle-info me-2 mb-6 mt-6"></i>Informasi Utama Sistem</h4>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Sistem Informasi (Utama)</label>
                                        <input type="text" name="system_name" class="form-control" placeholder="Masukkan nama sistem" required>
                                        <div class="form-text">Nama sistem utama yang mewakili keseluruhan aplikasi, bukan modul.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Repository URL</label>
                                        <input type="text" name="repo_url" class="form-control" placeholder="https://gitlab.itb.ac.id/org/repo">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Deskripsi Sistem</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Jenis Sistem</label>
                                        <select name="app_type_id" class="form-select select2-single">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($appTypes as $id => $label): ?>
                                                <option value="<?= $id ?>"><?= h($label) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Status Pengembangan</label>
                                        <select name="dev_status" class="form-select select2-single">
                                            <option value="">-- Pilih --</option>
                                            <option value="Development">Development</option>
                                            <option value="Staging">Staging</option>
                                            <option value="Production">Production</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <div class="form-check mt-3">
                                            <input type="checkbox" name="is_cicd_pipeline" class="form-check-input">
                                            <label class="form-check-label">CI/CD Pipeline integrated</label>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4" />
                                <div class="text-center mb-2">
                                    <button type="button" id="save-head" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-floppy-disk me-1"></i> Lanjut Isi Detail
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <!-- CARD 2: Detail Sistem -->
                <div class="card" id="detail-section" style="display:none;">
                    <div class="card-header border-2 d-flex justify-content-between align-items-center">
                        <h3 class="card-title m-0">
                            Detail Sistem Informasi — <span id="head-system-name"></span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="details-wrapper">
                            <?php include 'detail_form_template.php'; // berisi form detail dari kode kamu 
                            ?>
                        </div>

                        <div class="mt-3">
                            <button type="button" id="add-detail" class="btn btn-light-primary btn-sm">
                                <i class="fa-solid fa-plus me-1"></i>Tambah Aplikasi Pendukung
                            </button>
                            <button type="button" id="remove-last-detail" class="btn btn-outline-danger btn-sm">
                                <i class="fa-solid fa-trash me-1"></i>Hapus Detail Terakhir
                            </button>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" form="form-head" class="btn btn-success px-5">
                                <i class="fa-solid fa-save me-2"></i> Simpan Semua
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        let detailIndex = 1;

        $('#save-head').on('click', function() {
            let name = $('input[name="system_name"]').val();
            if (!name) {
                alert('Isi nama sistem terlebih dahulu');
                return;
            }
            $('#head-system-name').text(name);
            $('#detail-section').slideDown();
            $('html, body').animate({
                scrollTop: $('#detail-section').offset().top
            }, 500);
        });

        $('#add-detail').on('click', function() {
            const $first = $('.detail-item').first();

            // Hapus instance Select2 di template sebelum di-clone
            $first.find('.select2-single, .select2-multiple').select2('destroy');

            const $clone = $first.clone();

            // Reset value dan nama field
            $clone.find('input, textarea, select').each(function() {
                let name = $(this).attr('name');
                if (name) $(this).attr('name', name.replace(/\[0\]/, '[' + detailIndex + ']')).val('');
            });

            $('#details-wrapper').append($clone);

            // Re-inisialisasi Select2 di template asli & clone
            $first.find('.select2-single').select2({
                theme: 'bootstrap4',
                allowClear: true
            });
            $first.find('.select2-multiple').select2({
                theme: 'bootstrap4',
                allowClear: true
            });
            $clone.find('.select2-single').select2({
                theme: 'bootstrap4',
                allowClear: true
            });
            $clone.find('.select2-multiple').select2({
                theme: 'bootstrap4',
                allowClear: true
            });

            detailIndex++;
        });


        $('#remove-last-detail').on('click', function() {
            if ($('.detail-item').length > 1) $('.detail-item').last().remove();
        });
    });
</script>