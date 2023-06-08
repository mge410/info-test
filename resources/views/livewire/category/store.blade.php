<div class="d-inline">
    <i class="bi link bi-plus-lg text-success m-1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
    <!-- Button trigger modal -->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="flash-message">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="modal-content">
                <h2 class="text-center mt-2">Create category</h2>
                <form class="m-5" wire:submit.prevent='store' method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Category title</label>
                        <input wire:model.defer="title" name="title" type="text" class="form-control" id="title" placeholder="category title">
                    </div>
                    @error('title')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Patent category</label>
                        <select wire:model.defer="parent_id" name="parent_id" class="create-choice form-control" id="parent_id">
                            <option value="">No parent</option>
                            @foreach($categoriesParents as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea wire:model.defer="description" name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    @error('description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row justify-content-center">
                        <button class="col-3 btn btn-primary m-3 text-center">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
