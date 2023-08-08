@extends('admin.layouts.app')
@section('title', 'Facility Info')

@section('content')

    @include('admin.layouts.partials.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->

        @include('admin.layouts.partials.nav')
        <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card-header py-3 text-right">
                        <h6 class="m-0 font-weight-bold "><a href="#" class="btn btn-primary" data-toggle="modal"
                                                             data-target="#test-device">Add New Test Device</a></h6>
                    </div>

                    <!-- Insert Facility Modal -->
                    <div class="modal fade" id="test-device" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: 800px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Test Device</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('test-devices.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Test Device</label>
                                            <input type="text" class="form-control" id="device_name-info"
                                                   name="test_device" aria-describedby="emailHelp"
                                                   placeholder="Enter Your Test Device">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Create New Test Device</button>
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
                            <h6 class="m-0 font-weight-bold text-primary">All Test Devices Information</h6>
                        </div>
                        <div class="card-body">
                            @if(!$testdevices->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">Id</th>
                                            <th style="width: 100px">Name</th>
                                            <th style="width: 100px">Operations</th>

                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th style="width: 30px">Id</th>
                                            <th style="width: 100px">Name</th>

                                            <th style="width: 100px">Operations</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>


                                        @foreach($testdevices as $td)
                                            <tr>
                                                <td style="width: 30px">{{$td->id}}</td>
                                                <td style="width: 100px">{{$td->test_device}}</td>

                                                <td style="width: 100px">
                                                    <form action="{{ route('test-devices.destroy',$td->id) }}"
                                                          method="POST">
                                                        <a type="button" class="btn btn-success"
                                                           data-toggle="modal" data-target="#dd{{ $td->id }}"
                                                           title="Edit"><i
                                                                class="fas fa-edit mr-1">Edit</i></a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            onclick="return confirm('Are you sure you want to delete this?')"
                                                            href="{{route('test-devices.destroy',$td->id)}}"

                                                            type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash mr-1" aria-hidden="true"></i>Delete
                                                        </button>

                                                    </form>

                                                    <!-- Update Facility Modal -->
                                                    <div class="modal fade" id="dd{{ $td->id }}" tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document"
                                                             style="max-width: 800px">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Update Device Name Info</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('test-devices.update',$td->id) }}"
                                                                        method="post"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label for="name">Facility Info</label>
                                                                            <input type="text" class="form-control"
                                                                                   value="{{$td->test_device}}"
                                                                                   id="test-devices"
                                                                                   name="test_device"
                                                                                   aria-describedby="emailHelp"
                                                                                   placeholder="Enter Your Device Name">
                                                                        </div>

                                                                        <button type="submit" class="btn btn-primary">
                                                                            Update Device
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
                                </div>



                            @else
                                <div class="alert alert-success">
                                    <p>You don't have any Facility Information <b>Click here to
                                            <a href="" class="text-primary" data-toggle="modal"
                                               data-target="#test-device">add New Test Device</a> </b></p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
    @include('admin.layouts.partials.footer')
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

@endsection
