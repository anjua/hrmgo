<?php
    use App\Models\Utility;
    $settings = \Modules\LandingPage\Entities\LandingPageSetting::settings();
    $logo = Utility::get_file('uploads/landing_page_image');
    $sup_logo = Utility::get_file('uploads/logo');
    $adminSettings = Utility::settings();
    $language = \App\Models\Utility::getValByName('default_language');
    $getseo = App\Models\Utility::getSeoSetting();
    $metatitle = isset($getseo['meta_title']) ? $getseo['meta_title'] : '';
    $metadesc = isset($getseo['meta_description']) ? $getseo['meta_description'] : '';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($getseo['meta_image']) ? $getseo['meta_image'] : '';
    $enable_cookie = \App\Models\Utility::getCookieSetting('enable_cookie');

    $setting = \App\Models\Utility::colorset();
    $SITE_RTL = Utility::getValByName('SITE_RTL');
    $color = !empty($setting['theme_color']) ? $setting['theme_color'] : 'theme-3';
    if ($language == 'ar' || $language == 'he') {
        $SITE_RTL = 'on';
    }

    if (isset($setting['color_flag']) && $setting['color_flag'] == 'true') {
        $themeColor = 'custom-color';
    } else {
        $themeColor = $color;
    }
?>
<!DOCTYPE html>
<html lang="en">
<html lang="en" dir="<?php echo e($setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

<head>
    <title><?php echo e(env('APP_NAME')); ?></title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />

    <meta name="title" content="<?php echo e($metatitle); ?>">
    <meta name="description" content="<?php echo e($metadesc); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:title" content="<?php echo e($metatitle); ?>">
    <meta property="og:description" content="<?php echo e($metadesc); ?>">
    <meta property="og:image"
        content="<?php echo e(isset($meta_logo) && !empty(asset('storage/uploads/meta/' . $meta_logo)) ? asset('storage/uploads/meta/' . $meta_logo) : 'hrmgo.png'); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:title" content="<?php echo e($metatitle); ?>">
    <meta property="twitter:description" content="<?php echo e($metadesc); ?>">
    <meta property="twitter:image"
        content="<?php echo e(isset($meta_logo) && !empty(asset('storage/uploads/meta/' . $meta_logo)) ? asset('storage/uploads/meta/' . $meta_logo) : 'hrmgo.png'); ?>">

    <!-- Favicon icon -->
    
    <link rel="icon"
        href="<?php echo e($sup_logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon . '?' . time() : 'favicon.png' . '?' . time())); ?>"
        type="image/x-icon" />

    <!-- font css -->
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/fonts/tabler-icons.min.css')); ?>" />
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/fonts/feather.css')); ?>" />
    <link rel="stylesheet" href="  <?php echo e(Module::asset('LandingPage:Resources/assets/fonts/fontawesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(Module::asset('LandingPage:Resources/assets/fonts/material.css')); ?>" />



    <!-- vendor css -->
    <link rel="stylesheet" href="  <?php echo e(Module::asset('LandingPage:Resources/assets/css/style.css')); ?>" />
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/css/customizer.css')); ?>" />
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/css/landing-page.css')); ?>" />
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/css/custom.css')); ?>" />

    <style>
        :root {
            --color-customColor: <?=$color ?>;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom-color.css')); ?>">

    <?php if($SITE_RTL == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>">
    <?php endif; ?>

    <?php if($setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(Module::asset('LandingPage:Resources/assets/css/style.css')); ?>"
            id="main-style-link">
    <?php endif; ?>

</head>

<?php if($setting['cust_darklayout'] == 'on'): ?>

    <body class="<?php echo e($themeColor); ?> landing-dark">
    <?php else: ?>

        <body class="<?php echo e($themeColor); ?>">
<?php endif; ?>
<!-- [ Header ] start -->
<header class="main-header">
    <?php if($settings['topbar_status'] == 'on'): ?>
        <div class="announcement bg-dark text-center p-2">
            <p class="mb-0"><?php echo $settings['topbar_notification_msg']; ?></p>
        </div>
    <?php endif; ?>
    <?php if($settings['menubar_status'] == 'on'): ?>
        <div class="container">
            <nav class="navbar navbar-expand-md  default top-nav-collapse">
                <div class="header-left">
                    <a class="navbar-brand bg-transparent" href="#">
                        <img src="<?php echo e($logo . '/' . $settings['site_logo'] . '?' . time()); ?>" alt="logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="../#home"><?php echo e($settings['home_title']); ?></a>
                        </li>
                        <?php if($settings['feature_status'] == 'on'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../#features"><?php echo e($settings['feature_title']); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if($settings['plan_status'] == 'on'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../#plan"><?php echo e($settings['plan_title']); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if($settings['faq_status'] == 'on'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../#faq"><?php echo e($settings['faq_title']); ?></a>
                        </li>
                        <?php endif; ?>

                        <?php if(is_array(json_decode($settings['menubar_page'])) || is_object(json_decode($settings['menubar_page']))): ?>
                            <?php $__currentLoopData = json_decode($settings['menubar_page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($value->header) && $value->header == 'on' && isset($value->template_name)): ?>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="<?php echo e($value->template_name == 'page_content' ? route('custom.page', $value->page_slug) : $value->page_url); ?>"><?php echo e($value->menubar_page_name); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </ul>
                    <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="ms-auto d-flex justify-content-end gap-2">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-dark rounded"><span
                            class="hide-mob me-2"><?php echo e(__('Login')); ?></span> <i data-feather="log-in"></i></a>
                    <?php if(isset($adminSettings['disable_signup_button']) && $adminSettings['disable_signup_button'] == 'on'): ?>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-dark rounded"><span
                                class="hide-mob me-2"><?php echo e(__('Register')); ?></span> <i
                                data-feather="user-check"></i></a>
                    <?php endif; ?>
                    <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </div>
    <?php endif; ?>
</header>
<!-- [ Header ] End -->
<!-- [ common banner ] start -->
<section class="common-banner bg-primary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="title">
                    <h1 class="text-white"><?php echo $page['menubar_page_name']; ?></h1>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- [ common banner ] end -->
<!-- [ Static content ] start -->

<section class="static-content section-gap">
    <div class="container">
        <div class="mb-5">
            <?php echo $page['menubar_page_contant']; ?>

        </div>

        <?php if($settings['testimonials_status'] == 'on'): ?>
            <?php if($settings['testimonials'] != '[]'): ?>
                <?php if(is_array(json_decode($settings['testimonials'])) || is_object(json_decode($settings['testimonials']))): ?>

                    <?php
                        $testimonials = array_rand(json_decode($settings['testimonials'], true), 1);

                        $testimonial = json_decode($settings['testimonials'])[$testimonials];
                    ?>
                    <div>
                        <div class="row gy-4">
                            <div class="col-12">
                                <div class="bg-primary p-4 rounded">
                                    <div class="row gy-3 align-items-center">
                                        <div class="col-xxl-6 col-lg-6">
                                            <div class="d-flex flex-column flex-sm-row gap-3">
                                                <span class="theme-avtar avtar avtar-xl bg-light-dark rounded-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36"
                                                        height="23" viewBox="0 0 36 23" fill="none">
                                                        <path
                                                            d="M12.4728 22.6171H0.770508L10.6797 0.15625H18.2296L12.4728 22.6171ZM29.46 22.6171H17.7577L27.6669 0.15625H35.2168L29.46 22.6171Z"
                                                            fill="white"></path>
                                                    </svg>
                                                </span>
                                                <div>
                                                    <h2><?php echo $testimonial->testimonials_title; ?></h2>
                                                    <p class="mb-0"><?php echo $testimonial->testimonials_description; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-lg-6">
                                            <div
                                                class="d-flex align-items-center gap-3 justify-content-center justify-content-sm-end">
                                                <div class="text-end">
                                                    <b class="d-block"><?php echo e($testimonial->testimonials_user); ?> </b>
                                                    <span class="d-block"><?php echo $testimonial->testimonials_designation; ?></span>
                                                    <span>
                                                        <?php for($i = 1; $i <= (int) $testimonial->testimonials_star; $i++): ?>
                                                            <i data-feather="star"></i>
                                                        <?php endfor; ?>
                                                    </span>
                                                </div>
                                                <span class="theme-avtar avtar avtar-l rounded-circle">
                                                    <img src="<?php echo e($logo . '/' . $testimonial->testimonials_user_avtar); ?>"
                                                        class="img-fluid rounded-circle" alt="">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<!-- [ Static content ] end -->
<!-- [ Footer ] start -->
<footer class="site-footer bg-gray-100">
    <div class="container">
        <div class="footer-row">
            <div class="ftr-col cmp-detail">
                <div class="footer-logo mb-3">
                    <a href="#">
                        <img src="<?php echo e($logo . '/' . $settings['site_logo'] . '?' . time()); ?>" alt="logo">
                    </a>
                </div>
                <p>
                    <?php echo $settings['site_description']; ?>

                </p>

            </div>
            <div class="ftr-col">
                <ul class="list-unstyled">

                    <?php if(is_array(json_decode($settings['menubar_page'])) || is_object(json_decode($settings['menubar_page']))): ?>
                        <?php $__currentLoopData = json_decode($settings['menubar_page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($value->footer) && $value->footer == 'on' && $value->header == 'off' && isset($value->template_name)): ?>
                                <li><a
                                        href="<?php echo e($value->template_name == 'page_content' ? route('custom.page', $value->page_slug) : $value->page_url); ?>"><?php echo e($value->menubar_page_name); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($value->footer) && $value->footer == 'on' && $value->header == 'on' && isset($value->template_name)): ?>
                                <li><a
                                        href="<?php echo e($value->template_name == 'page_content' ? route('custom.page', $value->page_slug) : $value->page_url); ?>"><?php echo e($value->menubar_page_name); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </ul>
            </div>
            <div class="ftr-col">
                <ul class="list-unstyled">
                    <?php if(is_array(json_decode($settings['menubar_page'])) || is_object(json_decode($settings['menubar_page']))): ?>
                        <?php $__currentLoopData = json_decode($settings['menubar_page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($value->header) && $value->header == 'on' && $value->footer == 'off' && isset($value->template_name)): ?>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo e($value->template_name == 'page_content' ? route('custom.page', $value->page_slug) : $value->page_url); ?>"><?php echo e($value->menubar_page_name); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </ul>
            </div>
            <?php if($settings['joinus_status'] == 'on'): ?>
                <div class="ftr-col ftr-subscribe">
                    <h2><?php echo $settings['joinus_heading']; ?></h2>
                    <p><?php echo $settings['joinus_description']; ?></p>
                    <form method="post" action="<?php echo e(route('join_us_store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="input-wrapper border border-dark">
                            <input type="text" name="email" placeholder="Type your email address...">
                            <button type="submit" class="btn btn-dark rounded-pill">Join Us!</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="border-top border-dark text-center p-2">

        &copy;<?php echo e(date(' Y')); ?>

        <?php echo e(App\Models\Utility::getValByName('footer_text') ? App\Models\Utility::getValByName('footer_text') : config('app.name', 'HRMGo SaaS')); ?>



    </div>
</footer>
<!-- [ Footer ] end -->
<!-- Required Js -->

<script src="<?php echo e(Module::asset('LandingPage:Resources/assets/js/plugins/popper.min.js')); ?>"></script>
<script src="<?php echo e(Module::asset('LandingPage:Resources/assets/js/plugins/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(Module::asset('LandingPage:Resources/assets/js/plugins/feather.min.js')); ?>"></script>


<script>
    // Start [ Menu hide/show on scroll ]
    let ost = 0;
    document.addEventListener("scroll", function() {
        let cOst = document.documentElement.scrollTop;
        if (cOst == 0) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
        } else if (cOst > ost) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
            document.querySelector(".navbar").classList.remove("default");
        } else {
            document.querySelector(".navbar").classList.add("default");
            document
                .querySelector(".navbar")
                .classList.remove("top-nav-collapse");
        }
        ost = cOst;
    });
    // End [ Menu hide/show on scroll ]

    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: "#navbar-example",
    });
    feather.replace();
</script>

<?php echo $__env->yieldPushContent('custom-scripts'); ?>
<?php if($enable_cookie['enable_cookie'] == 'on'): ?>
    <?php echo $__env->make('layouts.cookie_consent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

</body>

</html>
<?php /**PATH C:\laravel\hrmgo\Modules/LandingPage\Resources/views/layouts/custompage.blade.php ENDPATH**/ ?>