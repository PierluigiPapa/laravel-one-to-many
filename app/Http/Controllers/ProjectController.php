<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();
        return view('pages.projects.index',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('pages.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();

        $slug = Project::generateSlug($request->title);
        $val_data['slug'] = $slug;

        if($request->hasFile('cover')) {
            $path = Storage::disk('public')->put('project_images', $request->cover);

            $val_data['cover'] = $path;
        }

        $new_project = Project::create($val_data);

        return redirect()->route('dashboard.projects.show', ['project' =>$new_project->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view ('pages.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('pages.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        $slug = Project::generateSlug($request->title);
        $val_data['slug'] = $slug;

        if($request->hasFile('cover')) {
            if ($project->cover) {
                Storage::delete($project->cover);
            }

            $path= Storage::disk('public')->put('project_images', $request->cover);

            $val_data['cover'] = $path;
        }

        $project->update($val_data);

        return redirect()->route('dashboard.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover) {
            Storage::delete($project->cover);
        }

        $project->delete();

        return redirect()->route('dashboard.projects.index');
    }
}
