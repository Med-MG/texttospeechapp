@extends('layouts.guest')

@section('css')
	<link href="{{URL::asset('plugins/swiper/swiper.min.css')}}" rel="stylesheet" />
	<link href="{{URL::asset('css/slick.css')}}" rel="stylesheet" />
	<link href="{{URL::asset('css/slick-theme.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('plugins/awselect/awselect.min.css')}}" rel="stylesheet" />
	<link href="{{ URL::asset('plugins/audio-player/green-audio-player.css') }}" rel="stylesheet" />
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
	<link href="{{URL::asset('plugins/aos/aos.css')}}" rel="stylesheet" />
@endsection

@section('content')

        <section id="main-wrapper">
            
            <div class="h-100vh justify-center min-h-screen" id="main-background">

                <div class="container-fluid" >

                    <div class="central-banner">
                        <div class="row text-center">
                            <div class="col-md-6 col-sm-12 pt-9 pl-9" data-aos="fade-left" data-aos-delay="1000" data-aos-once="true" data-aos-duration="1000">
                                <div class="text-container">
                                    <h2>AI Powered <span>Text to Speech</span> Converter</h2>
                                    <p class="pl-6 pr-6">{{ __('Create realistic voices for any text in seconds by using') }} <br> {{ __('over +840 realistic voices across +135 languages & dialects') }}.</p>

                                    <a href="{{ route('register') }}" class="btn btn-primary special-action-button">{{ __('Register Now') }}</a>

                                    @if (config('tts.vendor_logos') == 'show')
                                        <div class="vendors">
                                            <h6>Powered By</h6>
                                            <span class="mr-3"><img src="{{ URL::asset('img/csp/aws-sm.png') }}" alt=""></span>
                                            <span class="mr-3"><img src="{{ URL::asset('img/csp/azure-sm.png') }}" alt=""></span>
                                            <span class="mr-3"><img src="{{ URL::asset('img/csp/gcp-sm.png') }}" alt=""></span>
                                            <span><img src="{{ URL::asset('img/csp/ibm-sm.png') }}" alt=""></span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12" data-aos="fade-right" data-aos-delay="1000" data-aos-once="true" data-aos-duration="1000">
                                <div class="image-container pr-8">
                                    <img src="{{ URL::asset('img/files/home.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>

            </div>  
        </section>


        <!-- SECTION - LIVE DEMO 
        ========================================================-->
        @if (config('tts.frontend.status') == 'on')
            <section id="demo-wrapper">

                <div class="container pb-9">     

                    <div class="row text-center">                    

                        <!-- TITLE -->
                        <div class="col-md-12" id="about-title">
                            
                            <div class="title mb-8">
                                <h6>{{ __('Experience') }} <span>AI Voices</span></h6>
                                <p class="p-about">{{ __('Try out live demo without logging in, or login to enjoy all SSML features') }}</p>
                            </div>

                        </div> <!-- END TITLE -->

                    </div>          
                                    
                    <div class="row justify-content-md-center">
                        
                        <div class="col-md-9" data-aos="flip-left" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">

                            <div class="card special-shadow border-0">
                                <div class="card-body p-5">                        
                                    <form id="synthesize-text-form" action="{{ route('tts.listen') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
            
                                        <div class="row" id="frontend-language-select">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">									
                                                    <select id="languages" name="language" data-placeholder="{{ __('Pick Your Language') }}:" data-callback="language_select">	
                                                        @foreach ($languages as $language)
                                                            <option value="{{ $language->language_code }}" data-img="{{ URL::asset($language->language_flag) }}" @if (config('tts.default_language') == $language->language_code) selected @endif> {{ $language->language }}</option>
                                                        @endforeach											
                                                    </select>
                                                </div>
                                            </div>
            
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">									
                                                    <select id="voices" name="voice" data-placeholder="{{ __('Choose Your Voice') }}:" data-callback="voice_select">
                                                        @foreach ($voices as $voice)
                                                            <option value="{{ $voice->voice_id }}" 
                                                                id="{{ $voice->voice_id }}"
                                                                data-id="{{ $voice->voice_id }}" 
                                                                data-img="{{ URL::asset($voice->avatar_url) }}"
                                                                data-lang="{{ $voice->language_code }}" 
                                                                data-type="{{ $voice->voice_type }}"
                                                                data-gender="{{ $voice->gender }}"	
                                                                data-voice="{{ $voice->voice }}"	
													            data-url="{{ URL::asset($voice->sample_url) }}"
                                                                @if (config('tts.user_neural') == 'disable')
                                                                    data-usage= "@if ((config('tts.frontend.neural') == 'disable') && ($voice->voice_type == 'neural')) avoid-clicks @endif"	
                                                                @endif	
                                                                @if (config('tts.default_voice') == $voice->voice_id) selected @endif																						
                                                                data-class="@if (config('tts.default_language') !== $voice->language_code) remove-voice @endif"> 
                                                                {{ $voice->voice }} 														
                                                            </option>
                                                        @endforeach									
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
                                                    <textarea class="form-control" name="textarea" id="textarea" rows="7" placeholder="{{ __('Select your Language and Voice') }}... {{ __('Enter your text here to synthesize') }}... " required></textarea>
                                                    <label class="input-label">
                                                        <span class="input-label-content input-label-main">Text to Speech</span>
                                                    </label>
                                                </div>								
                                                    
                                                <p class="jQTAreaExt"></p>
            
                                                <div id="textarea-settings">								
                                                    <div class="character-counter">
                                                        <span><em class="jQTAreaCount"></em>/<em class="jQTAreaValue"></em> {{ __('characters used') }}</span>
                                                    </div>
            
                                                    <div class="clear-button">
                                                        <button type="button" id="clear-text">{{ __('Clear Text') }}</button>
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
                                            <span id="processing"><img src="{{ URL::asset('/img/svgs/processing.svg') }}" alt=""></span>
                                            <button type="button" class="btn btn-primary main-action-button special-action-button mr-2" id="frontend-listen-text">{{ __('Listen') }}</button>                                            
                                        </div>							
            
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div> 

                    <!-- GOOGLE ADSENSE -->
                    @if (config('adsense.status') == 'on')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="adsense">
                                    {!! Adsense::ads('rectangle') !!}
                                </div>                            
                            </div>
                        </div>
                    @endif                    

                </div> <!-- END CONTAINER -->

            </section> <!-- END LIVE DEMO SECTION -->
        @endif


        <!-- SECTION - FEATURES
        ========================================================-->
        @if (config('frontend.features_section') == 'on')
            <section id="features-wrapper">

                <div class="container">

                    <div class="row text-center mt-8 mb-8">
                        <div class="col-md-12 title">
                            <h6><span>Text to Speech</span> {{ __('Benefits') }}</h6>
                            <p>{{ __('Enjoy the full flexibility of the platform with ton of features') }}</p>
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
                                        
                                            <h5>{{ __('Over +840 Voices') }}</h5>
                                            
                                            <p>With a wide range of voices to choose from, including male, female, and various age groups, the TTS service provides great flexibility in tailoring the voice output to suit specific needs and preferences. The voices are carefully crafted using state-of-the-art neural network models, ensuring realistic intonation, pronunciation, and natural-sounding expressions.</p>

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
                                        
                                            <h5>{{ __('Full set of SSML Features') }}</h5>
                                            
                                            <p>A Full set of SSML (Speech Synthesis Markup Language) Features for Text-to-Speech software as a service provides a robust and versatile toolkit for controlling and enhancing the speech synthesis process. SSML is an XML-based markup language that allows users to fine-tune the generated speech, adding expressiveness and customization to the output.</p>

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
                                        
                                            <h5>{{ __('Various Audio Formats') }}</h5>
                                            
                                            <p>A EVER GENIOUS (TTS)  offering support for Various Audio Formats provides users with the flexibility to choose from a range of audio file types for the synthesized speech output. This capability allows users to select the most suitable audio format based on their specific requirements and the intended application of the speech synthesis.</p>

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
                                        
                                            <h5>{{ __('Over +135 Languages & Dialects') }}</h5>
                                            
                                            <p>Over +135 Languages & Dialects for TTS software as a service is a comprehensive and inclusive platform that offers a wide selection of more than 135 languages and dialects for converting written text into natural-sounding speech. This cloud-based service is designed to cater to a global audience, providing support for a diverse range of languages and regional accents.</p>

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
                                        
                                            <h5>{{ __('Download & Share Results Easily') }}</h5>
                                            
                                            <p>The Download & Share Results Easily feature in a EVER GENIUS offers users a simple and convenient way to access and distribute the synthesized speech output. This feature allows users to download the generated audio files in various formats, making it easy to integrate the speech into their applications, projects, or content.</p>

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
                                        
                                            <h5>{{ __('Standard & Neural Voices') }}</h5>
                                            
                                            <p>The EVER GENIUS offers two main types of voices: Standard Voices and Neural Voices, providing users with a choice between different speech synthesis technologies to suit their specific needs.</p>

                                        </div>

                                    </div>

                                </div> <!-- END SOLUTION -->
                            </div>

                            <div class="col-md-4 col-sm-12 d-flex">

                                <div class="feature-text">
                                    <div>
                                        <h4>{{ __('Accurately convert text to speech powered by leading') }}<br> <span>Cloud <span class="text-primary">AI</span> Technologies</span></h4>
                                    </div>
                                    
                                    <p>EVERGENIUS offers numerous benefits that cater to developers, businesses, and individuals looking to integrate speech-related capabilities into their applications, products, or services.</p>
                                </div>
                                
                            </div>
                            
                        </div> <!-- END LIST OF SOLUTIONS -->

                    </div>

                </div>

            </section>
        @endif


        <!-- SECTION - USE CASES
        ========================================================-->
        @if (config('frontend.cases_section') == 'on')
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
                            <h6><span>{{ __('Unlimited') }}</span> {{ __('Use Cases') }}</h6>
                            <p>{{ __('Create any type of audio content as you prefer') }}</p>
                        </div>
                    </div>

                    <div class="row">

                        @if ($case_exists)

                            <div class="blog-slider" data-aos="zoom-out" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">
                                <div class="blog-slider__wrp swiper-wrapper">

                                    @foreach ($cases as $case)
                                        <div class="blog-slider__item swiper-slide">
                                            <div class="blog-slider__img">
                                                <img src="{{ URL::asset($case->image_url) }}" alt="">
                                            </div>
                                            <div class="blog-slider__content">
                                                <div class="blog-slider__title">{{ $case->title }}</div>
                                                <div class="blog-slider__text">{!! $case->text !!}</div>
                                                <div class="audio-box">
                                                    <!-- VOICE AUDIO FILE -->
                                                    <div class="voice-player">                                      																	
                                                        <div class="text-center player">
                                                            <audio class="voice-audio" preload="none">
                                                                <source src="{{ URL::asset($case->audio_url) }}" type="audio/mpeg">
                                                            </audio>	
                                                        </div>                                        								
                                                    </div><!-- END VOICE AUDIO FILE -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="blog-slider__pagination"></div>

                            </div>

                        @else
                            <div class="row text-center">
                                <div class="col-sm-12 mt-6 mb-6">
                                    <h6 class="fs-12 font-weight-bold text-center">{{ __('No use cases were published yet') }}</h6>
                                </div>
                            </div>
                        @endif

                    </div>
                    
                </div>

            </section>
        @endif


        <!-- SECTION - BANNER
        ========================================================-->
        <section id="flags-wrapper">
            <div class="container-fluid" id="flags-bg">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row mb-7">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/za.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/ae.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/bg.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/es.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/cn.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/cz.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/dk.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/nl.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/au.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/gb.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/us.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/ph.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/fi.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/fr.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/ca.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/de.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/gr.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/in.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/hu.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/is.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/id.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/it.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/jp.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/kr.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/lv.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/my.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/no.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/pl.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/br.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/pt.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/ro.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/ru.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/rs.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/sk.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/se.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="flag-img">
                                    <img src="{{ URL::asset('img/flags/th.svg') }}" alt="">
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
        @if (config('frontend.reviews_section') == 'on')
            <section id="feedbacks-wrapper">

                <div class="container pt-9 text-center">


                    <!-- SECTION TITLE -->
                    <div class="row mb-8">

                        <div class="title">
                            <h6>{{ __('Customer') }} <span>{{ __('Reviews') }}</span></h6>
                            <p>{{ __('We guarantee that you will be one of our happy customers as well') }}</p>
                        </div>

                    </div> <!-- END SECTION TITLE -->

                    @if ($review_exists)

                        <div class="row" id="feedbacks">
                            
                            @foreach ($reviews as $review)
                                <div class="feedback" data-aos="flip-down" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">					
                                    <!-- MAIN COMMENT -->
                                    <p class="comment"><sup><span class="fa fa-quote-left"></span></sup> {{ $review->text }} <sub><span class="fa fa-quote-right"></span></sub></p>

                                    <!-- COMMENTER -->
                                    <div class="feedback-image d-flex">
                                        <div>
                                            <img src="{{ URL::asset($review->image_url) }}" alt="Feedback" class="rounded-circle"><span class="small-quote fa fa-quote-left"></span>
                                        </div>

                                        <div class="pt-3">
                                            <p class="feedback-reviewer">{{ $review->name }}</p>
                                            <p class="fs-12">{{ $review->position }}</p>
                                        </div>
                                    </div>	
                                </div> 
                            @endforeach                                                       
                        </div>

                        <!-- ROTATORS BUTTONS -->
                        <div class="offers-nav">
                            <a class="offers-prev"><i class="fa fa-chevron-left"></i></a>
                            <a class="offers-next"><i class="fa fa-chevron-right"></i></a>                                
                        </div>

                    @else
                        <div class="row text-center">
                            <div class="col-sm-12 mt-6 mb-6">
                                <h6 class="fs-12 font-weight-bold text-center">{{ __('No customer reviews were published yet') }}</h6>
                            </div>
                        </div>
                    @endif

                    
                    
                </div> <!-- END CONTAINER -->
                
            </section> <!-- END SECTION CUSTOMER FEEDBACK -->
        @endif


         <!-- SECTION - BANNER
        ========================================================-->
        <section id="banner-wrapper">

            <div class="container-fluid">

                <div class="row text-center">
                    <div class="col-md-12">
                        <h4>Why {{ config('app.name') }}?</h4>
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12" id="google-banner-minify" data-aos="fade-right" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">
                        <img src="{{ URL::asset('img/files/banner.png') }}" alt="">
                    </div>

                    <div class="col-md-6 col-sm-12" id="banner-text" data-aos="fade-left" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">
                        <div class="banner-text-inner">
                            <h5>{{ __('Spend less time to synthesize your text into audio files') }}</h5>
                            <p>Empower your productivity with our cutting-edge text-to-audio synthesis technology! Spend less time converting your text into audio files and enjoy effortless efficiency. Our innovative solution streamlines the process, ensuring quick and seamless conversion, allowing you to focus on what matters most. Experience the ease of transforming your written content into captivating audio with just a few clicks. Save time, increase productivity, and let our advanced system handle the rest!</p>
                        </div>
                        <div class="banner-text-inner">
                            <h5>{{ __('Synthesize text in more than 135 languages and dialects') }}</h5>
                            <p>Unlock 135+ languages and dialects for text synthesis. Reach a global audience with natural-sounding audio. Embrace multilingual accessibility today.</p>
                        </div>
                        <div class="banner-text-inner">
                            <h5>{{ __('Supports various audio formats with different frequencies') }}</h5>
                            <p>Experience the flexibility of our cutting-edge audio tool, supporting a wide array of formats with varying frequencies. Whether you need crystal-clear high-quality audio or optimized files for specific devices, we've got you covered. Our advanced technology ensures seamless compatibility, allowing you to enjoy the perfect audio output for your needs. Embrace the freedom to choose and elevate your audio experience with ease.</p>
                        </div>
                        <div class="banner-text-inner">
                            <h5>{{ __('Powerful Sound Studio to merge and enhance audio results') }}</h5>
                            <p>Discover the ultimate audio toolkit in our Powerful Sound Studio, designed to effortlessly merge and enhance your audio results. Unleash your creativity as you seamlessly blend multiple audio files and apply professional-grade effects. Elevate your audio projects to perfection with this cutting-edge studio, providing you with unparalleled control and precision for outstanding results.</p>
                        </div>
                    </div>
                </div>
            </div>

        </section> <!-- END SECTION BANNER -->


        <!-- SECTION - BLOGS
        ========================================================-->
        @if (config('frontend.blogs_section') == 'on')
            <section id="blog-wrapper">

                <div class="container pt-9 text-center">


                    <!-- SECTION TITLE -->
                    <div class="row mb-8">

                        <div class="title w-100">
                            <h6><span>{{ __('Text to Speech') }}</span> {{ __('Blogs') }}</h6>
                            <p>{{ __('Read our unique blog articles about various text to speech use cases and secrets') }}</p>
                        </div>

                    </div> <!-- END SECTION TITLE -->

                    @if ($blog_exists)
                        
                        <!-- BLOGS -->
                        <div class="row" id="blogs">
                            @foreach ( $blogs as $blog )
                            <div class="blog" data-aos="zoom-in" data-aos-delay="500" data-aos-once="true" data-aos-duration="1000">			
                                <div class="blog-box">
                                    <div class="blog-img">
                                        <a href="{{ route('blogs.show', $blog->url) }}"><img src="{{ URL::asset($blog->image) }}" alt="Blog Image"></a>
                                    </div>
                                    <div class="blog-info">
                                        <h5 class="blog-title text-left">{{ $blog->title }}</h5>
                                        <h6 class="blog-date text-left"><i class="mdi mdi-alarm mr-2"></i>{{ date('F j, Y', strtotime($blog->created_at)) }}</h6>
                                    </div>
                                </div>                        
                            </div> 
                            @endforeach
                        </div> 
                        

                        <!-- ROTATORS BUTTONS -->
                        <div class="blogs-nav">
                            <a class="blogs-prev"><i class="fa fa-chevron-left"></i></a>
                            <a class="blogs-next"><i class="fa fa-chevron-right"></i></a>                                
                        </div>

                    @else
                        <div class="row text-center">
                            <div class="col-sm-12 mt-6 mb-6">
                                <h6 class="fs-12 font-weight-bold text-center">{{ __('No blog articles were published yet') }}</h6>
                            </div>
                        </div>
                    @endif

                </div> <!-- END CONTAINER -->
                
            </section> <!-- END SECTION BLOGS -->
        @endif


        <!-- SECTION - FAQ
        ========================================================-->
        @if (config('frontend.faq_section') == 'on')
            <section id="faq-wrapper">    
                <div class="container pt-7">

                    <div class="row text-center mb-8 mt-7">
                        <div class="col-md-12 title">
                            <h6>{{ __('Frequently Asked') }} <span>{{ __('Questions') }}</span></h6>
                            <p>{{ __('Got questions? We have you covered.') }}</p>
                        </div>
                    </div>

                    <div class="row justify-content-md-center">
        
                        @if ($faq_exists)

                            <div class="col-md-10">
        
                                @foreach ( $faqs as $faq )

                                    <div id="accordion" data-aos="fade-left" data-aos-delay="300" data-aos-once="true" data-aos-duration="700">
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $faq->id }}">
                                                <h5 class="mb-0">
                                                <span class="btn btn-link" data-toggle="collapse" data-target="#collapse-{{ $faq->id }}" aria-expanded="false" aria-controls="collapse-{{ $faq->id }}">
                                                    {{ $faq->question }}
                                                </span>
                                                </h5>
                                            </div>
                                        
                                            <div id="collapse-{{ $faq->id }}" class="collapse" aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion">
                                                <div class="card-body">
                                                    {!! $faq->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                    
        
                        @else
                            <div class="row text-center">
                                <div class="col-sm-12 mt-6 mb-6">
                                    <h6 class="fs-12 font-weight-bold text-center">{{ __('No FAQ answers were published yet') }}</h6>
                                </div>
                            </div>
                        @endif
            
                    </div>        
                </div>
        
            </section> <!-- END SECTION FAQ -->
        @endif

@endsection

@section('js')
    <!-- Green Audio Player JS -->
    <script src="{{ URL::asset('plugins/audio-player/green-audio-player.js') }}"></script>
    <script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src="{{ URL::asset('js/audio-player.js') }}"></script>
    <script src="{{ URL::asset('js/wavesurfer.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/wavesurfer/wavesurfer.cursor.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/wavesurfer/wavesurfer.timeline.min.js') }}"></script>

     <!-- Custom js-->
    <script src="{{URL::asset('plugins/jqtarea/plugin-jqtarea.min.js')}}"></script>
	<script src="{{URL::asset('plugins/awselect/awselect-custom.js')}}"></script>
    <script src="{{URL::asset('plugins/swiper/swiper.min.js')}}"></script>
    <script src="{{URL::asset('plugins/aos/aos.js')}}"></script>
    <script src="{{URL::asset('js/slick.min.js')}}"></script>
    <script src="{{URL::asset('js/awselect.js')}}"></script>
    <script src="{{URL::asset('js/frontend.js')}}"></script>    
	
    <script type="text/javascript">
		$(function () {

			"use strict";

			$(document).ready(function(){
				$("#textarea").jQTArea({
					setLimit: {{ $max_chars }},
					setExt: "W",
					setExtR: true 
				});
			});

 
            AOS.init();
            

		});    
    </script>
   
     
@endsection
        
        
       
        
       
    

