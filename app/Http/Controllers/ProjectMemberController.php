<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Http\Request;
use CodeProject\Repositories\ProjectMembersRepository;
use CodeProject\Services\ProjectMemberService;
use CodeProject\Http\Requests;

class ProjectMemberController extends Controller
{

    /**
     * @var type ProjectMembersRepository
     */
    private $repository;

    /**
     *
     * @var type ProjectMemberService
     */
    private $service;

    public function __construct(ProjectMembersRepository $repository, ProjectMemberService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) {
        return $project = $this->repository
                ->with('project')
                ->with('user')
                ->findWhere(['project_id' => $id]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        return $this->service->create($request->all());
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

    }           
    
}
