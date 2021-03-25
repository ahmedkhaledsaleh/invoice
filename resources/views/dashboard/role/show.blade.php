@extends('dashboard.layouts.master')
@section('main-content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Roles Home
                </div>
                <div class="card-toolbar">

                    <!--begin::Button-->
                    <a href="{{route('roles.create')}}" class="btn btn-primary font-weight-bolder">
                        <i class="la la-plus"></i>New Role</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">

                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-foot-custom table-checkable"
                       id="kt_datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rolePermissions as $rolePermission)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$rolePermission->name}}</td>



                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>


                    </tr>
                    </tfoot>
                </table>
                <!--end: Datatable-->


            </div>
        </div>
    </div>

@endsection

@section('css')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle15aa.css?v=7.2.2')}}" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Vendors Styles-->

@endsection

@section('js')
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle15aa.js?v=7.2.2') }}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('dashboard/js/pages/crud/datatables/advanced/footer-callback15aa.js?v=7.2.2') }}"></script>
    <!--end::Page Scripts-->
@endsection
