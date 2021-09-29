<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Education::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->limit(10)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('school', function ($row) {
                    return $row->school;
                })
                ->editColumn('start', function ($row) {
                    return $row->start;
                })
                ->editColumn('end', function ($row) {
                    return $row->end ?? 'Present';
                })
                ->editColumn('gpa', function ($row) {
                    return $row->gpa;
                })
                ->editColumn('major', function ($row) {
                    return $row->major;
                })
                ->addColumn('action', function ($data) {
                    return view('partials.index_actions', [
                        'id' => $data->id, 'route' => 'educations.'
                    ])->render();
                })
                ->rawColumns(['action', 'school'])
                ->make(true);
        }
        $data['route'] = 'educations.';
        $data['title'] = 'educations';
        return view('educations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['route'] = 'educations.';
        $data['title'] = 'educations';
        return view('educations.create', $data);
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
            'school' => 'required',
            'start' => 'required',
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $education = new Education($data);
        $education->save();
        return redirect()->route('educations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Education $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        $data['route'] = 'educations.';
        $data['title'] = 'educations';
        $data['item'] = $education;
        return view('educations.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Education $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        $data['route'] = 'educations.';
        $data['title'] = 'educations';
        $data['item'] = $education;
        return view('educations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Education $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'school' => 'required',
            'start' => 'required',
        ]);
        $education->update($request->all());
        return redirect()->route('educations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Education $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('educations.index');
    }
}
