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
                            <input type="text" id="squareText" class="form-control square" placeholder="Search">
                        </div>
                        <div class="col-4">
                            <div class="button d-flex justify-content-end">
                                <a wire:click="create()" class="btn btn-outline-primary">Add Letter</a>
                            </div>
                        </div>
                    </div>
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
                                <tr>
                                    <td class="text-bold-500">2023/PD3/TU/001</td>
                                    <td>Pengumuman</td>
                                    <td class="text-bold-500">Nota Dinas Hybrid</td>
                                    <td class="text-bold-500">2023-06-13 10.00</td>
                                    <td class="text-bold-500">
                                        <a href="#" class="btn icon btn-outline-info" data-toggle="tooltip" data-placement="bottom" title="View Letter"><i class="bi bi-info-circle"></i></a>
                                        <a wire:click="update()" class="btn icon btn-outline-warning" data-toggle="tooltip" data-placement="bottom" title="Update Letter"><i class="bi bi-pencil"></i></a>
                                        <a href="#" class="btn icon btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Letter"><i class="bi bi-x"></i></a>
                                    </td>
                                </tr>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-4">
                                        <label class="col-form-label" for="letter-number">Letter Number</label>
                                    </div>
                                    <div class="col-lg-4 col-8">
                                        <input type="text" id="letter-number" class="form-control" name="letter-number" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-4">
                                        <label class="col-form-label" for="category">Category</label>
                                    </div>
                                    <div class="col-lg-4 col-8">
                                        <select class="form-select" id="basicSelect">
                                            <option>IT</option>
                                            <option>Blade Runner</option>
                                            <option>Thor Ragnarok</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-4">
                                        <label class="col-form-label" for="title">Title</label>
                                    </div>
                                    <div class="col-lg-6 col-8">
                                        <input type="text" id="title" class="form-control" name="title" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-4">
                                        <label class="col-form-label" for="file">Letter File</label>
                                    </div>
                                    <div class="col-lg-6 col-8">
                                        <input class="form-control" type="file" id="file">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="buttons">
                                    <a wire:click="back()" class="btn btn-outline-primary">Back</a>
                                    <a href="#" class="btn btn-outline-success">Save</a>
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
