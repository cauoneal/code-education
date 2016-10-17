<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Description of ClientValidator
 *
 * @author carlsilv
 */
class ProjectValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'owner_id' => 'required',
            'client_id' => 'required',
            'name' => 'required',
            'progress' => 'required',
            'status' => 'required',
            'due_date' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => []
    ];

}
