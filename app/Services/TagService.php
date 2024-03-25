<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Http\Requests\Dashboard\Article\UpdateRequest;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

use function Laravel\Prompts\multisearch;

class TagService implements ShouldHandleFileUpload, CustomUploadValidation
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
    public function store(TagRequest $request)
    {
        $data = $request->validated();

        return [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return array|bool
     */

    public function update(TagRequest $request): array|bool
    {

        $data = $request->validated();

        return [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
        ];
    }
}
