<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function checkout(Product $product)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = PaymentIntent::create([
            'amount' => $product->price * 100,
            'currency' => 'inr',
            'payment_method_types' => ['card'],
        ]);

        return view('products.checkout', [
            'product' => $product,
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    }
}
