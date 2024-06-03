<?php

namespace App\Services;

use Exception;
use App\Models\Tag;
use App\Models\News;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\Enums\UploadDiskEnum;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsDraftRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewsUpdateRequest;
use Intervention\Image\Laravel\Facades\Image;
use App\Http\Requests\Dashboard\Article\UpdateRequest;
use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;

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

        if ($request->has('tag')) {
            $newTags = [];
            foreach ($request->input('tag') as $tagName) {
                $tag = Tag::updateOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $newTags[] = $tag->id;
            }
            $data['tag'] = $newTags;
        }

        $img = $this->compressImage($request->photo);

        $new_photo = $this->upload(UploadDiskEnum::NEWS->value, $img);

        $domQuestion = new \DOMDocument();
        libxml_use_internal_errors(true);
        $domQuestion->loadHTML($data['content'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        $this->processImages($domQuestion);

        libxml_clear_errors();

        return [
            'user_id' => auth()->user()->id,
            'name' => $data['name'],
            'photo' => $new_photo,
            'content' => $domQuestion->saveHTML(),
            'slug' => Str::slug($data['name']),
            'category' => $data['category'],
            'sub_category' => $data['sub_category'],
            'tag' => $data['tag'],
            'upload_date' => $data['upload_date']
        ];
    }

    public function storeDraft(NewsDraftRequest $request)
    {
        $data = $request ? $request->validated() : null;

        if ($request && $request->has('tag')) {
            $newTags = [];
            foreach ($request->input('tag') as $tagName) {
                $tag = Tag::updateOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $newTags[] = $tag->id;
            }
            $data['tag'] = $newTags;
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
            'tag' => $data['tag'] ?? null,
            'upload_date' => $data['upload_date'] ?? null
        ];
    }
    
    /**
     * Method updateDraft
     *
     * @param NewsDraftRequest $request [explicite description]
     * @param News $news [explicite description]
     *
     * @return void
     */
    public function updateDraft(NewsDraftRequest $request, News $news)
    {
        $data = $request ? $request->validated() : null;

        if ($request && $request->has('tag')) {
            $newTags = [];
            foreach ($request->input('tag') as $tagName) {
                $tag = Tag::updateOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $newTags[] = $tag->id;
            }
            $data['tag'] = $newTags;
        }

        $old_photo = $news->photo;
        $new_photo = "";

        // if ($request->hasFile('photo')) {
        // if ($request->file('photo')) {
        // $this->remove($old_photo);
        // } else {
        $img = $this->compressImage($request->photo);

        $new_photo = $this->upload(UploadDiskEnum::NEWS->value, $img);
        // }
        // }

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
            'content' => $data['content'] ?: null,
            'slug' => Str::slug($data['name']),
            'category' => $data['category'] ?? null,
            'sub_category' => $data['sub_category'] ?? null,
            'tag' => $data['tag'] ?? null,
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

        if ($request->has('tag')) {
            $newTags = [];
            foreach ($request->input('tag') as $tagName) {
                $tag = Tag::updateOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $newTags[] = $tag->id;
            }

            $data['tag'] = $newTags;
        }

        $old_photo = $news->photo;
        $new_photo = "";
        if ($request->hasFile('photo')) {
            $this->remove($old_photo);
            $img = $this->compressImage($request->photo);
            
            $new_photo = $this->upload(UploadDiskEnum::NEWS->value, $img);
        }

        $domQuestion = new \DOMDocument();
        libxml_use_internal_errors(true);
        $content = $data['content'] ?? '-';
        if (!$content) {
            $domQuestion->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $this->processImages($domQuestion);
        }
        libxml_clear_errors();

        $id = '';
        if (auth()->user()->roles->pluck('name')[0] == "admin") {
            $id = $news->user_id;
        } else {
            $id = auth()->user()->id;
        }

        return [
            'user_id' => $id,
            'name' => $data['name'],
            'photo' => $new_photo ? $new_photo : $old_photo,
            'content' => $data['content'],
            'slug' => Str::slug($data['name']),
            'category' => $data['category'],
            'tag' => $data['tag'],
            'upload_date' => $data['upload_date'],
            'sub_category' => $data['sub_category'],
        ];
    }
    
    /**
     * Method updateByAdmin
     *
     * @param NewsUpdateRequest $request
     * @param News $news
     *
     * @return array
     */
    public function updateByAdmin(NewsUpdateRequest $request, News $news): array|bool
    {
        $data = $request->validated();

        if ($request->has('tag')) {
            $newTags = [];
            foreach ($request->input('tag') as $tagName) {
                $tag = Tag::updateOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $newTags[] = $tag->id;
            }

            $data['tag'] = $newTags;
        }

        $old_photo = $news->photo;
        $new_photo = "";

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
            'user_id' => $news->user->id,
            'name' => $data['name'],
            'photo' => $old_photo ?: $new_photo,
            'content' => $data['content'],
            'slug' => Str::slug($data['name']),
            'category' => $data['category'],
            'tag' => $data['tag'],
            'upload_date' => $data['upload_date'],
            'sub_category' => $data['sub_category'],
        ];
    }
    
    /**
     * Method processImages
     *
     * @param \DOMDocument $dom
     *
     * @return void
     */
    
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

                $new_src = Storage::url(UploadDiskEnum::CONTENT->value . '/' . $filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }
    }

    
    /**
     * Method compressImage
     *
     * @param $file as string 
     *
     * @return UploadedFile
     */
    public function compressImage($file): UploadedFile
    {
        $imageInfo = getimagesize($file);
        $imageType = $imageInfo[2];

        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $sourceImage = imagecreatefromjpeg($file);
                break;
            case IMAGETYPE_PNG:
                $sourceImage = imagecreatefrompng($file);
                break;
            case IMAGETYPE_GIF:
                $sourceImage = imagecreatefromgif($file);
                break;
            default:
                throw new Exception('Unsupported image type');
        }

        $compressedImagePath = tempnam(sys_get_temp_dir(), 'compressed_image') . '.webp';

        imagewebp($sourceImage, $compressedImagePath, 80);

        imagedestroy($sourceImage);

        return new UploadedFile($compressedImagePath, basename($compressedImagePath), 'image/webp', null, true);
    }
}
