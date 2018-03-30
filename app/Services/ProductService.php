<?php
/**
 * Created by PhpStorm.
 * User: suporte
 * Date: 29/03/2018
 * Time: 12:02
 */

namespace App\Services;


use App\Exceptions\Error;
use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class ProductService
{

    private $repository;
    private $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        try{
            return ProductResource::collection($this->repository->paginate());
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

    public function store($data)
    {
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $product = $this->repository->create($data);
            return new ProductResource($product);
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

    public function show($id)
    {
        try{
            if($id < 0){
                return Error::errorResponse(['Id inválido',400]);
            }
            $product = $this->repository->find($id);
            return new ProductResource($product);
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

    public function update($data, $id)
    {
        try{
            if($id < 0){
                return Error::errorResponse(['Id inválido',400]);
            }
            $product = $this->repository->update($data, $id);
            return new ProductResource($product);
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

    public function destroy($id)
    {
        try{
            if($id < 0){
                return Error::errorResponse(['Id inválido',400]);
            }
            $this->repository->delete($id);
            return response()->json([],204);
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }
}