@extends('layouts.user.app')
@section('content')
    <div class="d-flex justify-content-center">
        <img src="{{ asset('faq.svg') }}" width="500px" alt="" srcset="">
    </div>
    <div class="text-center">
        <h3>
            Pertanyaan yang sering diajukan
        </h3>
        <p>
            Temukan pertanyaanmu
        </p>
    </div>
    <div class="accordion" id="accordionExample">
        @foreach ($faqs as $faq)
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button {{ $faq->id != $faqs[0]->id ? "collapsed" : "" }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq->id }}" aria-expanded="true" aria-controls="collapseOne">
              {{ $faq->question }}
            </button>
          </h2>
          <div id="collapse-{{ $faq->id }}" class="accordion-collapse collapse {{ $faq->id != $faqs[0]->id ? "" : "show" }} " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                {{ $faq->answer }}
            </div>
          </div>
        </div>
        @endforeach
      </div>
@endsection