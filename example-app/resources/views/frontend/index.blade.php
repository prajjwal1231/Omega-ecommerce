@extends('frontend.master')
@section('content')

@include('frontend.partition.slider')

@include('frontend.partition.banner_category')

@include('frontend.partition.category')

@include('frontend.partition.product_best')

{{-- @include('frontend.partition.product_promotion') --}}

@include('frontend.partition.product_newarrival')


{{-- @include('frontend.partition.product_hotdeals') --}}

@include('frontend.partition.facility')

@endsection
