<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>

<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-2">
                <div class="card-title">
                    <h2 class=""><?= __('Daftar Pengguna') ?></h2>
                </div>

                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <?= $this->Html->link(__('+ Tambah Pengguna'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
                    </div>
                </div>
            </div>

            <div class="card-body pt-15">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed table-hover table-striped fs-6 gy-5 table-responsive" id="dataTables">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-10px">No </th>
                                <th class="min-w-10px">Name </th>
                                <!-- <th class="min-w-10px">ID Pegawai </th> -->
                                <th class="min-w-10px">Email </th>
                                <th class="min-w-10px">Unit Kerja </th>
                                <th class="min-w-10px">Role </th>
                                <th class="min-w-150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            <?php $x = 1; ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= h($x) ?></td>
                                    <td><?= h($user->name) ?></td>
                                    <!-- <td><?= h($user->id_pegawai) ?></td> -->
                                    <td><?= h($user->email) ?></td>
                                    <td><?= h($user->unit_kerja->name) ?></td>
                                    <td><?= h($user->role->name) ?></td>
                                    <td class="actions">
                                        <Center>
                                        <div class="action-group">
                                            <!-- View Icon -->
                                            <?= $this->Html->link('<i class="bi bi-key"></i>', ['action' => 'setPassword', $user->id], [
                                                'escape' => false,
                                                'class' => 'btn btn-secondary btn-sm',
                                                'title' => __('Reset Password')
                                            ]) ?>
                                            <!-- Edit Icon -->
                                            <?= $this->Html->link('<i class="bi bi-pencil"></i>', ['action' => 'edit', $user->id], [
                                                'escape' => false,
                                                'class' => 'btn btn-warning btn-sm',
                                                'title' => __('Edit')
                                            ]) ?>
                                            <!-- Delete Icon -->
                                            <?= $this->Form->postLink('<i class="bi bi-trash"></i>', ['action' => 'delete', $user->id], [
                                                'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
                                                'escape' => false,
                                                'class' => 'btn btn-danger btn-sm',
                                                'title' => __('Delete')
                                            ]) ?>
                                        </div>
                                        </Center>
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

<script type="text/javascript">
    let table = new DataTable('#dataTables');
</script>