<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeProject\Services;

use CodeProject\Repositories\ProjectMembersRepository;
use CodeProject\Validators\ProjectMemberValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
/**
 * Description of ClientService
 *
 * @author carlsilv
 */
class ProjectMemberService {
    /**
     *
     * @var type ProjectMembersRepository
     */
    protected  $repositry;
    /**
     * 
     * @param ProjectTaskValidator $validator
     */
    protected  $validator;


    public function __construct(ProjectMembersRepository $repository, ProjectMemberValidator $validator ) {        
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
    public function addMember($projectId, $memberId)
    {
        
    }
    public function removeMember($projectId, $memberId)
    {
        
    }
    public function isMember($projectId, $memberId)
    {
        
    }    
}
