<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-2">
                <div class="card-title">
                    <h3 class="">
                        <i class="bi bi-airplane fs-3"></i>&nbsp;Data Pegawai</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <?= $this->Form->create($user, ['class' => 'form']) ?>
                    <div class="pt-10">
                        <h3>Tambah Pengguna</h3>
                        <hr class="text-muted" />
                    </div>

                    <div class="card-body pt-5">
                        <fieldset>
                            <?php
                                // Name Select2 Dropdown
                                echo '<div class="d-flex flex-column mb-5 fv-row">';
                                echo '<label class="required fs-5 fw-bold mb-2">Nama :</label>';
                                echo '<div class="d-flex align-items-center">';
                                echo '<span class="input-group-text bg-white" style="height: auto;">';
                                echo '<i class="bi bi-search"></i>';
                                echo '</span>';
                                echo $this->Form->select('id_pegawai', [], ['id' => 'nameSearch', 'class' => 'form-select', 'placeholder' => 'Cari Nama', 'style' => 'width:100%']);
                                echo '</div>';
                                echo '</div>';
                                
                                // Hidden input for employee name
                                echo $this->Form->hidden('name', ['id' => 'employeeName']);
                                echo $this->Form->hidden('unit', ['id' => 'employeeUnitHidden']);
                                echo $this->Form->hidden('nip', ['id' => 'employeeNipHidden']);
                                echo $this->Form->hidden('id_pegawai', ['id' => 'employeeIdPegawaiHidden']);
                                
                                // NIP Field
                                echo $this->Form->control('nip', ['class' => 'form-control mb-3', 'label' => 'NIP', 'id' => 'employeeNip', 'disabled' => true]);
                                echo $this->Form->control('unit', ['class' => 'form-control mb-3', 'label' => 'Unit', 'id' => 'employeeUnit', 'disabled' => true]); 
                                echo $this->Form->control('email', ['class' => 'form-control mb-3', 'label' => 'Email', 'id' => 'employeeEmail']);
                                
                                // Role Selection
                                echo '<div class="mb-3">
                                        <label for="role_id" class="form-label">Role:</label>';
                                echo $this->Form->select('role_id', $roles, ['class' => 'form-control select2', 'placeholder' => 'Select Role', 'id' => 'role_id']);
                                echo '</div>';
                                
                                // Password Fields
                                echo $this->Form->control('password', ['class' => 'form-control mb-3', 'label' => 'Password', 'id' => 'employeePassword']);
                                echo $this->Form->control('retype_password', ['type'=>'password', 'class' => 'form-control mb-3', 'label' => 'Re-type Password', 'id' => 'retypePassword']);
                            ?>
                        </fieldset>
                        <div class="d-flex justify-content-end">
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'id' => 'submitBtn']) ?>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#nameSearch').select2({
            placeholder: "Cari Nama",
            minimumInputLength: 2,
            ajax: {
                url: '/getEmployee',
                type: 'GET',
                dataType: 'json',
                delay: 50,
                data: function (params) {
                    return {
                        query: params.term
                    };
                },
                processResults: function (data) {
                    if (data.success && Array.isArray(data.data)) {
                        return {
                            results: data.data.map(function(employee) {
                                return {
                                    id: employee.nip,
                                    text: employee.gelar_depan + ' ' + employee.nama_lengkap + ' ' + employee.gelar_belakang + ' - (' + employee.jenis_penugasan + ' - ' + employee.nama_unit_kerja + ')',
                                    nip: employee.nip,
                                    unit: employee.nama_unit_kerja,
                                    name: employee.gelar_depan + ' ' + employee.nama_lengkap + ' ' + employee.gelar_belakang // Add full name for hidden input
                                };
                            })
                        };
                    } else {
                        return {
                            results: []
                        };
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error:', textStatus, errorThrown);
                },
                cache: true
            }
        });

        // Event listener for when an employee is selected
        $('#nameSearch').on('select2:select', function(e) {
            const selectedData = e.params.data;
            $('#employeeNip').val(selectedData.nip);
            $('#employeeNipHidden').val(selectedData.nip);
            $('#employeeUnitHidden').val(selectedData.unit);
            $('#employeeUnit').val(selectedData.unit);
            $('#employeeName').val(selectedData.name); // Fill the hidden input with the employee's name
            $('#employeeIdPegawaiHidden').val(selectedData.id_pegawai); // Fill the hidden input with the employee's name
        });

        // Form submission validation
        $('#submitBtn').on('click', function(e) {
            const password = $('#employeePassword').val();
            const retypePassword = $('#retypePassword').val();

            if (password !== retypePassword) {
                e.preventDefault(); // Prevent form submission
                alert("Passwords do not match. Please try again.");
                return false;
            }
        });
    });
</script>
