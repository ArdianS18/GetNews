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
     * Handle store data event to models.
     *
     * @param StoreRequest $request
     *
     * @return array|bool
     */
    public function store(NewsRequest $request)
    {
        $data = $request->validated();

        $multi_photo = [];

            if ($request->hasFile('multi_photo')) {
                foreach ($request->file('multi_photo') as $image) {
                    $stored_image = $image->store(UploadDiskEnum::NEWS_PHOTO->value , 'public');
                    $multi_photo[] = $stored_image;
                }
            }

        $photo = $this->upload(UploadDiskEnum::NEWS->value, $request->file('photo'));

        return [
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'photo' => $photo,
            'multi_photo' => $multi_photo,
            'content' => $data['content'],
            'slug' => Str::slug($data['name']),
            'category_id' => $data['category_id'],
            'tags' => $data['tags'],
            'upload_date' => $data['upload_date'],
            'sub_category_id' => $data['sub_category_id'],
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return array|bool
     */

    public function update(NewsUpdateRequest $request, News $news, NewsPhoto $newsPhoto): array|bool
    {

        $data = $request->validated();

        $old_photo = $news->photo;
        $old_multi_photo = $newsPhoto->where('news_id', $news->id)->pluck('multi_photo')->toArray();
        $new_multi_photo = [];

        if ($request->hasFile('multi_photo')) {
            foreach ($request->file('multi_photo') as $image) {
                $this->remove($image);
                $stored_image = $image->store(UploadDiskEnum::NEWS_PHOTO->value , 'public');
                $new_multi_photo[] = $stored_image;
            }
        }

        if ($request->hasFile('photo')) {
            $this->remove($old_photo);
            $old_photo = $this->upload(UploadDiskEnum::NEWS->value, $request->file('photo'));
        }

        return [
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'photo' => $old_photo,
            'multi_photo' => $new_multi_photo ?: $old_multi_photo,
            'content' => $data['content'],
            'slug' => Str::slug($data['name']),
            'category_id' => $data['category_id'],
            'tags' => $data['tags'],
            'upload_date' => $data['upload_date'],
            'sub_category_id' => $data['sub_category_id'],
        ];
    }
}
