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
@if(!auth()->user()->type == 1)
{{--            <li class="nav-item start active open">--}}
{{--                <a href="/home" class="nav-link ">--}}
{{--                    <i class="icon-home"></i>--}}
{{--                    <span class="title">الرئيسية</span>--}}
{{--                    <span class="selected"></span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--                @php dd(auth()->user()->subscriptions()->where('finished',1)->latest()); @endphp--}}
@if(auth()->user()->subscriptions()->orderBy('id' , 'desc')->first()->finished != 1)

                <li class="nav-item {{ strpos(URL::current(), '/landpage') !== false ? 'active' : '' }}">
                    <a href="/landpage" class="nav-link ">
                        <i class="icon-settings"></i>
                        <span class="title">الرئيسية</span>
                        <span class="arrow"></span>
                    </a>
                    {{-- <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="" class="nav-link ">
                                <span class="title"> كافة الاحصائيات</span>
                            </a>
                        </li>
                    </ul> --}}
                </li>
            <li class="heading">
                <h3 class="uppercase">القائمة الجانبية</h3>
            </li>


            <li class="nav-item {{ strpos(URL::current(), 'admin/edit-profile') !== false ? 'active' : '' }}">
                <a href="{{route('res-update-info')}}" class="">
                    <i class="icon-settings"></i>
                    <span class="title">مطعمي</span>
                    <span class="arrow"></span>
                </a>
                {{-- <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/admin/edit-profile" class="nav-link ">
                            <span class="title"> تعديل بيانات مطعمي</span>
                        </a>
                    </li>
                </ul> --}}
            </li>
            <li class="nav-item {{ strpos(URL::current(), 'admin/show-barcode') !== false ? 'active' : '' }}">
                <a href="{{route('res.barcode')}}" class="nav-link ">
                    <i class="icon-settings"></i>
                    <span class="title">استعراض الباركود</span>
                    <span class="arrow"></span>
                </a>
            </li>

            @php
                $subscription = auth()->user()->subscriptions()->where('status',1)->where('finished',0)->first();
                // dd($subscription === null ? 0 : $subscription->package_id );
                $check = $subscription == null ? 0 : $subscription->package_id ;
                // dd($check);
                if($check == 2){
                    $res = $subscription->user;
                    $res->branchs = 4;
                    $res->save();
                    // dd($res);
                }elseif($check == 3){
                    $res = $subscription->user;
                    $res->branchs = 99;
                    $res->save();
                }
            @endphp
@if ($check != 1 && $check != 0)
<li class="nav-item {{ strpos(URL::current(), 'admin/cities') !== false ? 'active' : '' }}">
    <a href="{{route('cities.index')}}" class="nav-link ">
                    <i class="icon-settings"></i>
                    <span class="title">المدن</span>
                    <span class="arrow"></span>
                </a>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'admin/branches') !== false ? 'active' : '' }}">
                <a href="{{route('branches.index')}}" class="nav-link ">
                    <i class="icon-settings"></i>
                    <span class="title">الفروع</span>
                    <span class="arrow"></span>
                </a>
                {{-- <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="" class="nav-link ">
                            <span class="title"> كافة الفروع</span>
                        </a>
                    </li>
                </ul> --}}
            </li>


            <li class="nav-item {{ strpos(URL::current(), '/delivery/orders') !== false ? 'active' : '' }}">
                <a href="{{route('delivery.order')}}" class="nav-link ">
                    <i class="icon-settings"></i>
                    <span class="title">الطلبات</span>
                    <span class="arrow"></span>
                </a>
                {{-- <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="" class="nav-link ">
                            <span class="title"> كافة الفروع</span>
                        </a>
                    </li>
                </ul> --}}
            </li>




@endif




            <li class="nav-item {{ strpos(URL::current(), 'admin/shifts') !== false ? 'active' : '' }}">
                <a href="{{route('shifts.index')}}" class="nav-link ">
                    <i class="icon-settings"></i>
                    <span class="title">اوقات العمل</span>
                    <span class="arrow"></span>
                </a>
                {{-- <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="" class="nav-link ">
                            <span class="title"> كافة اوقات العمل</span>
                        </a>
                    </li>
                </ul> --}}
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'admin/categories') !== false ? 'active' : '' }}">
                <a href="{{route('categories.index')}}" class="nav-link ">
                    <i class="icon-settings"></i>
                    <span class="title">التصنيفات</span>
                    <span class="arrow"></span>
                </a>
                {{-- <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="" class="nav-link ">
                            <span class="title"> كافة التصنيفات</span>
                        </a>
                    </li>
                </ul> --}}
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'admin/additions') !== false ? 'active' : '' }}">
                <a href="{{route('additions.index')}}" class="nav-link ">
                    <i class="icon-settings"></i>
                    <span class="title">الاضافات</span>
                    <span class="arrow"></span>
                </a>
                {{-- <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="" class="nav-link ">
                            <span class="title"> كافة الاضافات</span>
                        </a>
                    </li>
                </ul> --}}
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'admin/meals') !== false ? 'active' : '' }}">
                <a href="{{route('meals.index')}}" class="nav-link ">
                    <i class="icon-settings"></i>
                    <span class="title">الوجبات</span>
                    <span class="arrow"></span>
                </a>
                {{-- <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="" class="nav-link ">
                            <span class="title"> كافة الوجبات</span>
                        </a>
                    </li>
                </ul> --}}
            </li>

            @if ($check != 1 && $check != 0)
            <li class="nav-item {{ strpos(URL::current(), 'admin/tables') !== false ? 'active' : '' }}">
                <a href="{{route('tables.index')}}" class="nav-link ">
                    <i class="icon-settings"></i>
                    <span class="title">الطاولات</span>
                    <span class="arrow"></span>
                </a>
                {{-- <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="" class="nav-link ">
                            <span class="title"> كافة الاسليدر الاعلاني</span>
                        </a>
                    </li>
                </ul> --}}
            </li>
                    @endif

                    <li class="nav-item {{ strpos(URL::current(), 'admin/sliders') !== false ? 'active' : '' }}">
                        <a href="{{route('sliders.index')}}" class="nav-link ">
                            <i class="icon-settings"></i>
                            <span class="title">سليد الاعلاني</span>
                            <span class="arrow"></span>
                        </a>
                        {{-- <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="" class="nav-link ">
                                    <span class="title"> كافة الاسليدر الاعلاني</span>
                                </a>
                            </li>
                        </ul> --}}
                    </li>
            @endif


                <li class="nav-item {{ strpos(URL::current(), '/subscripe/package') !== false ? 'active' : '' }}">
                    <a href="{{route('show.packageSubscripe')}}" class="nav-link ">
                        <i class="icon-settings"></i>
                        <span class="title">الباقات</span>
                        <span class="arrow"></span>
                    </a>
                    {{-- <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="" class="nav-link ">
                                <span class="title"> كافة الاسليدر الاعلاني</span>
                            </a>
                        </li>
                    </ul> --}}
                </li>

{{--            <li class="nav-item {{ strpos(URL::current(), '/landpage') !== false ? 'active' : '' }}">--}}
{{--                <a href="/landpage" class="nav-link ">--}}
{{--                    <i class="icon-settings"></i>--}}
{{--                    <span class="title">الاحصائيات</span>--}}
{{--                    <span class="arrow"></span>--}}
{{--                </a>--}}
                {{-- <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="" class="nav-link ">
                            <span class="title"> كافة الاحصائيات</span>
                        </a>
                    </li>
                </ul> --}}
{{--            </li>--}}

@endif
@if(!auth()->user()->type == 0)
            <li class="nav-item {{ strpos(URL::current(), 'admin/orders') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">الطلبات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{route('orders.index')}}" class="nav-link ">
                            <span class="title">الطلبات الجديدة</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('orders.active')}}" class="nav-link ">
                            <span class="title">الطلبات النشطة</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('orders.compeleted')}}" class="nav-link ">
                            <span class="title">الطلبات المكتملة</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('orders.canceled')}}" class="nav-link ">
                            <span class="title">الطلبات الملغية</span>
                        </a>
                    </li>
                </ul>
            </li>

@endif

            {{--
            <li class="nav-item {{ strpos(URL::current(), 'admin/cities') !== false ? 'active' : '' }}">
            <a href="javascript:;" class="nav-link ">
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

            <li class="nav-item {{ strpos(URL::current(), 'admin/packages') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link ">
                    <i class="icon-settings"></i>
                    <span class="title">الباقات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/admin/packages" class="nav-link ">
                            <span class="title"> كافة الباقات</span>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item {{ strpos(URL::current(), 'admin/shops') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link ">
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
            </li> --}}

            {{--
            <li class="nav-item {{ strpos(URL::current(), 'admin/news') !== false ? 'active' : '' }}">
            <a href="javascript:;" class="nav-link ">
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
            <a href="javascript:;" class="nav-link ">
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
            <a href="{{url('admin/page')}}" class="nav-link ">
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
