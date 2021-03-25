@extends('dashboard.layouts.master')
@section('main-content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Edit New User</h3>

            </div>
            <!--begin::Form-->
            <form class="form" action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>User Name:</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' :  'form-control-solid'  }}   "
                               placeholder="Enter User name">
                        @error("name")

                        <div class="invalid-feedback">{{ $message  }}</div>

                        @enderror
                    </div>

                    <div class="form-group">
                        <label>User email:</label>
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' :  'form-control-solid'  }}   "
                               placeholder="Enter User Email">
                        @error("email")

                        <div class="invalid-feedback">{{ $message  }}</div>

                        @enderror
                    </div>

                    <div class="form-group">
                        <label>User password:</label>
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' :  'form-control-solid'  }}   "
                               placeholder="Enter User Email">
                        @error("password")

                        <div class="invalid-feedback">{{ $message  }}</div>

                        @enderror
                    </div>

                    <div class="form-group">
                        <label>User password confirmation:</label>
                        <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' :  'form-control-solid'  }}   "
                               placeholder="Enter User Email">
                        @error("password_confirmation")

                        <div class="invalid-feedback">{{ $message  }}</div>

                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Select Role</label>
                        <select name="roles" class="form-control form-control-solid">
                            <option>Choose Role</option>
                            @foreach($roles as $role)
                                <option {{$role->id}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>




                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Add User</button>
                    <a href="{{route('users.index')}}" type="reset" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
            <!--end::Form-->
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
    <script src="{{ asset('dashboard/js/pages/crud/datatables/advanced/multiple-controls15aa.js?v=7.2.2') }}"></script>
    <!--end::Page Scripts-->
@endsection
