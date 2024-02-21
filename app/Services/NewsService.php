<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\Dashboard\Article\UpdateRequest;
use App\Http\Requests\NewsRequest;
use App\Traits\UploadTrait;

class NewsService implements ShouldHandleFileUpload, CustomUploadValidation
{
    use UploadTrait;

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreRequest $request
     *
     * @return array|bool
     */
    public function store(NewsRequest $request): array|bool
    {
        $data = $request->validated();

        return [
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'photo' => $this->upload(UploadDiskEnum::NEWS->value, $request->file('photo')),
            'content' => $data['content'],
            'sinopsis' => $data['sinopsis'],
            'sub_category_id' => $data['sub_category_id'],
            'status' => $data['status']
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return array|bool
     */

    // public function update(UpdateRequest $request, Article $article): array|bool
    // {
    //     $data = $request->validated();

    //     $old_photo = $article->photo;

    //     if ($request->hasFile('photo')) {
    //         $this->remove($old_photo);
    //         $old_photo = $this->upload(UploadDiskEnum::ARTICLES->value, $request->file('photo'));
    //     }

    //     return [
    //         'article_category_id' => $data['article_category_id'],
    //         'title' => $data['title'],
    //         'description' => $data['description'],
    //         'photo' => $old_photo,
    //         'content' => $data['content'],
    //         'tags' => str_replace(', ', ',', $data['tags']),
    //         'status' => $data['status'],
    //         'user_id' => auth()->id()
    //     ];
    // }
}
