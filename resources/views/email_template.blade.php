<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        table,
        th {
            border: 1px solid rgba(0, 0, 0, 0.282);
        }

        .table {
            width: 90%;
            margin: auto;
        }

        th {
            background-color: #fea830;
            color: #fff;
        }

        td {
            padding: 4px 10px;
            font-size: 14px;
            font-weight: 700;
            border-bottom: 1px solid rgba(0, 0, 0, 0.193);
        }

        * {
            box-sizing: border-box;
        }

        .box {
            float: left;
            width: 50%;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>


<body>

<div style="margin: 30px 0; text-align: center; background-color: #fea830 ;">
    <h2 style="padding: 10px; color: #fff;">Covid Clinic Report</h2>
</div>

<div class="table">
    <table style="width:100%">
        <tr>
            <th style="width: 600px;">Patient</th>
            <th style="width: 600px;">Facility</th>

        </tr>
        <tr>
            <td>Patient <span style="padding-left: 40px; font-weight: 500;">{{$data['first_name']}}</span></td>
            <td>Facility <span style="padding-left: 60px; font-weight: 500;">{{$data['facility']}}</span></td>

        </tr>

        <tr>
            <td>DOB <span style="padding-left: 50px; font-weight: 500;">{{$data['patient_dob']}}</span></td>
            <td>Facility Director <span style="padding-left: 25px; font-weight: 500;">Mathew Abinante, DO,MPH</span></td>

        </tr>

        <tr>
            <td>Sex <span style="padding-left: 60px; font-weight: 500;">{{$data['gender']}}</span></td>
            <td>Facility Address <span style="padding-left: 30px; font-weight: 500;">Flordia , United State</span></td>

        </tr>


        <tr>
            <td>Address <span style="padding-left: 30px; font-weight: 500;">US</span></td>
            <td>Facility Phone <span style="padding-left: 40px; font-weight: 500;">+92 3423 4324324</span></td>

        </tr>


        <tr>
            <td>Phone <span style="padding-left: 40px; font-weight: 500;">{{$data['phone_no']}}</span></td>
            <td>Facility CLIA <span style="padding-left: 40px; font-weight: 500;">05D223423423</span></td>

        </tr>


        <tr>
            <td>Email <span style="padding-left: 40px; font-weight: 500;">{{$data['email']}}</span></td>
            <td>Ordering Provider <span style="padding-left: 20px; font-weight: 500;">Covid Clinic
                </span></td>

        </tr>

        <tr>
            <td> <span style="padding-left: 60px; font-weight: 500;"></span></td>
            <td>Ordering Provider Address <span style="padding-left: 25px; font-weight: 500;">1023123 DELAWAR STREET SET 345 HUNGTINGTON BEACH CA 32434</span></td>

        </tr>


    </table>
</div>

<div class="table">
    <table style="width:100%">
        <div style="background-color: #fea830; text-align: center;">
            <h4 style="color: #fff;">Test Details</h4>
        </div>
        <tr>
            <td style="width: 200px;">Specimen ID </td>
            <td style=""><span style="font-weight: 500;">{{$data['specimen_id']}} </span></td>
        </tr>

        <tr>
            <td style="width: 200px;">Test Name</td>
            <td style=""><span style="font-weight: 500;">{{$data['test_name']}} </span></td>
        </tr>

        <tr>
            <td style="width: 200px;">Test Device</td>
            <td style=""><span style="font-weight: 500;">{{$data['test_device']}}</span></td>
        </tr>

        <tr>
            <td style="width: 200px;">Collection Date</td>
            <td style=""><span style="font-weight: 500;">{{$data['test_datetime']}}</span></td>
        </tr>

        <tr>
            <td style="width: 200px;">Test Date</td>
            <td style=""><span style="font-weight: 500;">{{$data['test_datetime']}}</span></td>
        </tr>
    </table>

</div>


<div class="table">
    <table style="width:100%">
        <div style="background-color: #fea830; text-align: center;">
            <h4 style="color: #fff;">Test Results</h4>
        </div>
        <tr>
            <td style="width: 200px;">SARS-C0V-2 </td>
            <td style=""><span style="font-weight: 500;">{{$data['result_report']}} </span></td>
        </tr>

    </table>

</div>



<div class="table">
    <table style="width:100%">
        <div style="background-color: #fea830; text-align: center;">
            <h4 style="color: #fff;">Information</h4>
        </div>
        <div class="" style="margin-top: 20px;">
            <p style="font-weight: 500; font-size: 15px;; color: rgba(0, 0, 0, 0.782);">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset . Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also
                the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
            </p>
        </div>

    </table>

</div>



</body>

</html>
