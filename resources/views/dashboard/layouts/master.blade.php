@include('dashboard.layouts.head')
@include('dashboard.layouts.headermobile')

<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">

        @include('dashboard.layouts.aside')

        <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @include('dashboard.layouts.headercontent')
                <!--begin::Content-->

                @yield('main-content')
                <!--end::Content-->
                    @include('dashboard.layouts.footercontent')
            </div>
            <!--end::Wrapper-->



    </div>
    <!--end::Page-->
</div>
<!--end::Main-->

@include('dashboard.layouts.userpanel')
@include('dashboard.layouts.quickcart')
@include('dashboard.layouts.quickpanel')
@include('dashboard.layouts.chatpanel')
@include('dashboard.layouts.scrolltop')
@include('dashboard.layouts.toolbar')
@include('dashboard.layouts.demopanel')
@include('dashboard.layouts.footer')
