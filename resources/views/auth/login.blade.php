<html lang="en" itemscope="" itemtype="http://schema.org/Product" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta name="theme-color" content="#27323E">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> EASY MENU</title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles-mobile.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
    <!-- <link rel="stylesheet" href="../bonee-gallery.css">   -->
    <link rel="preload" href="styles.css" as="style">
    <link rel="preload" href="ui.js" as="script">

</head>

<body dir="rtl" class="body-mobile" style="overflow-x:hidden">

    <div id="fullpage">
        <div id="header-new-design" class="header">
            <div class="header-inner">
                <div id="logo" class="logo-block">
                    <span class="socialIcons">
                        <a href="#home">
                            <img src="{{asset('img/easy.png')}}" style="max-width: 60px;" />
                        </a>
                    </span>
                </div>
                {{-- <div class="callIcon__container" style="bottom: 15px; left: 15px;">
                    <div style="position: relative">
                        <a href="https://portal.bonee.net/#/profile/login?lang=sp" target="_blank"><svg
                                style="fill: #ffa803; cursor:pointer" width="60px" viewBox="0 0 512 512"
                                xmlns="http://www.w3.org/2000/svg">
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
                </div> --}}
                <!-- bottom fixed free trial BTN -->
                {{-- <div class="fixedTrial">
                    <a class="fixedTrial__linkBtn" href="#"
                        onclick="gtag('event', 'click', { 'event_category': 'Mobile Free trial' });">
                        <span>تجربة</span>
                        <span>مجانية</span>
                        <span class="fixedTrial__linkPulse">
                        </span>
                    </a>
                </div> --}}
                <div class="menu mobile">
                    <div class="menu-inner mobile full-height">
                        <div id="langToggle" class="menu-item">
                            <input id="language" type="checkbox">
                            <label id="lang-label" for="language">
                                <img src="{{asset('img/ar.svg')}}" alt="language-eng">
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
                        {{-- <div id="menuToggle" class="menu-item">
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

                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>




        <form autocomplete="off" method="POST" action="{{ route('login') }}"
            class="form-signin ng-untouched ng-pristine ng-invalid" novalidate="" role="form">

            @csrf
            <p class="login-title">ادخل حسابك</p>

            <div class="input-group">
                <input autocomplete="off" class="form-control ng-untouched ng-pristine ng-invalid" id="userName"
                    maxlength="50" name="email" type="text" placeholder=" الايميل" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <br />
            <div class="input-group">

                <input autocomplete="new-password" class="form-control ng-untouched ng-pristine ng-invalid"
                    maxlength="50" name="password" required="" type="password" placeholder=" كلمة السر" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button class="btn btn-primary btn-block btn-new-lg btn-new-lg-rtl" type="submit">تسجيل الدخول</button>
            <span class="forgotPass-text">
                <a href="{{ route('password.request') }}" class="forgotPass-text-link"> نسيت كلمة السر؟</a>
            </span>
            <span class="forgotPass-text">
                <a href="{{ route('register') }}" class="forgotPass-text-link"> فتح حساب</a>
            </span>
        </form>

        {{-- href="{{ route('password.request') }}" --}}



    </div>

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>

</html>
