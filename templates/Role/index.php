<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-2">
                <div class="card-title">
                    <h2 class=""><?= __('Daftar Role') ?></h2>
                </div>

                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-role-table-toolbar="base">
                        <?= $this->Html->link(__('+ Tambah Role'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
                    </div>
                </div>
            </div>

            <div class="card-body pt-15">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed table-hover table-striped fs-6 gy-5" id="dataTables">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-10px">ID</th>
                                <th class="min-w-100px">Name</th>
                                <th class="min-w-150px"><center>Actions</center></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            <?php foreach ($role as $role): ?>
                                <tr>
                                    <td><?= h($role->id) ?></td>
                                    <td><?= h($role->name) ?></td>
                                    <td class="actions">
                                        <Center>
                                        <div class="action-group">
                                            <!-- View Icon -->
                                            <?= $this->Html->link('<i class="bi bi-eye"></i>', ['action' => 'view', $role->id], [
                                                'escape' => false,
                                                'class' => 'btn btn-info btn-sm',
                                                'title' => __('View')
                                            ]) ?>
                                            <!-- Edit Icon -->
                                            <?= $this->Html->link('<i class="bi bi-pencil"></i>', ['action' => 'edit', $role->id], [
                                                'escape' => false,
                                                'class' => 'btn btn-warning btn-sm',
                                                'title' => __('Edit')
                                            ]) ?>
                                            <!-- Delete Icon -->

                                            <?php 

                                                if($role->id == '2f25e8a4-b9fa-444c-b809-5d925e8517b9' || $role->id == '6fe48ae2-f916-43ea-ad2e-c375eb51d2de'){
                                                    echo '<button class="btn btn-danger btn-sm" disabled><i class="bi bi-trash"></i></button>';
                                                    }else{
                                                        echo $this->Form->postLink('<i class="bi bi-trash"></i>', ['action' => 'delete', $role->id], [
                                                            'confirm' => __('Are you sure you want to delete # {0}?', $role->id),
                                                            'escape' => false,
                                                            'class' => 'btn btn-danger btn-sm',
                                                            'title' => __('Delete')]) ;
                                                    }
                                            ?>
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

<script type="text/javascript">
    let table = new DataTable('#dataTables');
</script>
