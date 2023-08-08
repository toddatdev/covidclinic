<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        table,
        th {
            border: 1px solid #fea830;
        }

        .table, table2, .table3, .table4 {
            width: 90%;
            margin: auto;
        }

        th {
            background-color: #fea830;
            color: #fff;
        }

        span {
            margin-left: 50px !important;
        }

        td {
            padding: 5px 10px;
            font-size: 10px;
            font-weight: 700;
            border-bottom: 1px solid #fea830;
        }

    </style>

    <style>
        * {
            box-sizing: border-box;
        }

        .boxone {
            float: left;
            width: 30%;
            padding: 10px;
        }

        .boxtwo {
            float: left;
            width: 60%;
            padding: 10px;
        }

        .maindivone {
            float: left;
            width: 30%;
        }

        .maindivtwo {
            float: right;
            width: 60%;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>

</head>

<body>
<div class="" style="width: 100%">
    <div style="background-color: #fea830;padding: 5px;margin-bottom: 15px">
        <img style="width: 25%" src="./media/logo.png" alt="">
    </div>
</div>
<div class="table">
    <table style="width:100%">
        <tr>
            <th style="width: 290px; padding: 8px">Patient</th>
            <th style="width: 320px; padding: 8px">Facility</th>

        </tr>
        <tr>
            <td style="font-weight: bold;font-size:10px">Patient <span style=" font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp; {{$patientInformations['first_name']}} {{$patientInformations['last_name']}}</span>
            </td>
            <td style="font-weight: bold;font-size:10px">Facility <span
                    style="padding-left: 5px; font-weight: normal;">&nbsp;&nbsp;&nbsp; {{$facilityTestCollection['facility']}}</span>
            </td>

        </tr>


        <tr>
            <td style="font-weight: bold;font-size:10px">DOB <span
                    style=" font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$patientInformations['patient_dob']}}</span>
            </td>


            <td style="font-weight: bold;font-size:10px">Director
                <span
                    style="padding-left: 10px; font-weight: normal;">{{$facilityTestCollection['facility_director']}}</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold;font-size:10px">Sex <span
                    style=" font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$patientInformations['gender']}}</span>
            </td>


            <td style="font-weight: bold;font-size:10px">Address
                <span
                    style="padding-left: 10px; font-weight: normal;">{{$facilityTestCollection['facility_address']}}</span>
            </td>


        </tr>

        <tr>
            <td style="font-weight: bold;font-size:10px">Address <span style=" font-weight: normal;">&nbsp;&nbsp;&nbsp; United States</span>
            </td>


            <td style="font-weight: bold;font-size:10px">Phone
                <span
                    style="padding-left: 20px; font-weight: normal;">&nbsp;{{$facilityTestCollection['facility_phone']}}</span>
            </td>


        </tr>

        <tr>
            <td style="font-weight: bold;font-size:10px">Phone <span
                    style=" font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$patientInformations['phone_no']}}</span>
            </td>


            <td style="font-weight: bold;font-size:10px">CLIA
                <span
                    style="padding-left: 20px; font-weight: normal;">&nbsp;&nbsp;{{$facilityTestCollection['facility_clia']}}</span>
            </td>


        </tr>

        <tr>
            <td style="font-weight: bold;font-size:10px">Email <span
                    style=" font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$patientInformations['email']}}</span>
            </td>

            <td style="font-weight: bold;font-size:10px">Ordering Provider
                <span
                    style="padding-left: 1px; font-weight: normal;">{{$facilityTestCollection['facility_ordering_provider']}}</span>
            </td>
        </tr>

        {{--        <tr>--}}
        {{--            <td style="font-weight: bold;font-size:10px; border-bottom: 0"><span style=" font-weight: normal;"></span>--}}
        {{--            </td>--}}

        {{--            <td style="font-weight: bold;font-size:10px;border-bottom: 0">Ordering Provider Address--}}
        {{--            </td>--}}
        {{--        </tr>--}}


        <tr>
            <td style="font-weight: bold;font-size:5px; border-bottom: 0"><span style=" font-weight: normal;"></span>
            </td>

            <td style="font-weight: bold;font-size:9px;border-bottom: 0">Provider Address
                <span style="padding-left: 1px; font-weight: normal;font-size: 7px">&nbsp;&nbsp;18800 DELAWARE STREET STE 800 HUNTINGTON BEACH, CA 92648</span>
            </td>
        </tr>

    </table>
</div>


<div class="table" style="margin-top: 10px">
    <table style="width:100%">
        <tr style="text-align: center;">
            <td style="background-color: #fea830;padding: 7px ; color: #fff;font-size: 10px;font-weight: bold">Test
                Details
            </td>
        </tr>

        <tr>
            <td style="font-weight: bold; font-size: 9px">Specimen ID
                <span
                    style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;  {{$facilityTestCollection['specimen_id']}}</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold; font-size: 9px">Test Name

                <span
                    style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   @if(isset($medicalTestName)) {{$medicalTestName['test_name']}}@endif </span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold; font-size: 9px">Test Device
                <span
                    style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$facilityTestCollection['test_device']}}</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold; font-size: 9px">Collection Date
                <span
                    style="padding-left: 100px; font-weight: normal;">  {{ date('d/M/Y', strtotime($facilityTestCollection['test_date']))}}</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold; font-size: 9px;border-bottom: 0">Time
                <span
                    style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{ date('h:i A', strtotime($facilityTestCollection['test_time']))}}</span>
            </td>

        </tr>

    </table>
</div>

<div class="table" style="margin-top: 10px">
    <table style="width:100%">
        <tr style="text-align: center;">
            <td style="background-color: #fea830;padding: 8px ; color: #fff;font-size: 10px;font-weight: bold">Test
                Results
            </td>
        </tr>

        @php

            $allMedicalResult = json_decode($allMedicalResultData->test_possibility_id, true);

        @endphp

        @if(isset($allMedicalResult))

            @if($medicalTestName['test_name'] == 'Flu + SARS')

                <tr>
                    <td style="font-weight: bold; font-size: 9px;border-bottom: 0">SARS-C0V-2
                        <span style="padding-left: 100px; font-weight: normal;">

                              @foreach($allMedicalResult as $amr)


                                       @if(isset($amr['test'])) <b>{{$amr['test']}}:</b> @endif
                                    @if(isset($amr['result'])) {{$amr['result']}} @endif
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @endforeach
                    </span>
                    </td>
                </tr>

            @elseif($medicalTestName['test_name'] == 'Antibody Test')

                <tr>
                    <td style="font-weight: bold; font-size: 9px;border-bottom: 0">Antibody Test
                        <span style="padding-left: 100px; font-weight: normal;">

                              @foreach($allMedicalResult as $amr)


                                @if(isset($amr['test'])) <b>{{$amr['test']}}:</b> @endif
                                @if(isset($amr['result'])) {{$amr['result']}} @endif
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @endforeach

                         </span>
                    </td>
                </tr>

            @else

                <tr>
                    <td style="font-weight: bold; font-size: 9px;border-bottom: 0"> Test Result
                        <span
                            style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              @foreach($allMedicalResult as $amr)


                                @if(isset($amr['test'])) <b>{{$amr['test']}}:</b> @endif
                                @if(isset($amr['result'])) {{$amr['result']}} @endif
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @endforeach
                        </span>
                        </span>
                    </td>
                </tr>

            @endif
        @endif

    </table>
</div>


<div class="table" style="margin-top: 10px">
    <table style="width:100%">
        <tr style="text-align: center;">
            <td style="background-color: #fea830;padding: 6px ; color: #fff;font-size: 10px;font-weight: bold">
                Information
            </td>
        </tr>

        <tr>

            @foreach(\App\TestName::where('test_name', $medicalTestName->test_name)->get() as  $tesInformation)
                <td style="border-bottom: 0;font-weight: normal">

                    <p style="font-size: 15px;">{!! $tesInformation->information !!}</p>

{{--                    <p style="font-size: 10px; font-weight: normal">{{$tesInformation->information}}</p>--}}
                </td>
            @endforeach
        </tr>

    </table>
</div>

<div class="table" style="margin-top: 5px">
    <p style="font-size: 14px">
        The information contained in this document may contain privileged and confidential information, including
        patient
        information protected by federal and state privacy laws. It is intended only for the use of the person(s) named
        above. If you are not the
        intended recipient, you are hereby notified that any review, dissemination, distribution, or duplication of this
        communication is strictly prohibited.
    </p>
</div>

<div class="clearfix" style="margin-top: 10px;">
    <div class="boxone" style=" padding-left: 30px;height: 100px">
        <img class="img-fluid" style="width:58%" src="./media/scan.png" alt="">
    </div>
    <div class="boxtwo" style="height: 100px">
        @foreach($reportsDetailsFooter as $rdf)
            <div style="text-align: center">
                <div class="clearfix"
                     style="border: 1px solid rgba(0,0,0,0.24); text-align: right;padding: 12px 10px 12px 10px !important;">
                    <div class="maindivone">
                        <p style="text-align: center">Reviewed by:</p>
                            <p style="font-weight: bold;text-align: center">{{$rdf->name}}</p>
                        <p>
                            @if(isset($signsImage['thumbnail']))
                                <img class="covid_sign" style="width: 85%;padding: 10px 10px"
                                     src="{{ 'storage/' . $signsImage['thumbnail'] }}" alt="">
                            @endif
                        </p>
                    </div>
                    <div class="maindivtwo">
                        <p style="font-size: 11px; margin: 3px 0">LIC: {{$rdf->lic}}</p>
                        <p style="font-size: 11px; margin: 3px 0">NPI: {{$rdf->npi}}</p>
                        <p style="font-size: 11px; margin: 3px 0"> {{$rdf->address}}, {{$rdf->state}}</p>
                        <p style="font-size: 11px; margin: 3px 0"> {{$rdf->city}}, {{$rdf->zip}}</p>
                        <p style="font-size: 11px; margin: 3px 0"> {{$rdf->email}}</p>
                        <p style="font-size: 11px; margin: 3px 0"> {{$rdf->phone}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>

</html>
