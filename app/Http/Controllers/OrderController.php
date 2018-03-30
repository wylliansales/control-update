<?php

namespace App\Http\Controllers;


use App\Http\Requests\OrderRequest;
use App\Services\OrderService;

class OrderController extends Controller
{

    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(OrderRequest $request)
    {
        return $this->service->store($request->all());
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function update(OrderRequest $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
