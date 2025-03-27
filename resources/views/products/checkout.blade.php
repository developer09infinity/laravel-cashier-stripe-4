@extends('layouts.app')

@section('content')
    <div class="container">


        {{-- <form id="payment-form">
            <div class="row">
                <div class="col-md-12">

                    <div id="card-element"></div>
                    <span id="card-errors" class="text-danger">Card details cannot be empty!</span>
                </div>
            </div>
            <button id="submit" class="btn btn-success btn-rounded">Pay Now</button>
        </form> --}}


        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow">
                    <h3>Pay for {{ $product->name }}</h3>
                    <p>Amount: ₹{{ number_format($product->price, 2) }}</p>
                    <form id="payment-form">
                        <div class="mb-3">
                            <input type="text" class="form-control">
                            <div id="card-element" class="form-control">Card Input Box</div>
                            {{-- <span id="card-errors" class="text-danger">Card details cannot be empty!</span> --}}
                        </div>
                        <div class="text-center">
                            <button id="submit" class="btn btn-success rounded-pill px-4 py-2 w-50">
                                Pay Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var stripe = Stripe("{{ env('STRIPE_KEY') }}");
            var elements = stripe.elements();
            var card = elements.create("card");
            card.mount("#card-element");

            var form = document.getElementById("payment-form");
            form.addEventListener("submit", function(event) {
                event.preventDefault();
                stripe.confirmCardPayment("{{ $clientSecret }}", {
                    payment_method: {
                        card: card
                    }
                }).then(function(result) {
                    if (result.error) {
                        alert(result.error.message);
                    } else {
                        alert("Payment successful!");
                        window.location.href = "/";
                    }
                });
            });
        </script>
    </div>
@endsection
