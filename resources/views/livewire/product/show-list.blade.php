<div class="row col-sm-6 m-lg-5 m-2">
    @if($this->description)
    <div class="text-center">
        <h2>
            Description category
        </h2>
        {{$this->description}}
    </div>
    @endif
    <ul class="list-group">
        @foreach ($products as $product)
            <li class="list-group-item p-3"><p class="m-1">Title: {{ $product->title }}</p> <span class="m-1">Price: {{ $product->price }}</span></li>
        @endforeach
    </ul>
</div>
