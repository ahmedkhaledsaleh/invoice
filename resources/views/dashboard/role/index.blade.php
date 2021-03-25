@extends('dashboard.layouts.master')
@section('main-content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Roles Home</h3>
                </div>
                <div class="card-toolbar">

                    <!--begin::Button-->
                    <a href="{{route('roles.create')}}" class="btn btn-primary font-weight-bolder">
                        <i class="fa fa-plus"></i>New Role</a>
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
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$role->name}}</td>

                            <td>
                                <a href="{{route('roles.show',$role->id)}}" class="btn btn-info font-weight-bolder">
                                    <i class="fa fa-eye"></i>Show Role</a>
                                <a href="{{route('roles.edit',$role->id)}}" class="btn btn-success font-weight-bolder">
                                    <i class="fa fa-edit"></i>Edit Role</a>
{{--                                <a href="{{route('roles.destroy',$role->id)}}"--}}
{{--                                   class="btn btn-danger font-weight-bolder">--}}
{{--                                    <i class="fa fa-trash"></i>Delete Role</a>--}}
                                <button type="button"
                                        class="btn btn-danger font-weight-bolder" data-toggle="modal"
                                        data-target="#modal-destroy"  data-id="{{$role->id}}" data-name="{{$role->name}}">
                                    <i class="fa fa-trash"></i>Delete Role
                                </button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>

                    </tr>
                    </tfoot>
                </table>
                <!--end: Datatable-->


            </div>
        </div>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="modal-destroy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('roles.destroy')}}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>

                        @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        Are You Sure To Delete Role (<span id="name"></span> )
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                            Close
                        </button>
                        <input type="submit" class="btn btn-primary font-weight-bold" value="Delete">

                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection

@section('css')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle15aa.css?v=7.2.2')}}" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Vendors Styles-->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@endsection

@section('js')

    <script>
        $('#modal-destroy').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)

            var id = button.data('id')

            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').html(name);
        })
    </script>


    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle15aa.js?v=7.2.2') }}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('dashboard/js/pages/crud/datatables/advanced/footer-callback15aa.js?v=7.2.2') }}"></script>
    <!--end::Page Scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.success("{{ session('message') }}");
        @endif

            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.error("{{ session('error') }}");
        @endif

            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.info("{{ session('info') }}");
        @endif

            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>
@endsection
