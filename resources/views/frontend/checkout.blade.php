@extends('layouts.front')

@section('title')
    Checout
@endsection

@section('content')
    <div class="container mt-3">
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
                                    <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter first name">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control lastname" value="{{ Auth::user()->name }}" name="lname" placeholder="Enter last name">
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter email">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter phone number">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter Address 1">
                                    <span id="address1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Enter Address 2">
                                    <span id="address2_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Enter State">
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                    <span id="country_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code</label>
                                    <input type="text" value="{{ Auth::user()->pincode }}" name="pincode" class="form-control pincode" placeholder="Enter Pin Code">
                                    <span id="pincode_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        @if($cartitems->count() > 0)
                            <div class="card-body">
                                <h6>Order Details</h6>
                                <hr>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->prod_qty }}</td>
                                                <td>{{ $item->products->selling_price }}</td>
                                                
                                            </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <h6 class="px-2">Grand Total <span class="float-end">Rs {{ $total }}</span></h6> --}}
                                <hr>
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" class="btn btn-success w-100">Place Order | COD</button>
                                <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay with Razopay</button>
                                <div id="paypal-button-container"></div>
                            </div>
                        @else
                            <div class="card-body text-center">
                                <h6>Order Details</h6>
                                <hr>
                                <h2 class="">No Product in Cart</h2> 
                            </div>           
                        @endif   
                    </div>
                </div>
            </div>
        </form> 
    </div>
@endsection

@section('scripts')

<script src="https://www.paypal.com/sdk/js?client-id=AS7pNgDv9BC-Bh5x4VlMtxREV7d6rgMeW0ZtDhRR
LTjVvmxZAyLGEq6QW7OUyRfIDkrz5JjUOtqI4D2R"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '0.01'
                        
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {

                // alert('Transaction completed by '+ details.payer.name.given_name);

                var firstname = $('.firstname').val();
                var lastname = $('.lastname').val();
                var email = $('.email').val();
                var phone = $('.phone').val();
                var address1 = $('.address1').val();
                var address2 = $('.address2').val();
                var city = $('.city').val();
                var state = $('.state').val();
                var country = $('.country').val();
                var pincode = $('.pincode').val();

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
                        'pincode': pincode,
                        'payment_mode': "Paid by Paypal",
                        'payment_id': details.id,
                    },
                    dataType: "dataType",
                    success: function(response){
                        // alert(response.status)
                        swal(response.status)
                        .then((value) => {
                            window.location.href = "/my-orders";
                        });
                    }
                })
            });
        }
    }).render('#paypal-button-container');
</script>

@endsection 