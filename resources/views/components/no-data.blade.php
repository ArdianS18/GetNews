<div class="d-flex justify-content-center">
    <div>
        <img src="{{ asset('assets/img/data-no.png') }}" width="300px" alt="">
    </div>
</div>
<div class="text-center">
    <h4>
        @if ($slot->isEmpty())
        Tidak ada artikel yang tersedia!!
        @else
            {{ $slot }}
        @endif
    </h4>
</div>
