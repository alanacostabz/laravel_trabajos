<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        //$portfolio = DB::table('projects')->get();
        //$portfolio = Project::latest('created_at')->get();

        return view('projects.index', [
            'projects' => Project::latest()->paginate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProjectRequest $request)
    {
        //$title = request('title');
        // $title =  $request->get('title');
        // $url =  $request->get('url');
        // $description =  $request->get('project');

        // Project::create([
        //     'title' => $request->get('title'),
        //     'url' => $request->get('url'),
        //     'content' => $request->get('content')
        // ]);

        //Project::create(request()->all());

        // $fields = request()->validate([
        //     'title' => 'required',
        //     'url' => 'required',
        //     'content' => 'required'
        // ]);

        //Project::create($fields);

        //return Project::create(request()->only('title', 'url', 'content'));

        Project::create($request->validated());

        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //$project = Project::find($id);

        // return view('projects.show', [
        //     'project' => Project::findOrFail($id)
        // ]);

        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function create()
    {
        return view('projects.create', [
            'project' => new Project
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, SaveProjectRequest $request)
    {
        // $project->update([
        //     "title" => request("title"),
        //     "url" => request("url"),
        //     "content" => request("content")
        // ]);

        $project->update($request->validated());

        return redirect()->route('projects.show', $project)->with('status', 'El proyecto fue actualizado con éxito.');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //Project::destroy($id);
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con éxito.');
    }
}
