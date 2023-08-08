<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Covid Clinic | @yield('title')</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="print">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->

    @stack('stylesheets')


</head>
<body>

<div id="printThis" class="page mb-2">
    {{-- Header--}}
    <div class="bg-secondary py-3">
        <div class="col px-3 d-flex justify-content-between">
            <div>
                <a href="{{route('root')}}">
                    <img class="w-75 header-logo" src="{{ asset('media/logo.png') }}" alt="">
                </a>
            </div>
            <div class="align-self-center">
                <h2 class="text-uppercase header-title  font-weight-normal text-white">Medical record</h2>
            </div>
        </div>
    </div>


    {{--Patient and facility --}}


    <div class="patient_facility border-web border-secondary container mt-4">
        <div class="row">
            <div class="col-5 border-right border-secondary text-center px-0">
                <h5 class="bg-secondary text-white py-3 h5">Patient</h5>
                <div class="col-patient text-left px-3">

                    <div class=" pf-border d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold">Patient</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">{{$patientInformations['first_name']}} {{$patientInformations['last_name']}} </p>
                        </div>
                    </div>

                    <div class=" pf-border d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold">DOB</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">{{$patientInformations['patient_dob']}}</p>
                        </div>
                    </div>

                    <div class=" pf-border d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold">Sex</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">{{$patientInformations['gender']}}</p>
                        </div>
                    </div>

                    <div class=" pf-border d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold">Address</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">United States </p>
                        </div>
                    </div>

                    <div class=" pf-border d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold">Phone</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">{{$patientInformations['phone_no']}}</p>
                        </div>
                    </div>

                    <div class=" pf-border-none d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold">Email</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">{{$patientInformations['email']}}</p>
                        </div>
                    </div>


                </div>

            </div>
            <div class="col-7 border-left border-secondary text-center px-0">
                <h5 class="bg-secondary text-white py-3 h5">Facility</h5>


                <div class="col-facility text-left px-3">

                    <div class=" pf-border d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold">Facility</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">{{$facilityTestCollection['facility']}}</p>
                        </div>
                    </div>

                    <div class=" pf-border d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold"> Director</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">{{$facilityTestCollection['facility_director']}}</p>
                        </div>
                    </div>

                    <div class=" pf-border d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold"> Address</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">{{$facilityTestCollection['facility_address']}}</p>
                        </div>
                    </div>

                    <div class=" pf-border d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold"> Phone</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">{{$facilityTestCollection['facility_phone']}} </p>
                        </div>
                    </div>

                    <div class=" pf-border d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold"> CLIA</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">{{$facilityTestCollection['facility_clia']}}</p>
                        </div>
                    </div>

                    <div class=" pf-border d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold">Ordering Provider</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0">{{$facilityTestCollection['facility_ordering_provider']}}</p>
                        </div>
                    </div>

                    <div class=" pf-border-none d-flex justify-content-between ">
                        <div>
                            <h6 class="font-weight-bold"> Provider Address</h6>
                        </div>
                        <div class="w-75">
                            <p class="mb-0 text-uppercase" style="font-size: 15px">18800 DELAWARE STREET STE 800
                                HUNTINGTON BEACH, CA 92648</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{--Test Details--}}

    <div class="test_details test-details-border-web border-secondary container mt-3">
        <div class="row">
            <div class="col-12 border-right border-secondary text-center px-0">
                <h5 class="bg-secondary text-white py-3 h5">Test Details</h5>
                <div class="col-patient text-left">

                    <div class=" test_detail_border d-flex justify-content-between ">
                        <div class="w-25 pl-3 py-2 border-secondary border-right bg-light">
                            <h6 class="font-weight-bold">Specimen ID</h6>
                        </div>
                        <div class="w-75 pl-3">
                            <p class="mb-0">{{$facilityTestCollection['specimen_id']}}</p>
                        </div>
                    </div>

                    <div class=" test_detail_border d-flex justify-content-between ">
                        <div class="w-25 pl-3 py-2 border-secondary  bg-light border-right">
                            <h6 class="font-weight-bold">Test Name</h6>
                        </div>
                        <div class="w-75 pl-3">
                            @if(isset($medicalTestName)) <p class="mb-0">{{$medicalTestName['test_name']}}@endif </p>
                        </div>
                    </div>

                    <div class=" test_detail_border d-flex justify-content-between ">
                        <div class="w-25 pl-3 py-2 border-secondary  bg-light border-right">
                            <h6 class="font-weight-bold">Test Device</h6>
                        </div>
                        <div class="w-75 pl-3">
                            <p class="mb-0">{{$facilityTestCollection['test_device']}}</p>
                        </div>
                    </div>

                    <div class=" test_detail_border d-flex justify-content-between ">
                        <div class="w-25 pl-3 py-2 border-secondary  bg-light border-right">
                            <h6 class="font-weight-bold">Collection Date</h6>
                        </div>
                        <div class="w-75 pl-3">
                            {{--                            <p class="mb-0">{{Cookie::get('test_date')}}</p>--}}
                            {{--                            <p class="mb-0">{{$facilityTestCollection['test_date']}}</p>--}}
                            <p class="mb-0">{{ date('d-M-Y', strtotime($facilityTestCollection['test_date'])) }}</p>
                        </div>
                    </div>
                    <div class=" test_detail_border d-flex justify-content-between ">
                        <div class="w-25 pl-3 py-2 border-secondary  bg-light border-right">
                            <h6 class="font-weight-bold">Time</h6>
                        </div>
                        <div class="w-75 pl-3">
                            {{--                            <p class="mb-0">{{Cookie::get('test_time')}}</p>--}}
                            <p class="mb-0">{{ date('h:i A', strtotime($facilityTestCollection['test_time'])) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Test Result--}}


    <div class="test_results test-details-border-web border-secondary container">
        <div class="row">
            <div class="col-12 border-right border-secondary text-center px-0">
                <h5 class="bg-secondary text-white py-3 h5">Test Results</h5>

                @php

                    $allMedicalResult = json_decode($allMedicalResultData->test_possibility_id, true);

                @endphp

                @if(isset($allMedicalResult))

                    @if($medicalTestName['test_name'] == 'Flu + SARS')

                        <div class="col-patient text-left">
                            <div class=" test_detail_border d-flex justify-content-between ">
                                <div class="w-25 pl-3 py-2 border-secondary border-right bg-light">
                                    <h6 class="font-weight-bold">SARS-C0V-2</h6>
                                </div>
                                <div class="w-75 pl-3">

                                    <p class="mb-0">
                                        @foreach($allMedicalResult as $amr)

                                            <span class="ml-4" style="font-size: 14px">
                                       @if(isset($amr['test'])) <b>{{$amr['test']}}:</b> @endif
                                                @if(isset($amr['result'])) {{$amr['result']}} @endif</span>

                                        @endforeach
                                    </p>

                                </div>
                            </div>
                        </div>

                    @elseif($medicalTestName['test_name'] == 'Antibody Test')

                        <div class="col-patient text-left">
                            <div class=" test_detail_border d-flex justify-content-between ">
                                <div class="w-25 pl-3 py-2 border-secondary border-right bg-light">
                                    <h6 class="font-weight-bold">Antibody Test</h6>
                                </div>
                                <div class="w-75 pl-3">
                                    <p class="mb-0">
                                        @foreach($allMedicalResult as $amr)

                                            <span class="ml-4" style="font-size: 14px">
                                       @if(isset($amr['test'])) <b>{{$amr['test']}}:</b> @endif
                                                @if(isset($amr['result'])) {{$amr['result']}} @endif</span>

                                        @endforeach

                                    </p>
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="col-patient text-left">
                            <div class=" test_detail_border d-flex justify-content-between ">
                                <div class="w-25 pl-3 py-2 border-secondary border-right bg-light">
                                    <h6 class="font-weight-bold">Test Result</h6>
                                </div>
                                <div class="w-75 pl-3">
                                    @foreach($allMedicalResult as $amr)

                                        <span class="ml-4" style="font-size: 14px">
                                       @if(isset($amr['test'])) <b>{{$amr['test']}}:</b> @endif
                                            @if(isset($amr['result'])) {{$amr['result']}} @endif</span>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endif


            </div>
        </div>
    </div>


    {{--Information--}}

    <div class="test_information test-details-border-web border-secondary container">
        <div class="row">
            <div class="col-12 border-right border-secondary text-center px-0">
                <h5 class="bg-secondary text-white py-3 h5">Information</h5>
                <div class="col-patient text-left py-2 px-3">

                    @foreach(\App\TestName::where('test_name', $medicalTestName->test_name)->get() as  $tesInformation)
                        <p class="p-des" style="margin-bottom: 0.50rem !important;">
{{--                            {{$tesInformation->information}}--}}
                            {!! $tesInformation->information !!}
                        </p>
                    @endforeach

                </div>


            </div>

        </div>
    </div>


    {{--Extra details--}}
    <div class="container text-left px-0">
        <p class="p-des mt-2 p-last">The information contained in this document may contain privileged and confidential
            information, including patient information protected by federal and state privacy laws. It is intended only
            for the use of the person(s) named above. If you are not the intended recipient, you are hereby notified
            that any review, dissemination, distribution, or duplication of this communication is strictly
            prohibited.</p>

    </div>

{{--    <a href="" class=" btn-print-result " onclick="print()">Print Report</a>--}}

    <div class="container">
        <div class="col-px-0 row">
            <div class="col-5 text-left">
               <div>
                   <img class="" style="width: 38%" src="./media/scan.png" alt="">
               </div>
            </div>
            <div class="col-1">

            </div>
            <div class="col-6">
                @if(!$reportsDetailsFooter->isEmpty())
                    @foreach($reportsDetailsFooter as $rdf)
                        <div class="border d-flex">

                            <div class="align-self-end p-3" style="width: 37%">
                                <p class="font-weight-normal mb-0 text-center">Reviewed by:</p>
                                <h5 class="font-weight-bold text-center mb-3">{{$rdf->name}}</h5>
                                @if(isset($signsImage['thumbnail']))
                                    <img class="w-100 covid_sign"
                                         src="{{ URL::asset('storage/' . $signsImage['thumbnail']) }}" alt="">
                                @endif
                            </div>
                            <div class="text-right p-2" style="width: 63%">

                                <p class="mb-0  ">LIC: {{$rdf->lic}} </p>
                                <p class="mb-0  ">NPI: {{$rdf->npi}}</p>
                                <p class="mb-0 p-bold "> {{$rdf->address}}, {{$rdf->state}}</p>
                                <p class="mb-0 p-bold "> {{$rdf->city}}, {{$rdf->zip}}</p>
                                <p class="mb-0 p-bold "> {{$rdf->email}}</p>
                                <p class="mb-0 p-bold "> {{$rdf->phone}}</p>

                            </div>

                        </div>
                    @endforeach
                @else
                    <h5 class="font-weight-bold text-right">Reviewed by: </h5>
                    <div class="border d-flex">
                        <div class="align-self-end p-3" style="width: 33%">
                            @if(isset($signsImage['thumbnail']))
                                <img class="w-100 covid_sign"
                                     src="{{ asset('storage/' . $signsImage['thumbnail']) }}" alt="">
                            @endif

                        </div>
                        <div class="text-right p-2" style="width: 67%">
                            <p class="mb-0 p-bold font-weight-bold"></p>
                            <p class="mb-0  "></p>
                            <p class="mb-0 p-bold "></p>
                            <p class="mb-0 p-bold "></p>
                            <p class="mb-0 p-bold "></p>
                            <p class="mb-0 p-bold "></p>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>


<script src="{{asset('js/app.js')}}"></script>

@stack('scripts')


</body>
</html>
