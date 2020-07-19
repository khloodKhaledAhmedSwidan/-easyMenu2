<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="nav-item start active open">
                <a href="/admin/home" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">الرئيسية</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">القائمة الجانبية</h3>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'admins') !== false ? 'active' : '' }}">
                <a href="{{ url('/admin/admins') }}" class="nav-link ">
                    <i class="icon-users"></i>
                    <span class="title">المشرفين</span>
                    <span class="arrow"></span>
                </a>
                {{-- <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="" class="nav-link ">
                            <span class="title">عرض المشرفين</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/admins/create') }}" class="nav-link ">
                <span class="title">اضافة مشرف</span>
                </a>
            </li>
        </ul> --}}
        </li>

        <li class="nav-item {{ strpos(URL::current(), 'admin/user') !== false ? 'active' : '' }}">
            <a href="{{ url('/admin/users') }}" class="nav-link ">
                <i class="icon-users"></i>
                <span class="title">المطاعم</span>
                <span class="arrow"></span>
            </a>
            {{-- <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="" class="nav-link ">
                            <span class="title">المطاعم</span>
                        </a>
                    </li>
                </ul> --}}
        </li>

        <li class="nav-item {{ strpos(URL::current(), 'admin/packages') !== false ? 'active' : '' }}">
            <a href="{{ url('/admin/packages') }}" class="nav-link ">
                <i class="icon-users"></i>
                <span class="title">الباقات</span>
                <span class="arrow"></span>
            </a>
            {{-- <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="" class="nav-link ">
                            <span class="title">المطاعم</span>
                        </a>
                    </li>
                </ul> --}}
        </li>

        <li class="nav-item {{ strpos(URL::current(), 'seller-code') !== false ? 'active' : '' }}">
            <a href="{{ route('seller-code.index') }}" class="nav-link ">
                <i class="icon-users"></i>
                <span class="title">اكواد الاحالة </span>
                <span class="arrow"></span>
            </a>
            {{-- <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="" class="nav-link ">
                            <span class="title">المطاعم</span>
                        </a>
                    </li>
                </ul> --}}
        </li>

        <li class="nav-item {{ strpos(URL::current(), 'coupons') !== false ? 'active' : '' }}">
            <a href="{{ route('coupons.index') }}" class="nav-link ">
                <i class="icon-users"></i>
                <span class="title">كوبونات الخصم </span>
                <span class="arrow"></span>
            </a>
            {{-- <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="" class="nav-link ">
                            <span class="title">المطاعم</span>
                        </a>
                    </li>
                </ul> --}}
        </li>


        <li class="nav-item {{ strpos(URL::current(), 'subscriptions') !== false ? 'active' : '' }}">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-users"></i>
                <span class="title">طلبات الاشتراك </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{ route('subscriptions.index') }}" class="nav-link ">
                        <span class="title">عرض طلبات الاشتراك الجديدة </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subscriptions.paid') }}" class="nav-link ">
                        <span class="title">عرض طلبات الاشتراك المؤكدة </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subscriptions.finished') }}" class="nav-link ">
                        <span class="title">عرض طلبات الاشتراك المنتهية</span>
                    </a>
                </li>
            </ul>
        </li>

            <li class="nav-item {{ strpos(URL::current(), 'admin/setting') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">الاعدادات العامة</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/admin/setting" class="nav-link ">
                            <span class="title">اعدادات البنك</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{--
                <li class="nav-item {{ strpos(URL::current(), 'admin/cities') !== false ? 'active' : '' }}">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title">المدن</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="/admin/cities" class="nav-link ">
                        <span class="title"> كافة المدن</span>
                    </a>
                </li>
            </ul>
            </li>



            <li class="nav-item {{ strpos(URL::current(), 'admin/additions') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">الاضافات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/admin/additions" class="nav-link ">
                            <span class="title"> كافة الاضافات</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'admin/shops') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">المحلات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/admin/shops" class="nav-link ">
                            <span class="title"> كافة المحلات</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'admin/orders') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">الطلبات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/admin/orders" class="nav-link ">
                            <span class="title">الطلبات الجديدة</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="/admin/orders/paid" class="nav-link ">
                            <span class="title">الطلبات المؤكدة</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="/admin/orders/canceled" class="nav-link ">
                            <span class="title">الطلبات الملغية</span>
                        </a>
                    </li>
                </ul>
            </li> --}}

        {{--
            <li class="nav-item {{ strpos(URL::current(), 'admin/news') !== false ? 'active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-settings"></i>
            <span class="title">الاخبار</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="/admin/news" class="nav-link ">
                    <span class="title"> الاخبار </span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="/admin/news/create" class="nav-link ">
                    <span class="title"> اضافة خبر جديد</span>
                </a>
            </li>
        </ul>
        </li> --}}


        {{-- <li class="nav-item {{ strpos(URL::current(), 'admin/setting') !== false ? 'active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-settings"></i>
            <span class="title">الاعدادات العامة</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="/admin/setting" class="nav-link ">
                    <span class="title">اعدادات البنك</span>
                </a>
            </li>
        </ul>
        </li> --}}

        {{--
            <li class="nav-item {{ strpos(URL::current(), 'admin/pages') !== false ? 'active' : '' }}">
        <a href="{{url('admin/page')}}" class="nav-link nav-toggle">
            <i class="icon-settings"></i>
            <span class="title">الصفحات</span>
            <span class="arrow"></span>
        </a>

        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="/admin/page" class="nav-link ">
                    <span class="title">كافة الصفحات</span>
                </a>
            </li>
        </ul>

        </li> --}}

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
