<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeProject\Services;

use CodeProject\Repositories\ProjecNoteRepository;
use CodeProject\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
/**
 * Description of ClientService
 *
 * @author carlsilv
 */
class ProjectNoteService {
    /**
     *
     * @var type ProjectRepository
     */
    protected  $repositry;
    /**
     * 
     * @param ProjectValidator $validator
     */
    protected  $validator;


    public function __construct(ProjecNoteRepository $repository, ProjectNoteValidator $validator ) {        
        $this->repositry = $repository;
        $this->validator = $validator;
    }
    
    public function create(array $data){
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
    
    public function update(array $data, $id){
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            return $this->repositry->update($data,$id);
        } catch (ValidatorException $exc) {
            return [
                'error' => true,
                'message' => $exc->getMessageBag()
            ];
        }        
        
    }
}
