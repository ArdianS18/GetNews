@props(['categories'])

<div class="sidebar-widget kategori">
    <h3 class="sidebar-widget-title">Kategori</h3>
    <ul class="category-widget list-style">
        @foreach ($categories as $category)
            <li><a
                    href="{{ route('categories.show.user', ['category' => $category->slug]) }}"><img
                        src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                        alt="Image">{{ $category->name }}
                    <span>({{ $category->news_categories_count }})</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>