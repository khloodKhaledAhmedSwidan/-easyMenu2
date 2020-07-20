<html lang="en" itemscope="" itemtype="http://schema.org/Product" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta name="theme-color" content="#27323E">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> EASY MENU </title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles-mobile.css')}}">
    <!-- <link rel="stylesheet" href="../bonee-gallery.css">   -->
    <link rel="preload" href="styles.css" as="style">
    <link rel="preload" href="ui.js" as="script">
    <link href="{{asset('card.css')}}" rel="stylesheet">
</head>

<body dir="rtl" class="body-mobile" style="overflow-x:hidden">
 <div></div>
    <div id="fullpage">
        <div id="header-new-design" class="header">
            <div class="header-inner">
                <div id="logo" class="logo-block">
                    <span class="socialIcons">
                        <a href="#home">
                            <img src="img/easy.png" style="max-width: 60px;" />
                        </a>
                    </span>
                </div>
                <div class="callIcon__container" style="bottom: 15px; left: 15px;">
                    <div style="position: relative">
                        <a href="{{route('login')}}" target="_blank"><svg style="fill: #ffa803; cursor:pointer"
                                width="60px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m218.667969 240h-202.667969c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h202.667969c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0">
                                </path>
                                <path
                                    d="m138.667969 320c-4.097657 0-8.191407-1.558594-11.308594-4.691406-6.25-6.253906-6.25-16.386719 0-22.636719l68.695313-68.691406-68.695313-68.671875c-6.25-6.253906-6.25-16.386719 0-22.636719s16.382813-6.25 22.636719 0l80 80c6.25 6.25 6.25 16.382813 0 22.636719l-80 80c-3.136719 3.132812-7.234375 4.691406-11.328125 4.691406zm0 0">
                                </path>
                                <path
                                    d="m341.332031 512c-23.53125 0-42.664062-19.136719-42.664062-42.667969v-384c0-18.238281 11.605469-34.515625 28.882812-40.511719l128.171875-42.730468c28.671875-8.789063 56.277344 12.480468 56.277344 40.578125v384c0 18.21875-11.605469 34.472656-28.863281 40.488281l-128.214844 42.753906c-4.671875 1.449219-9 2.089844-13.589844 2.089844zm128-480c-1.386719 0-2.558593.171875-3.816406.554688l-127.636719 42.558593c-4.183594 1.453125-7.210937 5.675781-7.210937 10.21875v384c0 7.277344 7.890625 12.183594 14.484375 10.113281l127.636718-42.558593c4.160157-1.453125 7.210938-5.675781 7.210938-10.21875v-384c0-5.867188-4.777344-10.667969-10.667969-10.667969zm0 0">
                                </path>
                                <path
                                    d="m186.667969 106.667969c-8.832031 0-16-7.167969-16-16v-32c0-32.363281 26.300781-58.667969 58.664062-58.667969h240c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16h-240c-14.699219 0-26.664062 11.96875-26.664062 26.667969v32c0 8.832031-7.167969 16-16 16zm0 0">
                                </path>
                                <path
                                    d="m314.667969 448h-85.335938c-32.363281 0-58.664062-26.304688-58.664062-58.667969v-32c0-8.832031 7.167969-16 16-16s16 7.167969 16 16v32c0 14.699219 11.964843 26.667969 26.664062 26.667969h85.335938c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0">
                                </path>
                            </svg></a>
                        <!-- <a class="callIcon__link" href="#contactUs"><i class="Phone is-animating"></i></a> -->
                    </div>
                </div>
                <!-- bottom fixed free trial BTN -->
                <div class="fixedTrial">
                    <a class="fixedTrial__linkBtn" href="#"
                        onclick="gtag('event', 'click', { 'event_category': 'Mobile Free trial' });">
                        <span>تجربة</span>
                        <span>مجانية</span>
                        <span class="fixedTrial__linkPulse">
                        </span>
                    </a>
                </div>
                <div class="menu mobile">
                    <div class="menu-inner mobile full-height">
                        <div id="langToggle" class="menu-item">
                            <input id="language" type="checkbox">
                            <label id="lang-label" for="language">
                                <img src="img/ar.svg" alt="language-eng">
                            </label>
                            <div class="lang-sidenav">



                                <div class="close-btn">
                                    <label for="language">
                                        <span></span>
                                        <span></span>
                                    </label>
                                </div>
                                <ul>
                                    <li>
                                        @if(app()->getLocale() == 'ar')
                                        <a rel="alternate" hreflang="en"
                                            href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                            English
                                        </a>
                                        @else
                                        <a rel="alternate" hreflang="ar"
                                            href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                            العربية
                                        </a>
                                        @endif
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- burger here -->
                        <div id="menuToggle" class="menu-item">
                            <div class="burger total-center">
                                <input id="burger" type="checkbox">
                                <div class="burger-inner">
                                    <label for="burger"></label>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div id="sidenav">
                                    <div class="social mobile">
                                        <div class="social-inner">
                                            <div class="social-icons">
                                                <div class="social-icon">
                                                    <!-- youtube -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M549.655 124.083c-6.28-23.65-24.787-42.276-48.284-48.597C458.78 64 288 64 288 64S117.22 64 74.63 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.28 23.65 24.787 41.5 48.284 47.82C117.22 448 288 448 288 448s170.78 0 213.37-11.486c23.497-6.32 42.003-24.17 48.284-47.82 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.5 213.508V175.185l142.74 81.205-142.74 81.2z">
                                                        </path>
                                                    </svg>
                                                    <a href="https://www.youtube.com/channel/UCed06HQE5ltYItTVXfeD8AA"
                                                        target="_blank"></a>
                                                </div>
                                                <div class="social-icon">
                                                    <!-- facebook -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M448 80v352c0 26.5-21.5 48-48 48h-85.3V302.8h60.6l8.7-67.6h-69.3V192c0-19.6 5.4-32.9 33.5-32.9H384V98.7c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9H184v67.6h60.9V480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48z">
                                                        </path>
                                                    </svg>
                                                    <a href="https://www.facebook.com/boneesystem" target="_blank"></a>
                                                </div>
                                                <div class="social-icon">
                                                    <!-- instagram -->
                                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="m437 0h-362c-41.351562 0-75 33.648438-75 75v362c0 41.351562 33.648438 75 75 75h362c41.351562 0 75-33.648438 75-75v-362c0-41.351562-33.648438-75-75-75zm-180 390c-74.441406 0-135-60.558594-135-135s60.558594-135 135-135 135 60.558594 135 135-60.558594 135-135 135zm150-240c-24.8125 0-45-20.1875-45-45s20.1875-45 45-45 45 20.1875 45 45-20.1875 45-45 45zm0 0">
                                                        </path>
                                                        <path
                                                            d="m407 90c-8.277344 0-15 6.722656-15 15s6.722656 15 15 15 15-6.722656 15-15-6.722656-15-15-15zm0 0">
                                                        </path>
                                                        <path
                                                            d="m257 150c-57.890625 0-105 47.109375-105 105s47.109375 105 105 105 105-47.109375 105-105-47.109375-105-105-105zm0 0">
                                                        </path>
                                                    </svg>
                                                    <a href="https://www.instagram.com/boneesystem/"
                                                        target="_blank"></a>
                                                </div>
                                                <div class="social-icon">
                                                    <!-- messenger -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M224 32C15.9 32-77.5 278 84.6 400.6V480l75.7-42c142.2 39.8 285.4-59.9 285.4-198.7C445.8 124.8 346.5 32 224 32zm23.4 278.1L190 250.5 79.6 311.6l121.1-128.5 57.4 59.6 110.4-61.1-121.1 128.5z">
                                                        </path>
                                                    </svg>
                                                    <a href="https://m.me/boneesystem" target="_blank"></a>
                                                </div>
                                                <div class="social-icon">
                                                    <!-- vk -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M545 117.7c3.7-12.5 0-21.7-17.8-21.7h-58.9c-15 0-21.9 7.9-25.6 16.7 0 0-30 73.1-72.4 120.5-13.7 13.7-20 18.1-27.5 18.1-3.7 0-9.4-4.4-9.4-16.9V117.7c0-15-4.2-21.7-16.6-21.7h-92.6c-9.4 0-15 7-15 13.5 0 14.2 21.2 17.5 23.4 57.5v86.8c0 19-3.4 22.5-10.9 22.5-20 0-68.6-73.4-97.4-157.4-5.8-16.3-11.5-22.9-26.6-22.9H38.8c-16.8 0-20.2 7.9-20.2 16.7 0 15.6 20 93.1 93.1 195.5C160.4 378.1 229 416 291.4 416c37.5 0 42.1-8.4 42.1-22.9 0-66.8-3.4-73.1 15.4-73.1 8.7 0 23.7 4.4 58.7 38.1 40 40 46.6 57.9 69 57.9h58.9c16.8 0 25.3-8.4 20.4-25-11.2-34.9-86.9-106.7-90.3-111.5-8.7-11.2-6.2-16.2 0-26.2.1-.1 72-101.3 79.4-135.6z">
                                                        </path>
                                                    </svg>
                                                    <a href="https://vk.com/public180368554" target="_top"></a>
                                                </div>

                                                <div class="social-icon">
                                                    <!-- mail -->
                                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 14 14" style="enable-background:new 0 0 14 14;"
                                                        xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <path d="M7,9L5.268,7.484l-4.952,4.245C0.496,11.896,0.739,12,1.007,12h11.986
                                                            c0.267,0,0.509-0.104,0.688-0.271L8.732,7.484L7,9z"></path>
                                                                <path d="M13.684,2.271C13.504,2.103,13.262,2,12.993,2H1.007C0.74,2,0.498,2.104,0.318,2.273L7,8
                                                            L13.684,2.271z"></path>
                                                                <polygon points="0,2.878 0,11.186 4.833,7.079 		">
                                                                </polygon>
                                                                <polygon points="9.167,7.079 14,11.186 14,2.875 		">
                                                                </polygon>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <a href="mailto:info@bonee.net?Subject=Hello from web site"
                                                        target="_top"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div id="mobile-nav">
                                        <ul class="iran-font">
                                            <!-- <li>
                                        <a class="burger-navlink" href="#home"></a>
                                        <span>
                                                الصفحة الرئيسية
                                        </span>
                                        </li> -->
                                            <li>
                                                <a class="burger-navlink" href="#Why-you-need-Bonee"></a>
                                                <span>
                                                    لما اختيار بوني ؟
                                                </span>
                                            </li>
                                            <li>
                                                <a class="burger-navlink" href="#Benefits"></a>
                                                <span>
                                                    Benefits
                                                </span>
                                            </li>
                                            <li>
                                                <a class="burger-navlink" href="#Scan-the-QR-code"></a>
                                                <span>
                                                    SCAN THE QR CODE
                                                </span>
                                            </li>
                                            <li>
                                                <a class="burger-navlink" href="#Functionality"></a>
                                                <span>
                                                    FUNCTIONALITY
                                                </span>
                                            </li>
                                            <!-- <li>
                                        <a class="burger-navlink" href="#selling"></a>
                                        <span>
                                            ORDER TYPE
                                        </span>
                                        </li>
                                        <li>
                                        <a class="burger-navlink" href="#Data-analytis"></a>
                                        <span>
                                            DATA  ANALYSIS
                                        </span>
                                        </li> -->
                                            <li>
                                                <a class="burger-navlink" href="https://bonee.blog/"
                                                    target="_blank"></a>
                                                <span>Blog</span>
                                            </li>
                                            <li>
                                                <a class="burger-navlink" href="#FAQ"></a>
                                                <span>FAQ</span>
                                            </li>
                                            <li>
                                                <a class="burger-navlink" href="#section6"></a>
                                                <span>
                                                    السعر
                                                </span>
                                            </li>
                                            <li>
                                                <a class="burger-navlink"
                                                    href="https://landing.bonee.net/partnership-with-bonee"
                                                    target="_blank"></a>
                                                <span>
                                                    PARTNERSHIP
                                                </span>
                                            </li>
                                            <li>
                                                <a class="burger-navlink"
                                                    href="https://portal.bonee.net/#/profile/login?lang=ar"
                                                    target="_blank"
                                                    onclick="gtag('event', 'click', { 'event_category': 'Mobile Login' });"></a>
                                                <span>تسجيل دخول</span>
                                            </li>
                                            <li>
                                                <a class="burger-navlink"
                                                    href="https://portal.bonee.net/#/profile/registration?lang=ar"
                                                    target="_blank"
                                                    onclick="gtag('event', 'click', { 'event_category': 'Mobile Free trial' });"></a>
                                                <span>SIGN UP</span>
                                            </li>
                                            <li>
                                                <a class="burger-navlink" href="privacy-policy.html"
                                                    target="_blanck"></a>
                                                <span>
                                                    بنود الخصوصية
                                                </span>
                                            </li>
                                        </ul>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- firstPage Start -->
        <div class="section section1" id="home">
            <div class="slider-content">
                <div class="section-content" id="slider__list">
                    <div class="slider__slide">
                        <div class="slide-content full-height">
                            <h1 class="iran-font">
                                امسح ال QR code <br> واحصل على قائمة الطعام
                            </h1>



                            <div class="image-content">
                                <img class="sample-img" src="img/banner1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="slider__slide">
                        <div class="slide-content full-height">
                            <h1 class="iran-font">
                                السهولة و السرعة في عمل قائمة طعام <br>للكافيهات و المطاعم بواسطة ال QR code
                            </h1>
                            <div class="image-content">
                                <img class="sample-img" src="img/banner2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="slide slider__slide">
                        <div class="slide-content full-height">
                            <h1 class="iran-font">
                                خلفيات رائعة لقوائم <br>طعام ال QR
                            </h1>
                            <div class="image-content">
                                <img class="sample-img laptop-img" src="img/banner3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="slider__slide">
                        <div class="slide-content full-height">
                            <h1 class="iran-font">
                                امسح ال QR code <br> واحصل على قائمة الطعام
                            </h1>
                            <div class="image-content">
                                <img class="sample-img" src="img/banner1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- secondPage Start -->
        <div class="section  section2" id="Why-you-need-Bonee">
            <div class="section-content">
                <div class="section-block">
                    <div>
                        <div class="section-title">
                            <h1 class="text-center iran-font">
                                لماذا تحتاج ال QR menu؟
                            </h1>
                        </div>
                        <div class="section-descript iran-font-light">
                            <p>
                                هذه وسيلة مثالية للمطاعم و الكافيهات و المحلات ومراكز الاعمال الاخرى لتزويد الزبائن
                                بقائمة QR menu رقمية جذابة. لتساعدهم لاختيار طلبهم المفضل عن طريق لمسات قليلة. وسع مجال
                                عملك و الهم زبائنك قلل مصاريفك ووقتك باستخدامك لهذا المنتج. للبدأ اتبع الخطوات التالية:
                            </p>
                        </div>
                    </div>
                    <div class="section-inner iran-font-light">
                        <div class="text-center">
                            <img src="img/new-acc.png" alt="">
                            <span> سجل للعرض المجاني للبرنامج</span>
                        </div>
                        <div class="text-center">
                            <img src="img/create-menu.png" alt="">
                            <span>كون واجهة فعالة</span>
                        </div>
                        <div class="text-center">
                            <img src="img/publish.png" alt="">
                            <span> انشر البرنامج لزبائنك</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <!-- sixthPage Start -->
        <div class="section section6" id="Functionality">
            <div class="section-content">
                <h1 class="text-center iran-font">
                    Bonee provides robust functionalities
                    for restaurants to boost their sales
                </h1>
                <div class="section-inner">
                    <div class="section-info-block">
                        <div class="section-title-block">
                            <h5 class="fz-15 iran-font">تحديث ال QR بسهولة </h5>
                        </div>
                        <div class="section-img-block">
                            <img src="img/updates.png" alt="">
                        </div>
                        <div class="section-text-block">
                            <p class="iran-font-light">
                                تحديث بيانات المطعم او الكافيه بسهولة تغييرالاسعار اضافة عناصر للقائمة و الحذف
                                الاوتوماتيكي للعناصر التي تم استنفادها من القائمة
                            </p>
                        </div>
                    </div>
                    <div class="section-info-block">
                        <div class="section-title-block">
                            <h5 class="fz-15 iran-font">عمل ماركة ملائمة </h5>
                        </div>
                        <div class="section-img-block">
                            <img class="feature-img" src="img/branding.png" alt="">
                        </div>
                        <div class="section-text-block">
                            <p class="iran-font-light">
                                اختيار الخلفيات المناسبة و تغيير الالوان ليلائم الكافيه او مركز التسوق
                            </p>
                        </div>
                    </div>
                    <div class="section-info-block">
                        <div class="section-title-block">
                            <h5 class="fz-15 iran-font"> تدعم عدة لغات </h5>
                        </div>
                        <div class="section-img-block">
                            <img class="feature-img" src="img/support.png" alt="">
                        </div>
                        <div class="section-text-block">
                            <p class="iran-font-light">
                                اللغة سوف لن تكون عبىء على قائمة الطعام لان برنامجنا تدعم 10 لغات
                            </p>
                        </div>
                    </div>

                    <div class="section-info-block">
                        <div class="section-title-block">
                            <h5 class="fz-15 iran-font"> ترشيد المال و الوقت </h5>
                        </div>
                        <div class="section-img-block">
                            <img class="feature-img" src="img/saving.png" alt="">
                        </div>
                        <div class="section-text-block">
                            <p class="iran-font-light">
                                لا تحتاج لصرف اموالك على التصاميم و الطباعة لتحدث قائمة مطعمك او مقهاك
                            </p>
                        </div>
                    </div>

                    <div class="section-info-block">
                        <div class="section-title-block">
                            <h5 class="fz-15 iran-font"> اسمع من زبونك </h5>
                        </div>
                        <div class="section-img-block">
                            <img class="feature-img" src="img/customer.png" alt="">
                        </div>
                        <div class="section-text-block">
                            <p class="iran-font-light">
                                استخدامك لنظام ملاحظات الزبون يتيح لك الفرصة لتراقب طابات الزبائن في المطعم او المقهى
                            </p>
                        </div>
                    </div>

                    <div class="section-info-block">
                        <div class="section-title-block">
                            <h5 class="fz-15 iran-font"> في اي و قت او مكان </h5>
                        </div>
                        <div class="section-img-block">
                            <img class="feature-img" src="img/availability.png" alt="">
                        </div>
                        <div class="section-text-block">
                            <p class="iran-font-light">
                                يمكن لزبائنك تصفح القائمة من اي مكان و من اي جهاز
                            </p>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="social-box">
                    <div class="container">
                        <div class="row">
                @foreach($packages as $package)
                    <div class="col-lg-3 col-xs-12 text-center" style="display: inline-block; margin: 7rem;">
                        <div class="box">
                            <i class=" fa-3x" aria-hidden="true"><img src="{{asset('img/easy.png')}}" style="width: 50px;height: 50px;"></i>
                            <div class="box-title">
                                <h3>{{$package->name_ar}}</h3>
                            </div>
                            <div class="box-text">
                                <ul>
                                    <li>الوصف:{{$package->description_ar}}</li>

                                        <li>المدة:{{$package->duration}}</li>
                                        <li>السعر:{{$package->price}}</li>
<li><a href="{{route('register')}}" class="btn btn-info">الاشتراك</a></li>

                                </ul>

                            </div>

                        </div>
                    </div>
                @endforeach
                        </div>
                    </div>
                </div>
                <hr/>
            </div>
        </div>



        <!-- FAQ -->
        <div class="section section10" id="FAQ" dir="ltr">
            <div class="section-content">
                <div class="section-title">
                    <h1 class="text-center">
                        FAQ
                    </h1>
                </div>
                <div class="content-block total-center supportPage__container">
                    <div class="section-inner">
                        <div class="section-inner-block">
                            <div class="row">
                                <div class="col">
                                    <div class="tabs">
                                        <div class="tab">
                                            <input type="checkbox" id="chck1">
                                            <label class="tab-label" for="chck1">1. What is Bonee?</label>
                                            <div class="tab-content">
                                                Bonee is a digital QR menu/catalog solution that allows you to provide
                                                a digital product list to your clients. Clients can see your products
                                                with photos, descriptions prices. Your catalog will be attractive and
                                                user-friendly with Bonee. Also, clients can make orders directly on
                                                their mobile phones.
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <input type="checkbox" id="chck2">
                                            <label class="tab-label" for="chck2">2. Who can use Bonee?</label>
                                            <div class="tab-content">
                                                Bonee is a digital solution for Restaurants, Hotels, Bars,
                                                Cafes, Clubs, Online shops. Any business who wants to have a
                                                digital catalog or online shop can use Bonee.
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <input type="checkbox" id="chck3">
                                            <label class="tab-label" for="chck3">3. What countries do you
                                                support?</label>
                                            <div class="tab-content">
                                                Bonee can be used worldwide.
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <input type="checkbox" id="chck4">
                                            <label class="tab-label" for="chck4">4. Can I have a demo?</label>
                                            <div class="tab-content">
                                                Sure, click <a class="here"
                                                    href="https://portal.bonee.net/#/profile/registration?lang=en"
                                                    target="_blank"
                                                    onclick="gtag('event', 'click', { 'event_category': 'Plan2' });">here</a>
                                                for the free trial.
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <input type="checkbox" id="chck5">
                                            <label class="tab-label" for="chck5">5. What are the prices?</label>
                                            <div class="tab-content">
                                                You can check our prices <a class="here" href="#Pricing">here</a>. If
                                                none of those plans suit you,
                                                send us an email to <strong>info@bonee.net</strong>, and the sales team
                                                will contact you for a custom plan.
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <input type="checkbox" id="chck6">
                                            <label class="tab-label" for="chck6">6. How will I know what will be the
                                                price for me? </label>
                                            <div class="tab-content">
                                                The price plans depend on Tax policy for each country. To get an exact
                                                offer for your business,
                                                send us an email to <strong>info@bonee.net</strong>, and sales team will
                                                contact you.
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <input type="checkbox" id="chck7">
                                            <label class="tab-label" for="chck7">7. How long can I use a free plan?
                                            </label>
                                            <div class="tab-content">
                                                You can use the free plan as long as your items number, orders,
                                                and QRs do not exceed the estimated limits for that Free Plan.
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <input type="checkbox" id="chck8">
                                            <label class="tab-label" for="chck8">8. Can I change my plan? Go for a
                                                bigger or smaller plan? </label>
                                            <div class="tab-content">
                                                Of course, each plan can be adjusted.
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <input type="checkbox" id="chck9">
                                            <label class="tab-label" for="chck9">9. Do you have integration with POS,
                                                Payment Gateway? </label>
                                            <div class="tab-content">
                                                Bonee can be integrated with any system. The terms of integration are a
                                                subject of discussion.
                                                Send your integration request via email <strong>info@bonee.net</strong>.
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <input type="checkbox" id="chck10">
                                            <label class="tab-label" for="chck10">10. Do you offer a Partnership
                                                program?</label>
                                            <div class="tab-content">
                                                Yes, we have various partnership plans. Send us an email to
                                                <strong>info@bonee.net</strong>
                                                and the relevant department will contact you.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section9" id="contactUs" dir="ltr">
            <div class="section-content">
                <div class="content-block total-center supportPage__container">
                    <div class="section-inner">
                        <div class="section-inner-block">

                            <div class="section-descript">
                                <ul>
                                    <li>
                                        <p class="armContact">
                                            جميع الحقوق محفوظة &copy; 2020
                                        </p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>

</html>
