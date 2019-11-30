<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * ProjectController Constructor
     */
    public function __construct()
    {
        //$this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
        //return response()->json(['projects'=>$projects], 200);
    }

    /**
     * Display a listing of completed Projects
     *
     * @return \Illuminate\Http\Response
     */
    public function index_completed()
    {
        //
    }

    /**
     *  Diplay a listing of ongoing projects
     *
     * @return \Illuminate\Http\Response
     */
    public function index_onging()
    {
        //
    }

    /**
     * Display a listing of pending projects
     *
     * @return \Illuminate\Http\Response
     */
    public function index_pending()
    {
        //
    }

    /**
     * Diplay a listing of cancelled projects
     *
     * @return \Illuminate\Http\Response
     */
    public function index_canceled()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $project = new Project($request->all());

        $project->status = config('constants.project_status.pending');
        $project->user_id = auth()->id();

        if($project->save()){
            return redirect()->route('projects.show', $project->id);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        if(auth()->id() == $project->user_id)
        {
            return view('projects.edit', compact('project'));
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request);
        if($project->update($request->all()))
        {
            return view('projects.show', compact('project'));
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    /**
     * Validation for Project Controller
     *
     * @param Request $request
     * @return string|null
     */
    protected function validation(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);
    }
}
