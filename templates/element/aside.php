<style>
  #kt_aside {
    background-color: #ecf0f1 !important;
  }

  #kt_aside_menu .menu-title {
    color: #2c3e50 !important;
  }

  #kt_aside_menu .menu-link:hover .menu-title {
    color: #ffffff !important;
  }

  #kt_aside_menu .menu-link.active .menu-title {
    color: #ffffff !important;
  }

</style>



 <div class="d-flex flex-column flex-root">
 	<div class="page d-flex flex-row flex-column-fluid">
 		<div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
 			<div class="aside-logo flex-column-auto" id="kt_aside_logo" style="background-color:#005aab" >
 				<a href="/">
 					<img alt="Logo" src="/assets/media/oneapp-nav.png" class="h-40px logo" />
 				</a>

 				<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
 					<i class="bi bi-arrow-left-circle"></i>
 				</div>
 			</div>

 			<?php
				$currentModule = basename($_SERVER['REQUEST_URI']); // Get current module from URL
        		$identity = $this->request->getAttribute('identity');
				
				$role = $identity->role_id;
			?>

				<div class="aside-menu flex-column-fluid">
					<!--begin::Aside Menu-->
					<div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
						<!--begin::Menu-->
						<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="kt_aside_menu" data-kt-menu="true">

							<div class="menu-item">
								<div class="menu-content pb-3">
									<span class="menu-section text-muted text-uppercase fs-8 ls-1"><b><?=$identity->name?></b></span><br />
									<span class="menu-section text-muted text-uppercase fs-8 ls-1"><?=$identity->unit?></span>
								</div>
							</div>

							<div class="menu-item">
								<div class="menu-content pb-2">
									<span class="menu-section text-muted text-uppercase fs-8 ls-1"><hr /></span>
								</div>
							</div>

							<div class="menu-item">
								<div class="menu-content pb-2">
									<span class="menu-section text-muted text-uppercase fs-8 ls-1">SISTEM INFORMASI</span>
								</div>
							</div>
							<div class="menu-item">
								<a class="menu-link <?= $currentModule == 'listSisfo' ? 'active' : '' ?>" href="/listSisfo">
									<span class="menu-icon">
										<i class="bi bi-grid-1x2 fs-3"></i>
									</span>
									<span class="menu-title">Daftar Sistem Informasi</span>
								</a>
							</div>
							

						<?php
								if($role == '2f25e8a4-b9fa-444c-b809-5d925e8517b9'){

			        		?> 

							<div class="menu-item">
								<div class="menu-content pt-8 pb-2">
									<span class="menu-section text-muted text-uppercase fs-8 ls-1">Kelola</span>
								</div>
							</div>
							<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?= in_array($currentModule, ['users', 'other-sub-module']) ? 'show' : '' ?>">
								<span class="menu-link <?= $currentModule == 'pengguna' ? 'active' : '' ?>">
									<span class="menu-icon">
										<i class="bi bi-people fs-3"></i>
									</span>
									<span class="menu-title">Pengguna</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg" style="<?= $currentModule == 'users' ? 'display: block;' : 'display: none;' ?>">
									<a class="menu-link <?= $currentModule == 'users' ? 'active' : '' ?>" href="/users">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Manajemen Pengguna</span>
									</a>
								</div>
							</div>

							<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?= in_array($currentModule, ['role', 'unit_kerja']) ? 'show' : '' ?>">
								<span class="menu-link <?= $currentModule == 'pengguna' ? 'active' : '' ?>">
									<span class="menu-icon">
										<i class="bi bi-tags fs-3"></i>
									</span>
									<span class="menu-title">Master</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg" >
									<a class="menu-link <?= $currentModule == 'role' ? 'active' : '' ?>" href="/role">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Role Unit</span>
									</a>

									<a class="menu-link <?= $currentModule == 'unit_kerja' ? 'active' : '' ?>" href="/UnitKerja">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Unit Kerja</span>
									</a>
								</div>
							
							</div>
							
							<?php
			        			}
							?>

							<div class="menu-item">
								<div class="menu-content pb-2">
									<span class="menu-section text-muted text-uppercase fs-8 ls-1"><hr /></span>
								</div>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="/logout">
									<span class="menu-icon">
										<i class="bi bi-box-arrow-right fs-3"></i>
									</span>
									<span class="menu-title">Keluar</span>
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
				<script>
					$(document).ready(function() {
						$('.menu-item.menu-accordion > .menu-link').on('click', function() {
							$(this).next('.menu-sub').slideToggle();
						});

						$('.menu-item.menu-accordion').each(function() {
							const submenuLink = $(this).find('.menu-link.active');
							if (submenuLink.length) {
								$(this).find('.menu-sub').show();
							}
						});
					});
				</script>

			</div>
		</div>
	</div>