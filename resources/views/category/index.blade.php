@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <p class="text-center display-5">Category list</p>
    </div>
    <div class="row">
        @livewire('category.panel')
        @livewire('product.show-list')
    </div>
</div>
@endsection
