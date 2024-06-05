@props(['populars'])

<div class="sidebar-widget populer">
    <h3 class="sidebar-widget-title">Berita Popular</h3>
    <div class="pp-post-wrap">
        @forelse ($populars as $popular)
            @if ($popular->news)
                @php
                    $dateParts = date_parse($popular->news->upload_date);
                @endphp
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{ asset('storage/' . $popular->news->photo) }}" alt="Image" width="100%"
                            style="object-fit: cover;" height="80">
                    </div>
                    <div class="news-card-info">
                        <h3><a
                                href="{{ route('news.user', ['news' => $popular->news->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{!! Illuminate\Support\Str::limit($popular->news->name, $limit = 40, $end = '...') !!}</a>
                        </h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                    href="javascript:void(0)">{{ \Carbon\Carbon::parse($popular->news->upload_date)->translatedFormat('d F Y') }}</a>
                            </li>

                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-1" width="21" height="21" viewBox="0 0 24 24">
                                <path fill="#e93314" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"></path>
                            </svg>

                            </i><a href="javascript:void(0)">{{ $popular->total }}</a></li>

                            </li>
                        </ul>
                    </div>
                </div>
            @else
                @php
                    $dateParts = date_parse($popular->upload_date);
                @endphp
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{ asset('storage/' . $popular->photo) }}" alt="Image" width="100%"
                            style="object-fit: cover;" height="80">
                    </div>
                    <div class="news-card-info">
                        <h3><a
                                href="{{ route('news.user', ['news' => $popular->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{!! Illuminate\Support\Str::limit($popular->name, $limit = 40, $end = '...') !!}</a>
                        </h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                    href="javascript:void(0)">{{ \Carbon\Carbon::parse($popular->upload_date)->translatedFormat('d F Y') }}</a>
                            </li>

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="#e93314"
                                    d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                            </svg>

                            </i><a href="javascript:void(0)">{{ $popular->views_count }}</a></li>

                            </li>
                        </ul>
                    </div>
                </div>
            @endif

        @empty
            <x-no-data />
        @endforelse
    </div>
</div>
