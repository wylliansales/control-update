<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class OrderValidator.
 *
 * @package namespace App\Validators;
 */
class OrderValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'customer_id'   => 'required|int|min:1',
            'product_id'    => 'required|int|min:1',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'customer_id'   => 'required|int|min:1',
            'product_id'    => 'required|int|min:1',
        ],
    ];
}
