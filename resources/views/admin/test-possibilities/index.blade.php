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
                                                             data-target="#test-device">Add New Test Possibility</a>
                        </h6>
                    </div>

                    <!-- Insert Facility Modal -->
                    <div class="modal fade" id="test-device" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: 800px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Test Possibility</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('test-possibilities.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <select name="test_name_id" id="" class="form-control">
                                                <option value="" selected="true" disabled="disabled">Select Test Name
                                                </option>
                                                @foreach($testNames as $tn)
                                                    <option value="{{$tn->id}}">{{$tn->test_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Test Possibility Name</label>
                                            <input type="text" class="form-control" id="name "
                                                   name="name" aria-describedby="emailHelp" required
                                                   placeholder="Enter Your Test Possiblity Name">
                                        </div>
                                        <input type="hidden" name="description">
                                        <input type="hidden" name="suggestion">

                                        <button type="submit" class="btn btn-primary">Create New Test Possibility
                                        </button>
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
                            <h6 class="m-0 font-weight-bold text-primary">All Test Possibilities</h6>
                        </div>
                        <div class="card-body">
                            @if(!$allTestPossibilities->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th style="width: 5%">Id</th>
                                            <th style="width: 35%">Test Name</th>
                                            <th style="width: 18%">Name</th>
                                            <th style="width: 22%">Operations</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($allTestPossibilities as $allTestPossibility)
                                            <tr>
                                                <td style="width: 5%">{{$allTestPossibility->id}}</td>
                                                <td style="width: 35%;font-size: 13px">{{$allTestPossibility->testName->test_name}}</td>
                                                <td style="width: 18%;font-size: 13px">{{$allTestPossibility->name}}</td>
                                                <td style="width: 22%">
                                                    <form
                                                        action="{{ route('test-possibilities.destroy',$allTestPossibility->id) }}"
                                                        method="POST">
                                                        <a type="button" class="btn btn-sm btn-success"
                                                           data-toggle="modal"
                                                           data-target="#dd{{ $allTestPossibility->id }}"
                                                           title="Edit"><i
                                                                class="fas fa-edit mr-1">Edit</i></a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            onclick="return confirm('Are you sure you want to delete this?')"
                                                            href="{{route('test-possibilities.destroy',$allTestPossibility->id)}}"
                                                            type="submit" class="btn btn-sm btn-danger"><i
                                                                class="fa fa-trash mr-1" aria-hidden="true"></i>Delete
                                                        </button>

                                                    </form>

                                                    <!-- Update Facility Modal -->
                                                    <div class="modal fade" id="dd{{ $allTestPossibility->id }}"
                                                         tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document"
                                                             style="max-width: 800px">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Update Facility Info</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{route('test-possibilities.update',$allTestPossibility->id)}}"
                                                                        method="post"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <select name="test_name_id" id=""
                                                                                    class="form-control">
                                                                                <option value="" selected="true"
                                                                                        disabled="disabled">Select Test
                                                                                    Name
                                                                                </option>
                                                                                @foreach($testNames as $tn)
                                                                                    <option
                                                                                        {{ ($allTestPossibility->test_name_id) == $tn->id ? 'selected' : '' }} value="{{$tn->id}}">{{$tn->test_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="name">Test Possibility
                                                                                Name</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="name "
                                                                                   name="name"
                                                                                   value="{{$allTestPossibility->name}}"
                                                                                   aria-describedby="emailHelp"
                                                                                   required
                                                                                   placeholder="Enter Your Test Possiblity Name">
                                                                        </div>
                                                                        <input type="hidden" name="description">
                                                                        <input type="hidden" name="suggestion">

                                                                        <button type="submit" class="btn btn-primary">
                                                                            Update Test Possibility
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
                                    <p>You don't have any Test Possibility <b>Click here to
                                            <a href="" class="text-primary text-decoration-none" data-toggle="modal"
                                               data-target="#test-device">Add New Test Possibility</a> </b></p>
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
