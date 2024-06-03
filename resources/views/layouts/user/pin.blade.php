<ul class="dropdown-menu"
aria-labelledby="dropdownMenuLink">
@if (Auth::check() && $comment->user_id === auth()->user()->id)
    @if ($comment->news->user_id === auth()->user()->id)
        <li>
            <button class="btn btn-sm pin"
                data-id="{{ $comment->id }}">
                Pin
            </button>
        </li>
    @endif
    <li>
        <button class="btn btn-sm edit-btn"
            onclick="showEditForm({{ $comment->id }})">
            Edit
        </button>
    </li>
    <li>
        <button class="btn btn-sm delete"
            data-id="{{ $comment->id }}">
            Hapus
        </button>
    </li>
@elseif (Auth::check() &&
        $comment->news->user_id === (auth()->user()->roles->pluck('name')[0] == 'author') &&
        $comment->user_id != auth()->user()->author->user_id)
    @if ($comment->news->user_id === auth()->user()->id)
        <li>
            <button class="btn btn-sm pin"
                data-id="{{ $comment->id }}">
                Pin
            </button>
        </li>
    @endif
    <li>
        <button class="btn btn-sm edit-btn"
            onclick="showEditForm({{ $comment->id }})">
            Edit
        </button>
    </li>
    <li>
        <button class="btn btn-sm delete"
            data-id="{{ $comment->id }}">
            Hapus
        </button>
    </li>
@elseif (Auth::check() && $comment->news->user_id === auth()->user()->id)
    <li>
        <button class="btn btn-sm pin"
            data-id="{{ $comment->id }}">
            Pin
        </button>
    </li>
    <li>
        <button class="btn btn-sm edit-btn"
            onclick="showEditForm({{ $comment->id }})">
            Edit
        </button>
    </li>
    <li>
        <button class="btn btn-sm delete"
            data-id="{{ $comment->id }}">
            Hapus
        </button>
    </li>
@endif

@if (Auth::check() && $comment->user_id != auth()->user()->id)
    <li>
        <button class="btn btn-sm report-icon"
            data-id="{{ $comment->id }}">
            Laporkan
        </button>
    </li>
@endif
</ul>