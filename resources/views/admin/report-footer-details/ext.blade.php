{{--@extends('admin.layouts.app')--}}
{{--@section('title', 'Facility Info')--}}

{{--@section('content')--}}

{{--    @include('admin.layouts.partials.sidebar')--}}

{{--    <!-- Content Wrapper -->--}}
{{--    <div id="content-wrapper" class="d-flex flex-column">--}}

{{--        <!-- Main Content -->--}}
{{--        <div id="content">--}}

{{--            <!-- Topbar -->--}}

{{--        @include('admin.layouts.partials.nav')--}}
{{--        <!-- End of Topbar -->--}}

{{--            <!-- Begin Page Content -->--}}
{{--            <div class="container-fluid">--}}

{{--                <div class="row">--}}
{{--                    <div class="col-9">--}}
{{--                        <div class="col-inner-left">--}}
{{--                            <div class="my-5">--}}

{{--                                @if ($message = Session::get('success'))--}}
{{--                                    <div class="alert alert-success my-auto">--}}
{{--                                        <p class="font-weight-bold mt-2">{{ $message }}</p>--}}
{{--                                    </div>--}}
{{--                                @elseif($message = Session::get('deleted'))--}}
{{--                                    <div class="alert alert-danger my-auto">--}}
{{--                                        <p class="font-weight-bold mt-2">{{ $message }}</p>--}}
{{--                                    </div>--}}
{{--                                @endif--}}

{{--                                <form action="{{ route('report-footer-details.store') }}" method="post"--}}
{{--                                      enctype="multipart/form-data">--}}
{{--                                    @csrf--}}
{{--                                    <div class="table-responsive">--}}
{{--                                        <form method="post" id="dynamic_form">--}}
{{--                                            <span id="result"></span>--}}
{{--                                            <table class="table table-bordered table-striped" id="user_table">--}}
{{--                                                <thead>--}}
{{--                                                <tr>--}}
{{--                                                    <th width="75%">Report Footer Detail</th>--}}

{{--                                                    <th width="20%">Action</th>--}}
{{--                                                </tr>--}}
{{--                                                </thead>--}}
{{--                                                <tbody>--}}

{{--                                                </tbody>--}}
{{--                                                <tfoot>--}}
{{--                                                <tr>--}}
{{--                                                    <td colspan="1" align="right">&nbsp;</td>--}}
{{--                                                    <td>--}}
{{--                                                        @csrf--}}
{{--                                                        <input type="submit" name="save" id="save"--}}
{{--                                                               class="btn w-100 btn-primary"--}}
{{--                                                               value="Save Detail"/>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                </tfoot>--}}
{{--                                            </table>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}

{{--                                    --}}{{--                                        <button type="submit" class="btn btn-primary">Add Description</button>--}}
{{--                                </form>--}}

{{--                            </div>--}}


{{--                            <div class=" mt-5">--}}
{{--                                @if(!$reportFooterDetails->isEmpty())--}}

{{--                                    <div class="row mx-auto w-100 ">--}}
{{--                                        @foreach($reportFooterDetails as $rfd)--}}
{{--                                            <div class="col-9 my-3 bg-light border-bottom">--}}
{{--                                                <span--}}
{{--                                                    class="font-weight-bold mr-3">( {{$rfd->id}} )</span> {{$rfd->footer_list_name}}--}}
{{--                                            </div>--}}
{{--                                            <div class="col-3 my-3 text-right">--}}
{{--                                                <form action="{{ route('report-footer-details.destroy',$rfd->id) }}"--}}
{{--                                                      method="POST">--}}
{{--                                                    <a type="button" class="btn btn-success"--}}
{{--                                                       data-toggle="modal" data-target="#dd{{ $rfd->id }}"--}}
{{--                                                       title="Edit"><i--}}
{{--                                                            class="fas fa-edit mr-1 px-1">Edit</i></a>--}}

{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}

{{--                                                    <button href="{{route('dashboard.destroy',$rfd->id)}}"--}}
{{--                                                            onclick="return confirm('Are you sure you want to delete this?')"--}}
{{--                                                            type="submit" class="btn btn-danger"><i--}}
{{--                                                            class="fa fa-trash mr-1" aria-hidden="true"></i>Delete--}}
{{--                                                    </button>--}}

{{--                                                </form>--}}

{{--                                                <!-- Update Facility Modal -->--}}
{{--                                                <div class="modal fade" id="dd{{ $rfd->id }}" tabindex="-1"--}}
{{--                                                     role="dialog"--}}
{{--                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                                    <div class="modal-dialog" role="document"--}}
{{--                                                         style="max-width: 800px">--}}
{{--                                                        <div class="modal-content">--}}
{{--                                                            <div class="modal-header">--}}
{{--                                                                <h5 class="modal-title" id="exampleModalLabel">--}}
{{--                                                                    Update Footer Info</h5>--}}
{{--                                                                <button type="button" class="close"--}}
{{--                                                                        data-dismiss="modal" aria-label="Close">--}}
{{--                                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="modal-body">--}}
{{--                                                                <form--}}
{{--                                                                    action="{{ route('report-footer-details.update',$rfd->id) }}"--}}
{{--                                                                    method="post"--}}
{{--                                                                    enctype="multipart/form-data">--}}
{{--                                                                    @csrf--}}
{{--                                                                    @method('PUT')--}}
{{--                                                                    <div class="form-group text-left">--}}
{{--                                                                        <label for="exampleFormControlTextarea1">Report--}}
{{--                                                                            Footer Detail</label>--}}
{{--                                                                        <input type="text" name="footer_list_name"--}}
{{--                                                                               value="{{$rfd->footer_list_name}}"--}}
{{--                                                                               class="form-control"/></div>--}}

{{--                                                                    <button type="submit" class="btn btn-primary">--}}
{{--                                                                        Update Description--}}
{{--                                                                    </button>--}}
{{--                                                                </form>--}}
{{--                                                            </div>--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}

{{--                                @else--}}
{{--                                    <div class="alert alert-success">--}}
{{--                                        <p>You don't have any Footer Details</p>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-3 my-5">--}}

{{--                        @if($signs->isEmpty())--}}
{{--                            <div class="col-inner">--}}
{{--                                <form action="{{ route('upload-sign-image.store') }}" method="post" enctype="multipart/form-data">--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="thumbnail">Footer Signature Image:</label>--}}
{{--                                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">--}}
{{--                                    </div>--}}
{{--                                    <button type="submit" class="btn btn-info" style="width: 100%"><i class="fas fa-upload mr-2"></i> Upload Footer Sign image </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}

{{--                        @endif--}}


{{--                        @if(!$signs->isEmpty())--}}
{{--                            <div class="col-bottom my-5 text-center">--}}

{{--                                @foreach($signs as $s)--}}

{{--                                    <img class="w-100 h-50" src="{{ URL::asset('storage/' . $s->thumbnail) }}" alt="">--}}

{{--                                    <div class="my-5">--}}
{{--                                        <form action="{{ route('upload-sign-image.update',$s->id) }}" method="post" enctype="multipart/form-data">--}}
{{--                                            @csrf--}}
{{--                                            @method('PUT')--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="thumbnail">Update Report Image:</label>--}}
{{--                                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">--}}
{{--                                            </div>--}}
{{--                                            <button type="submit" class="btn btn-info my-3" style="width: 100%"><i class="fas fa-upload mr-2"></i> Update Report Image </button>--}}
{{--                                        </form>--}}

{{--                                        <form action="{{ route('upload-sign-image.destroy',$s->id) }}"--}}
{{--                                              method="POST">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}

{{--                                            <button--}}
{{--                                                onclick="return confirm('Are you sure you want to delete this?')"--}}
{{--                                                href="{{route('report-descriptions.destroy',$s->id)}}"--}}
{{--                                                type="submit" class="btn btn-danger w-100"><i--}}
{{--                                                    class="fa fa-trash mr-1 px-1" aria-hidden="true"></i>Delete Report Image--}}
{{--                                            </button>--}}

{{--                                        </form>--}}

{{--                                    </div>--}}

{{--                                @endforeach--}}

{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--            <!-- /.container-fluid -->--}}

{{--        </div>--}}
{{--        <!-- End of Main Content -->--}}

{{--        <!-- Footer -->--}}
{{--    @include('admin.layouts.partials.footer')--}}
{{--    <!-- End of Footer -->--}}

{{--    </div>--}}
{{--    <!-- End of Content Wrapper -->--}}

{{--    @push('scripts')--}}

{{--        <script>--}}
{{--            $(document).ready(function () {--}}

{{--                var count = 1;--}}

{{--                dynamic_field(count);--}}

{{--                function dynamic_field(number) {--}}
{{--                    html = '<tr>';--}}
{{--                    html += '<td><input type="text" name="footer_list_name[]" class="form-control" /></td>';--}}
{{--                    if (number > 1) {--}}
{{--                        html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove w-100">Remove Detail</button></td></tr>';--}}
{{--                        $('tbody').append(html);--}}
{{--                    } else {--}}
{{--                        html += '<td><button type="button" name="add" id="add" class="btn btn-success w-100">Add New Detail</button></td></tr>';--}}
{{--                        $('tbody').html(html);--}}
{{--                    }--}}
{{--                }--}}

{{--                $(document).on('click', '#add', function () {--}}
{{--                    count++;--}}
{{--                    dynamic_field(count);--}}
{{--                });--}}

{{--                $(document).on('click', '.remove', function () {--}}
{{--                    count--;--}}
{{--                    $(this).closest("tr").remove();--}}
{{--                });--}}

{{--                $('#dynamic_form').on('submit', function (event) {--}}
{{--                    event.preventDefault();--}}
{{--                    $.ajax({--}}
{{--                        url: '{{ route("report-footer-details.store") }}',--}}
{{--                        method: 'post',--}}
{{--                        data: $(this).serialize(),--}}
{{--                        dataType: 'json',--}}
{{--                        beforeSend: function () {--}}
{{--                            $('#save').attr('disabled', 'disabled');--}}
{{--                        },--}}
{{--                        success: function (data) {--}}
{{--                            if (data.error) {--}}
{{--                                var error_html = '';--}}
{{--                                for (var count = 0; count < data.error.length; count++) {--}}
{{--                                    error_html += '<p>' + data.error[count] + '</p>';--}}
{{--                                }--}}
{{--                                $('#result').html('<div class="alert alert-danger">' + error_html + '</div>');--}}
{{--                            } else {--}}
{{--                                dynamic_field(1);--}}
{{--                                $('#result').html('<div class="alert alert-success">' + data.success + '</div>');--}}
{{--                            }--}}
{{--                            $('#save').attr('disabled', false);--}}
{{--                        }--}}
{{--                    })--}}
{{--                });--}}

{{--            });--}}
{{--        </script>--}}


{{--    @endpush--}}

{{--@endsection--}}
