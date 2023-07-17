<?php $__env->startSection('css'); ?>
	<link href="<?php echo e(URL::asset('plugins/swiper/swiper.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('css/slick.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('css/slick-theme.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(URL::asset('plugins/awselect/awselect.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('plugins/audio-player/green-audio-player.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('plugins/aos/aos.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <section id="main-wrapper">
            
            <div class="h-100vh justify-center min-h-screen" id="main-background">

                <div class="container-fluid" >

                    <div class="central-banner">
                        <div class="row text-center">
                            <div class="col-md-6 col-sm-12 pt-9 pl-9" data-aos="fade-left" data-aos-delay="1000" data-aos-once="true" data-aos-duration="1000">
                                <div class="text-container">
                                    <h2>AI Powered <span>Text to Speech</span> Converter</h2>
                                    <p class="pl-6 pr-6"><?php echo e(__('Create realistic voices for any text in seconds by using')); ?> <br> <?php echo e(__('over +840 realistic voices across +135 languages & dialects')); ?>.</p>

                                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary special-action-button"><?php echo e(__('Register Now')); ?></a>

                                    <?php if(config('tts.vendor_logos') == 'show'): ?>
                                        <div class="vendors">
                                            <h6>Powered By</h6>
                                            <span class="mr-3"><img src="<?php echo e(URL::asset('img/csp/aws-sm.png')); ?>" alt=""></span>
                                            <span class="mr-3"><img src="<?php echo e(URL::asset('img/csp/azure-sm.png')); ?>" alt=""></span>
                                            <span class="mr-3"><img src="<?php echo e(URL::asset('img/csp/gcp-sm.png')); ?>" alt=""></span>
                                            <span><img src="<?php echo e(URL::asset('img/csp/ibm-sm.png')); ?>" alt=""></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12" data-aos="fade-right" data-aos-delay="1000" data-aos-once="true" data-aos-duration="1000">
                                <div class="image-container pr-8">
                                    <img src="<?php echo e(URL::asset('img/files/home.png')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>

            </div>  
        </section>


        <!-- SECTION - LIVE DEMO 
        ========================================================-->
        <?php if(config('tts.frontend.status') == 'on'): ?>
            <section id="demo-wrapper">

                <div class="container pb-9">     

                    <div class="row text-center">                    

                        <!-- TITLE -->
                        <div class="col-md-12" id="about-title">
                            
                            <div class="title mb-8">
                                <h6><?php echo e(__('Experience')); ?> <span>AI Voices</span></h6>
                                <p class="p-about"><?php echo e(__('Try out live demo without logging in, or login to enjoy all SSML features')); ?></p>
                            </div>

                        </div> <!-- END TITLE -->

                    </div>          
                                    
                    <div class="row justify-content-md-center">
                        
                        <div class="col-md-9" data-aos="flip-left" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">

                            <div class="card special-shadow border-0">
                                <div class="card-body p-5">                        
                                    <form id="synthesize-text-form" action="<?php echo e(route('tts.listen')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
            
                                        <div class="row" id="frontend-language-select">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">									
                                                    <select id="languages" name="language" data-placeholder="<?php echo e(__('Pick Your Language')); ?>:" data-callback="language_select">	
                                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($language->language_code); ?>" data-img="<?php echo e(URL::asset($language->language_flag)); ?>" <?php if(config('tts.default_language') == $language->language_code): ?> selected <?php endif; ?>> <?php echo e($language->language); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>											
                                                    </select>
                                                </div>
                                            </div>
            
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">									
                                                    <select id="voices" name="voice" data-placeholder="<?php echo e(__('Choose Your Voice')); ?>:" data-callback="voice_select">
                                                        <?php $__currentLoopData = $voices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($voice->voice_id); ?>" 
                                                                id="<?php echo e($voice->voice_id); ?>"
                                                                data-id="<?php echo e($voice->voice_id); ?>" 
                                                                data-img="<?php echo e(URL::asset($voice->avatar_url)); ?>"
                                                                data-lang="<?php echo e($voice->language_code); ?>" 
                                                                data-type="<?php echo e($voice->voice_type); ?>"
                                                                data-gender="<?php echo e($voice->gender); ?>"	
                                                                data-voice="<?php echo e($voice->voice); ?>"	
													            data-url="<?php echo e(URL::asset($voice->sample_url)); ?>"
                                                                <?php if(config('tts.user_neural') == 'disable'): ?>
                                                                    data-usage= "<?php if((config('tts.frontend.neural') == 'disable') && ($voice->voice_type == 'neural')): ?> avoid-clicks <?php endif; ?>"	
                                                                <?php endif; ?>	
                                                                <?php if(config('tts.default_voice') == $voice->voice_id): ?> selected <?php endif; ?>																						
                                                                data-class="<?php if(config('tts.default_language') !== $voice->language_code): ?> remove-voice <?php endif; ?>"> 
                                                                <?php echo e($voice->voice); ?> 														
                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>									
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12 pt-1">
                                                <button type="button" class="result-play result-play-sm mr-2" onclick="resultPlay(this)" src="" type="audio/mpeg" id="preview"><i class="fa fa-play"></i></button><span class="fs-12 font-weight-bold">Preview <span id="preview-name"></span></span>
                                            </div>
                                        </div>
            
            
                                        <div class="row">
            
                                            <div class="col-md-12">
                                                <div class="input-box mb-0" id="textarea-box">
                                                    <textarea class="form-control" name="textarea" id="textarea" rows="7" placeholder="<?php echo e(__('Select your Language and Voice')); ?>... <?php echo e(__('Enter your text here to synthesize')); ?>... " required></textarea>
                                                    <label class="input-label">
                                                        <span class="input-label-content input-label-main">Text to Speech</span>
                                                    </label>
                                                </div>								
                                                    
                                                <p class="jQTAreaExt"></p>
            
                                                <div id="textarea-settings">								
                                                    <div class="character-counter">
                                                        <span><em class="jQTAreaCount"></em>/<em class="jQTAreaValue"></em> <?php echo e(__('characters used')); ?></span>
                                                    </div>
            
                                                    <div class="clear-button">
                                                        <button type="button" id="clear-text"><?php echo e(__('Clear Text')); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                        
                                        <div class="mt-5 text-center" id="waveform-box">      
                                            
                                            <div class="col-md-12 no-gutters">
                                                <div id="waveform"></div> 
                                                <div id="wave-timeline"></div>
                                            </div>                                            
                                           
                                            <div id="controls" class="mt-4 mb-3">
                                                <button id="backwardBtn" class="result-play result-play-sm mr-2"><i class="fa fa-backward"></i></button>
                                                <button id="playBtn" class="result-play result-play-sm mr-2"><i class="fa fa-play"></i></button>
                                                <button id="stopBtn" class="result-play result-play-sm mr-2"><i class="fa fa-stop"></i></button>
                                                <button id="forwardBtn" class="result-play result-play-sm mr-2"><i class="fa fa-forward"></i></button>							
                                            </div>  
                                        </div>
            
                                        <div class="card-footer border-0 text-center mb-0">
                                            <span id="processing"><img src="<?php echo e(URL::asset('/img/svgs/processing.svg')); ?>" alt=""></span>
                                            <button type="button" class="btn btn-primary main-action-button special-action-button mr-2" id="frontend-listen-text"><?php echo e(__('Listen')); ?></button>                                            
                                        </div>							
            
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div> 

                    <!-- GOOGLE ADSENSE -->
                    <?php if(config('adsense.status') == 'on'): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="adsense">
                                    <?php echo Adsense::ads('rectangle'); ?>

                                </div>                            
                            </div>
                        </div>
                    <?php endif; ?>                    

                </div> <!-- END CONTAINER -->

            </section> <!-- END LIVE DEMO SECTION -->
        <?php endif; ?>


        <!-- SECTION - FEATURES
        ========================================================-->
        <?php if(config('frontend.features_section') == 'on'): ?>
            <section id="features-wrapper">

                <div class="container">

                    <div class="row text-center mt-8 mb-8">
                        <div class="col-md-12 title">
                            <h6><span>Text to Speech</span> <?php echo e(__('Benefits')); ?></h6>
                            <p><?php echo e(__('Enjoy the full flexibility of the platform with ton of features')); ?></p>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <!-- LIST OF SOLUTIONS -->
                        <div class="row d-flex" id="solutions-list">
                            
                            <div class="col-md-4 col-sm-12">
                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                        
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="1000" data-aos-once="true" data-aos-duration="1000">
                                        
                                        <div class="solution-content">
                                            
                                            <div class="solution-logo">
                                                <i class="fa fa-magic"></i>
                                            </div>
                                        
                                            <h5><?php echo e(__('Over +840 Voices')); ?></h5>
                                            
                                            <p>Lorem ipsum dolor sit amet est consectetur adipisicing elit. Ut aspernatur mollitia aliquid consectetur illo sapiente nemo obcaecati unde.</p>

                                        </div>                         

                                    </div>

                                </div> <!-- END SOLUTION -->
                                
                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                        
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="1500" data-aos-once="true" data-aos-duration="1500">
                                        
                                        <div class="solution-content">
                                            
                                            <div class="solution-logo">
                                                <i class="mdi mdi-account-check"></i>
                                            </div>
                                        
                                            <h5><?php echo e(__('Full set of SSML Features')); ?></h5>
                                            
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut aspernatur mollitia aliquid consectetur illo sapiente nemo obcaecati unde.</p>

                                        </div>

                                    </div>

                                </div> <!-- END SOLUTION -->

                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                        
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="2000" data-aos-once="true" data-aos-duration="2000">
                                        
                                        <div class="solution-content">
                                            
                                            <div class="solution-logo">
                                                <i class="mdi mdi-audiobook"></i>
                                            </div>
                                        
                                            <h5><?php echo e(__('Various Audio Formats')); ?></h5>
                                            
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut aspernatur mollitia aliquid consectetur illo sapiente nemo obcaecati unde.</p>

                                        </div>

                                    </div>

                                </div> <!-- END SOLUTION -->
                            </div>

                            <div class="col-md-4 col-sm-12 mt-7">
                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                        
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="1000" data-aos-once="true" data-aos-duration="1000">
                                        
                                        <div class="solution-content">
                                            
                                            <div class="solution-logo">
                                                <i class="mdi mdi-alphabetical"></i>
                                            </div>
                                        
                                            <h5><?php echo e(__('Over +135 Languages & Dialects')); ?></h5>
                                            
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut aspernatur mollitia aliquid consectetur illo sapiente nemo obcaecati unde.</p>

                                        </div>

                                    </div>

                                </div> <!-- END SOLUTION -->


                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                        
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="1500" data-aos-once="true" data-aos-duration="1500">
                                        
                                        <div class="solution-content">
                                            
                                            <div class="solution-logo">
                                                <i class="mdi mdi-zip-box"></i>
                                            </div>
                                        
                                            <h5><?php echo e(__('Download & Share Results Easily')); ?></h5>
                                            
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut aspernatur mollitia aliquid consectetur illo sapiente nemo obcaecati unde.</p>

                                        </div>                                

                                    </div>

                                </div> <!-- END SOLUTION -->


                                <!-- SOLUTION -->
                                <div class="col-sm-12 mb-6">
                                        
                                    <div class="solution" data-aos="zoom-in" data-aos-delay="2000" data-aos-once="true" data-aos-duration="2000">
                                        
                                        <div class="solution-content">
                                            
                                            <div class="solution-logo">
                                                <i class="mdi mdi-approval"></i>
                                            </div>
                                        
                                            <h5><?php echo e(__('Standard & Neural Voices')); ?></h5>
                                            
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut aspernatur mollitia aliquid consectetur illo sapiente nemo obcaecati unde.</p>

                                        </div>

                                    </div>

                                </div> <!-- END SOLUTION -->
                            </div>

                            <div class="col-md-4 col-sm-12 d-flex">

                                <div class="feature-text">
                                    <div>
                                        <h4><?php echo e(__('Accurately convert text to speech powered by leading')); ?><br> <span>Cloud <span class="text-primary">AI</span> Technologies</span></h4>
                                    </div>
                                    
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quibusdam? Illum ad eius, molestiae placeat dicta quae, ab nihil omnis obcaecati reiciendis recusandae, voluptatem eos molestias aliquam saepe tenetur optio? Consectetur adipisicing elit. Ut aspernatur mollitia aliquid consectetur illo sapiente nemo obcaecati.</p>
                                </div>
                                
                            </div>
                            
                        </div> <!-- END LIST OF SOLUTIONS -->

                    </div>

                </div>

            </section>
        <?php endif; ?>


        <!-- SECTION - USE CASES
        ========================================================-->
        <?php if(config('frontend.cases_section') == 'on'): ?>
            <section id="cases-wrapper">

                <div class="container-fluid" id="curve-container">
                    <div class="curve-box">
                        <div class="overflow-hidden curve">
                            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="#EDF8FD"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="container pt-9">

                    <div class="row text-center mb-8">
                        <div class="col-md-12 title">
                            <h6><span><?php echo e(__('Unlimited')); ?></span> <?php echo e(__('Use Cases')); ?></h6>
                            <p><?php echo e(__('Create any type of audio content as you prefer')); ?></p>
                        </div>
                    </div>

                    <div class="row">

                        <?php if($case_exists): ?>

                            <div class="blog-slider" data-aos="zoom-out" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">
                                <div class="blog-slider__wrp swiper-wrapper">

                                    <?php $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="blog-slider__item swiper-slide">
                                            <div class="blog-slider__img">
                                                <img src="<?php echo e(URL::asset($case->image_url)); ?>" alt="">
                                            </div>
                                            <div class="blog-slider__content">
                                                <div class="blog-slider__title"><?php echo e($case->title); ?></div>
                                                <div class="blog-slider__text"><?php echo $case->text; ?></div>
                                                <div class="audio-box">
                                                    <!-- VOICE AUDIO FILE -->
                                                    <div class="voice-player">                                      																	
                                                        <div class="text-center player">
                                                            <audio class="voice-audio" preload="none">
                                                                <source src="<?php echo e(URL::asset($case->audio_url)); ?>" type="audio/mpeg">
                                                            </audio>	
                                                        </div>                                        								
                                                    </div><!-- END VOICE AUDIO FILE -->
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>

                                <div class="blog-slider__pagination"></div>

                            </div>

                        <?php else: ?>
                            <div class="row text-center">
                                <div class="col-sm-12 mt-6 mb-6">
                                    <h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No use cases were published yet')); ?></h6>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                    
                </div>

            </section>
        <?php endif; ?>


        <!-- SECTION - BANNER
        ========================================================-->
        <section id="flags-wrapper">
            <div class="container-fluid" id="flags-bg">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row mb-7">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/za.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/ae.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/bg.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/es.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/cn.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/cz.svg')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/dk.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/nl.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/au.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/gb.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/us.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/ph.svg')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/fi.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/fr.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/ca.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/de.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/gr.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/in.svg')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/hu.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/is.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/id.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/it.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/jp.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/kr.svg')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/lv.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/my.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/no.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/pl.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/br.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/pt.svg')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/ro.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/ru.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/rs.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/sk.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/se.svg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="<?php echo e(URL::asset('img/flags/th.svg')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 pl-9 d-flex align-items-center" id=flags-minify>
                        <div class="flags-info" data-aos="fade-left" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">
                            <h4>More than <span>+840</span> voices across<br><span>+135</span> languages and dialects</h4>
                            <p>The list of languages is constantly updated. In addition, <br> the synthesis of existing languages is constantly being <br>updated and improved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION - CUSTOMER FEEDBACKS
        ========================================================-->
        <?php if(config('frontend.reviews_section') == 'on'): ?>
            <section id="feedbacks-wrapper">

                <div class="container pt-9 text-center">


                    <!-- SECTION TITLE -->
                    <div class="row mb-8">

                        <div class="title">
                            <h6><?php echo e(__('Customer')); ?> <span><?php echo e(__('Reviews')); ?></span></h6>
                            <p><?php echo e(__('We guarantee that you will be one of our happy customers as well')); ?></p>
                        </div>

                    </div> <!-- END SECTION TITLE -->

                    <?php if($review_exists): ?>

                        <div class="row" id="feedbacks">
                            
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="feedback" data-aos="flip-down" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">					
                                    <!-- MAIN COMMENT -->
                                    <p class="comment"><sup><span class="fa fa-quote-left"></span></sup> <?php echo e($review->text); ?> <sub><span class="fa fa-quote-right"></span></sub></p>

                                    <!-- COMMENTER -->
                                    <div class="feedback-image d-flex">
                                        <div>
                                            <img src="<?php echo e(URL::asset($review->image_url)); ?>" alt="Feedback" class="rounded-circle"><span class="small-quote fa fa-quote-left"></span>
                                        </div>

                                        <div class="pt-3">
                                            <p class="feedback-reviewer"><?php echo e($review->name); ?></p>
                                            <p class="fs-12"><?php echo e($review->position); ?></p>
                                        </div>
                                    </div>	
                                </div> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                       
                        </div>

                        <!-- ROTATORS BUTTONS -->
                        <div class="offers-nav">
                            <a class="offers-prev"><i class="fa fa-chevron-left"></i></a>
                            <a class="offers-next"><i class="fa fa-chevron-right"></i></a>                                
                        </div>

                    <?php else: ?>
                        <div class="row text-center">
                            <div class="col-sm-12 mt-6 mb-6">
                                <h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No customer reviews were published yet')); ?></h6>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    
                </div> <!-- END CONTAINER -->
                
            </section> <!-- END SECTION CUSTOMER FEEDBACK -->
        <?php endif; ?>


         <!-- SECTION - BANNER
        ========================================================-->
        <section id="banner-wrapper">

            <div class="container-fluid">

                <div class="row text-center">
                    <div class="col-md-12">
                        <h4>Why Cloud Polly?</h4>
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12" id="google-banner-minify" data-aos="fade-right" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">
                        <img src="<?php echo e(URL::asset('img/files/banner.png')); ?>" alt="">
                    </div>

                    <div class="col-md-6 col-sm-12" id="banner-text" data-aos="fade-left" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">
                        <div class="banner-text-inner">
                            <h5><?php echo e(__('Spend less time to synthesize your text into audio files')); ?></h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi ab eaque a ex voluptate fugit, dolorum nisi veritatis quisquam perferendis. Iure consequatur porro omnis quo culpa cum vel dicta recusandae!</p>
                        </div>
                        <div class="banner-text-inner">
                            <h5><?php echo e(__('Synthesize text in more than 135 languages and dialects')); ?></h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi ab eaque a ex voluptate fugit, dolorum nisi veritatis quisquam perferendis. Iure consequatur porro omnis quo culpa cum vel dicta recusandae!</p>
                        </div>
                        <div class="banner-text-inner">
                            <h5><?php echo e(__('Supports various audio formats with different frequencies')); ?></h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi ab eaque a ex voluptate fugit, dolorum nisi veritatis quisquam perferendis. Iure consequatur porro omnis quo culpa cum vel dicta recusandae!</p>
                        </div>
                        <div class="banner-text-inner">
                            <h5><?php echo e(__('Powerful Sound Studio to merge and enhance audio results')); ?></h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi ab eaque a ex voluptate fugit, dolorum nisi veritatis quisquam perferendis. Iure consequatur porro omnis quo culpa cum vel dicta recusandae!</p>
                        </div>
                    </div>
                </div>
            </div>

        </section> <!-- END SECTION BANNER -->


        <!-- SECTION - BLOGS
        ========================================================-->
        <?php if(config('frontend.blogs_section') == 'on'): ?>
            <section id="blog-wrapper">

                <div class="container pt-9 text-center">


                    <!-- SECTION TITLE -->
                    <div class="row mb-8">

                        <div class="title w-100">
                            <h6><span><?php echo e(__('Text to Speech')); ?></span> <?php echo e(__('Blogs')); ?></h6>
                            <p><?php echo e(__('Read our unique blog articles about various text to speech use cases and secrets')); ?></p>
                        </div>

                    </div> <!-- END SECTION TITLE -->

                    <?php if($blog_exists): ?>
                        
                        <!-- BLOGS -->
                        <div class="row" id="blogs">
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="blog" data-aos="zoom-in" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">			
                                <div class="blog-box">
                                    <div class="blog-img">
                                        <a href="<?php echo e(route('blogs.show', $blog->url)); ?>"><img src="<?php echo e(URL::asset($blog->image)); ?>" alt="Blog Image"></a>
                                    </div>
                                    <div class="blog-info">
                                        <h5 class="blog-title text-left"><?php echo e($blog->title); ?></h5>
                                        <h6 class="blog-date text-left"><i class="mdi mdi-alarm mr-2"></i><?php echo e(date('F j, Y', strtotime($blog->created_at))); ?></h6>
                                    </div>
                                </div>                        
                            </div> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> 
                        

                        <!-- ROTATORS BUTTONS -->
                        <div class="blogs-nav">
                            <a class="blogs-prev"><i class="fa fa-chevron-left"></i></a>
                            <a class="blogs-next"><i class="fa fa-chevron-right"></i></a>                                
                        </div>

                    <?php else: ?>
                        <div class="row text-center">
                            <div class="col-sm-12 mt-6 mb-6">
                                <h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No blog articles were published yet')); ?></h6>
                            </div>
                        </div>
                    <?php endif; ?>

                </div> <!-- END CONTAINER -->
                
            </section> <!-- END SECTION BLOGS -->
        <?php endif; ?>


        <!-- SECTION - FAQ
        ========================================================-->
        <?php if(config('frontend.faq_section') == 'on'): ?>
            <section id="faq-wrapper">    
                <div class="container pt-7">

                    <div class="row text-center mb-8 mt-7">
                        <div class="col-md-12 title">
                            <h6><?php echo e(__('Frequently Asked')); ?> <span><?php echo e(__('Questions')); ?></span></h6>
                            <p><?php echo e(__('Got questions? We have you covered.')); ?></p>
                        </div>
                    </div>

                    <div class="row justify-content-md-center">
        
                        <?php if($faq_exists): ?>

                            <div class="col-md-10">
        
                                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div id="accordion" data-aos="fade-left" data-aos-delay="300" data-aos-once="true" data-aos-duration="700">
                                        <div class="card">
                                            <div class="card-header" id="heading<?php echo e($faq->id); ?>">
                                                <h5 class="mb-0">
                                                <span class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?php echo e($faq->id); ?>" aria-expanded="false" aria-controls="collapse-<?php echo e($faq->id); ?>">
                                                    <?php echo e($faq->question); ?>

                                                </span>
                                                </h5>
                                            </div>
                                        
                                            <div id="collapse-<?php echo e($faq->id); ?>" class="collapse" aria-labelledby="heading<?php echo e($faq->id); ?>" data-parent="#accordion">
                                                <div class="card-body">
                                                    <?php echo $faq->answer; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                    
        
                        <?php else: ?>
                            <div class="row text-center">
                                <div class="col-sm-12 mt-6 mb-6">
                                    <h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No FAQ answers were published yet')); ?></h6>
                                </div>
                            </div>
                        <?php endif; ?>
            
                    </div>        
                </div>
        
            </section> <!-- END SECTION FAQ -->
        <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!-- Green Audio Player JS -->
    <script src="<?php echo e(URL::asset('plugins/audio-player/green-audio-player.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/audio-player.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/wavesurfer.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('plugins/wavesurfer/wavesurfer.cursor.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('plugins/wavesurfer/wavesurfer.timeline.min.js')); ?>"></script>

     <!-- Custom js-->
    <script src="<?php echo e(URL::asset('plugins/jqtarea/plugin-jqtarea.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('plugins/awselect/awselect-custom.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('plugins/swiper/swiper.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('plugins/aos/aos.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/awselect.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/frontend.js')); ?>"></script>    
	
    <script type="text/javascript">
		$(function () {

			"use strict";

			$(document).ready(function(){
				$("#textarea").jQTArea({
					setLimit: <?php echo e($max_chars); ?>,
					setExt: "W",
					setExtR: true 
				});
			});

 
            AOS.init();
            

		});    
    </script>
   
     
<?php $__env->stopSection(); ?>
        
        
       
        
       
    


<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\textovoice\resources\views/home.blade.php ENDPATH**/ ?>