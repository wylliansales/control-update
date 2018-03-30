<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CustomerValidator.
 *
 * @package namespace App\Validators;
 */
class CustomerValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'      => 'required|min:5',
            'cnpj'      => 'required|min:14|unique:customers',
            'address'   => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'      => 'required|min:5',
            'cnpj'      => 'required|min:14|unique:customers',
            'address'   => 'required',
        ],
    ];
}
