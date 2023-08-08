@extends('layouts.web')

@section('title', 'PDF Generator')


@push('stylesheets')

    <style>
        .dropdown-toggle::after {
            float: right;
        }
    </style>

    <style>
        span.email-ids {
            float: left;
            /* padding: 4px; */
            border: 1px solid #ccc;
            margin-right: 5px;
            padding-left: 10px;
            padding-right: 0px;
            margin-bottom: 5px;
            font-size: 12px;
            background: #f5f5f5;
            padding-top: 0px;
            padding-bottom: 0px;
            border-radius: 45px;
            font-weight: 500;
        }

        span.cancel-email {
            border: 1px solid #ccc;
            width: 18px;
            display: block;
            float: right;
            text-align: center;
            margin-left: 20px;
            border-radius: 49%;
            height: 18px;
            line-height: 15px;
            cursor: pointer;
        }

        .col-sm-12.email-id-row {
            border: 1px solid #ccc;
        }

        .col-sm-12.email-id-row input {
            border: 0px;
            outline: 0px;
        }

        span.to-input {
            display: block;
            float: left;
            padding-right: 11px;
        }

        .col-sm-12.email-id-row {
            padding-top: 6px;
            padding-bottom: 7px;
            margin-top: 23px;
        }

        .modal {
            text-align: center;
        }

        .modal:before {
            display: inline-block;
            vertical-align: middle;
            content: " ";
            height: 100%;
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }

        .modal-content {
            width: 500px !important;
        }


    </style>
@endpush

@section('content')

    <div class="container my-5">

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p class="mt-1 font-weight-bold mb-0">{!! \Session::get('success') !!}</p>
            </div>
        @endif

        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <p class=" font-weight-bold mb-0">{!! \Session::get('error') !!}</p>
            </div>
        @endif

        <div class="row">
            <div class="col-12 col-lg-6 my-2">
                <div class="col px-0">
                    <h4 class="font-weight-bold text-primary "> Test Result </h4>
                    @if(isset($testName))
                        <p style="font-size: 13px" class="mb-0 font-weight-bold">You selected: <b

                                class="text-secondary mx-1">
                                {{$testName['test_name']}}</b></p>
                    @endif


                    <div id="demo">

                    </div>

                    <div class="form-width w-75">
                        <form class="" method="post" id="resultForm"
                              action="{{route('medical-result.store')}}">
                            @csrf

                            <input type="hidden" name="test_name_id" value="{{$facilityTestCollection['test_name']}}">
                            <input type="hidden" name="patient_id" value="{{$patient['id']}}">
                            <input type="hidden" name="submission_type" value="print">

                            <input type="hidden" name="facility_test_collection_id"
                                   value="{{$facilityTestCollection['id']}}">
                            <input type="hidden" name="specimen_id" value="{{$facilityTestCollection['specimen_id']}}">
                            <input type="hidden" name="status">
                            <input type="hidden" name="description">

                            @if(!$resultPossibilities->isEmpty())

                                @php
                                    $countResult = count($resultPossibilities);
                                @endphp

                                @foreach($resultPossibilities as $rp)

                                    <div class="my-2 p-1">
                                        <div class="form-group my-2">
                                            <select class="form-control test"
                                                    id="{{$rp->id}}"
                                                    autofocus
                                                    name="possibility_test[{{$rp->name}}][test]">
                                                <option value="">Select Test</option>
                                                <option value="{{$rp->name}}">{{$rp->name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group my-2 d-none">
                                            <select class="form-control" id="possibility_test_result"
                                                    autofocus name="possibility_test[{{$rp->name}}][result]">
                                                <option value="">Select Result</option>
                                                <option>Positive</option>
                                                <option>Negative</option>
                                                <option>inconclusive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr style="margin: 10px 0">
                                @endforeach
                            @else

                                <div class="form-group my-4">
                                    <select class="form-control  " id="possibility_test"
                                            autofocus name="possibility_test[test][result]">
                                        <option value="">Select Result</option>
                                        <option value="Positive">Positive</option>
                                        <option value="Negative">Negative</option>
                                        <option value="inconclusive">inconclusive</option>
                                    </select>
                                </div>

                            @endif

                            <button type="submit" class="btn web-btn mt-3 mb-3 btn-print w-100">Print Result</button>

                            <hr class="">


                            <div class="form-group email-id-row">


                                <select name="multipleEmails[]" readonly multiple="multiple" id="multipleEmails"
                                        class="form-control">
                                    <option selected value="results@covidclinic.org">results@covidclinic.org</option>
                                </select>
                                <div class="all-mail mt-5">

                                </div>

                                <input type="email" name="multiple" id="email" multiple="multiple"
                                       class="enter-mail-id form-control"
                                       placeholder="Write Your Email and Press Enter..."/>
                            </div>

                            {{--                            <input type="text" name="patient_email" class="form-control" value="{{$patient['email']}}">--}}

                            <button type="submit" class="btn web-btn mt-3 btn-email w-100" id="btnEmailForm">Email
                                Result
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 text-right my-2">
                <img class="w-100" src="{{asset('media/sidebar_main_img.jpg')}}" alt="">
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
        <div class="modal-dialog a" role="document">
            <div class="modal-content">

                <div class="modal-body text-center align-self-center ">
                    <i class="fa fa-3x bg-secondary text-white rounded-circle p-4 fa-exclamation-triangle"></i>
                    <h4 class="mt-3 text-primary font-weight-bold">Please Enter Valid Email</h4>
                </div>

            </div>
        </div>
    </div>
    <button type="" class="btn btn-primary d-none" id="triggerButton" data-toggle="modal"
            data-target="#exampleModalLong">
        btn
    </button>

    @push('scripts')


        <script>

            $('#btnEmailForm').click(function (e) {
                // e.preventDefault();
                $("#resultForm").find('input[name=submission_type]').val('email');
                // $("#resultForm").submit();
                // alert("ok")
                // e.preventDefault()
                // var email = $('#email').val();
                //
                // $(".error").remove();
                //
                // if (email.length < 1) {
                //
                //     $('#email').after('<span class="error">Email Field is required</span>');
                //
                // }
            });

        </script>

        <script>
            $("#resultForm").bind("keypress", function (e) {
                if (e.keyCode == 13) {
                    return false;
                }
            });
        </script>

        <script type="text/javascript">

            $("#resultForm").submit(function () {

                // $("form").attr('target', '_blank');
                //
                // return true;

            });
        </script>

        <script>
            $(function () {

                $(".test").parent().siblings().addClass('d-none');

                $('.test').change(function () {

                    let selected = $(this).find(':selected');

                    if (selected.val() === "") {

                        $(this).parent().siblings().addClass('d-none');

                    } else {

                        $(this).parent().siblings().removeClass('d-none');

                    }
                })
            });
        </script>

        <script>
            $('#multipleEmails').hide();

            $(".enter-mail-id").keydown(function (e) {
                if (e.keyCode == 13 || e.keyCode == 32 || e.keyCode == 188) {

                    if (e.keyCode == 188) e.preventDefault();

                    var email = $('#email').val();

                    var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

                    if (!pattern.test(email)) {
                        $("#triggerButton").trigger("click");
                    } else {
                        $('#multipleEmails').show();
                        var getValue = $(this).val();

                        console.log(getValue)

                        $('.all-mail').append(`<span class="email-ids">${getValue} <span class="cancel-email" data-email="${getValue}">x</span></input>`);

                        $('#multipleEmails').append('<option selected value="' + getValue + '"> ' + getValue + ' </option>');

                        $(this).val('');

                        $('.enter-mail-id').val('');

                    }
                }
            });


            $(document).on('click', '.cancel-email', function () {
                let el = $(this);

                $('#multipleEmails').children('option').each(function () {
                    if ($(this).val() === el.data('email')) {
                        $(this).remove();
                    }
                });

                el.parent().remove();
            });

            $('#formEmail').on('keyup keypress', function (e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });


            // Trigger button on click


        </script>

    @endpush
@endsection
