<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
// use Symfony\Component\HttpFoundation\Response;

class EmployeeApiController extends Controller
{
    private EmployeeService $employee_service;
    public function __construct(EmployeeService $employee_service)
    {
        $this->employee_service = $employee_service;
    }
    public function Index(Request $request)
    {
        try {
            $orderBy = [];
            if ($request->get('column') && $request->get('sort')) {
                $orderBy['sort'] = $request->get('sort');
                $orderBy['column'] = $request->get('column');
            }
            $employeePaginate = $this->employee_service
                ->getAll(
                    $orderBy,
                    $request->get('page') ?? 0,
                    $request->get('limit') ?? 10,
                    [
                        'search' => $request->get('search') ?? null,
                        'visible_only' => $request->get('visible_only') ?? false
                    ]
                );
            $response = response()->json([
                'code' => Response::HTTP_OK,
                'status' => true,
                'data' => $employeePaginate->items(),
                'meta' => [
                    'total' => $employeePaginate->total(),
                    'perPage' => $employeePaginate->perPage(),
                    'currentPage' => $employeePaginate->currentPage()
                ]
            ]);
        } catch (\Throwable $th) {
            $response = response()->json([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'status' => false,
                'message' => $th->getMessage(),
                'trace' => $th->getTrace()
            ]);
        }

        return $response;
    }

    public function store(Request $request)
    {
        try {
            $data = $request->post();
            $validator = Validator::make($data,  Employee::RULES);
            if ($validator->fails()) {
                $response = response()->json([
                    'code' => Response::HTTP_BAD_REQUEST,
                    'status' => false,
                    'message' => $validator->errors()
                ]);
            } else {
                $data['created_by'] = 20;
                $result = $this->employee_service->create($data);
                $response = response()->json([
                    'code' => Response::HTTP_OK,
                    'status' => $result > 0,
                    'data' => $result,
                    'meta' => []
                ]);
            }
        } catch (\Throwable $th) {
            $response = response()->json([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
        return $response;
    }

    public function show(Request $request, $id)
    {
        try {
            $result = $this->employee_service->getById($id);
            $response = response()->json([
                'code' => Response::HTTP_OK,
                'status' => true,
                'data' => $result,
                'meta' => []
            ]);
        } catch (\Throwable $th) {
            $response = response()->json([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
        return $response;
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $rules = Employee::RULES;
            $validator = Validator::make($data,  $rules);
            if ($validator->fails()) {
                $response = response()->json([
                    'code' => Response::HTTP_BAD_REQUEST,
                    'status' => false,
                    'meta' => $validator->errors(),
                    'message' => 'Failed'
                ]);
            } else {
                $result = $this->employee_service->update($id, $data);
                $response = response()->json([
                    'code' => Response::HTTP_OK,
                    'status' => $result,
                    'data' => $id,
                    'meta' => []
                ]);
            }
        } catch (\Throwable $th) {
            $response = response()->json([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
        return $response;
    }

    public function destroy(Request $request, $id)
    {
        try {
            $result = $this->employee_service->delete($id);
            $response = response()->json([
                'code' => Response::HTTP_OK,
                'status' => $result > 0,
                'data' => $id,
                'meta' => []
            ]);
        } catch (\Throwable $th) {
            $response = response()->json([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
        return $response;
    }
}
