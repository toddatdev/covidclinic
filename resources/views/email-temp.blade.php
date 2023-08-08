<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
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
            <th style="width: 300px; padding: 8px">Patient</th>
            <th style="width: 300px; padding: 8px">Facility</th>

        </tr>
        <tr>
            <td style="font-weight: bold;font-size:10px">Patient <span style=" font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data['first_name']}}</span>
            </td>
            <td style="font-weight: bold;font-size:10px">Facility <span
                    style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data['facility']}}</span>
            </td>

        </tr>


        <tr>
            <td style="font-weight: bold;font-size:10px">DOB <span
                    style=" font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data['patient_dob']}}</span>
            </td>
            <td style="font-weight: bold;font-size:10px">Facility Director
                <span style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp; Mathew Abinante, DO,MPH</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold;font-size:10px">Sex <span
                    style=" font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data['gender']}}</span>
            </td>
            <td style="font-weight: bold;font-size:10px">Facility Address
                <span style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp; Flordia , United State</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold;font-size:10px">Address <span style=" font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; USA</span>
            </td>
            <td style="font-weight: bold;font-size:10px">Facility Phone
                <span style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp; +92 3423 4324324

</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold;font-size:10px">Phone <span
                    style=" font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data['phone_no']}}</span></td>
            <td style="font-weight: bold;font-size:10px">Facility CLIA
                <span style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp; 05D223423423

                </span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold;font-size:10px">Email <span
                    style=" font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$data['email']}}</span></td>
            <td style="font-weight: bold;font-size:10px">Ordering Provider
                <span style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp; Covid Clinic</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold;font-size:10px; border-bottom: 0"><span style=" font-weight: normal;"></span>
            </td>
            <td style="font-weight: bold;font-size:10px; border-bottom: 0">Ordering Provider Address
                <span style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    1023123 DELAWAR STREET SET 345 HUNGTINGTON BEACH CA 32434</span></td>

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
                    style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$data['specimen_id']}}</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold; font-size: 9px">Test Name

                <span
                    style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$data['test_name']}}</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold; font-size: 9px">Test Device
                <span
                    style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$data['test_device']}}</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold; font-size: 9px">Collection Date
                <span
                    style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$data['test_datetime']}}</span>
            </td>

        </tr>

        <tr>
            <td style="font-weight: bold; font-size: 9px;border-bottom: 0">Test Date
                <span
                    style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$data['test_datetime']}}</span>
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

        <tr>
            <td style="font-weight: bold; font-size: 9px;border-bottom: 0">SARS-C0V-2
                <span
                    style="padding-left: 100px; font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$data['result_report']}}</span>
            </td>

        </tr>

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
            <td style="border-bottom: 0;font-size: 8px">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset .
            </td>
        </tr>

        <tr>
            <td style="border-bottom: 0;font-size: 8px">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset .
            </td>
        </tr>

        <tr>
            <td style="border-bottom: 0;font-size: 8px">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset .
            </td>
        </tr>

        <tr>
            <td style="border-bottom: 0;font-size: 8px">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset .
            </td>
        </tr>

    </table>
</div>

<div class="table" style="margin-top: 5px">
    <p style="font-size: 8px">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        standard
        dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
        specimen
        book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining
        essentially unchanged. It
        was popularised in the 1960s with the release of Letraset

    </p>
</div>

<div class="table" style="margin-top: 5px">
    <table style="width:100%;border: 0">

        <tr>
            <td style="border: 0"></td>
            <td style="border: 0;text-align: right"><img class=" mx-auto" style="width: 15%" src="./media/scan.jpg"
                                                         alt=""></td>
            <td style="text-align: right; border: 0">
                <div style="text-align: right">
                    <h3>Reviewed by:</h3>
                </div>
                <div style="text-align: right;margin: 10px 0">
                    <img class=" mx-auto" style="width: 15%;" src="./media/sign.png" alt="">
                </div>

                <div class="" style="padding: 3px 10px 3px 40px">
                    <p style="margin: 10px 0;color: red; font-weight: bold">Noelie Capulong PA</p>
                    <p style="margin: 10px 0;color: red; ">LIC: PA53600: 127345345</p>
                    <p style="margin: 10px 0;color: red; ">LIC: 18800 Delaeare stree 670</p>
                    <p style="margin: 10px 0;color: red; ">Hungton stree 670</p>
                    <p style="margin: 10px 0;color: red; ">325-435-34-543</p>
                </div>

            </td>
        </tr>

    </table>
</div>


</body>

</html>
