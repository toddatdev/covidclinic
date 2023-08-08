@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')

    @include('admin.layouts.partials.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

        @include('admin.layouts.partials.nav')

        <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card-header py-3 text-right">
                        <h6 class="m-0 font-weight-bold ">
                            <a href="#" id="addNewUserbtn" class="btn btn-primary " data-toggle="modal"
                               data-target="#addUser">Add New User</a></h6>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: 800px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary" id="adNewUser">Add New User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('dashboard.store')}}" method="post">

                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" value="{{old('name')}}" id="name"
                                                   name="name"
                                                   aria-describedby="emailHelp" placeholder="Enter User Name">
                                            <span style="color: #ff0000; font-size: 13px; font-weight: bold">@error('name')
                                                {{ $message }}

                                             <script>
                                                 setTimeout(() => {
                                                     document.getElementById('addNewUserbtn').click()
                                                 }, 300)

                                             </script>

                                                @enderror</span>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" value="{{old('email')}}" id="email"
                                                   name="email"
                                                   aria-describedby="emailHelp" placeholder="Enter User email">
                                            <span style="color: #ff0000; font-size: 13px; font-weight: bold">@error('email')
                                                {{ $message }}
                                                    <script>
                                                 setTimeout(() => {
                                                     document.getElementById('addNewUserbtn').click()
                                                 }, 300)

                                             </script>
                                                @enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Select Role</label>
                                            <select class="form-control" id="role" name="role">
                                                <option value="">Select Role</option>
                                                <option value="1">Admin</option>
                                                <option value="0">User</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                   placeholder="Password">
                                            <span style="color: #ff0000; font-size: 13px; font-weight: bold">@error('password')
                                                {{ $message }}
                                                    <script>
                                                 setTimeout(() => {
                                                     document.getElementById('addNewUserbtn').click()
                                                 }, 300)

                                             </script>
                                                @enderror</span>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                   name="password_confirmation" placeholder="Confirm Password">
                                            <span style="color: #ff0000; font-size: 13px; font-weight: bold">@error('password_confirmation')
                                                {{ $message }}
                                                    <script>
                                                 setTimeout(() => {
                                                     document.getElementById('addNewUserbtn').click()
                                                 }, 300)

                                             </script>
                                                @enderror</span>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Create New User</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success my-auto">
                                <p class="font-weight-bold mt-2">{{ $message }}</p>
                            </div>
                        @elseif($message = Session::get('deleted'))
                            <div class="alert alert-danger my-auto">
                                <p class="font-weight-bold mt-2">{{ $message }}</p>
                            </div>
                        @endif
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Users Information</h6>
                        </div>
                        <div class="card-body">
                            @if(!$users->isEmpty())
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th style="width: 6%">Id</th>
                                        <th style="width: 22%">Name</th>
                                        <th style="width: 30%">Email</th>
                                        <th style="width: 10%">Role</th>

                                        <th style="width: 35%">Operations</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <td style="width: 6%">{{$user->id}}</td>
                                            <td style="width: 22%">{{$user->name}}</td>
                                            <td style="width: 30%">{{$user->email}}</td>
                                            <td class="{{$user->is_admin == 1? 'font-weight-bold text-primary': 'font-weight-bold text-secondary'}}"
                                                style="width: 10%">{{$user->is_admin == 1? 'Admin': 'User'}}</td>

                                            <td style="width: 35%">
                                                <form action="{{ route('dashboard.destroy',$user->id) }}"
                                                      method="POST">
                                                    <a type="button" class="btn btn-success"
                                                       data-toggle="modal" data-target="#up{{$user->id}}"
                                                       title="Edit" style="font-size: 12px"><i
                                                            class="fas fa-edit mr-1">Reset Password</i></a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button href="{{route('dashboard.destroy',$user->id)}}"
                                                            onclick="return confirm('Are you sure you want to delete this?')"
                                                            style="font-size: 11px"
                                                            type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash mr-1" aria-hidden="true"></i>Delete
                                                    </button>

                                                </form>

                                                <div class="modal fade" id="up{{$user->id}}" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document" style="max-width: 800px">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-primary"
                                                                    id="exampleModalLabel">Update User</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('dashboard.update', $user->id)}}"
                                                                      method="post">

                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="form-group">
                                                                        <label for="name">Name</label>
                                                                        <input type="text" class="form-control"
                                                                               id="name" name="u_name"
                                                                               aria-describedby="emailHelp"
                                                                               value="{{$user->name}}"
                                                                               placeholder="Enter User Name">
                                                                        <span
                                                                            style="color: #ff0000; font-size: 13px; font-weight: bold">@error('u_name')
                                                                            {{ $message }}
 <script>
                                                                             setTimeout(() => {
                                                                                 document.getElementById('addNewUserbtn').click()
                                                                             }, 300)

                                                                         </script>
                                                                            @enderror</span>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Email
                                                                            address</label>
                                                                        <input type="email" class="form-control"
                                                                               id="email" name="u_email"
                                                                               aria-describedby="emailHelp"
                                                                               value="{{$user->email}}"
                                                                               placeholder="Enter User email">
                                                                        <span
                                                                            style="color: #ff0000; font-size: 13px; font-weight: bold">@error('u_email')
                                                                            {{ $message }}
                                                                             <script>
                                                                                 setTimeout(() => {
                                                                                     document.getElementById('addNewUserbtn').click()
                                                                                 }, 300)

                                                                             </script>
                                                                            @enderror</span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect1">Select Role</label>
                                                                        <select class="form-control" id="role"
                                                                                name="role">
                                                                            <option
                                                                                {{old('is_admin',$user->is_admin)==""? 'selected':''}}  value="">
                                                                                Select Role
                                                                            </option>
                                                                            <option
                                                                                {{old('is_admin',$user->is_admin)==1? 'selected':''}}  value="1">
                                                                                Admin
                                                                            </option>
                                                                            <option
                                                                                {{old('is_admin',$user->is_admin)==0? 'selected':''}}  value="0">
                                                                                User
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="exampleInputPassword1">Password</label>
                                                                        <input type="password" class="form-control"
                                                                               id="password"
                                                                               name="u_password"
                                                                               placeholder="Password">
                                                                        <span
                                                                            style="color: #ff0000; font-size: 13px; font-weight: bold">@error('u_password')
                                                                            {{ $message }}
                                                                             <script>
                                                                             setTimeout(() => {
                                                                                 document.getElementById('addNewUserbtn').click()
                                                                             }, 300)

                                                                         </script>
                                                                            @enderror</span>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label
                                                                            for="exampleInputPassword1">Password</label>
                                                                        <input type="password" class="form-control"
                                                                               id="password"
                                                                               name="u_password_confirmation"
                                                                               value="{{$user->confirm_password}}"
                                                                               placeholder="Confirm Password">
                                                                        <span
                                                                            style="color: #ff0000; font-size: 13px; font-weight: bold">@error('u_password_confirmation')
                                                                            {{ $message }}
                                                                             <script>
                                                                         setTimeout(() => {
                                                                             document.getElementById('addNewUserbtn').click()
                                                                         }, 300)

                                                                     </script>
                                                                            @enderror</span>
                                                                    </div>

                                                                    <button type="submit" class="btn btn-primary">Update
                                                                        User
                                                                    </button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger my-auto">
                                    <p class="font-weight-bold mt-2">User Doesn't Exit </p>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- /.container-fluid -->
    </div>
    </div>
    <!-- End of Main Content -->

    @include('admin.layouts.partials.footer')

    </div>
    <!-- End of Content Wrapper -->

@endsection
