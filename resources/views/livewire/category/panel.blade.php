<div class="col-sm-4 flex-shrink-0 p-3 bg-white"
     style="width: 280px;">
        <span class="fs-5 fw-semibold">Categories <span class="pt-3"><livewire:category.store :categoriesParents="$categoriesParents" /></span></span>
    <ul class="list-unstyled ps-0">
        <div class="d-inline">
            @foreach($categoriesParents as $category)
                <li class="mb-1">
                    <div class="row align-items-center">
                        <button wire:click.defer="loadProducts({{ $category->id }})" class="btn btn-toggle align-items-center rounded collapsed col-6"
                                data-bs-toggle="collapse"
                                data-bs-target="#{{ $category->id }}-collapse"
                                aria-expanded="false">
                            {{ $category->title }}
                            ({{ $category->subcategory_count }})
                        </button>
                        <div class="col-5">
                            <div class="d-inline">
                                <livewire:category.edit :category="$category" :categoriesParents="$categoriesParents" :wire:key="'edit-'.$category->id"/>
                            </div>
                            <div class="d-inline">
                                <livewire:category.destroy :category="$category" :wire:key="'delete-'.$category->id"/>
                            </div>
                        </div>
                    </div>
                    <div wire:ignore.self class="collapse"
                         id="{{ $category->id }}-collapse" style="">
                        <ul class="btn-toggle-nav list-group list-unstyled fw-normal pb-1 small">
                            @foreach($category->subcategory as $subcategory)
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <button class="d-inline link col-6 btn btn-toggle" wire:click.defer="loadProducts({{ $subcategory->id }})">{{ $subcategory->title }}</button>
                                        <div class="col-5">
                                            <div class="d-inline">
                                                <livewire:category.edit :category="$subcategory" :categoriesParents="$categoriesParents" :wire:key="'edit-'.$subcategory->id"/>
                                            </div>
                                            <div class="d-inline">
                                                <livewire:category.destroy :category="$subcategory" :wire:key="'delete-'.$subcategory->id"/>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        </div>
    </ul>
</div >
