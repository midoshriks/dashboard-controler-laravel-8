<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\type;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrdersApiController extends Controller
{



    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            // 'user_id' => 'required',
            // 'payment_method_id' => 'required',
            'product_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $user = Auth::user();
            $order = new Order();
            $order->order_numper =  '1000' . $order->count('order_numper') + 1;
            $order->user_id = $user->id;
            $order->payment_method_id = $request->payment_method_id ?? 11;
            $order->product_id = $request->product_id;
            //* $order->type_id = type::TYPE_ORDER_PENDING ; // 9 => pending | 10 => confirm
            //! $order->type_id = 9; // 9 => pending | 10 => confirm

            // ?=======================Test Function==========================
            $type_id = get_type('order','pending');
            $order->type_id = $type_id->id; // 9 => pending | 10 => confirm
            // ?=======================Test Function==========================
            $product = Product::where('id', $request->product_id)->first();
            $order->amount = $product->quantity;
            $order->total = $product->price;
            // dd($order);
            $order->save();

            $this->orderRepository->conferm_order($order);
        };
        // dd($user);

        $helpers = [];
        for ($i = 1; $i < 5; $i++) {
            $helpers[$i] = $user->wallets->balance('helper', $i);
        }

        $response = [
            'status' => true,
            'message' => "The Orders has been Creared successfully!",
            'coins' =>  $user->wallets->balance('coin'),
            'helpers' =>  $helpers
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = $order->with('type_method', 'users')->with([
            'products' => function ($q) {
                $q->with('type');
            }
        ])->first();
        return response()->json(['order' => $order], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
