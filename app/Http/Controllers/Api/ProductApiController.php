<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Symfony\Component\VarDumper\Cloner\Data;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Product::all();
            return $this->ApijsonSuccess('Data Found', $data);
        } catch (Exception $e) {
            return $this->ApijsonError($e->getMessage());
        }

    }
    protected function ApijsonSuccess($message = '', $data = [], $code = 200)
    {
        return response()->json(
            [
                'success' =>true,
                'message' => $message,
                'data' => $data,
            ],
            $code,
        );
    }
    protected function ApijsonError($message = '', $data = [], $code = 400)
    {
        return response()->json(
            [
                'error' =>true,
                'message' => $message,
                'data' => $data,
            ],
            $code,
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_name = Product::find($request->product_id);
        try {
            Order::create([
                'product_name'=>$product_name->name,
                'product_id' =>$request->product_id,
                'quantity' => $request->quantity,
                'total' =>$request->total,
                'customer_name'=>$request->shipping_address['customer_name'],
                'customer_email'=>$request->shipping_address['customer_email'],
                'customer_mobile_no'=>$request->shipping_address['customer_mobile_no'],
                'customer_address'=>$request->shipping_address['customer_address']
            ]);
            return $this->ApijsonSuccess('Order Complete');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {
            $data = Product::where('slug',$slug)->first();
            return $this->ApijsonSuccess('data found',$data);
        } catch (Exception $e) {
            return $this->ApijsonError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
