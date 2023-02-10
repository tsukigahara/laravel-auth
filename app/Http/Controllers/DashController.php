<?php

namespace App\Http\Controllers;

use App\Models\Project;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();

        return view('dashboard', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $projectToEdit = new Project();
        $projectToEdit->name = $data['name'];
        $projectToEdit->description = $data['description'];
        $projectToEdit->main_image = $data['main_image'];
        $projectToEdit->release_date = $data['release_date'];
        $projectToEdit->repo_link = $data['repo_link'];

        $projectToEdit->save();

        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        return view('dashboard_edit', compact('project'));
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
        $data = $request->all();
        $projectToEdit = Project::find($id);
        $projectToEdit->name = $data['name'];
        $projectToEdit->description = $data['description'];
        $projectToEdit->main_image = $data['main_image'];
        $projectToEdit->release_date = $data['release_date'];
        $projectToEdit->repo_link = $data['repo_link'];

        $projectToEdit->save();

        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('dashboard.index');
    }
}
