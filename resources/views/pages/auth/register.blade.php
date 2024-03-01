 <!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <title>Document</title>
 </head>
 
 <body>
     <div class="container" style="margin-top: 5%; overflow-y: auto;">
         <section>
             <div class="container-fluid h-custom">
                 <div class="row justify-content-center align-items-center">
                     <div class="col-lg-6 col-md-12 col-xl-4">
                        <img width="500px" src="assets/img/regis.png" alt="">
                     </div>
                     <div class="col-md-12 col-lg-6 offset-xl-1">
                         <form method="POST" action="{{ route('register') }}">
                            @csrf
                             <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <h2>Daftar Akun GetMedia.id</h2>
                             </div>


                             <div class="from-outline mt-2">
                                <label class="form-label" for="email">Nama Lengkap</label>
                                <input id="name" type="text" placeholder="Nama Lengkap" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                             <div class="row justify-content-between mt-2">
                                <div class="col-lg-6 col-md-12 from-outline mb-2">
                                    <label class="form-label" for="nomor">Nomor Hp</label>
                                    <input id="nomor" type="text" placeholder="Nomor Hp" class="gap-8 form-control form-control-lg @error('nomor') is-invalid @enderror" name="nomor" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            
                                    @error('nomor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                                <div class="col-lg-6 col-md-12 from-outline mb-2 padding-right-2">
                                    <label class="form-label" for="email">Email</label>
                                    <input id="email" type="email" placeholder="email" class="gap-8 form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-between mt-2">
                                <div class="col-lg-6 col-md-12 from-outline mb-2">
                                    <label class="form-label" for="password">Password</label>
                                    <input id="password" type="password" placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                            
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                                <div class="col-lg-6 col-md-12 from-outline mb-2">
                                    <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                                    <input id="password" type="password" placeholder="Password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password') }}" required autocomplete="password" autofocus>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="from-outline mt-2 mb-4">
                                <label class="form-label" for="email">Alamat</label>
                                <textarea name="alamat" id="alamat" placeholder="Masukan Alamat" cols="10" rows="5"  class="form-control form-control-lg @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus></textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                        
                             <div class="text-center mt-4 mb-4">
                                <button type="submit" class="btn btn-lg text-white" style="padding-left: 18rem; padding-right: 18rem; background-color: #0F4D8A;">
                                    Daftar
                                </button>
                            </div>     
 
                         </form>
                     </div>
                 </div>
             </div>
 
             <a href="#!" class="text-white me-4">
                 <i class="fab fa-facebook-f"></i>
             </a>
             <a href="#!" class="text-white me-4">
                 <i class="fab fa-twitter"></i>
             </a>
             <a href="#!" class="text-white me-4">
                 <i class="fab fa-google"></i>
             </a>
             <a href="#!" class="text-white">
                 <i class="fab fa-linkedin-in"></i>
             </a>
     </div>
     <!-- Right -->
     </div>
     </section>
     </div>
 </body>
 
 </html>