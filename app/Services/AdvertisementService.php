<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Enums\UploadDiskEnum;
use App\Helpers\ImageCompressing;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\Dashboard\Article\UpdateRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementPhoto;
use App\Models\News;
use App\Models\NewsPhoto;
use App\Models\Tag;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

use function Laravel\Prompts\multisearch;

class AdvertisementService implements ShouldHandleFileUpload, CustomUploadValidation
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
    public function store(AdvertisementRequest $request)
    {
        $data = $request->validated();
        $image = $this->upload(UploadDiskEnum::NEWS->value, $request->file('photo'));
        $image = $this->upload(UploadDiskEnum::ADVERTISEMENT->value, $request->file('photo'));
        // $image = ImageCompressing::process( $request->file('photo'), UploadDiskEnum::ADVERTISEMENT->value);

        return [
            'user_id' => auth()->user()->id,
            'type' => $data['type'],
            'photo' => $image,
            'page' => $data['page'],
            'position' => $data['position'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'url' => $data['url'],
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return array|bool
     */

    public function update(AdvertisementRequest $request, Advertisement $advertisement, AdvertisementPhoto $advertisementPhoto): array|bool
    {
        $data = $request->validated();

        $old_photo = $advertisement->photo;
        $new_photo= "";

        $old_multi_photo = $advertisementPhoto->where('advertisement_id', $advertisement->id)->pluck('multi_photo')->toArray();
        $new_multi_photo = [];

        if ($request->hasFile('multi_photo')) {
            foreach ($request->file('multi_photo') as $image) {
                $this->remove($image);
                $stored_image = $image->store(UploadDiskEnum::ADVERTISEMENT_PHOTO->value , 'public');
                $new_multi_photo[] = $stored_image;
            }
        }


        if ($request->hasFile('photo')) {
            $this->remove($old_photo);
            $new_photo = $this->upload(UploadDiskEnum::ADVERTISEMENT->value, $request->file('photo'));
        }


        $id = "";
        if (auth()->user()->roles->pluck('name')->contains("admin")) {
            $id = $advertisement->user_id;
        } else {
            $id = auth()->user()->id;
        }

        return [
            'user_id' => $id,
            'type' => $data['type'],
            'photo' => $image,
            'page' => $data['page'],
            'position' => $data['position'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'url' => $data['url'],
        ];
    }

    // public function updateByAdmin(NewsUpdateRequest $request, News $news, NewsPhoto $newsPhoto): array|bool
    // {
    //     $data = $request->validated();

    //     if ($request->has('tags')) {
    //         $newTags = [];
    //         foreach ($request->input('tags') as $tagName) {
    //             $tag = Tag::updateOrCreate(
    //                 ['name' => $tagName],
    //                 ['slug' => Str::slug($tagName)]
    //             );
    //             $newTags[] = $tag->id;
    //         }

    //         $data['tags'] = $newTags;
    //     }

    //     $old_photo = $news->photo;
    //     $new_photo= "";

    //     $old_multi_photo = $newsPhoto->where('news_id', $news->id)->pluck('multi_photo')->toArray();
    //     $new_multi_photo = [];

    //     if ($request->hasFile('multi_photo')) {
    //         foreach ($request->file('multi_photo') as $image) {
    //             $this->remove($image);
    //             $stored_image = $image->store(UploadDiskEnum::NEWS_PHOTO->value , 'public');
    //             $new_multi_photo[] = $stored_image;
    //         }
    //     }

    //     if ($request->hasFile('photo')) {
    //         $this->remove($old_photo);
    //         $new_photo = $this->upload(UploadDiskEnum::NEWS->value, $request->file('photo'));
    //     }

    //     return [
    //         'author_id' => $news->author->id,
    //         'name' => $data['name'],
    //         'photo' => $old_photo ?: $new_photo,
    //         'multi_photo' => $new_multi_photo ?: $old_multi_photo,
    //         'content' => $data['content'],
    //         'slug' => Str::slug($data['name']),
    //         'category' => $data['category'],
    //         'tags' => $data['tags'],
    //         'upload_date' => $data['upload_date'],
    //         'sub_category' => $data['sub_category'],
    //     ];
    // }
}
