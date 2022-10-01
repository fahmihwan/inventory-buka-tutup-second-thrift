@extends('component.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('container')
    <div class="page-title">
        <div class="row pb-3">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Insert Issuing Transction </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supplier </li>
                        <li class="breadcrumb-item active" aria-current="page">create </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <form action="" class="form form-vertical">
            <div class="row match-height">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Form Customer</h4>
                            <a href="/transaction/issuing" class=" me-1 mb-1">
                                <i class="fa-solid fa-arrow-left"></i>
                                Kembali</a>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="valid-state">nama</label>
                                                <input type="text" class="form-control " id="valid-state"
                                                    placeholder="Valid" value="" required>
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    This is valid state.
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="valid-state">Alamat</label>
                                                <input type="text" class="form-control " id="valid-state"
                                                    placeholder="Valid" value="" required>
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    This is valid state.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header pb-0 mb-0">
                            <h4 class="card-title">Cart</h4>
                        </div>
                        <div class="card-body mt-0 pt-0">
                            <!-- Table with no outer spacing -->
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Brand</th>
                                            <th>Kategori </th>
                                            <th>Qty</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="">1</td>
                                            <td>$15/hr</td>
                                            <td>$15/hr</td>
                                            <td>Qty</td>
                                            <td class="text-bold-500">UI/UX</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row match-height">
                <div class="col-md-5 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Form Customer</h4>
                            <a href="/transaction/issuing" class=" me-1 mb-1">
                                <i class="fa-solid fa-arrow-left"></i>
                                Kembali</a>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="valid-state">nama</label>
                                                <input type="text" class="form-control " id="valid-state"
                                                    placeholder="Valid" value="" required>
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    This is valid state.
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="valid-state">Alamat</label>
                                                <input type="text" class="form-control " id="valid-state"
                                                    placeholder="Valid" value="" required>
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    This is valid state.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </section>
@endsection


@section('script')
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
@endsection
