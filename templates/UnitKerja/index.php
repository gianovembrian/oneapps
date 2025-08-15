<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-2">
                <div class="card-title">
                    <h2 class=""><i class="bi bi-grid-1x2 fs-3"></i> Unit Kerja</h2>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <?= $this->Html->link(__('+ Tambah Unit Kerja'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>

            <div class="card-body pt-5">
                <div class="table table-responsive">
                    <table class="table align-middle table-row-dashed table-hover table-striped fs-7 gy-5" id="dataTables">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-50px"><center>No.</center></th>
                                <th class="min-w-150px">Name</th>
                                <th class="min-w-100px">Code</th>
                                <th class="min-w-100px"><center>Actions</center></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            <?php $x = 1; ?>
                            <?php foreach ($unitKerja as $unit): ?>
                                <tr>
                                    <td><center><?= $x ?></center></td>
                                    <td><?= h($unit->name) ?></td>
                                    <td><?= h($unit->code) ?></td>
                                    <td>
                                        <center>
                                            <div class="btn-group" role="group" aria-label="Actions">
                                                <?= $this->Html->link('<i class="bi bi-eye"></i>', ['action' => 'view', $unit->id], ['class' => 'btn btn-sm btn-light-primary', 'escape' => false]) ?>
                                                <?= $this->Html->link('<i class="bi bi-pencil"></i>', ['action' => 'edit', $unit->id], ['class' => 'btn btn-sm btn-light-warning', 'escape' => false]) ?>
                                                <?= $this->Form->postLink('<i class="bi bi-trash"></i>', ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id), 'class' => 'btn btn-sm btn-light-danger', 'escape' => false]) ?>
                                            </div>
                                        </center>
                                    </td>
                                </tr>
                                <?php $x++; ?>
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
