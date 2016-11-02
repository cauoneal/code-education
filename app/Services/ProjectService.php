<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeProject\Services;

use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Filesystem\Filesystem;
/**
 * Description of ClientService
 *
 * @author carlsilv
 */
class ProjectService {

    /**
     *
     * @var type ProjectRepository
     */
    protected $repositry;

    /**
     * 
     * @param ProjectValidator $validator
     */
    protected $validator;
    
    /**
     * 
     * @param Filesystem $filesystem
     */
    protected $filesystem;    
    
    /**
     * 
     * @param Factory $storage
     */
    protected $storage;    

    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem, Factory $storage) {
        $this->repositry = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
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
            return ['error' => true, 'message' => 'Projeto não encontrado'];
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
    public function createFile(array $data)
    {
        $project = $this->repositry->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data);
        $this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));
    }
        
    
}
