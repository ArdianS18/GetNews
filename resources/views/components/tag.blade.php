@props(['tags'])

<div class="sidebar-widget">
    <h3 class="sidebar-widget-title">Popular Tags</h3>
    <ul class="tag-list list-style">
        @forelse ($tags as $tag)
            <li><a data-toggle="tooltip" class="tag-stye-2" data-placement="top"
                    title="{{ $tag->name }}"
                    href="{{ route('tag.show.user', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
            </li>
        @empty
        @endforelse
    </ul>
</div>