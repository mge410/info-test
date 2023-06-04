<div wire:ignore class="col-sm-4 flex-shrink-0 p-3 bg-white"
     style="width: 280px;">
        <span class="fs-5 fw-semibold">Categories</span>
    <ul class="list-unstyled ps-0">
        @foreach($categories as $category)
            <li class="mb-1">
                <div class="row align-items-center">
                    <button wire:click.defer="loadProducts({{ $category->id }})" class="btn btn-toggle align-items-center rounded collapsed col-6"
                            data-bs-toggle="collapse"
                            data-bs-target="#{{ $category->id }}-collapse"
                            aria-expanded="false">
                        Category {{ $category->title }}
                        ({{ $category->subcategory_count }})
                    </button>
                    <div class="col-5">
                        <i class="bi link   bi-plus-lg text-success m-1"></i>
                        <i class="bi link   bi-pencil-fill text-primary m-1"></i>
                        <i class="bi link   bi-trash-fill text-danger m-1"></i>
                    </div>
                </div>
                <div class="collapse"
                     id="{{ $category->id }}-collapse" style="">
                    <ul class="btn-toggle-nav list-group list-unstyled fw-normal pb-1 small">
                        @foreach($category->subcategory as $subcategory)
                            <li class="list-group-item" wire:click="loadProducts({{ $subcategory->id }})">
                                <div class="row align-items-center">
                                    <a class="d-block col-6" href="#">{{ $subcategory->title }}</a>
                                    <div class="col-5">
                                        <i class="bi link bi-plus-lg text-secondary m-1"></i>
                                        <i class="bi link bi-pencil-fill text-secondary m-1"></i>
                                        <i class="bi link bi-trash-fill text-secondary m-1"></i>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>
