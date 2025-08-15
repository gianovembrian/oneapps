<style>
    #manual-login-form {
        transition: all 0.3s ease;
    }
    .btn-manual-login {
        background-color: #f5f8fa;
        border: 1px solid #b0bec5;
        color: #1e1e2d;
        font-weight: 600;
    }
    .btn-manual-login:hover {
        background-color: #e2e6ea;
        border-color: #90a4ae;
    }
</style>

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">


        <div class="d-flex flex-column flex-lg-row-auto w-xl-600px position-xl-relative"
            style="background-color:#0373d5; background-image: url('/assets/media/oneapp.jpg'); background-size: cover; background-position: center;">
            <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                <!-- Your content here -->
            </div>
        </div>

        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                    <?= $this->Form->create(null, ['class' => 'form w-100', 'novalidate' => true]) ?>
                    <div class="text-center mb-10">
                        <div class="text-400 pt-5"><b>ONEAPP</b><br />DIREKTORAT SARANA PRASARANA DAN SISTEM INFORMASI ITB</div>
                        <div class="text-gray-400 pt-5 text-muted fs-8">Masukan Nama User dan Password, atau Login Menggunakan Akun ITB</div>
                    </div>

                    <!-- Tombol Login Manual -->
                    <div class="text-center mb-5">
                        <button type="button" class="btn btn-manual-login w-100" id="toggle-manual-login">Login Manual</button>
                    </div>

                    <!-- Form Manual (hidden by default) -->
                    <div id="manual-login-form" style="display: none;">
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
                        </div>
                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <a href="#" class="link-primary fs-6 fw-bolder">Lupa Password?</a>
                            </div>
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                        </div>
                        <div class="text-center">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-success w-100 mb-5">
                                <span class="indicator-label">Sign In</span>
                                <span class="indicator-progress">Mohon Tunggu...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>

                    <!-- Divider dan SSO  -->
                    <div class="text-center text-muted text-uppercase fw-bolder mb-5">atau</div>
                    <a href="https://oneapp.itb.ac.id/login/azure" class="btn btn-flex flex-center btn-primary btn-lg w-100 mb-5">
                        Login SSO ITB Account
                    </a>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    var hostUrl = "assets/";
</script>
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<script src="assets/js/custom/authentication/sign-in/general.js"></script>

<script>
    $('#toggle-manual-login').on('click', function() {
        $('#manual-login-form').slideToggle();
        $(this).text(function(i, text) {
            return text === "Login Manual" ? "Sembunyikan Login Manual" : "Login Manual";
        });
    });
</script>