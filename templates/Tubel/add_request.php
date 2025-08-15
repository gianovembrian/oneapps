
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
										<select id="nameSearch" class="form-select"  multiple="multiple"></select>
									</div>
								</div>



								<!-- Container to display selected employees' details as a table -->
								<div class="mt-5 p-3">
									<table id="employeeDetailsTable" class="table table-striped">
										<thead>
											<tr>
												<th class="pl-5"><strong>No</strong></th>
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
											<!-- Dynamic employee details will be appended here -->
										</tbody>
									</table>
								</div>

								<script>
									var x = 1;
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
																text: employee.gelar_depan + ' ' + employee.nama_lengkap + ' ' + employee.gelar_belakang + ' - (' + employee.jenis_penugasan +' - '+ employee.nama_unit_kerja + ')'
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

									$('#nameSearch').on('select2:select', function(e) {
										var selectedEmployee = e.params.data;
										$.ajax({
											url: '/getEmployeeByNIP',
											type: 'GET',
											data: {
												query: selectedEmployee.id
											},
											success: function(data) {
												console.log(data);
												if (data.success) {
													const employee = data.data[0];
													addEmployeeToTable(employee,x);
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

									function addEmployeeToTable(employee,nor) {
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
										</tr>
										`;
										$('#employeeDetailsTable tbody').append(employeeRow);
									}

									function addEmployeeToHiddenInputs(employee) {
										$('#employeeDetailsContainer').append(`
											<input type="hidden" name="employees[${employee.nip}][gelar_belakang]" value="${employee.gelar_belakang}">
											<input type="hidden" name="employees[${employee.nip}][gelar_depan]" value="${employee.gelar_depan}">
											<input type="hidden" name="employees[${employee.nip}][golongan]" value="${employee.golongan}">
											<input type="hidden" name="employees[${employee.nip}][id_pegawai]" value="${employee.id_pegawai}">
											<input type="hidden" name="employees[${employee.nip}][jenis_pegawai]" value="${employee.jenis_pegawai}">
											<input type="hidden" name="employees[${employee.nip}][jenis_penugasan]" value="${employee.jenis_penugasan}">
											<input type="hidden" name="employees[${employee.nip}][nama_lengkap]" value="${employee.nama_lengkap}">
											<input type="hidden" name="employees[${employee.nip}][nama_unit_kerja]" value="${employee.nama_unit_kerja}">
											<input type="hidden" name="employees[${employee.nip}][nama_unit_kerja_penempatan]" value="${employee.nama_unit_kerja_penempatan}">
											<input type="hidden" name="employees[${employee.nip}][nidn]" value="${employee.nidn}">
											<input type="hidden" name="employees[${employee.nip}][nip]" value="${employee.nip}">
											<input type="hidden" name="employees[${employee.nip}][status_pegawai]" value="${employee.status_pegawai}">
											<input type="hidden" name="employees[${employee.nip}][tingkat_pendidikan_terakhir]" value="${employee.tingkat_pendidikan_terakhir}">
											<input type="hidden" name="employees[${employee.nip}][updated_at]" value="${employee.updated_at}">
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
											<select id="negara_tujuan" class="form-select" name="country_id"></select>
										</div>
									</div>

									<!-- Kegiatan -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="required fs-5 fw-bold mb-2">Tempat Kegiatan</label>
										<input type="text" class="form-control form-control-solid" placeholder="Masukkan Tempat Kegiatan" name="tempat_kegiatan" />
									</div>


									<!-- Kegiatan -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="required fs-5 fw-bold mb-2">Kegiatan</label>
										<input type="text" class="form-control form-control-solid" placeholder="Masukkan kegiatan" name="kegiatan" />
									</div>

									<!-- Penyelenggara -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="required fs-5 fw-bold mb-2">Penyelenggara</label>
										<input type="text" class="form-control form-control-solid" placeholder="Masukkan penyelenggara" name="penyelenggara" />
									</div>

									<!-- Waktu Mulai Kegiatan -->
									<div class="d-flex flex-column mb-5 fv-row col-md-4">
										<label class="required fs-5 fw-bold mb-2">Waktu Mulai Kegiatan</label>
										<input type="date" class="form-control form-control-solid" name="waktu_mulai_kegiatan" />
									</div>

									<!-- Waktu Selesai Kegiatan -->
									<div class="d-flex flex-column mb-5 fv-row col-md-4">
										<label class="required fs-5 fw-bold mb-2">Waktu Selesai Kegiatan</label>
										<input type="date" class="form-control form-control-solid" name="waktu_selesai_kegiatan" />
									</div>

									<!-- Tanggal Berangkat -->
									<div class="d-flex flex-column mb-5 fv-row col-md-4">
										<label class="required fs-5 fw-bold mb-2">Tanggal Berangkat</label>
										<input type="date" class="form-control form-control-solid" name="tanggal_berangkat" id="tanggal_berangkat" />
									</div>

									<!-- Tanggal Pulang -->
									<div class="d-flex flex-column mb-5 fv-row col-md-4">
										<label class="required fs-5 fw-bold mb-2">Tanggal Pulang</label>
										<input type="date" class="form-control form-control-solid" name="tanggal_pulang" />
									</div>

									<!-- Sumber Biaya -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="required fs-5 fw-bold mb-2">Sumber Biaya</label>
										<input type="text" class="form-control form-control-solid" placeholder="Masukkan sumber biaya" name="sumber_biaya" />
									</div>

									<!-- Informasi Lain -->
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="fs-5 fw-bold mb-2">Urgensi Kehadiran</label>
										<textarea class="form-control form-control-solid" placeholder="Masukkan informasi lain" name="urgensi"></textarea>
									</div>

									<div class="d-flex flex-column mb-5 fv-row">
										<label class="fs-5 fw-bold mb-2">Informasi Lain</label>
										<textarea class="form-control form-control-solid" placeholder="Masukkan informasi lain" name="informasi_lain"></textarea>
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
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="required fs-5 fw-bold mb-2">Pilih Kelengkapan Izin</label>
										<select class="form-control form-control-solid" id="izinSelect" disabled>
											<option value="">-</option>
											<option value="setneg">Izin SETNEG (Sekretariat Negara RI)</option>
											<option value="itb">Izin ITB</option>
										</select>
									</div>
									<BR />

									<input type="hidden" name="jenis_pengajuan" id="jenis_pengajuan" value="">

									<!-- Form KELENGKAPAN IZIN SETNEG -->
									<div id="formSetneg" style="display: none;">
										<h3>Kelengkapan Izin SETNEG (Sekretariat Negara RI)</h3>
										<HR />

										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama File</th>
														<th><center>Unnggah Dokumen</center></th>
														<th><center>Status</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
											        // Define the document data array in PHP
													$documents = [
														[ 'description' => 'Surat Usulan dari Unit <br/><small><i>(Keterangan: mencantumkan informasi urgensi kehadiran dan rencana tindak lanjut)</i></small>', 'name' => 'surat_usulan_setneg'],
														[ 'description' => 'Surat Pernyataan Biaya', 'name' => 'surat_biaya_setneg'],
														[ 'description' => 'Kerangka Acuan Kerja (KAK)', 'name' => 'kak_setneg'],
														[ 'description' => 'CV', 'name' => 'cv_setneg'],
														[ 'description' => 'Surat Persetujuan Unit <br /><small><i>(apabila ditugaskan oleh unit lain)</i></small>', 'name' => 'surat_persetujuan_setneg'],
														[ 'description' => 'Surat Undangan', 'name' => 'surat_undangan_setneg'],
														[ 'description' => 'Jadwal/Agenda Kegiatan', 'name' => 'jadwal_kegiatan_setneg'],
														[ 'description' => 'SK PNS', 'name' => 'sk_pns_setneg'],
														[ 'description' => 'KTP', 'name' => 'ktp_setneg'],
														[ 'description' => 'Daftar Riwayat Hidup ke Luar Negeri', 'name' => 'daftar_riwayat_setneg'],
														[ 'description' => 'Usulan Ketua KK Khusus Dosen', 'name' => 'usulan_kk_setneg']
													];

													$x = 1;
													foreach ($documents as $doc) {
														echo '<tr>';
														echo '<td>' . $x . '</td>';
														echo '<td>' . $doc['description'] . '</td>';
														echo '<td><center>
														<label class="btn btn-primary btn-sm">
														<i class="bi bi-upload"></i>
														<input type="file" class="form-control form-control-solid document-upload" name="' . $doc['name'] . '" style="display: none;" />
														</label>
														</center></td>';
														echo '<td><center><span class="status-indicator" id="status_' . $doc['name'] . '"><i class="bi bi-dash-lg text-warning icon-circle"></i></span></center></td>';
														echo '</tr>';
														$x++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>


									<script>
										$(document).ready(function() {
											$('input[type="file"]').on('change', function() {
												const inputName = $(this).attr('name');
												const statusElement = $('#status_' + inputName);

												if (this.files.length > 0) {
													statusElement.html('<i class="bi bi-check-lg text-success"></i>');
												} else {
													statusElement.html('<i class="bi bi-dash-lg text-warning icon-circle"></i>');
												}
											});
										});
									</script>

									<!-- Form KELENGKAPAN IZIN ITB -->
									<div id="formItb" style="display: none;">
										<h3>Kelengkapan Izin ITB</h3>
										<hr class="text-muted" />

										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama File</th>
														<th><center>Unnggah Dokumen</center></th>
														<th><center>Status</center></th>
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
														echo '<tr>';
														echo '<td>' . $x . '</td>';
														echo '<td>' . $doc['description'] . '</td>';
														echo '<td>
																<center>
																	<label class="btn btn-primary btn-sm">
																	<i class="bi bi-upload"></i>
																	<input type="file" class="form-control form-control-solid document-upload" name="' . $doc['name'] . '" style="display: none;" />
																	</label>
																</center>
															  </td>';
														echo '<td><center><span class="status-indicator" id="status_' . $doc['name'] . '"><i class="bi bi-dash-lg text-warning icon-circle"></i></span></center></td>';
														echo '</tr>';
														$x++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
									<hr class="text-muted" />
									<div class="d-flex justify-content-end">
										<button type="submit" class="btn btn-primary">Submit</button>
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
