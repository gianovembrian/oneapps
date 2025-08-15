<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SkIndikator> $skIndikator
 */
?>

<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-2">
                <div class="card-title">
                    <h2 class=""><i class="bi bi-grid-1x2 fs-3"></i> Tabel Data SK Indikator</h2>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <?= $this->Html->link(__('+ Tambah SK Indikator'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>

            <div class="card-body pt-5">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed table-hover table-striped fs-7 gy-5" id="dataTables">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Kode Indikator</th>
                                <th>Tahun</th>
                                <th>Jumlah SK</th>
                                <th>Status</th>
                                <th>Jenis Penugasan</th>
                                <th class="min-w-200px" ><center>Actions</center></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            <?php foreach ($skIndikator as $index => $sk): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= h($sk->nip) ?></td>
                                    <td><?= h($sk->nama) ?></td>
                                    <td><?= h($sk->posisi) ?></td>
                                    <td><?= $sk->kode_indikator === null ? '' : $this->Number->format($sk->kode_indikator) ?></td>
                                    <td><?= $sk->tahun === null ? '' : $this->Number->format($sk->tahun) ?></td>
                                    <td><?= $sk->jumlah_sk === null ? '' : $this->Number->format($sk->jumlah_sk) ?></td>
                                    <td><?= h($sk->status) ?></td>
                                    <td><?= h($sk->jenis_penugasan) ?></td>
                                      <td class="actions">
                                        <Center>
                                        <div class="action-group">
                                            <!-- View Icon -->
                                            <?= $this->Html->link('<i class="bi bi-key"></i>', ['action' => 'setPassword', $sk->id], [
                                                'escape' => false,
                                                'class' => 'btn btn-secondary btn-sm',
                                                'title' => __('Reset Password')
                                            ]) ?>
                                            <!-- Edit Icon -->
                                            <?= $this->Html->link('<i class="bi bi-pencil"></i>', ['action' => 'edit', $sk->id], [
                                                'escape' => false,
                                                'class' => 'btn btn-warning btn-sm',
                                                'title' => __('Edit')
                                            ]) ?>
                                            <!-- Delete Icon -->
                                            <?= $this->Form->postLink('<i class="bi bi-trash"></i>', ['action' => 'delete', $sk->id], [
                                                'confirm' => __('Are you sure you want to delete # {0}?', $sk->id),
                                                'escape' => false,
                                                'class' => 'btn btn-danger btn-sm',
                                                'title' => __('Delete')
                                            ]) ?>
                                        </div>
                                        </Center>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script> -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTables').DataTable({
            responsive: true,
            autoWidth: false,
            paging: true, // DataTables handles pagination
            ordering: true,
            info: true,
            lengthChange: true,
            pageLength: 50, // Default number of rows
        });
    });
</script>
