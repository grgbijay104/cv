<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = WorkExperience::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->limit(10)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('hospital_name', function ($row) {
                    return $row->hospital_name;
                })
                ->editColumn('worked_from', function ($row) {
                    return $row->worked_from;
                })
                ->editColumn('worked_to', function ($row) {
                    return $row->worked_to;
                })
                ->editColumn('address', function ($row) {
                    return $row->address;
                })
                ->addColumn('action', function ($data) {
                    return view('partials.index_actions', [
                        'id' => $data->id, 'route' => 'workExperiences.'
                    ])->render();
                })
                ->rawColumns(['action', 'hospital_name'])
                ->make(true);
        }
        $data['route'] = 'workExperiences.';
        $data['title'] = 'Work Experience';
        return view('workExperiences.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['route'] = 'workExperiences.';
        $data['title'] = 'Work Experience';
        return view('workExperiences.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hospital_name' => 'required',
            'worked_from' => 'required',
            'address' => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $we = new WorkExperience($data);
        $we->save();
        return redirect()->route('workExperiences.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WorkExperience $workExperience
     * @return \Illuminate\Http\Response
     */
    public function show(WorkExperience $workExperience)
    {
        $data['route'] = 'workExperiences.';
        $data['title'] = 'Work Experience';
        $data['item'] = $workExperience;
        return view('workExperiences.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\WorkExperience $workExperience
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkExperience $workExperience)
    {
        $data['route'] = 'workExperiences.';
        $data['title'] = 'Work Experience';
        $data['item'] = $workExperience;
        return view('workExperiences.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkExperience $workExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkExperience $workExperience)
    {
        $data = $request->all();
        $we = $workExperience;
        $we->update($data);
        return redirect()->route('workExperiences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WorkExperience $workExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->delete();
        return redirect()->route('workExperiences.index');
    }
}
