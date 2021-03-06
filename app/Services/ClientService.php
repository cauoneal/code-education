<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeProject\Services;

use CodeProject\Repositories\ClientRepository;
use CodeProject\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Description of ClientService
 *
 * @author carlsilv
 */
class ClientService {

    /**
     *
     * @var type ClientRepository
     */
    protected $repositry;

    /**
     * 
     * @param ClientValidator $validator
     */
    protected $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator) {
        $this->repositry = $repository;
        $this->validator = $validator;
    }

    public function create(array $data) {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            return $this->repositry->create($data);
        } catch (ValidatorException $exc) {
            return [
                'error' => true,
                'message' => $exc->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id) {
        try {
            $this->repositry->find($id);
        } catch (ModelNotFoundException $ex) {
            return ['error' => true, 'message' => 'Cliente não encontrado.'];
        }
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            return $this->repositry->update($data, $id);
        } catch (ValidatorException $exc) {
            return [
                'error' => true,
                'message' => $exc->getMessageBag()
            ];
        }
    }

}
