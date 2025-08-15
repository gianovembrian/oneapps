<!-- templates/Users/register.php -->
<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
    <!-- Begin Card -->
    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <!-- Begin Form -->
        <?= $this->Form->create($user, ['class' => 'form w-100', 'novalidate' => true]) ?>
        
        <!-- Title -->
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Register</h1>
        </div>
        
        <!-- Begin Email Input -->
        <div class="fv-row mb-7">
            <label class="form-label fw-bold">Email</label>
            <?= $this->Form->control('email', [
                'label' => false,
                'class' => 'form-control form-control-lg form-control-solid',
                'required' => true,
                'placeholder' => 'Enter your email',
            ]) ?>
        </div>
        <!-- End Email Input -->
        
        <!-- Begin Password Input -->
        <div class="fv-row mb-7">
            <label class="form-label fw-bold">Password</label>
            <?= $this->Form->control('password', [
                'label' => false,
                'type' => 'password',
                'class' => 'form-control form-control-lg form-control-solid',
                'required' => true,
                'placeholder' => 'Enter your password',
            ]) ?>
        </div>
        <!-- End Password Input -->
        
        <!-- Begin Confirm Password Input -->
        <div class="fv-row mb-7">
            <label class="form-label fw-bold">Confirm Password</label>
            <?= $this->Form->control('confirm_password', [
                'label' => false,
                'type' => 'password',
                'class' => 'form-control form-control-lg form-control-solid',
                'required' => true,
                'placeholder' => 'Confirm your password',
            ]) ?>
        </div>
        <!-- End Confirm Password Input -->
        
        <!-- Submit Button -->
        <div class="d-grid mb-10">
            <?= $this->Form->button('Register', ['class' => 'btn btn-lg btn-primary']) ?>
        </div>
        
        <!-- Already have an account? -->
        <div class="text-center">
            <a href="/users/login" class="text-primary fs-6 fw-bolder">Already have an account? Sign in.</a>
        </div>
        
        <?= $this->Form->end() ?>
        <!-- End Form -->
    </div>
    <!-- End Card -->
</div>