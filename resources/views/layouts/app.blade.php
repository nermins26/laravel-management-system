<!-- HEAD SECTION -->
@include('layouts.partials.head')
<!-- END OF HEAD SECTION -->

<!-- CONTENT SECTION -->
@auth
@yield('content')
@endauth
<!-- END OF CONTENT SECTION -->

<!-- FOOTER SECTION -->
@include('layouts.partials.footer')
<!-- END OF FOOTER SECTION -->