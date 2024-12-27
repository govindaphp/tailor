<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use App\Models\User;


class CustomerCartController extends Controller
{
    public function productAddToCart(Request $request)
    {
        $customerId = auth('user')->id(); 
        $productId = $request->product_id;
        $quantity = $request->quantity ?? 1;

        //Checks if a cart exists for the logged-in customer and returns it. If not, it creates a new cart.
        $cart = Cart::firstOrCreate(['customer_id' => $customerId]);

        // Check if the product already exists in the cart details
        $existingCartDetail = CartDetail::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->first();

        if ($existingCartDetail) {
            return response()->json(['message' => 'Product already in cart'], 200);
        }

        // If the product is not in the cart, add it
        CartDetail::create([
            'cart_id' => $cart->id,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);

        return response()->json(['message' => 'Product added to cart successfully'], 201);
    }

    /*************************************[CATALOGUE ADD TO CART START]*********************************************/
    public function saveDesignId(Request $request)
	{
		//This function is for save catalogue design id in session
		session(['catalogue_id' => $request->catalogue_id]);
        if($request->type=='fabric')
        {
		    return response()->json(['success' => true,  'redirect_url' => url('/browseFebrics')]);
        }
        if($request->type=='mesurment')
        {
		    return response()->json(['success' => true,  'redirect_url' => url('/mesurment')]);
        }
	}
    public function catalogueAddCart(Request $request)
    {
        //This function is for catalogue design add to cart
    }
    /*************************************[CATALOGUE ADD TO CART END]*********************************************/
}
