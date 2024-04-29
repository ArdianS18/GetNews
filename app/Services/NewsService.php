<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\News;
use App\Models\NewsTag;
use App\Models\NewsPhoto;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enums\UploadDiskEnum;
use App\Helpers\ImageCompressing;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewsUpdateRequest;
use function Laravel\Prompts\multisearch;
use App\Http\Requests\Dashboard\Article\UpdateRequest;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Http\Requests\NewsDraftRequest;

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

        if ($request->has('tags')) {
            $newTags = [];
            foreach ($request->input('tags') as $tagName) {
                $tag = Tag::updateOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $newTags[] = $tag->id;
            }

            $data['tags'] = $newTags;
        }

            $image = $this->upload(UploadDiskEnum::NEWS->value, $request->file('photo'));

            $domQuestion = new \DOMDocument();
            libxml_use_internal_errors(true);
            $domQuestion->loadHTML($data['content'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $this->processImages($domQuestion);

            libxml_clear_errors();

        return [
            'user_id' => auth()->user()->id,
            'name' => $data['name'],
            'photo' => $image,
            'content' => $domQuestion->saveHTML(),
            'slug' => Str::slug($data['name']),
            'category' => $data['category'],
            'sub_category' => $data['sub_category'],
            'tags' => $data['tags'],
            'upload_date' => $data['upload_date']
        ];
    }

    public function storeDraft(?NewsDraftRequest $request = null)
    {
        $data = $request ? $request->validated() : null;

        if ($request && $request->has('tags')) {
            $newTags = [];
            foreach ($request->input('tags') as $tagName) {
                $tag = Tag::updateOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $newTags[] = $tag->id;
            }
            $data['tags'] = $newTags;
        }

            $image = $request && $request->hasFile('photo') ? $this->upload(UploadDiskEnum::NEWS->value, $request->file('photo')) : null;

            $domQuestion = new \DOMDocument();
            libxml_use_internal_errors(true);
            $content = $data['content'] ?? '-';
            if (!$content) {
                $domQuestion->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
                $this->processImages($domQuestion);
            }
            libxml_clear_errors();

        return [
            'user_id' => auth()->user()->id,
            'name' => $data['name'] ??  null,
            'photo' => $image ?? null,
            'content' => $domQuestion->saveHTML() ?: null,
            'slug' => Str::slug($data['name']),
            'category' => $data['category'] ?? null,
            'sub_category' => $data['sub_category'] ?? null,
            'tags' => $data['tags'] ?? null,
            'upload_date' => $data['upload_date'] ?? null
        ];
    }

    public function updateDraft(?NewsDraftRequest $request = null, News $news)
    {
        $data = $request ? $request->validated() : null;

        if ($request && $request->has('tags')) {
            $newTags = [];
            foreach ($request->input('tags') as $tagName) {
                $tag = Tag::updateOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $newTags[] = $tag->id;
            }
            $data['tags'] = $newTags;
        }

        $old_photo = $news->photo;
        $new_photo= "";

        if ($request->hasFile('photo')) {
            $this->remove($old_photo);
            $new_photo = $this->upload(UploadDiskEnum::NEWS->value, $request->file('photo'));
        }

        $domQuestion = new \DOMDocument();
        libxml_use_internal_errors(true);
        $content = $data['content'] ?? '-';
        if (!$content) {
            $domQuestion->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $this->processImages($domQuestion);
        }
        libxml_clear_errors();

        return [
            'user_id' => auth()->user()->id,
            'name' => $data['name'] ??  null,
            'photo' => $old_photo ?: $new_photo ?? null,
            'content' => $domQuestion->saveHTML() ?: null,
            'slug' => Str::slug($data['name']),
            'category' => $data['category'] ?? null,
            'sub_category' => $data['sub_category'] ?? null,
            'tags' => $data['tags'] ?? null,
            'upload_date' => $data['upload_date'] ?? null
        ];
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

        if ($request->has('tags')) {
            $newTags = [];
            foreach ($request->input('tags') as $tagName) {
                $tag = Tag::updateOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $newTags[] = $tag->id;
            }

            $data['tags'] = $newTags;
        }

        $old_photo = $news->photo;
        $new_photo= "";

        if ($request->hasFile('photo')) {
            $this->remove($old_photo);
            $new_photo = $this->upload(UploadDiskEnum::NEWS->value, $request->file('photo'));
        }

        $domQuestion = new \DOMDocument();
        libxml_use_internal_errors(true);
        $content = $data['content'] ?? '-';
        if (!$content) {
            $domQuestion->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $this->processImages($domQuestion);
        }
        libxml_clear_errors();

        return [
            'user_id' => auth()->user()->id,
            'name' => $data['name'],
            'photo' => $old_photo ?: $new_photo,
            'content' => $data['content'],
            'slug' => Str::slug($data['name']),
            'category' => $data['category'],
            'tags' => $data['tags'],
            'upload_date' => $data['upload_date'],
            'sub_category' => $data['sub_category'],
        ];
    }

    public function updateByAdmin(NewsUpdateRequest $request, News $news): array|bool
    {
        $data = $request->validated();

        if ($request->has('tags')) {
            $newTags = [];
            foreach ($request->input('tags') as $tagName) {
                $tag = Tag::updateOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $newTags[] = $tag->id;
            }

            $data['tags'] = $newTags;
        }

        $old_photo = $news->photo;
        $new_photo= "";

        if ($request->hasFile('photo')) {
            $this->remove($old_photo);
            $new_photo = $this->upload(UploadDiskEnum::NEWS->value, $request->file('photo'));
        }

        return [
            'user_id' => $news->user->id,
            'name' => $data['name'],
            'photo' => $old_photo ?: $new_photo,
            'content' => $data['content'],
            'slug' => Str::slug($data['name']),
            'category' => $data['category'],
            'tags' => $data['tags'],
            'upload_date' => $data['upload_date'],
            'sub_category' => $data['sub_category'],
        ];
    }

    private function processImages(\DOMDocument $dom)
    {
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('#data:image/#', $src)) {
                preg_match('#data:image/(?<mime>.*?)\;#', $src, $groups);
                $mimetype = $groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                $filepath = $fileNameContentRand . '.' . $mimetype;

                $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $src));

                Storage::put(UploadDiskEnum::CONTENT->value . '/' . $filepath, $imageData);

                $baseUrl = config('app.url');

                $new_src = str_replace('http://127.0.0.1:8000', $baseUrl, Storage::url(UploadDiskEnum::CONTENT->value . '/' . $filepath));

                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }

    }
}
