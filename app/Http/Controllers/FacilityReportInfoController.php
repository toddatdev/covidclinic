<?php

namespace App\Http\Controllers;

use App\FacilityReportInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacilityReportInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilityReportInfo = FacilityReportInfo::paginate(12);
        return view('admin.facility-report-info.index', compact('facilityReportInfo'));
    }

//    function action(Request $request)
//    {
//        if ($request->ajax()) {
//            $output = '';
//            $query = $request->get('query');
//            if ($query != '') {
//                $data = FacilityReportInfo::where('facility_director', 'like', '%' . $query . '%')
//                    ->orWhere('facility_address', 'like', '%' . $query . '%')
//                    ->orWhere('facility_phone', 'like', '%' . $query . '%')
//                    ->orWhere('facility_clia', 'like', '%' . $query . '%')
//                    ->orWhere('facility_ordering_provider', 'like', '%' . $query . '%')
//                    ->orderBy('id', 'desc')
//                    ->get();
//
//            } else {
//                $data = FacilityReportInfo::orderBy('id', 'desc')
//                    ->get();
//            }
//            $total_row = $data->count();
//            if ($total_row > 0) {
//                foreach ($data as $row) {
//                    $output .= <<<EOF
//        <tr>
//         <td> $row->id</td>
//         <td> $row->facility_director </td>
//         <td> $row->facility_address </td>
//         <td> $row->facility_phone </td>
//         <td> $row->facility_clia </td>
//         <td> $row->facility_ordering_provider </td>
//         <td></td>
//        </tr>
//
//EOF;
//                }
//            } else {
//                $output = '
//       <tr>
//        <td align="center" colspan="5">No Data Found</td>
//       </tr>
//       ';
//            }
//            $data = array(
//                'table_data' => $output,
//                'total_data' => $total_row
//            );
//
//            echo json_encode($data);
//        }
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            if ($request->file('file')) {

                $file = fopen($request->file('file'), 'r');
                $rows = [];
                while (($line = fgetcsv($file)) !== FALSE) {

                    $rows[] = [
                        'facility_director' => $line[0],
                        'facility_address' => $line[1],
                        'facility_phone' => $line[2],
                        'facility_clia' => $line[3],
                        'facility_ordering_provider' => $line[4],
                    ];
                }
                fclose($file);
                array_shift($rows);
                FacilityReportInfo::insert($rows);

                return redirect()->route('facility-location.index')->with('success', ' Facility Location Created successfully.');

            } else {
                $facilityLocation = FacilityReportInfo::create($request->all());

                if ($facilityLocation) {
                    return redirect()->route('facility-location.index')->with('success', ' Facility Location Created successfully.');

                }
            }

        } catch (\Exception $exception) {

            return redirect()->route('facility-location.index')
                ->with('error', ' There is some issue with your submission please try again...');

        }

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $facilityInfos = FacilityReportInfo::findOrFail($id);

//        FacilityReportInfo::where('id', '<>', $id)
//            ->update(['status' => 'disable']);

        $facilityInfo = $facilityInfos->update($request->all());
        if ($facilityInfo) {
            return redirect()->route('facility-location.index')->with('success', 'Facility location Updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FacilityReportInfo::find($id)->delete();

        return redirect()->route('facility-location.index')->with('deleted', ' Deleted Successfully');

    }


}
