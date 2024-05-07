<div class="responsive-navbar offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="navbarOffcanvas">
    <div class="offcanvas-header">
        <a href="index.html" class="logo d-inline-block">
            <img class="logo-light" src="{{asset('assets/img/logo-getmedia-dark.svg')}}" alt="logo" />
            <img class="logo-dark" src="assets/img/logo-get-media.png" alt="logo" />
        </a>

        
        <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="ri-close-line"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion" id="navbarAccordion">
            @foreach ($categories as $category)
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{$loop->index}}" aria-expanded="false" aria-controls="collapse{{$loop->index}}">{{$categories[$loop->index]->name}}</button>
                        <div id="collapse{{$loop->index}}" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion{{$loop->index}}">
                            <div class="accordion-body">
                                <div class="accordion" id="navbarAccordion{{$loop->index}}">
                                    @forelse ($categories[$loop->index]->subCategories as $subCategory)
                                        <div class="accordion-item">
                                            <a href="{{ route('subcategories.show.user', ['category' => $subCategory->category->slug,'subCategory' => $subCategory->slug]) }}" class="accordion-link">
                                                {{ $subCategory->name }}</a>
                                        </div>
                                    @empty
                                        <div class="accordion-item">
                                            <a href="{{ route('categories.show.user', ['category' => $category->slug]) }}" class="accordion-link">{{ $category->name }}</a>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
        <div class="offcanvas-contact-info">
            {{-- <div class="others-option d-flex d-lg-none align-items-center"> --}}
                <div class="option-item">
                    <a href="login.html" class="btn-two">Sign In</a>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
