<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
	.table td, .table th {
		padding-left: 15px; /* You can adjust the padding value as needed */
	}
</style>


<div class="post d-flex flex-column-fluid content" id="kt_post">
	<div id="kt_content_container" class="container-fluid">
		<div class="card">
			<div class="card-header border-2">
				<div class="card-title">
					<h3 class=""><i class="bi bi-airplane fs-2"></i> Perjalan Dinas Luar Negeri (PDLN)</h3>
				</div>
			</div>

			<div class="row">
				<!-- <div class="col-md-1"></div> -->
				<div class="col-md-12">
					
					<div class="card-body">

						
						<div class="row mb-7">
							<label class="col-lg-2 fw-bold text-muted">Diajukan Oleh</label>
							<div class="col-lg-10">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_lengkap"><?=$data_detail->user->name?></span>
							</div>
						</div>

						<div class="row mb-7">
							<label class="col-lg-2 fw-bold text-muted">Diajukan Tanggal</label>
							<div class="col-lg-10">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_lengkap"><?=$data_detail->created->format('Y-m-d H:i:s')?></span>
							</div>
						</div>

						<hr class="text-muted" />

						<div class="pt-10">
							<h3>NNama yang diajukan</h3>
							<hr class="text-muted" />
						</div>

						<div class="mt-5">
						    <table id="employeeDetailsTable" class="table table-striped table-bordered">
						        <thead>
						            <tr>
						            	<th><b>No</b></th>
						                <th width="350px"><strong>Nama Lengkap</strong></th>
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

						            <?php
						            		$x = 1;
						            		foreach($data_detail->pdln_user as $row){
						            			?>
						            				<tr>
						            					<td><?=$x?></td>
						            					<td><?=$row->gelar_depan.' '.$row->nama_lengkap.' '.$row->gelar_belakang?></td>
						            					<td><?=$row->nip?></td>
						            					<td><?=$row->jenis_penugasan?></td>
						            					<td><?=$row->jenis_pegawai?></td>
						            					<td><?=$row->nama_unit_kerja?></td>
						            					<td><?=$row->status_pegawai?></td>
						            					<td><?=$row->nama_unit_kerja_penempatan?></td>
						            				</tr>
						            			<?php
						            			$x++;
						            		}
						            ?>
						        </tbody>
						    </table>
						</div>
					</div>
				</div> <!-- end of col md 5 -->
				<div class="col-md-12">


					<div class="card-body ">

						<div class="pt-10">
							<h3>Rincian Kegiatan</h3>
							<hr class="text-muted" />
						</div>

						<div class="row mb-7">
							<label class="col-lg-5 fw-bold text-muted">Negara Tujuan</label>
							<div class="col-lg-7">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_unit_kerja_penempatan"><?=$data_detail->country->name?></span>
							</div>
						</div>

						<div class="row mb-7">
							<label class="col-lg-5 fw-bold text-muted">Tempat Kegiatan</label>
							<div class="col-lg-7">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_unit_kerja_penempatan"><?=$data_detail->tempat_kegiatan?></span>
							</div>
						</div>

						<div class="row mb-7">
							<label class="col-lg-5 fw-bold text-muted">Detail Kegiatan</label>
							<div class="col-lg-7">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_unit_kerja_penempatan"><?=$data_detail->kegiatan?></span>
							</div>
						</div>
						
						<div class="row mb-7">
							<label class="col-lg-5 fw-bold text-muted">Penyelenggara</label>
							<div class="col-lg-7">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_unit_kerja_penempatan"><?=$data_detail->penyelenggara?></span>
							</div>
						</div>

						<div class="row mb-7">
							<label class="col-lg-5 fw-bold text-muted">Waktu Mulai Kegiatan</label>
							<div class="col-lg-7">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_unit_kerja_penempatan"><?=$data_detail->waktu_mulai_kegiatan->format('Y-m-d');?></span>
							</div>
						</div>

						<div class="row mb-7">
							<label class="col-lg-5 fw-bold text-muted">Waktu Selesai Kegiatan</label>
							<div class="col-lg-7">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_unit_kerja_penempatan"><?=$data_detail->waktu_selesai_kegiatan->format('Y-m-d');?></span>
							</div>
						</div>

						<div class="row mb-7">
							<label class="col-lg-5 fw-bold text-muted">Tanggal Berangkat</label>
							<div class="col-lg-7">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_unit_kerja_penempatan"><?=$data_detail->tanggal_berangkat->format('Y-m-d');?></span>
							</div>
						</div>

						<div class="row mb-7">
							<label class="col-lg-5 fw-bold text-muted">Tanggal Kembali</label>
							<div class="col-lg-7">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_unit_kerja_penempatan"><?=$data_detail->tanggal_pulang->format('Y-m-d');?></span>
							</div>
						</div>

						<div class="row mb-7">
							<label class="col-lg-5 fw-bold text-muted">Sumber Biaya</label>
							<div class="col-lg-7">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_unit_kerja_penempatan"><?=$data_detail->sumber_biaya?></span>
							</div>
						</div>

						<div class="row mb-7">
							<label class="col-lg-5 fw-bold text-muted">Urgensi Kehadiran</label>
							<div class="col-lg-7">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_unit_kerja_penempatan"><?=$data_detail->urgensi?></span>
							</div>
						</div>
						
						<div class="row mb-7">
							<label class="col-lg-5 fw-bold text-muted">Informasi Lain</label>
							<div class="col-lg-7">
								<span class="fw-bolder fs-6 text-gray-800" id="nama_unit_kerja_penempatan"><?=$data_detail->informasi_lain?></span>
							</div>
						</div>

					</div><!-- end of col md 5 -->

				</div>
				<!-- <div class="col-md-1"></div> -->
			</div>

			<div class="card-body pt-5">
				<!-- <h3>Dokumen Pendukung Kelengkapan Izin</h3><br /> -->

				<?php
				if($data_detail->jenis_pengajuan == 'setneg'){
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
											// Assume $data_detail contains the filename for each document
											$fileUrl = '/files/uploads/' . ($data_detail->{$doc['field']} ?? '');

											echo '<tr>';
											echo '<td>' . $index . '</td>';
											echo '<td>' . $doc['name'] . '</td>';
											echo '<td>';
											
											// Check if the file exists, and show a preview/download button if it does
											if (!empty($data_detail->{$doc['field']})) {
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
					}else if($data_detail->jenis_pengajuan == 'itb'){
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
										// Assume $data_detail contains the filename for each document
										$fileUrl = '/files/uploads/' . ($data_detail->{$doc['name']} ?? '');

										echo '<tr>';
										echo '<td>' . $x . '</td>';
										echo '<td>' . $doc['description'] . '</td>';
										echo '<td>
										<center>';
										
										// Check if the file exists, and show a preview/download button if it does
										if (!empty($data_detail->{$doc['name']})) {
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


					<hr class="text-muted" />
					 <?= $this->Form->create(null, ['url' => ['action' => 'approval', $data_detail->id], 'class' => 'form w-100', 'novalidate' => true]) ?>
   
					    <div class="card">
					        <div class="card-body">
					            <h5 class="fw-bold mb-4">Persetujuan</h5>
					            <div class="mb-5">
					                <div class="form-check form-check-custom form-check-solid mb-3">
					                    <input class="form-check-input" type="radio" name="approval_status" id="setuju" value="setuju">
					                    <label class="form-check-label" for="setuju">
					                        <span class="text-gray-700 fw-bold">Disetujui</span>
					                    </label>
					                </div>
					                <div class="form-check form-check-custom form-check-solid mb-3">
					                    <input class="form-check-input" type="radio" name="approval_status" id="tidak_setuju" value="tidak_setuju">
					                    <label class="form-check-label" for="tidak_setuju">
					                        <span class="text-gray-700 fw-bold">Ditolak</span>
					                    </label>
					                </div>
					               <!--  <div class="form-check form-check-custom form-check-solid mb-3">
					                    <input class="form-check-input" type="radio" name="approval_status" id="pending" value="pending">
					                    <label class="form-check-label" for="pending">
					                        <span class="text-gray-700 fw-bold">Pending</span>
					                    </label>
					                </div> -->
					            </div>

				              <div class="mb-5">
					                <label for="approval_notes" class="form-label fw-bold">Komentar Persetujuan</label>
					                <textarea class="form-control form-control-solid" id="approval_notes" name="approval_notes" rows="4" placeholder="Masukkan komentar di sini..."></textarea>
					            </div>
					            <div class="row">
					            	<div class="col-md-6">
					            		<div class="d-flex">
							                <button type="submit" class="btn btn-success btn-sm fw-bold"><i class="bi bi-arrow-left-circle"></i> Kembali</button>
							            </div>
					            	</div>
					            	<div class="col-md-6">
					            		<div class="d-flex justify-content-end">
							                <button type="submit" class="btn btn-primary btn-sm fw-bold">Simpan</button>
							            </div>
					            	</div>
					            </div>
					            
					        </div>
					    </div>
					<?= $this->Form->end() ?>

				</div>
				<!-- form -->
			</div>
			<!-- END COL-MD-10 -->

		</div> 
		<!-- END ROW -->

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