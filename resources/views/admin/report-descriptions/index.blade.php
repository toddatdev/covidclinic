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

                    @if($reportDescriptions->isEmpty())

                    <div class="card-header py-3 text-right">
                        <h6 class="m-0 font-weight-bold "><a href="#" class="btn btn-primary" data-toggle="modal"
                          data-target="#test-device">Add Report Description</a></h6>
                    </div>

                    @endif

                    <!-- Insert Facility Modal -->
                    <div class="modal fade" id="test-device" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: 800px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Report Description</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('report-descriptions.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Report Description</label>
                                            <textarea class="form-control" id="" name="report_description" rows="15"></textarea>

                                        </div>

                                        <button type="submit" class="btn btn-primary">Add Description</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow my-5">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success my-auto">
                                <p class="font-weight-bold mt-2">{{ $message }}</p>
                            </div>
                        @elseif($message = Session::get('deleted'))
                            <div class="alert alert-danger my-auto">
                                <p class="font-weight-bold mt-2">{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            @if(!$reportDescriptions->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th style="width: 100px" class="">Description</th>

                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($reportDescriptions as $rd)
                                            <tr>
                                                <td style="width: 100px">{{$rd->description}}</td>


                                            </tr>
                                            <tr>
                                                <td style="width: 100px">
                                                    <form action="{{ route('report-descriptions.destroy',$rd->id) }}"
                                                          method="POST">
                                                        <a type="button" class="btn btn-success"
                                                           data-toggle="modal" data-target="#dd{{ $rd->id }}"
                                                           title="Edit"><i
                                                                class="fas fa-edit mr-1 px-1">Edit</i></a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            onclick="return confirm('Are you sure you want to delete this?')"
                                                            href="{{route('report-descriptions.destroy',$rd->id)}}"
                                                            type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash mr-1 px-1" aria-hidden="true"></i>Delete
                                                        </button>

                                                    </form>

                                                    <!-- Update Facility Modal -->
                                                    <div class="modal fade" id="dd{{ $rd->id }}" tabindex="-1"
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
                                                                        action="{{ route('report-descriptions.update',$rd->id) }}"
                                                                        method="post"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group text-left" >
                                                                            <label for="exampleFormControlTextarea1">Report Description</label>
                                                                            <textarea class="form-control text-left" id="" name="report_description" required rows="15">{{trim($rd->description)}}</textarea>
                                                                        </div>

                                                                        <button type="submit" class="btn btn-primary">
                                                                            Update Description
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
                                            <a href="" class="text-primary" data-toggle="modal" data-target="#test-device">Add New Description</a> </b></p>
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
