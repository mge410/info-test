<div wire:ignore class="col-sm-4 flex-shrink-0 p-3 bg-white"
     style="width: 280px;">
        <span class="fs-5 fw-semibold">Categories</span>
    <ul class="list-unstyled ps-0">
        @foreach($categories as $category)
            <li class="mb-1">
                <button wire:click.defer="loadProducts({{ $category->id }})" class="btn btn-toggle align-items-center rounded collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#{{ $category->id }}-collapse"
                        aria-expanded="false">
                    Category {{ $category->title }}
                    ({{ $category->subcategory_count }})
                </button>
                <span></span>
                <div class="collapse"
                     id="{{ $category->id }}-collapse" style="">
                    <ul class="btn-toggle-nav list-group list-unstyled fw-normal pb-1 small">
                        @foreach($category->subcategory as $subcategory)
                            <li class="list-group-item" wire:click="loadProducts({{ $subcategory->id }})">
                                <a href="#">{{ $subcategory->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>
