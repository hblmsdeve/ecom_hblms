@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a>/
                <a href="{{ url('checkout') }}">
                    Checkout
                </a>
            </h6>
        </div>
    </div>

    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" required placeholder="Enter First Name">
                                    <span id="fname_error" class="text-danger" ></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control lastname" value="{{ Auth::user()->lname }}" name="lname" required placeholder="Enter Last Name">
                                    <span id="lname_error" class="text-danger" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control email" value="{{ Auth::user()->email }}" name="email" required placeholder="Enter Email">
                                    <span id="email_error" class="text-danger" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" required placeholder="Enter Phone Number">
                                    <span id="phone_error" class="text-danger" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}" name="address1" required placeholder="Enter Address 1">
                                    <span id="address_error" class="text-danger" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="optionnel">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" required placeholder="Enter City">
                                    <span id="city_error" class="text-danger" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" required placeholder="Enter State">
                                    <span id="state_error" class="text-danger" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" required placeholder="Enter Contry">
                                    <span id="country_error" class="text-danger" ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Zip Code</label>
                                    <input type="text" class="form-control zipcode" value="{{ Auth::user()->zipcode }}" name="zipcode" required placeholder="Enter Zip Code">
                                    <span id="zip_error" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            @if($cartItems->count() > 0)
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cartItems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>{{ $item->products->selling_price }}</td>
                                            @php
                                                $total += $item->products->selling_price * $item->prod_qty;
                                            @endphp
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2"> Grand Total : <span class="float-end">{{ $total }} DH</span></h4>
                                <hr>
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" class="btn btn-success w-100 mb-3">Place Order | COD</button>
                                {{-- <button type="button" class="btn btn-primary w-100 mt-3 razorpay-btn">Pay Razorpay</button> --}}
                                <div    id="paypal-button-container"></div>
                            @else
                            <div class="card-body text-center">
                                <h4>No products in cart</h4>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AVFbvAKQY6ifAu247EyweGhlbk_IY__o91o76XKB9xxHdj7DGfuiavWoxIKA6n3UFQoyljFFb9xbZW7H"></script>
<script>
    paypal.Buttons({
      createOrder: function(data, actions) {
        // This function sets up the details of the transaction, including the amount and line item details.
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '{{ $total }}'
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
          // This function shows a transaction success message to your buyer.
        //   alert('Transaction completed by ' + details.payer.name.given_name);
            var firstname = $('.firstname').val();
            var lastname = $('.lastname').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var address1 = $('.address1').val();
            var address2 = $('.address2').val();
            var city = $('.city').val();
            var state = $('.state').val();
            var country  = $('.country').val();
            var zipcode = $('.zipcode').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "/place-order",
                data: {
                    'fname': firstname,
                    'lname': lastname,
                    'email': email,
                    'phone': phone,
                    'address1': address1,
                    'address2': address2,
                    'city': city,
                    'state': state,
                    'country': country,
                    'zipcode': zipcode,
                    'payment_mode': "Paid by Paypal",
                    'payment_id': details.id,
                },
                success: function(response){
                    swal(response.status);
                    window.location.href = "/my-orders";
                }
            });
        });
      }
    }).render('#paypal-button-container');
    //This function displays Smart Payment Buttons on your web page.
</script>
@endsection