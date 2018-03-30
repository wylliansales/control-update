<?php
/**
 * Created by PhpStorm.
 * User: suporte
 * Date: 29/03/2018
 * Time: 18:37
 */

namespace App\Services;


use App\Exceptions\Error;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Validators\OrderValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class OrderService
{

    private $repository;
    private $validator;

    public function __construct(OrderRepository $repository, OrderValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        try{
            return OrderResource::collection($this->repository->paginate(8));
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

    public function store($data)
    {
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $order = $this->repository->create($data);
            return new OrderResource($order);
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

    public function show($id)
    {
        try{
            if($id < 1){
                return Error::errorResponse(['ID inválido', 400]);
            }
            $order = $this->repository->find($id);
            return new OrderResource($order);
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

    public function update($data, $id)
    {
        try{
            if($id < 1){
                return Error::errorResponse(['ID inválido', 400]);
            }
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $order = $this->repository->update($data, $id);
            return new OrderResource($order);
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }

    public function destroy($id)
    {
        try{
            if($id < 1){
                return Error::errorResponse(['ID inválido', 400]);
            }
            $this->repository->delete($id);
            return response()->json([],204);
        } catch (\Exception $e){
            return Error::errorResponse($e);
        }
    }
}