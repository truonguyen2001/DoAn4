<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Services\CartService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class CartApiController extends Controller
{
    private CartService $cart_service;
    public function __construct(CartService $cart_service)
    {
        $this->cart_service = $cart_service;
    }

    public function checkOut(Request $request)
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $orderBy = [];
            if ($request->get('column') && $request->get('sort')) {
                $orderBy['sort'] = $request->get('sort');
                $orderBy['column'] = $request->get('column');
            }
            $cartPaginate = $this->cart_service
                ->getAll(
                    $orderBy,
                    $request->get('page') ?? 0,
                    $request->get('limit') ?? 10,
                    [
                        'search' => $request->get('search') ?? null,
                        'with_detail' => $request->get('with_detail') ?? false,
                        'customer_id' => $request->get('customer_id') ?? null
                    ]
                );
            $response = response()->json([
                'code' => Response::HTTP_OK,
                'status' => true,
                'data' => $cartPaginate->items(),
                'meta' => [
                    'total' => $cartPaginate->total(),
                    'perPage' => $cartPaginate->perPage(),
                    'currentPage' => $cartPaginate->currentPage()
                ]
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->post();
            $validator = Validator::make($data,  Cart::RULES);
            if ($validator->fails()) {
                $response = response()->json([
                    'code' => Response::HTTP_BAD_REQUEST,
                    'status' => false,
                    'message' => $validator->errors()
                ]);
            } else {
                $data['created_by'] = 20;
                $result = $this->cart_service->create($data);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try {
            $result = $this->cart_service->getById($id);
            if ($result->resource != null) {
                $response = response()->json([
                    'code' => Response::HTTP_OK,
                    'status' => true,
                    'data' => $result,
                    'meta' => []
                ]);
            } else {
                $response = response()->json([
                    'code' => Response::HTTP_NOT_FOUND,
                    'status' => false,
                    'message' => Response::$statusTexts[Response::HTTP_NOT_FOUND],
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $result = $this->cart_service->update($id, $data);
            $response = response()->json([
                'code' => Response::HTTP_OK,
                'status' => $result,
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = $this->cart_service->delete($id);
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
