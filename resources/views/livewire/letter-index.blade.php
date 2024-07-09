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
                        <h3>Letter Page</h3>
                        <p class="text-subtitle text-muted">
                            The following are letters that have been published and archived.<br>
                            Click "View" in the action column to display the letter</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Letter Archive</li>
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
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" wire:model="search" id="squareText" class="form-control square" placeholder="Search">
                                    </div>
                                    <div class="col-6">
                                        <a wire:click="back()" class="btn btn-outline-info">Search</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="button d-flex justify-content-end">
                                    <a wire:click="tambah()" class="btn btn-outline-primary">Add Letter</a>
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
                                        <th>Letter Number</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Archived Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($letters as $letter)
                                    <tr>
                                        <td class="text-bold-500">{{ $letter->number}}</td>
                                        <td>{{$letter->category->name}}</td>
                                        <td class="text-bold-500">{{$letter->title}}</td>
                                        <td class="text-bold-500">{{$letter->created_at}}</td>
                                        <td class="text-bold-500">
                                            <a wire:click="detail({{$letter->id}})" class="btn icon btn-outline-info" data-toggle="tooltip" data-placement="bottom" title="View Letter"><i class="bi bi-info-circle"></i></a>
                                            <a wire:click="ubah({{$letter->id}})" class="btn icon btn-outline-warning" data-toggle="tooltip" data-placement="bottom" title="Update Letter"><i class="bi bi-pencil"></i></a>
                                            <a wire:click="destroy({{$letter->id}})" wire:confirm="Are you sure?" class="btn icon btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Letter"><i class="bi bi-x"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" align="center">Data Not found!</td>
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
    @if ($isCreate)
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Create Letter</h3>
                        <p class="text-subtitle text-muted">Upload the published letter to this form to be archived.<br>Notes : <ul><li>Use .pdf format.</li></ul></p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="letters">Letter Archive</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create Letter</li>
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
                                            <label class="col-form-label" for="letter-number">Letter Number</label>
                                        </div>
                                        <div class="col-lg-4 col-8">
                                            <input type="text" wire:model="number" id="letter-number" class="form-control" name="letter-number" placeholder="">
                                            @error('number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-4">
                                            <label class="col-form-label" for="category">Category</label>
                                        </div>
                                        <div class="col-lg-4 col-8">
                                            <select wire:model="selectedCategory" class="form-select" id="basicSelect">
                                                <option value="">Select a category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('selectedCategory')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-4">
                                            <label class="col-form-label" for="title">Title</label>
                                        </div>
                                        <div class="col-lg-6 col-8">
                                            <input type="text" wire:model="title" id="title" class="form-control" name="title" placeholder="">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-4">
                                            <label class="col-form-label" for="file">Letter File</label>
                                        </div>
                                        <div class="col-lg-6 col-8">
                                            <input wire:model="file" class="form-control" type="file" id="file" name="file">
                                            @error('file')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <div class="buttons">
                                        <a wire:click="back()" class="btn btn-outline-primary">Back</a>
                                        {{-- <a href="#" class="btn btn-outline-success">Save</a> --}}
                                        <button class=" submit btn btn-outline-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
    @if($isDetail)
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Detail Lettter</h3>
                        <p class="text-subtitle text-muted">Page to display detailed letter information</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="letters">Letter Archive</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Letter</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Letter Information</h5>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><strong>Number</strong></td>
                                        <td>{{$number}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Category</strong></td>
                                        <td>{{$selectedCategory}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Title</strong></td>
                                        <td>{{$title}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Archived Date and Time</strong></td>
                                        <td>{{$create}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Update Date and Time</strong></td>
                                        <td>{{$update}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <p><strong>File</strong></p>
                            <iframe src="/storage/{{$file}}" style="width:100%; height:700px;" frameborder="0"></iframe>
                            <div class="row">
                                <div class="col-12">
                                    <div class="buttons">
                                        <a wire:click="back()" class="btn btn-outline-primary">Back</a>
                                        <a wire:click="download()" class="btn btn-outline-success">Download</a>
                                    </div>
                                </div>
                            </div>
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
                        <h3>Update Lettter</h3>
                        <p class="text-subtitle text-muted">Page to update letter information</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="letters">Letter Archive</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Letter</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit.prevent="updatestore({{$id}})">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-4">
                                            <label class="col-form-label" for="letter-number">Letter Number</label>
                                        </div>
                                        <div class="col-lg-4 col-8">
                                            <input type="text" wire:model="number" id="letter-number" class="form-control" name="letter-number" placeholder="">
                                            @error('number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-4">
                                            <label class="col-form-label" for="category">Category</label>
                                        </div>
                                        <div class="col-lg-4 col-8">
                                            <select wire:model="selectedCategory" class="form-select" id="basicSelect">
                                                <option value="">Select a category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('selectedCategory')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-4">
                                            <label class="col-form-label" for="title">Title</label>
                                        </div>
                                        <div class="col-lg-6 col-8">
                                            <input type="text" wire:model="title" id="title" class="form-control" name="title" placeholder="">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-4">
                                            <label class="col-form-label" for="file">Letter File</label>
                                        </div>
                                        <div class="col-lg-6 col-8">
                                            <input wire:model="file" class="form-control" type="file" id="file" name="file">
                                            @error('file')
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
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
</div>
