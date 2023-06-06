<div class="d-inline">
    <i class="bi link bi-pencil-fill text-primary m-1" type="button"
       data-bs-toggle="modal"
       data-bs-target="#exampleModalEdit-{{$this->formId}}"></i>
    <!-- Button trigger modal -->
    <div wire:ignore.self class="modal fade bd-example-modal-lg"
         id="exampleModalEdit-{{$this->formId}}" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="flash-message">
                @if (session()->has('edit'))
                    <div class="alert alert-success">
                        {{ session('edit') }}
                    </div>
                @endif
            </div>
            <div class="modal-content">
                <h2 class="text-center mt-2">Edit category</h2>
                <form class="m-5" wire:submit.prevent='edit' method="POST"
                      id="UpdateForm-{{ $this->formId }}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Category
                            title</label>
                        <input value="{{$this->title}}" wire:model.defer="title"
                               name="title" type="text" class="form-control"
                               id="title" placeholder="category title">
                    </div>
                    @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group">
                        @if($this->countSubcategory == 0)
                            <label for="exampleFormControlSelect1">Patent
                                category</label>
                            <select wire:model="parent_id" name="parent_id"
                                    class="form-control" id="parent_id">
                                <option value="">No parent</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" @if($this->parent_id == $category->id) {{'selected'}} @endif >{{ $category->title }}</option>
                                @endforeach
                            </select>
                        @else
                            <div class="text-center text-danger-emphasis m-1">
                                Can't change parent while category has subcategories
                            </div>
                            <label for="exampleFormControlSelect1">Patent
                                category</label>
                            <select disabled wire:model="parent_id" name="parent_id"
                                    class="form-control" id="parent_id">
                                <option value="">No parent</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" @if($this->parent_id == $category->id) {{'selected'}} @endif >{{ $category->title }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="form-group">
                        <label
                            for="exampleFormControlTextarea1">Description</label>
                        <textarea wire:model.defer="description"
                                  name="description" class="form-control"
                                  id="description" rows="3">value="{{$this->description}}"</textarea>
                    </div>
                    @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="row justify-content-center">
                        <button class="col-3 btn btn-primary m-3 text-center">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
