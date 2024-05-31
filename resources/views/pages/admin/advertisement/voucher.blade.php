@extends('layouts.admin.app')

@section('style')
<style>
    .gradient-border {
        border-width: 3px;
        border-style: solid;
        border-image: linear-gradient(to right, #DD1818, #175A95) 1;
        border-radius: 15px;
    }
</style>
@endsection
@section('content')

<form class="d-flex gap-2">
    <div class="position-relative">
        <div class="">
            <input type="text" name="search" class="form-control search-chat py-2 px-5 ps-5" id="search-name"
                placeholder="Search">
            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
        </div>
    </div>

    <div class="d-flex gap-2">
        <select name="banned" class="form-select" id="search-status">
            <option value="">Pilih status</option>
            <option value="approved">Aktif</option>
            <option value="reject">Blokir</option>
            <option value="">Tampilkan semua</option>
        </select>
    </div>
</form>

<div class="">
    <div class="row mt-4">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    

                    </div>
                   
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>
                            
                        </div>
                    </div>
                        
                    <div class="text-center">
                        
                        <div class="mb-3 mt-4 gradient-border"></div>
                        <p>45 Terpakai dari 100 stok</p>
                    </div> 

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>
                          
                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>         
                    </div> 
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    

                    </div>
                   
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>
                            
                        </div>
                    </div>
                        
                    <div class="text-center">
                        
                        <div class="mb-3 mt-4 gradient-border"></div>
                        <p>45 Terpakai dari 100 stok</p>
                    </div> 

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>
                          
                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>         
                    </div> 
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    

                    </div>
                   
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>
                            
                        </div>
                    </div>
                        
                    <div class="text-center">
                        
                        <div class="mb-3 mt-4 gradient-border"></div>
                        <p>45 Terpakai dari 100 stok</p>
                    </div> 

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>
                          
                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>         
                    </div> 
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    

                    </div>
                   
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>
                            
                        </div>
                    </div>
                        
                    <div class="text-center">
                        
                        <div class="mb-3 mt-4 gradient-border"></div>
                        <p>45 Terpakai dari 100 stok</p>
                    </div> 

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>
                          
                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>         
                    </div> 
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    

                    </div>
                   
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>
                            
                        </div>
                    </div>
                        
                    <div class="text-center">
                        
                        <div class="mb-3 mt-4 gradient-border"></div>
                        <p>45 Terpakai dari 100 stok</p>
                    </div> 

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>
                          
                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>         
                    </div> 
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    

                    </div>
                   
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>
                            
                        </div>
                    </div>
                        
                    <div class="text-center">
                        
                        <div class="mb-3 mt-4 gradient-border"></div>
                        <p>45 Terpakai dari 100 stok</p>
                    </div> 

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>
                          
                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>         
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>


</div>

@endsection