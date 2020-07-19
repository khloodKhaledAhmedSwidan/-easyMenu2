@include('website.layouts.header')


<div class="modal fade" id="edit_element" tabindex="-1" role="dialog" aria-hidden="true">

</div>
<div class="modal fade" id="add_cart" tabindex="-1" role="dialog" aria-hidden="true">

</div>


{{-- @include('website.layouts.nav') --}}

@yield('header')
@yield('content')






</div><!-- /#page -->
</div><!-- /#wrapper -->
<a id="scroll-top"></a>

@include('website.layouts.scripts')
@yield('scripts')
</body>

</html>
