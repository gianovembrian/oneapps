<?php
	// debug($pdln->pdln_user);die;
?>
<div class="post d-flex flex-column-fluid content" id="kt_post">
	<div id="kt_content_container" class="container-fluid">
		<div class="card">
			<div class="card-header border-2">
				<div class="card-title">
					<h3 class="">
						<i class="bi bi-airplane fs-3"></i>&nbsp;Perjalan Dinas Luar Negeri (PDLN)</h3>
					</div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<?= $this->Form->create($pdln , ['enctype' => 'multipart/form-data'] ) ?>
						<form id="form_request" action="/Pdln/addRequest" method="POST">
							<div class="pt-10">
								<h3>Data Pegawai</h3>
								<hr class="text-muted" />
							</div>

							<div class="card-body pt-5">

								<div class="d-flex flex-column mb-5 fv-row">
									<label class="required fs-5 fw-bold mb-2">Masukan Nama yang Diajukan:</label>
									<div class="d-flex align-items-center">
										<span class="input-group-text bg-white" style="height: auto;">
											<i class="bi bi-search"></i>
										</span>
										<!-- Added name attribute to pass selected data -->
										<select id="nameSearch" class="form-select" multiple="multiple">
											<!-- Initial names populated from $pdln->pdln_user -->
											<?php if (!empty($pdln->pdln_user)) : ?>
												<?php foreach ($pdln->pdln_user as $user) : ?>
													<option value="<?= $user->nip ?>" selected>
														<?= $user->gelar_depan . ' ' . $user->nama_lengkap . ' ' . $user->gelar_belakang ?>
													</option>
												<?php endforeach; ?>
											<?php endif; ?>
										</select>
									</div>
								</div>

								<!-- Container to display selected employees' details as a table -->
								<div class="mt-5 p-3">
									<table id="employeeDetailsTable" class="table table-striped">
										<thead>
											<tr class="text-center">
												<th><strong>No</strong></th>
												<th><strong>Nama Lengkap</strong></th>
												<th><strong>NIP</strong></th>
												<th><strong>Jenis Penugasan</strong></th>
												<th><strong>Jenis Pegawai</strong></th>
												<th><strong>Nama Unit Kerja</strong></th>
												<th><strong>Status Pegawai</strong></th>
												<th><strong>Nama Unit Kerja Penempatan</strong></th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($pdln->pdln_user)) : ?>
												<?php foreach ($pdln->pdln_user as $index => $user) : ?>
													<tr data-nip="<?= $user->nip ?>">
														<td><?= $index + 1 ?></td>
														<td><?= $user->gelar_depan . ' ' . $user->nama_lengkap . ' ' . $user->gelar_belakang ?></td>
														<td><?= $user->nip ?></td>
														<td><?= $user->jenis_penugasan ?></td>
														<td><?= $user->jenis_pegawai ?></td>
														<td><?= $user->nama_unit_kerja ?></td>
														<td><?= $user->status_pegawai ?></td>
														<td><?= $user->nama_unit_kerja_penempatan ?></td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
								</div>

								<script>
									var x = <?= isset($pdln->pdln_user) ? count($pdln->pdln_user) + 1 : 1 ?>;
									$('#nameSearch').select2({
										placeholder: "Cari Nama",
										minimumInputLength: 2,
										ajax: {
											url: '/getEmployee',
											type: 'GET',
											dataType: 'json',
											delay: 50,
											data: function (params) {
												return { query: params.term };
											},
											processResults: function (data) {
												if (data.success && Array.isArray(data.data)) {
													return {
														results: data.data.map(function(employee) {
															return {
																id: employee.nip,
																text: employee.gelar_depan + ' ' + employee.nama_lengkap + ' ' + employee.gelar_belakang + ' - (' + employee.jenis_penugasan +' - '+ employee.nama_unit_kerja + ')'
															};
														})
													};
												} else {
													return { results: [] };
												}
											},
											error: function(jqXHR, textStatus, errorThrown) {
												console.error('AJAX error:', textStatus, errorThrown);
											},
											cache: true
										}
									});

									$('#nameSearch').on('select2:select', function(e) {
										var selectedEmployee = e.params.data;
										$.ajax({
											url: '/getEmployeeByNIP',
											type: 'GET',
											data: { query: selectedEmployee.id },
											success: function(data) {
												console.log(data);
												if (data.success) {
													const employee = data.data[0];
													addEmployeeToTable(employee, x);
													addEmployeeToHiddenInputs(employee);
													x++;
												} else {
													console.error('Failed to fetch employee details:', data);
												}
											},
											error: function() {
												console.error('There was an error processing the request for employee details.');
											}
										});
									});

									function addEmployeeToTable(employee, nor) {
										const employeeRow = `
										<tr data-nip="${employee.nip}">
										<td>${nor}</td>
										<td>${employee.gelar_depan + ' ' + employee.nama_lengkap + ' ' + employee.gelar_belakang}</td>
										<td>${employee.nip}</td>
										<td>${employee.jenis_penugasan}</td>
										<td>${employee.jenis_pegawai}</td>
										<td>${employee.nama_unit_kerja}</td>
										<td>${employee.status_pegawai}</td>
										<td>${employee.nama_unit_kerja_penempatan}</td>
										</tr>`;
										$('#employeeDetailsTable tbody').append(employeeRow);
									}

									function addEmployeeToHiddenInputs(employee) {
										$('#employeeDetailsContainer').append(`
											<input type="hidden" name="employees[${employee.nip}][nama_lengkap]" value="${employee.nama_lengkap}">
											<input type="hidden" name="employees[${employee.nip}][nip]" value="${employee.nip}">
											<!-- Add other hidden inputs here as needed -->
											`);
									}

									$('#nameSearch').on('select2:unselect', function(e) {
										var removedEmployeeId = e.params.data.id;
										$(`#employeeDetailsTable tbody tr[data-nip="${removedEmployeeId}"]`).remove();
										$(`#employeeDetailsContainer input[name^="employees[${removedEmployeeId}]"]`).remove();
									});
								</script>

								<!-- Container for hidden inputs -->
								<div id="employeeDetailsContainer"></div>

								<h3>Rincian Kegiatan</h3>
								<HR class="text-muted" />

								<div class="card-body pt-5">
									<!-- Negara Tujuan -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="required fs-5 fw-bold mb-2">Negara Tujuan</label>
										<div class="d-flex align-items-center">
											<span class="input-group-text bg-white" style="height: auto;">
												<i class="bi bi-search"></i>
											</span>
											<select id="negara_tujuan" class="form-select" name="country_id">
												<option selected><?= h($pdln->country_id) ?></option> <!-- Adjust based on actual data structure -->
											</select>
										</div>
									</div>

									<!-- Tempat Kegiatan -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="required fs-5 fw-bold mb-2">Tempat Kegiatan</label>
										<input type="text" class="form-control form-control-solid" placeholder="Masukkan Tempat Kegiatan" name="tempat_kegiatan" value="<?= h($pdln->tempat_kegiatan) ?>" />
									</div>

									<!-- Kegiatan -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="required fs-5 fw-bold mb-2">Kegiatan</label>
										<input type="text" class="form-control form-control-solid" placeholder="Masukkan kegiatan" name="kegiatan" value="<?= h($pdln->kegiatan) ?>" />
									</div>

									<!-- Penyelenggara -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="required fs-5 fw-bold mb-2">Penyelenggara</label>
										<input type="text" class="form-control form-control-solid" placeholder="Masukkan penyelenggara" name="penyelenggara" value="<?= h($pdln->penyelenggara) ?>" />
									</div>

									<!-- Waktu Mulai Kegiatan -->
									<div class="d-flex flex-column mb-5 fv-row col-md-4">
										<label class="required fs-5 fw-bold mb-2">Waktu Mulai Kegiatan</label>
										<input type="date" class="form-control form-control-solid" name="waktu_mulai_kegiatan" 
										value="<?= h($pdln->waktu_mulai_kegiatan ? date('Y-m-d', strtotime($pdln->waktu_mulai_kegiatan)) : '') ?>" />
									</div>

									<!-- Waktu Selesai Kegiatan -->
									<div class="d-flex flex-column mb-5 fv-row col-md-4">
										<label class="required fs-5 fw-bold mb-2">Waktu Selesai Kegiatan</label>
										<input type="date" class="form-control form-control-solid" name="waktu_selesai_kegiatan" 
										value="<?= h($pdln->waktu_selesai_kegiatan ? date('Y-m-d', strtotime($pdln->waktu_selesai_kegiatan)) : '') ?>" />
									</div>

									<!-- Tanggal Berangkat -->
									<div class="d-flex flex-column mb-5 fv-row col-md-4">
										<label class="required fs-5 fw-bold mb-2">Tanggal Berangkat</label>
										<input type="date" class="form-control form-control-solid" name="tanggal_berangkat" 
										value="<?= h($pdln->tanggal_berangkat ? date('Y-m-d', strtotime($pdln->tanggal_berangkat)) : '') ?>" />
									</div>

									<!-- Tanggal Pulang -->
									<div class="d-flex flex-column mb-5 fv-row col-md-4">
										<label class="required fs-5 fw-bold mb-2">Tanggal Pulang</label>
										<input type="date" class="form-control form-control-solid" name="tanggal_pulang" 
										value="<?= h($pdln->tanggal_pulang ? date('Y-m-d', strtotime($pdln->tanggal_pulang)) : '') ?>" />
									</div>
									<!-- Sumber Biaya -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="required fs-5 fw-bold mb-2">Sumber Biaya</label>
										<input type="text" class="form-control form-control-solid" placeholder="Masukkan sumber biaya" name="sumber_biaya" value="<?= h($pdln->sumber_biaya) ?>" />
									</div>

									<!-- Urgensi Kehadiran -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="fs-5 fw-bold mb-2">Urgensi Kehadiran</label>
										<textarea class="form-control form-control-solid" placeholder="Masukkan urgensi kehadiran" name="urgensi"><?= h($pdln->urgensi) ?></textarea>
									</div>

									<!-- Informasi Lain -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="fs-5 fw-bold mb-2">Informasi Lain</label>
										<textarea class="form-control form-control-solid" placeholder="Masukkan informasi lain" name="informasi_lain"><?= h($pdln->informasi_lain) ?></textarea>
									</div>
								</div>
								<h3>Dokumen Pendukung</h3><br />

								<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
									<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
											<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
											<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
										</svg>
									</span>
									<div class="d-flex flex-stack flex-grow-1">
										<div class="fw-bold">
											<h4 class="text-gray-900 fw-bolder">Perhatian</h4>
											<div class="fs-6 text-gray-700">Upload file maksimum berukuran 1MB dengan tipe Gambar/PDF
											</div>
										</div>
									</div>
								</div>

								<HR />

								<div class="card-body pt-5">
									<!-- <h3>Dokumen Pendukung Kelengkapan Izin</h3><br /> -->

									<?php
									if($pdln->jenis_pengajuan == 'setneg'){
										?>

										<div id="formSetneg" style="display: inline;">
											<h3>Kelengkapan Dokumen Izin SETNEG (Sekretariat Negara RI)</h3>
											<HR />

											<div class="card p-10">
												<div class="table-responsive">
													<table class="table align-middle table-row-dashed">
														<thead>
															<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
																<th width="min-w-10px">No</th>
																<th>Nama Dokumen</th>
																<th>Dokumen</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$documents = [
																['name' => 'Surat Usulan dari Unit', 'field' => 'surat_usulan_setneg'],
																['name' => 'Surat Pernyataan Biaya', 'field' => 'surat_biaya_setneg'],
																['name' => 'Kerangka Acuan Kerja (KAK)', 'field' => 'kak_setneg'],
																['name' => 'CV', 'field' => 'cv_setneg'],
																['name' => 'Surat Persetujuan Unit (apabila ditugaskan oleh unit lain)', 'field' => 'surat_persetujuan_setneg'],
																['name' => 'Surat Undangan', 'field' => 'surat_undangan_setneg'],
																['name' => 'Jadwal/Agenda Kegiatan', 'field' => 'jadwal_kegiatan_setneg'],
																['name' => 'SK PNS', 'field' => 'sk_pns_setneg'],
																['name' => 'KTP', 'field' => 'ktp_setneg'],
																['name' => 'Daftar Riwayat Hidup ke Luar Negeri', 'field' => 'daftar_riwayat_setneg'],
																['name' => 'Usulan Ketua KK Khusus Dosen', 'field' => 'usulan_kk_setneg']
															];

															$index = 1;
															foreach ($documents as $doc) {
											// Assume $pdln contains the filename for each document
																$fileUrl = '/files/uploads/' . ($pdln->{$doc['field']} ?? '');

																echo '<tr>';
																echo '<td>' . $index . '</td>';
																echo '<td>' . $doc['name'] . '</td>';
																echo '<td>';

											// Check if the file exists, and show a preview/download button if it does
																if (!empty($pdln->{$doc['field']})) {
																	echo '<a onclick="previewFile(\'' . $fileUrl . '\')" class="btn btn-success btn-sm btn-round">
																	<i class="bi bi-file-arrow-down"></i>
																	</a>';
																} else {
																	echo '<span class="text-muted">No file uploaded</span>';
																}

																echo '</td>';
																echo '</tr>';
																$index++;
															}
															?>
														</tbody>
													</table>
												</div>
											</div>
											<?php
										}else if($pdln->jenis_pengajuan == 'itb'){
											?>

											<!-- Form KELENGKAPAN IZIN ITB -->
											<div class="table-responsive">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>No</th>
															<th>Nama Dokumen</th>
															<th><center>Dokumen</center></th>
															<!-- <th><center>Status</center></th> -->
														</tr>
													</thead>
													<tbody>
														<?php
														$itbDocuments = [
															['description' => 'Surat Usulan dari Unit <br/><small><i>(Keterangan: mencantumkan informasi urgensi kehadiran dan rencana tindak lanjut)</i></small>', 'name' => 'surat_usulan_itb'],
															['description' => 'Surat Undangan', 'name' => 'surat_undangan_itb'],
															['description' => 'Surat Pernyataan Biaya', 'name' => 'surat_biaya_itb'],
															['description' => 'Jadwal/Agenda Kegiatan', 'name' => 'jadwal_kegiatan_itb'],
															['description' => 'Kerangka Acuan Kerja (KAK)', 'name' => 'kak_itb'],
															['description' => 'Surat Persetujuan Unit Asal <br /><small><i>(apabila ditugaskan oleh unit lain)</i></small>', 'name' => 'surat_persetujuan_itb'],
															['description' => 'Usulan Ketua KK Khusus Dosen', 'name' => 'usulan_kk_itb'],
														];

														$x = 1;
														foreach ($itbDocuments as $doc) {
										// Assume $pdln contains the filename for each document
															$fileUrl = '/files/uploads/' . ($pdln->{$doc['name']} ?? '');

															echo '<tr>';
															echo '<td>' . $x . '</td>';
															echo '<td>' . $doc['description'] . '</td>';
															echo '<td>
															<center>';

										// Check if the file exists, and show a preview/download button if it does
															if (!empty($pdln->{$doc['name']})) {
																echo '<a onclick="previewFile(\'' . $fileUrl . '\')" class="btn btn-success btn-sm btn-round">
																<i class="bi bi-file-arrow-down"></i>
																</a>';
															} else {
																echo '<span class="text-muted">No file uploaded</span>';
															}

															echo '</center></td>';
										// echo '<td><center><span class="status-indicator" id="status_' . $doc['name'] . '"><i class="bi bi-dash-lg text-warning icon-circle"></i></span></center></td>';
															echo '</tr>';
															$x++;
														}
														?>
													</tbody>
												</table>
											</div>


											<?php
										}
										?>



										<?= $this->Form->end() ?>

									</div>
									<!-- form -->
									<hr class="text-muted" />
									<div class="d-flex justify-content-end">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</div>
								<?= $this->Form->end() ?>
								<!-- form -->
							</div>
							<!-- END COL-MD-10 -->
							<div class="col-md-1"></div>

						</div> 
						<!-- END ROW -->

					</div>
				</div>
			</div>

			<!-- Alert Modal -->
			<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="alertModalLabel">Alert</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<center>
							<img src="/assets/media/alert-blink.gif" width="80px" /><br />
						</center>
						<div class="modal-body" id="alertModalMessage">

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>


			<!-- Modal HTML -->
			<div class="modal fade" id="filePreviewModal" tabindex="-1" aria-labelledby="filePreviewModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="filePreviewModalLabel">File Preview</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<!-- Preview container, will be filled dynamically with content -->
							<div id="filePreviewContent" class="text-center">
								<p>Loading file...</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script>
				function previewFile(fileName) {
					const fileExtension = fileName.split('.').pop().toLowerCase();
    const filePath = fileName;  // This should be the file URL
    let previewContent = '';

    if (fileExtension === 'jpg' || fileExtension === 'jpeg' || fileExtension === 'png') {
    	previewContent = `<img src="${filePath}" class="img-fluid" alt="Image preview">
    	<a href="${filePath}" download class="btn btn-primary mt-3">Download File</a>`;
    } else if (fileExtension === 'pdf') {
    	previewContent = `<embed src="${filePath}" type="application/pdf" width="100%" height="500px" width="1000px">
    	<a href="${filePath}" download class="btn btn-primary mt-3">Download File</a>`;
    } else {
    	previewContent = `<p>Unsupported file type for preview.</p>
    	<a href="${filePath}" download class="btn btn-primary mt-3">Download File</a>`;
    }

    $('#filePreviewContent').html(previewContent); // Use jQuery to set HTML content

    // Show the modal using jQuery
    $('#filePreviewModal').modal('show');
}
</script>

<script>
	$(document).ready(function() {

		$('#tanggal_berangkat').on('change', function() {
			const currentDate = new Date();
			const selectedDate = new Date($(this).val());
			const differenceInDays = Math.floor((selectedDate - currentDate) / (1000 * 60 * 60 * 24));

			if (differenceInDays <= 30) {
				$('#izinSelect').val('itb').prop('disabled', true);
				$('#formItb').show();
				$('#formSetneg').hide();
							$('#jenis_pengajuan').val('itb');  // Set hidden input value to 'itb'
						} else {
							$('#izinSelect').val('').prop('disabled', false);
							$('#formItb, #formSetneg').hide();
							$('#jenis_pengajuan').val('');  // Clear hidden input value
						}
					});

		$('#izinSelect').on('change', function() {
			var selectedValue = $(this).val();
			var formItb = $('#formItb');
			var formSetneg = $('#formSetneg');

			if (selectedValue === 'itb') {
				formItb.css('display', 'inline');
				formSetneg.css('display', 'none');
							$('#jenis_pengajuan').val('itb');  // Set hidden input value to 'itb'
						} else if (selectedValue === 'setneg') {
							formSetneg.css('display', 'inline');
							formItb.css('display', 'none');
							$('#jenis_pengajuan').val('setneg');  // Set hidden input value to 'setneg'
						} else {
							formItb.css('display', 'none');
							formSetneg.css('display', 'none');
							$('#jenis_pengajuan').val('');  // Clear hidden input value
						}
					});

		$('#negara_tujuan').select2({
			placeholder: "Cari Negara",
			ajax: {
				url: '/Countries/getCountries',
				type: 'GET',
				dataType: 'json',
				delay: 250,
				data: function (params) {
					return {
						query: params.term
					};
				},
				processResults: function (data) {
					if (data.success && Array.isArray(data.data)) {
						return {
							results: data.data.map(function(countries) {
								return {
									id: countries.id,
									text: countries.name
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


		$('input[type="file"]').on('change', function() {
			const inputName = $(this).attr('name');
			const statusElement = $('#status_' + inputName);

			if (this.files.length > 0) {
				statusElement.html('<i class="bi bi-check-lg text-success icon-circle"></i>');
			} else {
				statusElement.html('<i class="bi bi-dash-lg text-danger icon-circle"></i>');
			}
		});

		$('.btn').click(function() {
			$(this).find('input[type="file"]').click();
		});

		$('.document-upload').on('change', function() {
			const fileInput = $(this)[0];
			const fileName = fileInput.value.split('\\').pop();
			const fileSize = fileInput.files[0] ? fileInput.files[0].size : 0;

			if (fileSize > 1048576) {
				$('#alertModalMessage').text('File "' + fileName + '" tidak boleh lebih dari 1MB.');
				$('#alertModal').modal('show'); 
				this.value = ''; 
		            $('#status_' + $(this).attr('name')).html('<i class="bi bi-dash-lg text-warning icon-circle"></i>'); // Reset status indicator
		        } else {
		            $('#status_' + $(this).attr('name')).html('<i class="bi bi-check-lg text-success icon-circle"></i>'); // Update status indicator
		        }
		    });
	});
</script>
