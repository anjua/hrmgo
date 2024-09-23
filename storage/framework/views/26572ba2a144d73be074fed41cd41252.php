<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('language-bar'); ?>
    <?php
        $languages = App\Models\Utility::languages();

        $lang = \App::getLocale('lang');
        $LangName = \App\Models\Languages::where('code', $lang)->first();
        if (empty($LangName)) {
            $LangName = new App\Models\Utility();
            $LangName->fullName = 'English';
        }

        $settings = App\Models\Utility::settings();
        config([
            'captcha.sitekey' => $settings['google_recaptcha_key'],
            'captcha.secret' => $settings['google_recaptcha_secret'],
            'options' => [
                'timeout' => 30,
            ],
        ]);
    ?>
    <div class="lang-dropdown-only-desk">
        <li class="dropdown dash-h-item drp-language">
            <a class="dash-head-link dropdown-toggle btn" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="drp-text"> <?php echo e(ucfirst($LangName->fullName)); ?>

                </span>
            </a>
            <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('register', [$ref, $code])); ?>" tabindex="0"
                        class="dropdown-item <?php echo e($code == $lang ? 'active' : ''); ?>">
                        <span><?php echo e(ucFirst($language)); ?></span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </li>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <?php if(session('status')): ?>
            <div class="mb-4 font-medium text-lg text-green-600 text-danger">
                <?php echo e(__('Email SMTP settings does not configured so please contact to your site admin.')); ?>

            </div>
        <?php endif; ?>
        <?php echo e(Form::open(['route' => 'register', 'method' => 'post', 'id' => 'loginForm'])); ?>

        <div class="">
            <h2 class="mb-3 f-w-600"><?php echo e(__('Register')); ?></h2>
        </div>
        <div class="custom-login-form">
            <div class="form-group mb-3">
                <label class="form-label"><?php echo e(__('Full Name')); ?></label>
                <input id="name" type="text" class="form-control" name="name" placeholder="<?php echo e(__('Enter Full Name')); ?>"
                    required autofocus>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error invalid-email text-danger" role="alert">
                        <small><?php echo e($message); ?></small>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group mb-3">
                <label class="form-label"><?php echo e(__('Email')); ?></label>
                <input id="email" type="email" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    name="email" placeholder="<?php echo e(__('Enter your email')); ?>" required autofocus>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error invalid-email text-danger" role="alert">
                        <small><?php echo e($message); ?></small>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group mb-3 pss-field">
                <label class="form-label"><?php echo e(__('Password')); ?></label>
                <input id="password" type="password" class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    name="password" placeholder="<?php echo e(__('Enter Password')); ?>" required>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error invalid-password text-danger" role="alert">
                        <small><?php echo e($message); ?></small>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group mb-3 pss-field">
                <label class="form-label"><?php echo e(__('Confirm password')); ?></label>
                <input id="confirm-password" type="password" class="form-control" name="password_confirmation"
                    placeholder="<?php echo e(__('Enter Confirm Password')); ?>" required>
                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error invalid-password_confirmation text-danger" role="alert">
                        <small><?php echo e($message); ?></small>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <?php if(isset($settings['recaptcha_module']) && $settings['recaptcha_module'] == 'yes'): ?>
                <div class="form-group mb-4">
                    <?php echo NoCaptcha::display($settings['cust_darklayout'] == 'on' ? ['data-theme' => 'dark'] : []); ?>

                    <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error small text-danger" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            <?php endif; ?>

            <div class="form-check custom-checkbox">
                <input type="checkbox" class="form-check-input" id="termsCheckbox" name="terms_condition_check" required>
                <label class="form-check-label text-sm" for="termsCheckbox"><?php echo e(__('I agree to the ')); ?>

                    <?php if(is_array(json_decode($setting['menubar_page'])) || is_object(json_decode($setting['menubar_page']))): ?>
                        <?php $__currentLoopData = json_decode($setting['menubar_page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($value->menubar_page_name, ['Terms and Conditions']) && isset($value->template_name)): ?>
                                <a href="<?php echo e($value->template_name == 'page_content' ? route('custom.page', $value->page_slug) : $value->page_url); ?>"
                                    target="_blank"><?php echo e($value->menubar_page_name); ?></a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e(__('and the ')); ?>

                        <?php $__currentLoopData = json_decode($setting['menubar_page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($value->menubar_page_name, ['Privacy Policy']) && isset($value->template_name)): ?>
                                <a href="<?php echo e($value->template_name == 'page_content' ? route('custom.page', $value->page_slug) : $value->page_url); ?>"
                                    target="_blank"><?php echo e($value->menubar_page_name); ?></a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </label>
            </div>

            <div class="d-grid">
                <input type="hidden" name="ref_code" value="<?php echo e($ref); ?>">
                <button class="btn btn-primary mt-2" type="submit">
                    <?php echo e(__('Register')); ?>

                </button>
            </div>
            </form>
            <p class="my-4 text-center"><?php echo e(__('Already have an account?')); ?>

                <a href="<?php echo e(route('login', $lang)); ?>" tabindex="0"><?php echo e(__('Login')); ?></a>
            </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
    <?php if(isset($settings['recaptcha_module']) && $settings['recaptcha_module'] == 'yes'): ?>
        <?php echo NoCaptcha::renderJs(); ?>

    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\hrmgo\resources\views/auth/register.blade.php ENDPATH**/ ?>