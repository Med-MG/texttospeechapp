<!-- SIDE MENU BAR -->
<aside class="app-sidebar"> 
    <div class="app-sidebar__logo">
        <a class="header-brand" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(URL::asset('img/brand/logo.png')); ?>" class="header-brand-img desktop-lgo" alt="Admintro logo">
            <img src="<?php echo e(URL::asset('img/brand/favicon.png')); ?>" class="header-brand-img mobile-logo" alt="Admintro logo">
        </a>
    </div>
    <ul class="side-menu app-sidebar3">
        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
            <li class="side-item side-item-category mt-4"><?php echo e(__('Admin Dashboard')); ?></li>
            <li class="slide">
                <a class="side-menu__item"  href="<?php echo e(route('admin.dashboard')); ?>">
                    <span class="side-menu__icon fa-solid fa-grid-horizontal"></span>
                    <span class="side-menu__label"><?php echo e(__('Dashboard')); ?></span>
                </a>
            </li>
            <hr class="slide-divider">
            <li class="side-item side-item-category"><?php echo e(__('Admin Panel')); ?></li>
            <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                        <span class="side-menu__icon lead-3 fa-solid fa-wand-sparkles"></span>
                        <span class="side-menu__label"><?php echo e(__('TTS Management')); ?></span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.tts.dashboard')); ?>" class="slide-item"><?php echo e(__('TTS Dashboard')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.tts.results')); ?>" class="slide-item"><?php echo e(__('TTS Results')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.tts.voices')); ?>" class="slide-item"><?php echo e(__('Voices Customization')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.studio')); ?>" class="slide-item"><?php echo e(__('Sound Studio Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.tts.configs')); ?>" class="slide-item"><?php echo e(__('TTS Configuration')); ?></a></li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                    <span class="side-menu__icon mdi mdi-account-convert"></span>
                    <span class="side-menu__label"><?php echo e(__('User Management')); ?></span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.user.dashboard')); ?>" class="slide-item"><?php echo e(__('User Dashboard')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.user.list')); ?>" class="slide-item"><?php echo e(__('User List')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.user.activity')); ?>" class="slide-item"><?php echo e(__('Activity Monitoring')); ?></a></li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                    <span class="side-menu__icon fa-solid fa-sack-dollar"></span>
                    <span class="side-menu__label"><?php echo e(__('Finance Management')); ?></span>
                    <?php if(auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count()): ?>
                        <span class="badge badge-warning"><?php echo e(auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count()); ?></span>
                    <?php else: ?>
                        <i class="angle fa fa-angle-right"></i>
                    <?php endif; ?>
                </a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.finance.dashboard')); ?>" class="slide-item"><?php echo e(__('Finance Dashboard')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.payments')); ?>" class="slide-item"><?php echo e(__('All Payments')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.payments.subscriptions')); ?>" class="slide-item"><?php echo e(__('All Subscriptions')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.subscriptions')); ?>" class="slide-item"><?php echo e(__('Subscription Plans')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.prepaid')); ?>" class="slide-item"><?php echo e(__('Prepaid Plans')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.promocodes')); ?>" class="slide-item"><?php echo e(__('Promocodes')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.referral.settings')); ?>" class="slide-item"><?php echo e(__('Referral System')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.referral.payouts')); ?>" class="slide-item"><?php echo e(__('Referral Payouts')); ?>

                                <?php if((auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count())): ?>
                                    <span class="badge badge-warning ml-5"><?php echo e(auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count()); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li><a href="<?php echo e(route('admin.settings.invoice')); ?>" class="slide-item"><?php echo e(__('Invoice Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.settings')); ?>" class="slide-item"><?php echo e(__('Payment Settings')); ?></a></li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item"  href="<?php echo e(route('admin.support')); ?>">
                    <span class="side-menu__icon mdi mdi-account-alert"></span>
                    <span class="side-menu__label"><?php echo e(__('Support Requests')); ?></span>
                    <?php if(App\Models\Support::where('status', 'Open')->count()): ?>
                        <span class="badge badge-warning"><?php echo e(App\Models\Support::where('status', 'Open')->count()); ?></span>
                    <?php endif; ?> 
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                    <span class="side-menu__icon fa-solid fa-message-exclamation"></span>
                    <span class="side-menu__label"><?php echo e(__('Notifications')); ?></span>
                        <?php if(auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count()): ?>
                            <span class="badge badge-warning" id="total-notifications-a"></span>
                        <?php else: ?>
                            <i class="angle fa fa-angle-right"></i>
                        <?php endif; ?>
                    </a>                     
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.notifications')); ?>" class="slide-item"><?php echo e(__('Mass Notifications')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.notifications.system')); ?>" class="slide-item"><?php echo e(__('System Notifications')); ?> 
                                <?php if((auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count())): ?>
                                    <span class="badge badge-warning ml-5" id="total-notifications-b"></span>
                                <?php endif; ?>
                            </a>
                        </li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                    <span class="side-menu__icon fa fa-globe"></span>
                    <span class="side-menu__label"><?php echo e(__('Frontend Management')); ?></span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.settings.frontend')); ?>" class="slide-item"><?php echo e(__('Frontend Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.appearance')); ?>" class="slide-item"><?php echo e(__('SEO & Logos')); ?></a></li>                        
                        <li><a href="<?php echo e(route('admin.settings.blog')); ?>" class="slide-item"><?php echo e(__('Blogs Manager')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.faq')); ?>" class="slide-item"><?php echo e(__('FAQs Manager')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.usecase')); ?>" class="slide-item"><?php echo e(__('Use Cases Manager')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.review')); ?>" class="slide-item"><?php echo e(__('Reviews Manager')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.terms')); ?>" class="slide-item"><?php echo e(__('Pages Manager')); ?></a></li>               
                        <li><a href="<?php echo e(route('admin.settings.adsense')); ?>" class="slide-item"><?php echo e(__('Google AdSense')); ?></a></li>               
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                    <span class="side-menu__icon fa fa-sliders"></span>
                    <span class="side-menu__label"><?php echo e(__('General Settings')); ?></span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.settings.global')); ?>" class="slide-item"><?php echo e(__('Global Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.oauth')); ?>" class="slide-item"><?php echo e(__('Auth Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.registration')); ?>" class="slide-item"><?php echo e(__('Registration Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.smtp')); ?>" class="slide-item"><?php echo e(__('SMTP Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.backup')); ?>" class="slide-item"><?php echo e(__('Database Backup')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.activation')); ?>" class="slide-item"><?php echo e(__('Activation')); ?></a></li>     
                        <li><a href="<?php echo e(route('admin.settings.upgrade')); ?>" class="slide-item"><?php echo e(__('Upgrade Software')); ?></a></li>                 
                    </ul>
            </li>
    
            <hr class="slide-divider">
        <?php endif; ?>
        <?php if(auth()->check() && auth()->user()->hasRole('user|subscriber')): ?>
            <hr class="slide-divider d-none">
        <?php endif; ?>
        <li class="side-item side-item-category"><?php echo e(__('User Panel')); ?></li>
        <li class="slide">
            <a class="side-menu__item" href="<?php echo e(route('user.tts')); ?>">
            <span class="side-menu__icon lead-3 fa-solid fa-wand-sparkles"></span>
            <span class="side-menu__label"><?php echo e(__('Text to Speech')); ?></span></a>
        </li> 
        <li class="slide">
            <a class="side-menu__item" href="<?php echo e(route('user.tts.results')); ?>">
            <span class="side-menu__icon fa-solid fa-folder-music"></span>
            <span class="side-menu__label"><?php echo e(__('My TTS Audio Results')); ?></span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="<?php echo e(route('user.projects')); ?>">
            <span class="side-menu__icon fa-solid fa-boxes-packing"></span>
            <span class="side-menu__label"><?php echo e(__('My TTS Projects')); ?></span></a>
        </li>
        <?php if(config('tts.enable.sound_studio') == 'on'): ?>
            <li class="slide">
                <a class="side-menu__item" href="<?php echo e(route('user.studio')); ?>">
                <span class="side-menu__icon fa-solid fa-photo-film-music"></span>
                <span class="side-menu__label"><?php echo e(__('Sound Studio')); ?></span></a>
            </li>
        <?php endif; ?>  
        <?php if(auth()->check() && auth()->user()->hasRole('user')): ?>
            <?php if(config('settings.user_voices') == 'enabled'): ?>
                <li class="slide">
                    <a class="side-menu__item" href="<?php echo e(route('user.tts.voices')); ?>">
                        <span class="side-menu__icon fa-solid fa-cloud-music"></span>
                        <span class="side-menu__label"><?php echo e(__('All TTS Voices')); ?></span>
                    </a>
                </li>    
            <?php endif; ?>
        <?php endif; ?>
        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
            <li class="slide">
                <a class="side-menu__item" href="<?php echo e(route('user.tts.voices')); ?>">
                    <span class="side-menu__icon fa-solid fa-cloud-music"></span>
                    <span class="side-menu__label"><?php echo e(__('All TTS Voices')); ?></span>
                </a>
            </li>    
        <?php endif; ?>            
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . $page='#')); ?>">
            <span class="side-menu__icon fa-solid fa-badge-dollar"></span>
            <span class="side-menu__label"><?php echo e(__('My Balance')); ?></span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="<?php echo e(route('user.subscriptions')); ?>" class="slide-item"><?php echo e(__('Subscribe Now')); ?></a></li>                
                <li><a href="<?php echo e(route('user.balance.subscriptions')); ?>" class="slide-item"><?php echo e(__('My Subscriptions')); ?></a></li>                
                <li><a href="<?php echo e(route('user.balance.payments')); ?>" class="slide-item"><?php echo e(__('My Payments')); ?></a></li>  
                <?php if(config('payment.referral.enabled')  == 'on'): ?>     
                    <li><a href="<?php echo e(route('user.referral')); ?>" class="slide-item"><?php echo e(__('My Referrals')); ?></a></li>      
                <?php endif; ?> 
                <li><a href="<?php echo e(route('user.balance')); ?>" class="slide-item"><?php echo e(__('My Balance Dashboard')); ?></a></li>         
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                <span class="side-menu__icon mdi mdi-account-settings-variant special-icon"></span>
                <span class="side-menu__label"><?php echo e(__('My Profile Settings')); ?></span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="<?php echo e(route('user.profile')); ?>" class="slide-item"><?php echo e(__('My Profile')); ?></a></li>
                <li><a href="<?php echo e(route('user.password')); ?>" class="slide-item"><?php echo e(__('Change Password')); ?></a></li>
            </ul>
        </li>
        <?php if(auth()->check() && auth()->user()->hasRole('user')): ?>
            <?php if(config('settings.user_support') == 'enabled'): ?>
                <li class="slide">
                    <a class="side-menu__item" href="<?php echo e(route('user.support')); ?>">
                        <span class="side-menu__icon fa-solid fa-messages-question"></span>
                        <span class="side-menu__label"><?php echo e(__('Support Request')); ?></span>
                    </a>
                </li>
            <?php endif; ?>        
            <?php if(config('settings.user_notification') == 'enabled'): ?>
                <li class="slide">
                    <a class="side-menu__item" href="<?php echo e(route('user.notifications')); ?>">
                        <span class="side-menu__icon fa-solid fa-message-exclamation"></span>
                        <span class="side-menu__label"><?php echo e(__('Notifications')); ?></span>
                        <?php if(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()): ?>
                            <span class="badge badge-warning"><?php echo e(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()); ?></span>
                        <?php endif; ?>                
                    </a>
                </li>
            <?php endif; ?> 
        <?php endif; ?>
        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
            <li class="slide">
                <a class="side-menu__item" href="<?php echo e(route('user.support')); ?>">
                    <span class="side-menu__icon fa-solid fa-messages-question"></span>
                    <span class="side-menu__label"><?php echo e(__('Support Request')); ?></span>
                </a>
            </li>    
            <li class="slide">
                <a class="side-menu__item" href="<?php echo e(route('user.notifications')); ?>">
                    <span class="side-menu__icon fa-solid fa-message-exclamation"></span>
                    <span class="side-menu__label"><?php echo e(__('Notifications')); ?></span>
                    <?php if(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()): ?>
                        <span class="badge badge-warning"><?php echo e(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()); ?></span>
                    <?php endif; ?>                
                </a>
            </li>
        <?php endif; ?>
    </ul>
    <div class="aside-progress-position">
        <div class="d-flex">
            <span class="fs-10 text-muted pl-5">You have <?php echo e(App\Services\HelperService::getTotalCharsFormatted()); ?> chars left</span>
        </div>
    </div>
</aside>
<!-- END SIDE MENU BAR --><?php /**PATH C:\xampp\htdocs\textovoice\resources\views/layouts/nav-aside.blade.php ENDPATH**/ ?>