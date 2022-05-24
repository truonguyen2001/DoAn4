<?php

namespace App\Services;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeService
{
    public function update($id, array $data)
    {
        if (Auth::check())
        {
            $data['updated_by'] = Auth::user()->id;
        }
        $updated = Employee::where('id', $id)
        ->update($data);
        return $updated > 0;
    }

    public function delete($id)
    {
        return Employee::destroy($id);
    }

    public function create(array|Employee $data)
    {
        if (Auth::check())
        {
            $data['created_by'] = Auth::user()->id;
        }
        $employee = is_array($data) ?
            Employee::create($data)
            : $data;
        if($employee->save()) return $employee->id;
        else return 0;
    }

    public function getAll(
        array $orderBy = [],
        int $page_index = 0,
        int $page_size = 10,
        array $option = []
    ) {
        $query = Employee::query();
        if (isset($option['search']) && $option['search'] != '') {
            $query->where('name','LIKE', '%'.$option['search'].'%');
        }
        if (isset($option['visible_only']) && $option['visible_only'] == 'true')
        {
            $query->where('visible', true);
        }
        if ($orderBy) {
            $query->orderBy($orderBy['column'], $orderBy['sort']);
        }
        $query->orderBy('id', 'desc');
    return EmployeeResource::collection($query->paginate($page_size, page: $page_index));
    }

    public function getById(int $id)
    {
        $query = Employee::query();
        return new EmployeeResource($query->find($id));
    }
}
