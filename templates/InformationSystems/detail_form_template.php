 <!-- TAHAP 2 (DETAIL) -->
 <div id="detail-section" style="display:inline;">
     <div id="details-wrapper">
         <div class="detail-item border rounded p-4 mb-4 bg-white">
             <input type="hidden" name="information_system_details[0][information_system_id]" class="information_system_id">
             <div class="row g-3">
                 <div class="col-md-6">
                     <label class="form-label">Judul Sub Sistem</label>
                     <input type="text" name="information_system_details[0][system_name]" class="form-control form-control-solid">
                 </div>
                 <div class="col-md-3">
                     <label class="form-label">Tipe Aplikasi</label>
                     <select name="information_system_details[0][app_type_id]" class="form-select form-control-solid select2-single">
                         <option value="">-- Pilih --</option>
                         <?php foreach ($appTypes as $id => $label): ?>
                             <option value="<?= $id ?>"><?= h($label) ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <div class="col-md-3">
                     <label class="form-label">Status Pengembangan</label>
                     <select name="information_system_details[0][dev_status]" class="form-select form-control-solid select2-single">
                         <option value="">-- Pilih --</option>
                         <option value="Development">Development</option>
                         <option value="Staging">Staging</option>
                         <option value="Production">Production</option>
                     </select>
                 </div>
                 <div class="col-md-4">
                     <label class="form-label">IP Address</label>
                     <input type="text" name="information_system_details[0][ip_address]" class="form-control form-control-solid">
                 </div>

                 <!-- Backend -->
                 <div class="col-12 mt-2"><strong>Backend</strong></div>
                 <div class="col-md-3">
                     <label class="form-label">Bahasa Backend</label>
                     <select name="information_system_details[0][backend_programming_language_id]" class="form-select form-control-solid select2-single">
                         <option value="">-- Pilih --</option>
                         <?php foreach ($programmingLanguages as $id => $label): ?>
                             <option value="<?= $id ?>"><?= h($label) ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <div class="col-md-3">
                     <label class="form-label">Versi Bahasa</label>
                     <input type="text" name="information_system_details[0][backend_program_lang_ver]" class="form-control form-control-solid">
                 </div>
                 <div class="col-md-3">
                     <label class="form-label">Framework Backend</label>
                     <select name="information_system_details[0][framework_backend]" class="form-select form-control-solid select2-single">
                         <option value="">-- Pilih --</option>
                         <?php foreach ($frameworks as $id => $label): ?>
                             <option value="<?= $id ?>"><?= h($label) ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <div class="col-md-3">
                     <label class="form-label">Versi Framework</label>
                     <input type="text" name="information_system_details[0][framework_backend_ver]" class="form-control form-control-solid">
                 </div>

                 <!-- Frontend -->
                 <div class="col-12 mt-2"><strong>Frontend</strong></div>
                 <div class="col-md-3">
                     <label class="form-label">Bahasa Frontend</label>
                     <select name="information_system_details[0][frontend_programming_language_id]" class="form-select form-control-solid select2-single">
                         <option value="">-- Pilih --</option>
                         <?php foreach ($programmingLanguages as $id => $label): ?>
                             <option value="<?= $id ?>"><?= h($label) ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <div class="col-md-3">
                     <label class="form-label">Versi Bahasa</label>
                     <input type="text" name="information_system_details[0][frontend_program_lang_ver]" class="form-control form-control-solid">
                 </div>
                 <div class="col-md-3">
                     <label class="form-label">Framework Frontend</label>
                     <select name="information_system_details[0][framework_frontend]" class="form-select form-control-solid select2-single">
                         <option value="">-- Pilih --</option>
                         <?php foreach ($frameworks as $id => $label): ?>
                             <option value="<?= $id ?>"><?= h($label) ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <div class="col-md-3">
                     <label class="form-label">Versi Framework</label>
                     <input type="text" name="information_system_details[0][framework_frontend_ver]" class="form-control form-control-solid">
                 </div>

                 <div class="col-md-6">
                     <label class="form-label">Bahasa Lainnya</label>
                     <input type="text" name="information_system_details[0][other_program_lang]" class="form-control form-control-solid">
                 </div>

                 <!-- Database -->
                 <div class="col-12 mt-2"><strong>Database</strong></div>
                 <div class="col-md-4">
                     <label class="form-label">DBMS</label>
                     <select name="information_system_details[0][dbms_id]" class="form-select form-control-solid select2-single">
                         <option value="">-- Pilih --</option>
                         <?php foreach ($dbms as $id => $label): ?>
                             <option value="<?= $id ?>"><?= h($label) ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <div class="col-md-4">
                     <label class="form-label">Versi DBMS</label>
                     <input type="text" name="information_system_details[0][dbms_ver]" class="form-control form-control-solid">
                 </div>
                 <div class="col-md-4">
                     <label class="form-label">DBMS Lainnya</label>
                     <input type="text" name="information_system_details[0][other_dbms]" class="form-control form-control-solid">
                 </div>

                 <!-- Multiple choice -->
                 <div class="col-md-4 mt-3">
                     <label class="form-label">Container Tools</label>
                     <select name="information_system_details[0][container_tech_id][]" class="form-select form-control-solid select2-multiple" multiple>
                         <?php foreach ($containerTechnologies as $id => $label): ?>
                             <option value="<?= $id ?>"><?= h($label) ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <div class="col-md-4 mt-3">
                     <label class="form-label">DevOps Tools</label>
                     <select name="information_system_details[0][devops_tool_id][]" class="form-select form-control-solid select2-multiple" multiple>
                         <?php foreach ($devopsTools as $id => $label): ?>
                             <option value="<?= $id ?>"><?= h($label) ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <div class="col-md-4 mt-3">
                     <label class="form-label">Security Tools</label>
                     <select name="information_system_details[0][security_tool_id][]" class="form-select form-control-solid select2-multiple" multiple>
                         <?php foreach ($securityTools as $id => $label): ?>
                             <option value="<?= $id ?>"><?= h($label) ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>

                 <div class="col-md-6 mt-3">
                     <label class="form-label">Web Server</label>
                     <select name="information_system_details[0][web_server_id]" class="form-select form-control-solid select2-single">
                         <option value="">-- Pilih --</option>
                         <?php foreach ($webServers as $id => $label): ?>
                             <option value="<?= $id ?>"><?= h($label) ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
                 <div class="col-md-3 mt-3">
                     <label class="form-label">Pengembang</label>
                     <input type="text" name="information_system_details[0][developer]" class="form-control form-control-solid">
                 </div>
                 <div class="col-md-3 mt-3">
                     <label class="form-label">PIC</label>
                     <input type="text" name="information_system_details[0][pic]" class="form-control form-control-solid">
                 </div>

                 <div class="col-12 mt-3">
                     <label class="form-label">Deskripsi Detail</label>
                     <textarea name="information_system_details[0][description]" class="form-control form-control-solid" rows="3"></textarea>
                 </div>

                 <div class="col-md-6 mt-3">
                     <label class="form-label">Status Sistem</label><br>
                     <label><input type="radio" name="information_system_details[0][is_active]" value="1" checked> Aktif</label>
                     <label class="ms-3"><input type="radio" name="information_system_details[0][is_active]" value="0"> Tidak Aktif</label>
                 </div>
                 <div class="col-md-6 mt-3">
                     <label class="form-label">DNS / Domain</label>
                     <input type="text" name="information_system_details[0][domain]" class="form-control form-control-solid">
                 </div>
             </div>
         </div>
     </div>

     <!-- <div class="mt-3">
         <button type="button" id="add-detail" class="btn btn-light-primary btn-sm">Tambah Aplikasi Pendukung</button>
         <button type="button" id="remove-last-detail" class="btn btn-outline-danger btn-sm">Hapus Detail Terakhir</button> -->
     <!-- </div> -->
 </div>