
<?php
/**
* @var \App\View\AppView $this
* @var iterable<\App\Model\Entity\OverseasTrip> $overseasTrip
*/
?>
<style>
	.btn {
            border-radius: 20px !important;
            margin-right: 5px;
        }
</style>
<div class="post d-flex flex-column-fluid content" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-2">
                <div class="card-title">
                    <h2 class="">Daftar Pengajuan Tugas Belajar</h2>
                </div>

                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <?= $this->Html->link(__('+ Tambah Pengajuan'), ['action' => 'addRequest'], ['class' => 'btn btn-primary btn-sm']) ?>
                    </div>
                </div>
            </div>

            <div class="card-body pt-15">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed table-hover table-striped fs-6 gy-5 table-responsive" id="dataTables">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-10px">No</th>
                                <th class="min-w-10px">Detail</th>
                                <th>TGL. Pengajuan</th>
                                <!-- <th class="min-w-80px">NIP</th> -->
                                <th class="min-w-350px">Nama Pegawai</th>
                                <!-- <th class="min-w-150px">Unit</th> -->
                                <th class="min-w-200px">Kegiatan</th>
                                <th class="min-w-100px">Negara Tujuan</th>
                                <!-- <th class="min-w-200px">Tempat Kegiatan</th> -->
                                <!-- <th class="min-w-200px">Penyelenggara</th> -->
                                <th class="min-w-150px">TGL. Waktu Kegiatan</th>
                                <th class="min-w-150px">TGL. Berangkat & Kembali</th>
								<th class="min-w-100px">Status<br/>Persetujuann</th>
                                <!-- <th class="min-w-200px">Sumber Biaya</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 fw-bold">
                            <?php foreach ($pdlnData as $index => $pdln): ?>

                            <tr>
                                <td><?= h($index + 1) ?></td>
                                <td>
				                    <a class="btn btn-success btn-sm btn-round" href="/Pdln/view/<?=$pdln->id?>">
				                        <i class="bi bi-eye"></i> Detail
				                    </a>
				                </td>
                                <td><?php 
									$date = new DateTime($pdln->create_at);
									$create_at = $date->format("Y-m-d H:i:s");
                                	
                                	echo $create_at;
                                	?>
                            	</td>
                               <!--  <td>
                                    <?= $pdln->nip ?>
                                </td> -->
                                <td>
                                	<!-- <b><?= h($pdln->nama_lengkap)?></b><br />
										<small><?= $pdln->jenis_penugasan ?></small> -
										<small><?= $pdln->jenis_pegawai ?></small><br /> -->
                                        <?php if (!empty($pdln->pdln_user)) : ?>
                                            <?php foreach ($pdln->pdln_user as $employee) : ?>
                                                <b><?= h($employee->gelar_depan.' '.$employee->nama_lengkap.' '.$employee->gelar_belakang) ?></b><br />
                                                <small><?= h($employee->nip) ?></small> - 
                                                <small><?= h($employee->nama_unit_kerja) ?></small> - 
                                                <small><?= h($employee->jenis_penugasan) ?></small> - 
                                                <small><?= h($employee->jenis_pegawai) ?></small><br />
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <span>No Employees Assigned</span>
                                        <?php endif; ?>
                        		</td>
                               <!--  <td>
                                    <?= $pdln->nama_unit_kerja ?>
                                </td> -->
                                <td><?= h($pdln->kegiatan) ?></td>
                                <!-- <td><?= h($pdln->tempat_kegiatan) ?></td> -->
								<td><?= h($pdln->country->name) ?></td>
                                <!-- <td><?= h($pdln->penyelenggara) ?></td> -->

								<?php
                                setlocale(LC_TIME, 'id_ID.UTF-8');

									$date = new DateTime($pdln->waktu_mulai_kegiatan);
									$waktu_mulai_kegiatan = strftime("%d %B %Y", $date->getTimestamp());

									$date = new DateTime($pdln->waktu_selesai_kegiatan);
									$waktu_selesai_kegiatan = strftime("%d %B %Y", $date->getTimestamp());

									$date = new DateTime($pdln->tanggal_berangkat);
									$tanggal_berangkat = strftime("%d %B %Y", $date->getTimestamp());

									$date = new DateTime($pdln->tanggal_pulang);
									$tanggal_pulang = strftime("%d %B %Y", $date->getTimestamp());
								?>

								<td><?= h($waktu_mulai_kegiatan).' - '.h($waktu_selesai_kegiatan) ?></td>
								<td><?= h($tanggal_berangkat).' & '.h($tanggal_pulang) ?></td>

                                  <td>
                                    <?php if ($pdln->approval_status === 'pending'): ?>
                                        <span class="badge bg-warning">Pengajuan Baru</span>
                                    <?php elseif ($pdln->approval_status === 'setuju'): ?>
                                        <span class="badge bg-success">Disetujui</span>
                                    <?php elseif ($pdln->approval_status === 'tidak_setuju'): ?>
                                        <span class="badge bg-danger">Tidak Disetujui</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Unknown</span>
                                    <?php endif; ?>
                                    <Br />
                                    <small><?=$pdln->approval_notes?></small>
                                </td>
                                <!-- <td><?= h($pdln->sumber_biaya) ?></td> -->
                                <td>
                                	 <div class="btn-group btn-rounded" role="group" aria-label="">
                                        <button class="btn btn-warning btn-sm " onclick="editRecord(1)">
                                            <i class="bi bi-pencil"></i> 
                                        </button>
                                        <button class="btn btn-danger btn-sm " onclick="deleteRecord(1)">
                                            <i class="bi bi-trash"></i> 
                                        </button>
					                </div>
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
