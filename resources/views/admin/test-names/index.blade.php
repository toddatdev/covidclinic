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
                                                             data-target="#test-device">Add New Test Name</a></h6>
                    </div>

                    <!-- Insert Facility Modal -->
                    <div class="modal fade" id="test-device" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: 800px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Test Name</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('test-names.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Test Name</label>
                                            <input type="text" class="form-control" id="test_name "
                                                   name="test_name" aria-describedby="emailHelp"
                                                   placeholder="Enter Your Test Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="information">Information</label>
                                            <textarea class="form-control" id="information" name="information"
                                                      rows="12"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Create New Test Name</button>
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
                            <h6 class="m-0 font-weight-bold text-primary">All Test Names Information</h6>
                        </div>
                        <div class="card-body">
                            @if(!$testnames->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th style="width: 5%">Id</th>
                                            <th style="width: 25%">Name</th>
                                            <th style="width: 44%">Information</th>
                                            <th style="width: 22%">Operations</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($testnames as $tn)
                                            <tr>
                                                <td style="width: 5%">{{$tn->id}}</td>
                                                <td style="width: 25%;font-size: 13px">{{$tn->test_name}}</td>
                                                <td style="width: 44%;font-size: 13px">{!! Str::limit($tn->information, 100, ' ...') !!}</td>

                                                <td style="width: 22%">
                                                    <form action="{{ route('test-names.destroy',$tn->id) }}"
                                                          method="POST">
                                                        <a type="button" class="btn btn-sm btn-success"
                                                           data-toggle="modal" data-target="#dd{{ $tn->id }}"
                                                           title="Edit"><i
                                                                class="fas fa-edit mr-1">Edit</i></a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            onclick="return confirm('Are you sure you want to delete this?')"
                                                            href="{{route('test-names.destroy',$tn->id)}}"
                                                            type="submit" class="btn btn-sm btn-danger"><i
                                                                class="fa fa-trash mr-1" aria-hidden="true"></i>Delete
                                                        </button>

                                                    </form>

                                                    <!-- Update Facility Modal -->
                                                    <div class="modal fade" id="dd{{ $tn->id }}" tabindex="-1"
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
                                                                        action="{{ route('test-names.update',$tn->id) }}"
                                                                        method="post"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label for="name">Facility Info</label>
                                                                            <input type="text" class="form-control"
                                                                                   value="{{$tn->test_name}}"
                                                                                   id="facility-info"
                                                                                   name="test_name"
                                                                                   aria-describedby="emailHelp"
                                                                                   placeholder="Enter Your Test Name">
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <label for="information">Information</label>
                                                                            <textarea class="form-control" id="information" name="information" rows="12">{{$tn->information}}</textarea>
                                                                        </div>

                                                                        <button type="submit" class="btn btn-primary">
                                                                            Update Test Name
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
                                               data-target="#test-device">Add New Test Name</a> </b></p>
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

    @push('scripts')
        <script src="https://cdn.tiny.cloud/1/o30zonb89f9ct5u62tua74zj9rxopr3m8wprex4ttrdgbb9b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar_mode: 'floating',
            });
        </script>

    @endpush

@endsection
