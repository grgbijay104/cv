<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Skill::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->limit(10)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('level', function ($row) {
                    return $row->level;
                })
                ->addColumn('action', function ($data) {
                    return view('partials.index_actions', [
                        'id' => $data->id, 'route' => 'skills.'
                    ])->render();
                })
                ->rawColumns(['action', 'name'])
                ->make(true);
        }
        $data['route'] = 'skills.';
        $data['title'] = 'Skills';
        return view('skills.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['route'] = 'skills.';
        $data['title'] = 'Skills';
        return view('skills.create', $data);
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
            'name' => 'required',
            'level' => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $skill = new Skill($data);
        $skill->save();
        return redirect()->route('skills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        $data['route'] = 'skills.';
        $data['title'] = 'Skills';
        $data['item'] = $skill;
        return view('skills.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        $data['route'] = 'skills.';
        $data['title'] = 'Skills';
        $data['item'] = $skill;
        return view('skills.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required'
        ]);
        $skill->update($request->all());
        return redirect()->route('skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index');
    }
}
