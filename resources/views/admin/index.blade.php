@extends('layouts.admin')

@section('content')

<h1>{{ $user->name }}</h1>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Số lượng sản phẩm</h5>
                    <p class="card-text">{{ $productCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Số lượng danh mục</h5>
                    <p class="card-text">{{ $categoryCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Số lượng người dùng</h5>
                    <p class="card-text">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Số đơn đặt hàng</h5>
                    <p class="card-text">{{ $orderCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Số đơn đã giao</h5>
                    <p class="card-text">{{ $completeOrderCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Số đơn đang giao</h5>
                    <p class="card-text">{{ $pendingOrderCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection