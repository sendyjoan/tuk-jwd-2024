<div>
    @if($home)
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Category Page</h3>
                    <p class="text-subtitle text-muted">The following are categories that can be used to label letters.<br>
                        Click "Add Data" to add new data.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="button">
                                <a href="{{route('dashboard')}}" class="btn btn-outline-info">Back</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <input type="text" wire:model.debounce.300ms="search" id="squareText" class="form-control square" placeholder="Search">
                        </div>
                        <div class="col-4">
                            <div class="button d-flex justify-content-end">
                                <a wire:click="create()" class="btn btn-outline-primary">Add Category</a>
                            </div>
                        </div>
                    </div>
                    @if (session()->has('success'))
                        <br>
                        <div class="alert alert-success alert-dismissible show fade">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>ID Category</th>
                                    <th>Name Category</th>
                                    <th>Description Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr>
                                    <td class="text-bold-500">{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td class="text-bold-500">{{$category->description}}</td>
                                    <td class="text-bold-500">
                                        {{-- <a href="#" class="btn icon btn-outline-info" data-toggle="tooltip" data-placement="bottom" title="Detail Category"><i class="bi bi-info-circle"></i></a> --}}
                                        <a wire:click="edit({{$category->id}})" class="btn icon btn-outline-warning" data-toggle="tooltip" data-placement="bottom" title="Update Category"><i class="bi bi-pencil"></i></a>
                                        <a wire:click="destroy({{$category->id}})" wire:confirm="Are you sure?" class="btn icon btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Category"><i class="bi bi-x"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" align="center">Data Not found!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endif
    @if($isCreate)
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Create Category</h3>
                    <p class="text-subtitle text-muted">Page for adding mail category data.<br>
                        When finished, don't forget to click the "Save" button.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="categories">Category</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-4">
                                        <label class="col-form-label" for="category-name">Category Name</label>
                                    </div>
                                    <div class="col-lg-4 col-8">
                                        <input type="text" id="category-name" wire:model="name" class="form-control" name="cname" placeholder="Category Name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-4">
                                        <label class="col-form-label" for="description">Description</label>
                                    </div>
                                    <div class="col-lg-10 col-8">
                                        <textarea class="form-control" wire:model="description" id="exampleFormControlTextarea1" rows="5"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="buttons">
                                    <a wire:click="back()" class="btn btn-outline-primary">Back</a>
                                    <button class="submit btn btn-outline-success">Save</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endif
    @if($isUpdate)
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Update Category</h3>
                    <p class="text-subtitle text-muted">Page for changing mail category data.<br>
                        When finished, don't forget to click the "Save" button.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="categories">Category</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit.prevent="update()">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-4">
                                        <label class="col-form-label" for="category-name">Category Name</label>
                                    </div>
                                    <div class="col-lg-4 col-8">
                                        <input type="text" wire:model="name" id="category-name" class="form-control" name="cname">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-4">
                                        <label class="col-form-label" for="category-name">Description</label>
                                    </div>
                                    <div class="col-lg-10 col-8">
                                        <textarea class="form-control" wire:model="description" id="exampleFormControlTextarea1" rows="5"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="buttons">
                                    <a wire:click="back()" class="btn btn-outline-primary">Back</a>
                                    <button class="submit btn btn-outline-success">Save</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endif
</div>
