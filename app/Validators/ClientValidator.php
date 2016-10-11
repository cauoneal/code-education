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
class ClientValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:255',
            'responsible' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => []
    ];

}
