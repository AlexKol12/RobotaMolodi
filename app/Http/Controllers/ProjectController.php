<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Models\Industry;
use App\Models\ProjectDescription;

class ProjectController extends Controller
{
    /**
    * Instantiate a new UserController instance.
    *
    * @return void
    */
    public function __construct()
    {
       $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = [];

        $project = new Project();

        $data['project'] = $project;

        $industries = Industry::all(['id','name']);

        $preparedForSelect2 = [];
        foreach($industries as $i){
            $preparedForSelect2[$i['id']] = $i['name'];
        }
        $data['industries'] = $preparedForSelect2;

        return view('project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'brand' => 'required|max:255',
            'location' => 'required|max:255',
            'logo' => 'required|image',
        ]);

        $industry = Industry::find($request['industry_id']);
        $project = $industry->projects()->create($request->all());

        $pd = new ProjectDescription($request->all());
        $pd['project_id'] = $project->id;
        $pd->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Project::delete($id);
    }
}
