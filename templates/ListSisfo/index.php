<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ListSisfo> $listSisfo
 */
?>


<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">

            <div class="card-header border-2">
                <div class="card-title">
                    <h2 class=""><i class="bi bi-grid-1x2 fs-3"></i> Daftar SISFO (Sistem Informasi) ITB</h2>   
                </div>
                <div class="card-toolbar">
                    <?php
                    if($role == 'admin'){
                        ?>
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <?= $this->Html->link(__('+ Tambah Sistem Informasi'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- TESTING COMMIT -->

            <?php
            if($role == 'admin'){
                ?>
                <div class="card-header border-2">
                    <div class="card-toolbar d-flex justify-content-between align-items-center">
                        <div class="filter-form mb-12">
                            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?= $this->Form->control('unit_kerja', [
                                            'id' => 'unit_kerja',
                                            'type' => 'select',
                                            'options' => $unitKerjaList,
                                            'empty' => 'Select Unit Kerja',
                                            'label' => 'Filter by Unit Kerja',
                                            'default' => $filterUnitKerja,
                                            'class' => 'form-control'
                                        ]) ?>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex align-items-end">
                                    <?= $this->Form->button(__('Filter'), ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Reset'), ['action' => 'index'], ['class' => 'btn btn-secondary ms-2']) ?>
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <div class="card-body pt-5">
                <!-- <div class=""> -->
                    <div class="table table-responsive">
                        <table class="table align-middle table-row-dashed table-hover table-striped fs-7 gy-5" id="dataTables">
                         <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <!-- Existing table headers -->
                                <th class="min-w-50px"><center>No.</center></th>
                                <th class="text-end min-w-100px"><center>Actions</center></th>
                                <th class="min-w-100px"><center>Status</center></th>
                                <th class="min-w-150px">Nama Sistem</th>
                                <th class="min-w-150px">URL</th>
                                <th class="min-w-150px">Unit Kerja</th>
                                <th class="min-w-150px">User</th>
                                <th class="min-w-150px">Jenis Sistem</th>
                                <th class="min-w-100px">Status</th>
                                <th class="min-w-150px">IP </th>
                                <th class="min-w-100px">Bahasa Pemrograman</th>
                                <th class="min-w-100px">Framework</th>
                                <th class="min-w-100px">DBMS</th>
                                <th class="min-w-150px">Developer</th>
                                <th class="min-w-150px">Deskripsi</th>
                                <th class="min-w-150px">Dokumen</th> <!-- New column -->
                                <th class="min-w-50px">Status Sistem</th>
                                <th class="min-w-50px">Tanggal Di Ubah</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            <?php $x = 1; ?>
                            <?php foreach ($listSisfo as $listSisfo): ?>
                                <tr>
                                    <td><center><?= $x ?></center></td>
                                    <td class="text-end"><center>
                                        <div class="btn-group" role="group" aria-label="Actions">
                                            <?= $this->Html->link('<i class="bi bi-eye"></i>', ['action' => 'view', $listSisfo->id], ['class' => 'btn btn-sm btn-light-primary', 'escape' => false]) ?>
                                            <?= $this->Html->link('<i class="bi bi-pencil"></i>', ['action' => 'edit', $listSisfo->id], ['class' => 'btn btn-sm btn-light-warning', 'escape' => false]) ?>

                                            <?php
                                            if($role == 'admin'){
                                                echo $this->Form->postLink('<i class="bi bi-trash"></i>', ['action' => 'delete', $listSisfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listSisfo->id), 'class' => 'btn btn-sm btn-light-danger', 'escape' => false]); 
                                            }
                                            ?>
                                        </div>
                                    </center>
                                </td>
                                <!-- Existing data rows -->
                                <td><center>
                                    <?php 
                                    $isComplete = !empty($listSisfo->system_name) &&
                                    !empty($listSisfo->domain) &&
                                    !empty($listSisfo->unit_kerja->name) &&
                                    $listSisfo->hasValue('user') &&
                                    !empty($listSisfo->app_type->name) &&
                                    !empty($listSisfo->dev_status) &&
                                    !empty($listSisfo->ip_address) &&
                                    !empty($listSisfo->program_lang) &&
                                    !empty($listSisfo->dbms) &&
                                    !empty($listSisfo->developer) &&
                                    !empty($listSisfo->description);

                                    if ($isComplete) {
                                        echo '<span class="badge bg-success">Lengkap</span>';
                                    } else {
                                        echo '<span class="badge bg-danger">Belum Lengkap</span>';
                                    }
                                    ?>
                                </center></td>
                                <td><b><?= h($listSisfo->system_name) ?></b></td>
                                <td><?= h($listSisfo->domain) ?></td>
                                <td><?= h($listSisfo->unit_kerja->name) ?></td>
                                <td><?= $listSisfo->hasValue('user') ? $this->Html->link($listSisfo->user->name, ['controller' => 'Users', 'action' => 'view', $listSisfo->user->id]) : '' ?></td>
                                <td><?= h($listSisfo->app_type->name) ?></td>
                                <td><?= h($listSisfo->dev_status) ?></td>
                                <td><?= h($listSisfo->ip_address) ?></td>
                                <td><?= h($listSisfo->program_lang) ?></td>
                                <td><?= h($listSisfo->framework) ?></td>
                                <td><?= h($listSisfo->dbms) ?></td>
                                <td><?= h($listSisfo->developer) ?></td>
                                <td><?= h($listSisfo->description) ?></td>
                               <td>
                                    <!-- Dokumen column -->
                                    <?php if (!empty($listSisfo->listsisfo_files)): ?>
                                        <center>
                                            <?php foreach ($listSisfo->listsisfo_files as $file): ?>
                                                <div>
                                                    <?= $this->Html->link(
                                                        'Download ' . h($file->filename), 
                                                        ['controller' => 'listSisfo', 'action' => 'download', $file->id], 
                                                        ['class' => 'btn btn-sm btn-light-info', 'escape' => false]
                                                    ) ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </center>
                                    <?php else: ?>
                                        <center><span class="text-muted">No File</span></center>
                                    <?php endif; ?>
                                </td>

                                <td><?= $listSisfo->is_active === null ? '' : $this->Number->format($listSisfo->is_active) ?></td>
                                <td><?php 
                                $date = new DateTime($listSisfo->modified);
                                $modified = $date->format("d-m-Y H:i:s");
                                echo $modified; 
                            ?></td>
                        </tr>
                        <?php $x++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>
<!-- Include DataTables and its responsive extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {


        $('#dataTables').DataTable({
            responsive: false,
            autoWidth: false,
            paging: true,
            ordering: true,
            info: true,
            lengthChange: true,
            pageLength: 50,
            // language: {
            //     search: "Search:",
            //     lengthMenu: "Show _MENU_ entries",
            //     info: "Showing _START_ to _END_ of _TOTAL_ entries",
            //     paginate: {
            //         first: "First",
            //         previous: "Previous",
            //         next: "Next",
            //         last: "Last"
            //     }
            // }
        });
    });
</script>
