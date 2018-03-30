<?php
/**
 * Created by Wyllian.
 * Date: 25/03/2018
 * Time: 02:22
 */

namespace App\Services;


use App\Exceptions\Error;
use App\Http\Resources\CustomerResource;
use App\Repositories\CustomerRepository;
use App\Rules\ValidateCnpj;
use App\Validators\CustomerValidator;
use Prettus\Validator\Contracts\ValidatorInterface;


class CustomerService
{
    private $repository;
    private $validator;

    public function __construct(CustomerRepository $repository, CustomerValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        try{
            return CustomerResource::collection($this->repository->paginate(8));
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

    public function store($data)
    {
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->validator->setRules([
                'cnpj' => [new ValidateCnpj]
            ]);

            $customer = $this->repository->create($data);
            return $customer;
        } catch (\Exception $e) {
            return Error::errorResponse($e);
        }
    }

    public function show($id)
    {
        try{
            if($id < 1){
                return Error::errorResponse(['Id não pode ser menor que um', 400]);
            }
            $customer = $this->repository->find($id);
            return new CustomerResource($customer);
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

    public function update($data, $id)
    {
        try{
            if($id < 1){
                return Error::errorResponse(['Id não pode ser menor que um', 400]);
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $this->validator->setRules([
                'cnpj' => [new ValidateCnpj]
            ]);

            $customer = $this->repository->update($data, $id);
            return new CustomerResource($customer);
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

    public function destroy($id)
    {
        try{
            if($id < 1){
                return Error::errorResponse(['Id não pode ser menor que um', 400]);
            }
            $this->repository->delete($id);
            return response()->json([],204);
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

}