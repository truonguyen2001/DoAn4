<?php

namespace App\Services;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\Invoice;

class CustomerService
{
    public function update($id, array $data)
    {
        $updated = Customer::where('id', $id)
        ->update($data);
        return $updated > 0;
    }

    public function delete($id)
    {
        return Customer::destroy($id);
    }

    public function create(array|Customer $data)
    {
        $customer = is_array($data) ?
            Customer::create($data)
            : $data;
        if($customer->save()) return $customer->id;
        else return 0;
    }

    public function getAll(
        array $orderBy = [],
        int $page_index = 0,
        int $page_size = 10,
        array $option = []
    ) {
        $query = Customer::query();
        if ($option['search']) {
            $query->where('name', 'LIKE', "%".$option['search']."%")
            ->orWhere('code', 'LIKE', "%".$option['search']."%");
        }
        if ($orderBy) {
            $query->orderBy($orderBy['column'], $orderBy['sort']);
        }
        return CustomerResource::collection($query->paginate($page_size, page: $page_index));
    }

    public function getById(int $id)
    {
        $query = Customer::query();
        return new CustomerResource($query->find($id));
    }
}
