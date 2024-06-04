@props(['recents'])

<div class="sidebar-widget">
    <h3 class="sidebar-widget-title">Berita Terbaru</h3>
    <div class="pp-post-wrap">
        @forelse ($recents as $index => $recent)
            @php
                $dateParts = date_parse($recent->upload_date);
            @endphp
            <div class="news-card-one" style="{{ $index <= 6 ? "block" : "none" }}">
                <div class="news-card-img">
                    <img src="{{ asset('storage/' . $recent->photo) }}" style="object-fit: cover"
                        alt="Image" width="100%" height="80">
                </div>
                <div class="news-card-info">
                    <h3><a data-toggle="tooltip" data-placement="top"
                            title="{{ $recent->name }}"
                            href="{{ route('news.user', ['news' => $recent->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{!! Illuminate\Support\Str::limit(strip_tags($recent->name), 40, '...') !!}</a>
                    </h3>
                    <ul class="news-metainfo list-style">
                        <li><i class="fi fi-rr-calendar-minus"></i>
                            <a
                                href="javascript:void(0)">{{ \Carbon\Carbon::parse($recent->upload_date)->translatedFormat('d F Y') }}</a>
                        </li>

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24">
                            <path fill="#e93314" d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                        </svg>

                        </i>{{ $recent->views->count() }}</li>

                        </li>
                    </ul>
                </div>
            </div>
        @empty
        @endforelse

    </div>
</div>