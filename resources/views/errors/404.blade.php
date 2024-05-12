@extends('layouts.user.app')
@section('content')
<div class="error-wrap ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="error-content">
                    <img src="assets/img/404.webp" alt="Iamge" />
                    <h2>Oops! Page Not Found</h2>
                    <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                    <a href="index.html" class="btn-one">Back To Home<i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection