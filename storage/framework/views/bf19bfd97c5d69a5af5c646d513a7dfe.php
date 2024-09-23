<?php
    $company_favicon = \App\Models\Utility::getValByName('company_favicon');
    // $logo = asset(Storage::url('uploads/logo/'));
    $logo = \App\Models\Utility::get_file('uploads/logo');

    $company_logo = \App\Models\Utility::GetLogo();
    $SITE_RTL = \App\Models\Utility::getValByName('SITE_RTL');
    $language = \App\Models\Utility::getValByName('default_language');

    $setting = \App\Models\Utility::colorset();
    $color = !empty($setting['theme_color']) ? $setting['theme_color'] : 'theme-3';

    $getseo = App\Models\Utility::getSeoSetting();
    $metatitle = isset($getseo['meta_title']) ? $getseo['meta_title'] : '';
    $metadesc = isset($getseo['meta_description']) ? $getseo['meta_description'] : '';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($getseo['meta_image']) ? $getseo['meta_image'] : '';
    $enable_cookie = \App\Models\Utility::getCookieSetting('enable_cookie');
    $lang = \App::getLocale('lang');
    if ($lang == 'ar' || $lang == 'he') {
        $SITE_RTL = 'on';
    }
    elseif($SITE_RTL == 'on') 
    {
        $SITE_RTL = 'on';        
    }
    else {
        $SITE_RTL = 'off';
    }

    if (isset($setting['color_flag']) && $setting['color_flag'] == 'true') {
        $themeColor = 'custom-color';
    } else {
        $themeColor = $color;
    }

?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e($SITE_RTL == 'on' ? 'rtl' : ''); ?>">

<head>
    <title>
        <?php echo e(\App\Models\Utility::getValByName('title_text') ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'HRMGo SaaS')); ?>

        - <?php echo $__env->yieldContent('page-title'); ?></title>

    <!-- SEO META -->
    <meta name="title" content="<?php echo e($metatitle); ?>">
    <meta name="description" content="<?php echo e($metadesc); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:title" content="<?php echo e($metatitle); ?>">
    <meta property="og:description" content="<?php echo e($metadesc); ?>">
    <meta property="og:image"
        content="<?php echo e(isset($meta_logo) && !empty(asset('storage/uploads/meta/' . $meta_logo)) ? asset('storage/uploads/meta/' . $meta_logo) : asset('storage/uploads/meta/hrmgo.png')); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:title" content="<?php echo e($metatitle); ?>">
    <meta property="twitter:description" content="<?php echo e($metadesc); ?>">
    <meta property="twitter:image"
        content="<?php echo e(isset($meta_logo) && !empty(asset('storage/uploads/meta/' . $meta_logo)) ? asset('storage/uploads/meta/' . $meta_logo) : 'hrmgo.png'); ?>">


    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo e($logo . '/favicon.png' . '?' . time()); ?>" type="image/x-icon" />

    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
    <!-- vendor css -->

    <style>
        :root {
            --color-customColor: <?=$color ?>;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom-color.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">

    <?php if($setting['cust_darklayout'] == 'on'): ?>
        <?php if(isset($SITE_RTL) && $SITE_RTL == 'on'): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
        <?php endif; ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <?php if(isset($SITE_RTL) && $SITE_RTL == 'on'): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
        <?php else: ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
        <?php endif; ?>
    <?php endif; ?>
    <?php if(isset($SITE_RTL) && $SITE_RTL == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom-login-rtl.css')); ?>" id="main-style-link">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom-login.css')); ?>" id="main-style-link">
    <?php endif; ?>
    <?php if($setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom-dark.css')); ?>" id="main-style-link">
    <?php endif; ?>

</head>

<body class="<?php echo e($themeColor); ?>">
    <!-- [custom-login] start -->
    <div class="custom-login">
        <div class="login-bg-img">

            <?php if(strpos($themeColor, 'theme') === 0): ?>
                <img src="<?php echo e(asset('assets/images/' . $themeColor . '.svg')); ?>" class="login-bg-1">
            <?php else: ?>
                <img src="<?php echo e(asset('assets/images/theme-3.svg')); ?>" class="login-bg-1">
            <?php endif; ?>

            <img src="<?php echo e(asset('assets/images/common.svg')); ?>" class="login-bg-2">
        </div>
        <div class="bg-login bg-primary"></div>
        <div class="custom-login-inner">
            <header class="dash-header">
                <nav class="navbar navbar-expand-md default">
                    <div class="container">
                        <div class="navbar-brand">
                            <a href="#">
                                <img src="<?php echo e($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo . '?' . time() : 'logo_dark.png' . '?' . time())); ?>"
                                    class="logo" alt="<?php echo e(config('app.name', 'HRMGo SaaS')); ?>" alt="logo"
                                    loading="lazy" style="max-height: 50px;" />
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarlogin">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarlogin">
                            <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                                <?php echo $__env->make('landingpage::layouts.buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->yieldContent('language-bar'); ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <main class="custom-wrapper">
                <div class="custom-row">
                    <div class="card">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </main>
            <footer>
                <div class="auth-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <span>
                                    <?php if(empty(App\Models\Utility::getValByName('footer_text'))): ?>
                                        &copy;<?php echo e(date(' Y')); ?>

                                    <?php endif; ?>
                                    <?php echo e(App\Models\Utility::getValByName('footer_text') ? App\Models\Utility::getValByName('footer_text') : config('app.name', 'HRMGo Saas')); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        <div id="liveToast" class="toast text-white  fade" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <!-- [custom-login] end -->

    <!-- Required Js -->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor-all.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
    <script>
        feather.replace();
    </script>

    <input type="checkbox" class="d-none" id="cust-theme-bg"
        <?php echo e(\App\Models\Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : ''); ?> />
    <input type="checkbox" class="d-none" id="cust-darklayout"
        <?php echo e(\App\Models\Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : ''); ?> />

    
    

    
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('script'); ?>
    <?php echo $__env->yieldPushContent('custom-scripts'); ?>
    <?php if($enable_cookie['enable_cookie'] == 'on'): ?>
        <?php echo $__env->make('layouts.cookie_consent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if($message = Session::get('success')): ?>
        <script>
            show_toastr('Success', '<?php echo $message; ?>', 'success');
        </script>
    <?php endif; ?>
    <?php if($message = Session::get('error')): ?>
        <script>
            show_toastr('Error', '<?php echo $message; ?>', 'error');
        </script>
    <?php endif; ?>
</body>

</html>
<?php /**PATH C:\laravel\hrmgo\resources\views/layouts/auth.blade.php ENDPATH**/ ?>