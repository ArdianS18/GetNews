<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TagInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
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

        if ($request->has('page')) {
            $tag = $this->tag->customPaginate($request, 10);
            $data['paginate'] = [
                'current_page' => $tag->currentPage(),
                'last_page' => $tag->lastPage(),
            ];
            $data['data'] = TagResource::collection($tag);
        } else {
            $tags = $this->tag->search($request);
            $data = TagResource::collection($tags);
        }
        return ResponseHelper::success($data);
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
        return ResponseHelper::success(null, trans('alert.add_success'));
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
        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        try {
            $this->tag->delete($tag->id);
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } catch (\Exception $e) {
            return ResponseHelper::error(trans('alert.delete_error'), 500);
        }
    }
}
