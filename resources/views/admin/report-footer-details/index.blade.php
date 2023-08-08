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
                <div class="container-fluid">

                    @if($reportFooterDetails->isEmpty())

                    <div class="card-header py-3 text-right">
                        <h6 class="m-0 font-weight-bold "><a href="#" class="btn btn-primary" data-toggle="modal"
                                                             data-target="#test-device">Add New Footer Detail</a></h6>
                    </div>

                    @endif

                    <!-- Insert Facility Modal -->
                    <div class="modal fade" id="test-device" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: 800px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('report-footer-details.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label class="font-weight-bold" for="name">Name</label>
                                            <input type="text" class="form-control" id="device_name-info"
                                                   name="name" aria-describedby="emailHelp"
                                                   placeholder="Enter Your Name">
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold" for="name">LIC </label>
                                            <input type="text" class="form-control" id="device_name-info"
                                                   name="lic" aria-describedby="emailHelp"
                                                   placeholder="Enter Your LIC">
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold" for="name">NPI </label>
                                            <input type="text" class="form-control" id="device_name-info"
                                                   name="npi" aria-describedby="emailHelp"
                                                   placeholder="Enter Your NPI">
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold" for="name">Address</label>
                                            <input type="text" class="form-control" id="device_name-info"
                                                   name="address" aria-describedby="emailHelp"
                                                   placeholder="Enter Your Address">
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold" for="name">City</label>
                                            <input type="text" class="form-control" id="device_name-info"
                                                   name="city" aria-describedby="emailHelp"
                                                   placeholder="Enter Your City">
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold" for="name">State</label>
                                            <input type="text" class="form-control" id="device_name-info"
                                                   name="state" aria-describedby="emailHelp"
                                                   placeholder="Enter Your State">
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold" for="name">Zip Code</label>
                                            <input type="text" class="form-control" id="device_name-info"
                                                   name="zip" aria-describedby="emailHelp"
                                                   placeholder="Enter Your Zip Code">
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold" for="name">Email</label>
                                            <input type="email" class="form-control" id="device_name-info"
                                                   name="email" aria-describedby="emailHelp"
                                                   placeholder="Enter Your Email">
                                        </div>


                                        <div class="form-group">
                                            <label class="font-weight-bold" for="name">Phone No</label>
                                            <input type="number" class="form-control" id="device_name-info"
                                                   name="phone" aria-describedby="emailHelp"
                                                   placeholder="Enter Your Phone">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Footer Details</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-8 my-5">

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
                                <h6 class="m-0 font-weight-bold text-primary">All Footer Information</h6>
                            </div>
                            <div class="card-body">
                                @if(!$reportFooterDetails->isEmpty())
                                    <div class="table-responsive">

                                                <div class="col-12">
                                                    @foreach($reportFooterDetails as $td)
                                                <p class="my-3 p-2 border-bottom" style="font-size: 13px"><b class="mr-5">Name:</b>{{$td->name}}</p>
                                                <p class="my-3 p-2 border-bottom" style="font-size: 13px"><b class="mr-5">LIC:</b>{{$td->lic}}</p>
                                                <p class="my-3 p-2 border-bottom" style="font-size: 13px"><b class="mr-5">NPI:</b>{{$td->npi}}</p>
                                                <p class="my-3 p-2 border-bottom" style="font-size: 13px"><b class="mr-5">Address:</b>{{$td->address}}</p>
                                                <p class="my-3 p-2 border-bottom" style="font-size: 13px"><b class="mr-5">City:</b>{{$td->city}}</p>
                                                <p class="my-3 p-2 border-bottom" style="font-size: 13px"><b class="mr-5">State:</b>{{$td->state}}</p>
                                                <p class="my-3 p-2 border-bottom" style="font-size: 13px"><b class="mr-5">Zip:</b>{{$td->zip}}</p>
                                                <p class="my-3 p-2 border-bottom" style="font-size: 13px"><b class="mr-5">Email:</b>{{$td->email}}</p>
                                                <p class="my-3 p-2 border-bottom" style="font-size: 13px"><b class="mr-5">Phone:</b>{{$td->phone}}</p>

                                                        <form action="{{ route('report-footer-details.destroy',$td->id) }}"
                                                              method="POST">
                                                            <a type="button" class="btn btn-success my-1"
                                                               style="width: 15%;"
                                                               data-toggle="modal" data-target="#dd{{ $td->id }}"
                                                               title="Edit"><i
                                                                    class="fas fa-edit mr-1">Edit</i></a>

                                                            @csrf
                                                            @method('DELETE')

                                                            <button

                                                                onclick="return confirm('Are you sure you want to delete this?')"
                                                                href="{{route('test-devices.destroy',$td->id)}}"

                                                                type="submit" class="btn btn-danger" style="width: 15%"><i
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
                                                                            Update Info</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('report-footer-details.update',$td->id) }}"
                                                                            method="post"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PUT')

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold" for="name">Name</label>
                                                                                <input type="text" class="form-control" id="device_name-info"
                                                                                       name="name" aria-describedby="emailHelp"
                                                                                       value="{{$td->name}}"
                                                                                       placeholder="Enter Your Name">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold" for="name">LIC </label>
                                                                                <input type="text" class="form-control" id="device_name-info"
                                                                                       name="lic" aria-describedby="emailHelp"
                                                                                       value="{{$td->lic}}"
                                                                                       placeholder="Enter Your LIC">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold" for="name">NPI </label>
                                                                                <input type="text" class="form-control" id="device_name-info"
                                                                                       name="npi" aria-describedby="emailHelp"
                                                                                       value="{{$td->npi}}"
                                                                                       placeholder="Enter Your NPI">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold" for="name">Address</label>
                                                                                <input type="text" class="form-control" id="device_name-info"
                                                                                       name="address" aria-describedby="emailHelp"
                                                                                       value="{{$td->address}}"
                                                                                       placeholder="Enter Your Address">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold" for="name">City</label>
                                                                                <input type="text" class="form-control" id="device_name-info"
                                                                                       name="city" aria-describedby="emailHelp"
                                                                                       value="{{$td->city}}"
                                                                                       placeholder="Enter Your City">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold" for="name">State</label>
                                                                                <input type="text" class="form-control" id="device_name-info"
                                                                                       name="state" aria-describedby="emailHelp"
                                                                                       value="{{$td->state}}"
                                                                                       placeholder="Enter Your State">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold" for="name">Zip Code</label>
                                                                                <input type="text" class="form-control" id="device_name-info"
                                                                                       name="zip" aria-describedby="emailHelp"
                                                                                       value="{{$td->zip}}"
                                                                                       placeholder="Enter Your Zip Code">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold" for="name">Email</label>
                                                                                <input type="email" class="form-control" id="device_name-info"
                                                                                       name="email" aria-describedby="emailHelp"
                                                                                       value="{{$td->email}}"
                                                                                       placeholder="Enter Your Email">
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label class="font-weight-bold" for="name">Phone No</label>
                                                                                <input type="number" class="form-control" id="device_name-info"
                                                                                       name="phone" aria-describedby="emailHelp"
                                                                                       value="{{$td->phone}}"
                                                                                       placeholder="Enter Your Phone">
                                                                            </div>

                                                                            <button type="submit"
                                                                                    class="btn btn-primary">
                                                                                Update Device
                                                                            </button>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endforeach
                                                </div>

                                    </div>



                                @else
                                    <div class="alert alert-success">
                                        <p>You don't have any Facility Information <b>Click here to
                                                <a href="" class="text-primary" data-toggle="modal"
                                                   data-target="#test-device">add New </a> </b></p>
                                    </div>
                                @endif
                            </div>

                        </div>

                        <div class="col-4 my-5 shadow p-3">
                            <h4 class="text-center font-weight-bold mt-3">Report Signature Image</h4>
                            @if($signs->isEmpty())
                                <div class="col-inner">
                                    <form action="{{ route('upload-sign-image.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="thumbnail">Footer Signature Image:</label>
                                            <input type="file" class="form-control" required id="thumbnail" name="thumbnail">
                                        </div>
                                        <button type="submit" class="btn btn-info" style="width: 100%"><i
                                                class="fas fa-upload mr-2"></i> Upload Footer Sign image
                                        </button>
                                    </form>
                                </div>

                            @endif


                            @if(!$signs->isEmpty())
                                <div class="col-bottom my-5 text-center">

                                    @foreach($signs as $s)

                                        <img class="w-100 h-50" src="{{ URL::asset('storage/' . $s->thumbnail) }}"
                                             alt="">

                                        <div class="my-5">
                                            <form action="{{ route('upload-sign-image.update',$s->id) }}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="thumbnail">Update Report Image:</label>
                                                    <input type="file" class="form-control" id="thumbnail"
                                                           name="thumbnail">
                                                </div>
                                                <button type="submit" class="btn btn-info my-3" style="width: 100%"><i
                                                        class="fas fa-upload mr-2"></i> Update Report Image
                                                </button>
                                            </form>

                                            <form action="{{ route('upload-sign-image.destroy',$s->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    onclick="return confirm('Are you sure you want to delete this?')"
                                                    href="{{route('report-descriptions.destroy',$s->id)}}"
                                                    type="submit" class="btn btn-danger w-100"><i
                                                        class="fa fa-trash mr-1 px-1" aria-hidden="true"></i>Delete
                                                    Report Image
                                                </button>

                                            </form>

                                        </div>

                                    @endforeach

                                </div>
                            @endif
                        </div>
                    </div>


                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
    @include('admin.layouts.partials.footer')
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    @push('scripts')



    @endpush

@endsection
