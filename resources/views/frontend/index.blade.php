@extends('frontend.layouts.master')
@section('sidebar')
    @include('frontend.layouts.inc.side-navbar')
@endsection

@section('featured-product')
    <div id="vueApp">
        <h2 v-text='massege'></h2>
    </div>
@endsection

