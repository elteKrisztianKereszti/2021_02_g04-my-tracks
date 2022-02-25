<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
      $projects = [
        [
          'id'          => 1,
          'name'        => 'Project1',
          'description' => 'Description1',
          'bg_url'      => 'https://img.jofogas.hu/hdimages/Neca___Jim_Raynor_556392083396273.jpg',
        ],
        [
          'id'          => 2,
          'name'        => 'Project2',
          'description' => 'Description2',
          'bg_url'      => '',
        ],
      ];

      return view('projects.index', [
        'projects' => $projects,
      ]);
    }
    public function create()
    {
        return view('projects/create');
    }

    public function store(Request $request) {
        dd($request);
    }

    public function detail($id, Request $request)
    {
        //dd($request);

        return view('projects/detail', [
            'id' => $id
        ]);
    }

    public function create_task()
    {
        return view('projects/create_task');
    }
}
