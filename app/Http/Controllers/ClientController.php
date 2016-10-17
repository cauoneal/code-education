<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Http\Request;
use CodeProject\Repositories\ClientRepository;
use CodeProject\Services\ClientService;
use CodeProject\Validators\ProjectValidator;


class ClientController extends Controller 
{
    /***
     * @var ClientRepository
     */
                
    private $repository;
    
    /**
     *
     * @var type ClientService
     */
    
    private $service;
    
    public function __construct(ClientRepository $repository, ClientService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->repository->all();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return $this->repository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        return $this->service->update($request->all(), $id);
        
//        $client = $this->repository->find($id);
//        if ($client != NULL) {            
//            $client->update($request->all());
//            return $this->repository->find($id);
//        }else{
//            return json_encode("Cliente nao foi encontrado");
//        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $delete = $this->repository->delete($id);
        if ($delete) {
            return json_encode("Deletado com sucesso!");
        } else {
            return json_encode("Impossivel foi possivel deletar");
        }
    }

}
