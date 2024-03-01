<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\Dashboard\Article\UpdateRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\News;
use App\Models\NewsPhoto;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

use function Laravel\Prompts\multisearch;

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
     * Handle update data event to models.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return array|bool
     */

    public function update(NewsUpdateRequest $request, News $news): array|bool
    {

        $data = $request->validated();

        $old_photo = $news->photo;

        if ($request->hasFile('photo')) {
            $this->remove($old_photo);
            $old_photo = $this->upload(UploadDiskEnum::NEWS->value, $request->file('photo'));
        }

        return [
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'photo' => $old_photo,
            'content' => $data['content'],
            'slug' => Str::slug($data['name']),
            'sinopsis' => $data['sinopsis'],
            'category_id' => $data['category_id'],
            'tags' => $data['tags'],
            'upload_date' => $data['upload_date'],
            'sub_category_id' => $data['sub_category_id'],
        ];
    }
}
