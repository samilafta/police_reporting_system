<?php

namespace App\Http\Controllers;

use App\CaseDetail;
use App\CityMaster;
use App\ComplainantAddress;
use App\ComplainantInfo;
use App\CulpritInfo;
use App\IncidentDetails;
use App\InvestigationDetail;
use App\RegionMaster;
use App\User;
use App\WitnessInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;

class CaseDetailsController extends Controller
{

    function __construct()
    {

        $this->middleware('permission:case-list');
        $this->middleware('permission:case-create', ['only' => ['create','store']]);
        $this->middleware('permission:case-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:case-delete', ['only' => ['destroy']]);
        $this->middleware('permission:case-view', ['only' => ['show']]);
        $this->middleware('permission:case-assign', ['only' => ['assign']]);
        $this->middleware('permission:case-approve', ['only' => ['approve']]);
        $this->middleware('permission:case-investigation', ['only' => ['investigation']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = CaseDetail::all();
        $users = User::all();

//        $case = CaseDetail::join('profiles', 'case_details.filed_by', '=', 'profiles.user_id')
//            ->select('case_details.*', 'profiles.full_name')
//            ->getQuery()->get();
//        dd($cases->all());

        return view('cases.index', compact('cases', 'users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $regions = RegionMaster::all();
        $cities = CityMaster::all();

        return view('cases.create', compact('regions', 'cities'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateRequest($request);

        $case = CaseDetail::create([
            'case_number' => '',
            'user_id' => Auth::id(),
            'investigator_id' => null,
            'case_status' => 0 // investigator not assigned
        ]);

        $complainant =ComplainantInfo::create([
            'c_full_name' => $request->full_name,
            'c_age' => $request->age,
            'c_gender' => $request->gender,
            'c_occupation' => $request->occupation,
            'case_detail_id' => $case->id
        ]);

        ComplainantAddress::create([
            'ca_phone_number'  => $request->phone_number,
            'ca_email'  => $request->email,
            'ca_home_address'  => $request->home_address,
            'complainant_info_id'  => $complainant->id,
            'case_detail_id' => $case->id,
        ]);

        WitnessInfo::create([
            'case_detail_id' => $case->id,
            'w_full_name' => $case->w_full_name,
            'w_phone_number' => $case->w_phone_number,
        ]);

        CulpritInfo::create([
            'cu_full_name'  => $request->c_full_name,
            'cu_gender'  => $request->c_gender,
            'cu_age'  => $request->c_age,
            'cu_occupation'  => $request->c_occupation,
            'cu_address'  => $request->c_address,
            'case_detail_id'  => $case->id,
        ]);

        IncidentDetails::create([
            'incident_date' => $request->incident_date,
            'incident_time' => $request->incident_time,
            'incident_location' => $request->incident_location,
            'incident_desc' => $request->incident_desc,
            'case_detail_id' => $case->id
        ]);

        InvestigationDetail::create([
           'case_detail_id' => $case->id,
           'investigation_desc' => null,
           'investigator_id' => null
        ]);

        notify()->success('Case successfully opened');

        return redirect()->route('cases.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $case = CaseDetail::find($id);
        $users = User::all();

        return view('cases.show', compact('case', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $case = CaseDetail::find($id);

        return view('cases.edit', compact('case'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validateRequest($request);

        $case = CaseDetail::find($id);

        $case->complainant->c_full_name = $request->full_name;
        $case->complainant->c_age = $request->age;
        $case->complainant->c_gender = $request->gender;
        $case->complainant->c_occupation = $request->occupation;

        $case->c_address->ca_phone_number = $request->phone_number;
        $case->c_address->ca_email = $request->email;
        $case->c_address->ca_home_address = $request->home_address;

//        dd($case->incident->incident_date);
        $case->incident->incident_date = $request->incident_date;
        $case->incident->incident_desc = $request->incident_desc;
        $case->incident->incident_location = $request->incident_location;
        $case->incident->incident_time = $request->incident_time;

        $case->witness->w_full_name = $request->w_full_name;
        $case->witness->w_phone_number = $request->w_phone_number;

        $case->culprit->cu_full_name =$request->c_full_name;
        $case->culprit->cu_age =$request->c_age;
        $case->culprit->cu_gender =$request->c_gender;
        $case->culprit->cu_occupation =$request->c_occupation;
        $case->culprit->cu_address =$request->c_address;

        $case->push();

        notify()->success('Case successfully updated');

        return redirect()->route('cases.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $case = CaseDetail::find($id);
        $case->delete();

        notify()->success('The Case was just deleted');

        return redirect()->back();
    }

    private function validateRequest(Request $request)
    {
        $this->validate($request,[
            'incident_date'   =>  'required | date_format:m/d/Y',
            'incident_location'     =>  'required | min:3',
            'incident_desc' =>  'required',
            'full_name'  =>  'required | min:3',
            'age'  =>  'integer',
            'occupation'  =>  'min:3',
            'phone_number'  =>  'required',
            'home_address'  =>  'min:3',
            'c_full_name'  =>  'required | min:3',
            'c_age'  =>  'integer',
            'c_occupation'  =>  'min:3',
            'c_address'  =>  'min:3',
        ]);
    }

    public function assign(Request $request, $id) {

        if($request->investigator !== null){

            $case = CaseDetail::find($id);
            $case->investigator_id = $request->investigator;
            $case->case_status = 1;   // investigator assigned
            $case->save();

            notify()->info('Investigator assigned to case successfully');

            return redirect()->back();

        } else {

            notify()->info('Please select an Investigator');

            return redirect()->back();
        }

    }

    public function approve($id)
    {

            $case = CaseDetail::find($id);
            $case->case_status = 2;   // case closed
            $case->save();

            notify()->info('Case Closed');

            return redirect()->back();

    }

    public function investigation(Request $request, $id) {

        if($request->investigation_desc !== null){

            $investigation = InvestigationDetail::find($id);

            $investigation->investigation_desc = $request->investigation_desc;
            $investigation->save();

            notify()->info('Investigation Details added successfully');

            return redirect()->back();

        } else {

            notify()->info('Description is empty');

            return redirect()->back();
        }

    }

}
