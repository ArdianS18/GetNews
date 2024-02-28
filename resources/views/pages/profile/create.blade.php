@extends('layouts.user.app')

@section('content')

<head>
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <style>
        .news-card-a {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Menambahkan shadow dengan warna dan opasitas tertentu */
        border: 1px solid #ddd;
        padding: 20px; /* Memberi ruang di sekitar elemen */
        margin-bottom: 20px; /* Memberi jarak antara elemen berikutnya */
        border-radius: 10px; 
        }
        .card-dropzone{
        border: 3px dashed #ddd;
        padding: 30px; 
        margin-bottom: 20px;
        border-radius: 10px; 
        height: 250px;

        }
  </style>
</head>
    
<div class="container" style="margin-top: 3%;">

    <h2 class="text-center">Tambah Berita</h2>
        <div class="news-card-a mt-5">
            <div class="container" style="padding: 3%;">
                <form method="post" action="/profilecreatenews" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-between mt-2">
                    <div class="col-lg-6 col-md-12 from-outline">
                        <label class="form-label" for="nomor">Judul Berita</label>
                        <input type="text" id="name" name="name" placeholder="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                
                    <div class="col-lg-6 col-md-12 from-outline">
                        <label class="form-label" for="photo">Thumbnail Berita</label>
                        <input type="file" id="photo" name="photo" placeholder="photo" value="{{ old('photo') }}" class="mt-2 text-center form-control @error('photo') is-invalid @enderror">
                        @error('photo')
                        <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>

                    <div class="row justify-content-between mt-2">

                        <div class="col-lg-6 col-md-12 col-span-3 from-outline">
                            <label class="form-label" for="email">Sinopsis berita</label>
                            <textarea name="sinopsis" id="sinopsis" rows="7" value="{{ old('sinopsis') }}"></textarea>
                            @error('sinopsis')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> 
                    
                        <div class="col-lg-6 col-md-12 row-span-1 from-outline">

                            <div class="">
                                <label class="form-label" for="password_confirmation">Tags</label>
                                <input type="text" id="tags" name="tags" placeholder="tags" value="{{ old('tags') }}" class="form-control @error('tags') is-invalid @enderror">
                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="form-label" for="password_confirmation">Kategori</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id')}}" aria-label="Default select example">
                                    <option selected>pilih kategori</option>
                                    {{-- @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach --}}
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="form-label" for="password_confirmation">Tanggal Upload</label>
                                <input type="date" id="date" name="date" placeholder="date" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    
                    <div class="row justify-content-between mt-2">
                    
                        <div class="col-lg-6 col-md-12 col-span-2 from-outline" style="height: 200px;">
                            <label class="form-label" for="content">Content</label>
                            <textarea id="content" name="content" placeholder="content"
                            value="{{ old('content') }}"  class="form @error('content') is-invalid @enderror"></textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
            
                    
                        <div class="col-lg-6 col-md-12 row-span-1 from-outline">
                        
                            <div class="">
                                <label class="form-label" for="password_confirmation">Sub Kategori</label>
                                <select class="form-select @error('sub_category_id') is-invalid @enderror" name="sub_category_id" value="{{ old('sub_category_id')}}" aria-label="Default select example">
                                    <option selected>pilih sub kategori</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                                @error('sub_category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="form-label" for="password_confirmation">Multi Gambar (Optional)</label>
                                <div class="card-dropzone text-center items-center">
                                    <form class="form" action="#" method="post">
                                        <div class="form-group row">
                                           
                                            <div class="mt-4">
                                                <label class="col-form-label text-lg" style="color: #697A8D;">Drag and drop your image here</label>
                                                <div class="dropzone dropzone-queue mb-2" id="kt_dropzonejs_example_2">

                                                    <span class="form-text text-muted" style="color: #A1ACB8;">or</span>

                                                    <div class="">
                                                        <a class="btn btn-sm" style="background-color: #E7E7FF; padding-left: 1rem; padding-right: 1rem;"><span style="color: #696CFF;">Browse Image</span></a>
                                                    </div>
                                                    <div class="">
                                                        {{-- <a class="dropzone-upload btn btn-sm btn-light-primary me-2">Upload All</a>
                                                        <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove All</a> --}}
                                                    </div>

                                                    <div class="dropzone-items wm-200px">
                                                        <div class="dropzone-item" style="display:none">
                                                            <div class="dropzone-file">
                                                                <div class="dropzone-filename" title="some_image_file_name.jpg">
                                                                    <span data-dz-name>some_image_file_name.jpg</span>
                                                                    <strong>(<span data-dz-size>340kb</span>)</strong>
                                                                </div>

                                                                <div class="dropzone-error" data-dz-errormessage></div>
                                                            </div>

                                                            <div class="dropzone-progress">
                                                                <div class="progress">
                                                                    <div
                                                                        class="progress-bar bg-primary"
                                                                        role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="dropzone-toolbar">
                                                                <span class="dropzone-start"><i class="bi bi-play-fill fs-3"></i></span>
                                                                <span class="dropzone-cancel" data-dz-remove style="display: none;"><i class="bi bi-x fs-3"></i></span>
                                                                <span class="dropzone-delete" data-dz-remove><i class="bi bi-x fs-1"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>

                        </div>
                        
                        <div class="d-flex justify-content-between">


                            <button type="submit" class="btn btn-md text-black m-2" style="padding-left: 1rem; padding-right: 1rem; background-color: #C9C9C9;">
                                Kembali
                            </button>

                            <div class="">
                                
                                <button type="submit" class="btn btn-md text-black m-2 justify-content-end" style="padding-left: 1rem; padding-right: 1rem; background-color: #C9C9C9;">
                                        Ketentuan
                                </button>

                                <button type="submit" class="btn btn-md text-white m-2 justify-content-end" style="padding-left: 1rem; padding-right: 1rem; background-color: #0F4D8A;">
                                    Upload
                                </button>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            
                        </div>

                      

                    {{-- <div class="row"> --}}
                        {{-- <div class="d-flex justify-content-start mt-2"> --}}
                        

                       

                    {{-- </div> --}}

                 
                        
                </form>
            </div>
        </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/  .bundle.min.js" integnrity="sha384-pzjw8V+VbWFr6J3QKZZxCpZ8F+3t4zH1t03eNV6zEYl5S+XnvLx6D5IT00jM2JpL" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#content').summernote({
            height: 250,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });

</script>

<script src="assets/plugins/global/plugins.bundle.js"></script>
<script>
// set the dropzone container id
const id = "#kt_dropzonejs_example_2";
const dropzone = document.querySelector(id);

// set the preview element template
var previewNode = dropzone.querySelector(".dropzone-item");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);

var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
    url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    maxFilesize: 1, // Max filesize in MB
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: id + " .dropzone-items", // Define the container to display the previews
    clickable: id + " .dropzone-select" // Define the element that should be used as click trigger to select files.
});

myDropzone.on("addedfile", function (file) {
    // Hookup the start button
    file.previewElement.querySelector(id + " .dropzone-start").onclick = function () { myDropzone.enqueueFile(file); };
    const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
    dropzoneItems.forEach(dropzoneItem => {
        dropzoneItem.style.display = '';
    });
    dropzone.querySelector('.dropzone-upload').style.display = "inline-block";
    dropzone.querySelector('.dropzone-remove-all').style.display = "inline-block";
});

// Update the total progress bar
myDropzone.on("totaluploadprogress", function (progress) {
    const progressBars = dropzone.querySelectorAll('.progress-bar');
    progressBars.forEach(progressBar => {
        progressBar.style.width = progress + "%";
    });
});

myDropzone.on("sending", function (file) {
    // Show the total progress bar when upload starts
    const progressBars = dropzone.querySelectorAll('.progress-bar');
    progressBars.forEach(progressBar => {
        progressBar.style.opacity = "1";
    });
    // And disable the start button
    file.previewElement.querySelector(id + " .dropzone-start").setAttribute("disabled", "disabled");
});

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("complete", function (progress) {
    const progressBars = dropzone.querySelectorAll('.dz-complete');

    setTimeout(function () {
        progressBars.forEach(progressBar => {
            progressBar.querySelector('.progress-bar').style.opacity = "0";
            progressBar.querySelector('.progress').style.opacity = "0";
            progressBar.querySelector('.dropzone-start').style.opacity = "0";
        });
    }, 300);
});

// Setup the buttons for all transfers
dropzone.querySelector(".dropzone-upload").addEventListener('click', function () {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
});

// Setup the button for remove all files
dropzone.querySelector(".dropzone-remove-all").addEventListener('click', function () {
    dropzone.querySelector('.dropzone-upload').style.display = "none";
    dropzone.querySelector('.dropzone-remove-all').style.display = "none";
    myDropzone.removeAllFiles(true);
});

// On all files completed upload
myDropzone.on("queuecomplete", function (progress) {
    const uploadIcons = dropzone.querySelectorAll('.dropzone-upload');
    uploadIcons.forEach(uploadIcon => {
        uploadIcon.style.display = "none";
    });
});

// On all files removed
myDropzone.on("removedfile", function (file) {
    if (myDropzone.files.length < 1) {
        dropzone.querySelector('.dropzone-upload').style.display = "none";
        dropzone.querySelector('.dropzone-remove-all').style.display = "none";
    }
});
</script>

@endsection