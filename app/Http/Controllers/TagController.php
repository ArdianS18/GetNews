<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TagInterface;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private TagInterface $tag;
    private TagService $tagService;

    public function __construct(TagInterface $tag, TagService $tagService)
    {
        $this->tag = $tag;
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Tag $tag)
    {
        $request->merge([
            'name' => $tag->id,
        ]);

        $query = $request->input('search');
        $searchTerm = $request->input('search', '');
        $tags = $query ? $this->tag->search($query) : $this->tag->paginate();
        $tags->appends(['search' => $searchTerm]);

        return view('pages.admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $data = $this->tagService->store($request);
        $this->tag->store($data);
        return back()->with('success', 'berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $data = $this->tagService->update($request);
        $this->tag->update($tag->id, $data);
        return back()->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $this->tag->delete($tag->id);
        return back();
    }
}
