<?php

namespace App\Http\Controllers;

use App\Http\Resources\Project\ProjectCollection;
use App\Http\Resources\Project\ProjectResource;
use App\Model\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Symfony\Component\HttpFoundation\Response;
use PhpParser\Node\Stmt\Return_;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return Project::all();//return new ProjectCollection(Project::all());
        return ProjectCollection::collection(Project::all());
    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        //return "Hello Store Project!!";
        //return $request->all();
        $project = new Project;
        $project->name = $request->name;
        $project->detail = $request->detail;
        $project->sponsor = $request->sponsor;
        $project->price = $request->price;
        $project->duration = $request->duration;
        $project->start = $request->start;
        $project->finish = $request->finish;
        $project->save();
        return response([
            'data' => new ProjectResource($project)
        ],Response::HTTP_CREATED); //201
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {   //return $project;
        return new ProjectResource($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
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
        //return $request->all();
        //return $product;
        /**$request['detail'] =$request->description;
        unset($request['description']);
        */
        $project->update($request->all());
        return response([
            'data'=> new ProjectResource($project)
        ],Response::HTTP_CREATED); //],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
       //return $product; //test to show the result in this function
       $project->delete();
       return response(null,Response::HTTP_NO_CONTENT); //],204);
    }
}
