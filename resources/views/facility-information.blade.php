@extends('layouts.web')

@section('title', 'PDF Generator')

@push('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/css/bootstrap-select.css"/>
    <style>
        .filter-option{
            padding: 0.75rem 1rem !important;
            height: auto !important;
            background-color: #fcfcfc !important;
            font-weight: 500 !important;
            font-size: 16px !important;
            color: #00000050 !important;
            border: 1px solid #ced4da !important;
            border-radius: 5px !important;
        }
    </style>
@endpush

@section('content')


{{--    @if(is_null($facilityTestInformation))--}}
        <div class="container my-5">
            <form class="" method="post" action="{{route('facility-information.store')}}">
                @csrf
                <div class="row">

                    <div class="col-12 col-lg-6">
                        <div class="col px-0">
                            <h4 class="font-weight-bold text-primary mb-5"> Facility Information </h4>
                            <div class=" form-width w-75">

                                <div class="form-group my-4">
                                    <select class="form-control select-option" autofocus name="facility" id="facility">
                                        <option value="Covid Clinic"> Covid Clinic</option>
                                        {{--                                @foreach($facilityInformations as $fi)--}}
                                        {{--                                        <option value="{{$fi->facility_info_name}}">{{$fi->facility_info_name}}</option>--}}
                                        {{--                                    @endforeach--}}
                                    </select>
                                </div>

                                <div class="form-group my-4">
{{--                                    <select class="form-control select-option" name="facilityReportInfo"--}}
{{--                                            id="facilityReportInfo">--}}
                                        <select class="selectpicker form-control select-option" id="facilityReportInfo" name="facilityReportInfo" data-show-subtext="true"
                                                data-live-search="true">
                                        <option value="" disabled="true" selected="true"> Select Facility Address
                                        </option>
                                        @foreach($facilityReportInfo as $fri)
                                            <option value="{{$fri->id}}">{{$fri->facility_address}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="hidden" value="" name="facility_director" id="facility_director">
                                <input type="hidden" value="" name="facility_address" id="facility_address">
                                <input type="hidden" value="" name="facility_phone" id="facility_phone">
                                <input type="hidden" value="" name="facility_clia" id="facility_clia">
                                <input type="hidden" value="" name="facility_ordering_provider"
                                       id="facility_ordering_provider">

                                <h4 class="font-weight-bold text-primary mb-5"> Test Details </h4>

                                <div class="form-group my-4">
                                    <input type="text" class="form-control form-control-lg" name="specimen_id"
                                           id="specimen_id" type="text" placeholder="Specimen ID">
                                </div>

                                <div class="form-group my-4">
                                    <select class="form-control select-option" id="test_name" name="test_name">
                                        <option value="" selected disabled="disabled" >Select Test</option>
                                    @foreach($testNames as $tn)
                                            <option value="{{$tn->id}}">{{$tn->test_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group my-4">
                                    <select class="form-control select-option" id="" name="test_device">
                                        @foreach($testDevices as $td)
                                            <option value="{{$td->test_device}}">{{$td->test_device}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <h4 class="font-weight-bold text-primary mb-5">Collection Date/Time </h4>


                                <div class="form-group">
                                    <input type='date' class="form-control-lg  w-100" name="test_date"/>
                                </div>
                                <div class="form-group">
                                    <input type='time' class="form-control-lg  w-100" name="test_time"/>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-lg-6 text-right">
                        <img class="w-100" src="{{asset('media/sidebar_main_img.jpg')}}" alt="">
                        <button type="submit" class="btn web-btn mt-5 w-50">Next</button>
                    </div>

                </div>
            </form>
        </div>
        @push('scripts')
            <script>

                $(document).ready(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $('select#facilityReportInfo').on('change', function (e) {
                        var selected_id = $(this).children("option:selected").val();


                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: '/getAddress/' + selected_id,
                            success: function (getFacilityReportInfo) {
                                console.log(getFacilityReportInfo);
                                $("#facility_director").val(getFacilityReportInfo.facility_director);
                                $("#facility_address").val(getFacilityReportInfo.facility_address);
                                $("#facility_phone").val(getFacilityReportInfo.facility_phone);
                                $("#facility_clia").val(getFacilityReportInfo.facility_clia);
                                $("#facility_ordering_provider").val(getFacilityReportInfo.facility_ordering_provider);
                            }
                        })
                    });


                });

            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
        @endpush

@endsection




