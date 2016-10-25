<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Http\Request;
use CodeProject\Repositories\ClientRepository;
use CodeProject\Services\ClientService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Database\QueryException;

class ClientController extends Controller {
    /*     * *
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
        try {
            return $this->repository->find($id);
        } catch (ModelNotFoundException $ex) {
            return ['error' => true, 'message' => 'Cliente não encontrado.'];
        }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            return $this->repository->find($id)->delete() ?
                    ['error' => false, 'message' => "Registro deletado com sucesso"] : ['error' => false, 'message' => "Não foi possivel deletar"];
        } catch (QueryException $e) {
            return ['error' => true, 'message' => 'Cliente não pode ser apagado pois existe um ou mais projetos vinculados a ele.'];
        } catch (ModelNotFoundException $e) {
            return ['error' => true, 'message' => 'Cliente não encontrado.'];
        } catch (Exception $e) {
            return ['error' => true, 'message' => 'Ocorreu algum erro ao excluir o cliente.'];
        }
    }

}
