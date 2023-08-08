@extends('admin.layouts.app')
@section('title', 'Facility Info')

@section('content')

    @push('stylesheets')
        <style>
            .nav-tabs .nav-link.active {
                color: #fea830 !important;
                font-weight: 800;
            }

            .nav-tabs .nav-link {
                color: #090e42 !important;
                font-weight: 700;
            }
        </style>
    @endpush

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
                                                             data-target="#test-device">Add New Facility Info</a>
                        </h6>
                    </div>

                    <!-- Insert Facility Modal -->
                    <div class="modal fade" id="test-device" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: 800px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Facility Info</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                               role="tab" aria-controls="home" aria-selected="true">
                                                Upload Facility Location CSV
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                               role="tab" aria-controls="contact" aria-selected="false">Add Facility
                                                Location</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                             aria-labelledby="home-tab">
                                            <form action="{{ route('facility-location.store') }}" method="post" --}}
                                                  enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group mt-5 mb-3">
                                                    <label for="">Upload CSV File</label><br>
                                                    <input type='file' name='file' required>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Create New Facility Info
                                                </button>
                                            </form>

                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel"
                                             aria-labelledby="contact-tab">
                                            <div class="my-3">
                                                <form action="{{ route('facility-location.store') }}" method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Facility Director</label>
                                                        <input type="text" class="form-control" id="test_name "
                                                               name="facility_director" aria-describedby="emailHelp"
                                                               placeholder="Enter Your Facility Director" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name">Facility Address</label>
                                                        <input type="text" class="form-control" id="test_name "
                                                               name="facility_address" aria-describedby="emailHelp"
                                                               placeholder="Enter Your Facility Address " required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name">Phone No</label>
                                                        <input type="text" class="form-control" id="test_name "
                                                               name="facility_phone" aria-describedby="emailHelp"
                                                               placeholder="Enter Your Number" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name">CLIA</label>
                                                        <input type="text" class="form-control" id="test_name "
                                                               name="facility_clia" aria-describedby="emailHelp"
                                                               placeholder="Enter Your CLIA" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name">Ordering Provider</label>
                                                        <input type="text" class="form-control" id="test_name "
                                                               name="facility_ordering_provider"
                                                               aria-describedby="emailHelp"
                                                               placeholder="Enter Your Ordering Provider" required>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Create New Facility
                                                        Info
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
                        @elseif($message = Session::get('error'))
                            <div class="alert alert-danger my-auto">
                                <p class="font-weight-bold mt-2">{{ $message }}</p>
                            </div>
                        @endif
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Facility Locations</h6>
                        </div>
                        <div class="card-body">
                            @if(!$facilityReportInfo->isEmpty())
                                <div class="table-responsive">
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <input type="text" name="search" id="search" class="form-control border-bottom-primary" placeholder="Search Facility Location" />--}}
                                    {{--                                    </div>--}}
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th style="width: 3%; font-size: 13px">id</th>
                                            <th style="width: 100px; font-size: 13px">Facility Director</th>
                                            <th style="width: 100px; font-size: 13px">Address</th>
                                            <th style="width: 100px; font-size: 13px">Phone</th>
                                            <th style="width: 100px; font-size: 13px">CLIA</th>
                                            <th style="width: 100px; font-size: 13px">Ordering Provider</th>
                                            <th style="width: 100px; font-size: 13px">Operations</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($facilityReportInfo as $fri)
                                            <tr>
                                                <td style="width: 3%; font-size: 12px">{{$fri->id}}</td>
                                                <td style="width: 100px; font-size: 12px">{{$fri->facility_director}}</td>
                                                <td style="width: 100px; font-size: 12px">{{$fri->facility_address}}</td>
                                                <td style="width: 100px; font-size: 12px">{{$fri->facility_phone}}</td>
                                                <td style="width: 100px; font-size: 12px">{{$fri->facility_clia}}</td>
                                                <td style="width: 100px; font-size: 12px">{{$fri->facility_ordering_provider}}</td>

                                                <td style="width: 100px">
                                                    <form action="{{ route('facility-location.destroy',$fri->id) }}"
                                                          method="POST">
                                                        <a type="button" class="btn btn-success"
                                                           style="font-size: 9px"
                                                           data-toggle="modal" data-target="#dd{{ $fri->id }}"
                                                           title="Edit"><i
                                                                class="fas fa-edit mr-1">Edit</i></a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            style="font-size: 9px"
                                                            onclick="return confirm('Are you sure you want to delete this?')"
                                                            href="{{route('facility-location.destroy',$fri->id)}}"
                                                            type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash mr-1" aria-hidden="true"></i>Delete
                                                        </button>

                                                    </form>

                                                    <!--  Facility Modal -->
                                                    <div class="modal fade" id="dd{{ $fri->id }}" tabindex="-1"
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
                                                                        action="{{ route('facility-location.update', $fri->id) }}"
                                                                        method="post"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label for="name">Facility Director</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="test_name "
                                                                                   value="{{$fri->facility_director}}"
                                                                                   name="facility_director"
                                                                                   aria-describedby="emailHelp"
                                                                                   placeholder="Enter Your Facility Director">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="name">Facility Address</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="test_name "
                                                                                   value="{{$fri->facility_address}}"
                                                                                   name="facility_address"
                                                                                   aria-describedby="emailHelp"
                                                                                   placeholder="Enter Your Facility Address ">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="name">Phone No</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="test_name "
                                                                                   value="{{$fri->facility_phone}}"
                                                                                   name="facility_phone"
                                                                                   aria-describedby="emailHelp"
                                                                                   placeholder="Enter Your Number">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="name">CLIA</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="test_name "
                                                                                   value="{{$fri->facility_clia}}"
                                                                                   name="facility_clia"
                                                                                   aria-describedby="emailHelp"
                                                                                   placeholder="Enter Your CLIA">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="name">Ordering Provider</label>
                                                                            <input type="text" class="form-control"
                                                                                   id="test_name "
                                                                                   value="{{$fri->facility_ordering_provider}}"
                                                                                   name="facility_ordering_provider"
                                                                                   aria-describedby="emailHelp"
                                                                                   placeholder="Enter Your Ordering Provider">
                                                                        </div>

                                                                        {{--                                                                        <div class="form-group">--}}
                                                                        {{--                                                                            <div class="form-check-inline">--}}
                                                                        {{--                                                                                <label class="form-check-label">--}}
                                                                        {{--                                                                                    <input type="radio"--}}
                                                                        {{--                                                                                           class="form-check-input"--}}
                                                                        {{--                                                                                           value="enable" name="status">Enable--}}
                                                                        {{--                                                                                </label>--}}
                                                                        {{--                                                                            </div>--}}
                                                                        {{--                                                                            <div class="form-check-inline">--}}
                                                                        {{--                                                                                <label class="form-check-label">--}}
                                                                        {{--                                                                                    <input type="radio"--}}
                                                                        {{--                                                                                           class="form-check-input"--}}
                                                                        {{--                                                                                           value="disable"--}}
                                                                        {{--                                                                                           checked="checked"--}}
                                                                        {{--                                                                                           name="status">Disable--}}
                                                                        {{--                                                                                </label>--}}
                                                                        {{--                                                                            </div>--}}
                                                                        {{--                                                                        </div>--}}

                                                                        <button type="submit" class="btn btn-primary">
                                                                            Update Facility Report Info
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
                                    {!! $facilityReportInfo->links() !!}
                                </div>

                            @else
                                <div class="alert alert-success">
                                    <p>You don't have any Facility Information <b>Click here to
                                            <a href="" class="text-primary" data-toggle="modal"
                                               data-target="#test-device">Add New Facility Info</a> </b></p>
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
