<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\AuthorRequest;
use App\Http\Requests\Dashboard\Article\UpdateRequest;
use App\Models\Author;
use App\Traits\UploadTrait;

use function Laravel\Prompts\multisearch;

class AuthorService implements ShouldHandleFileUpload, CustomUploadValidation
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
    public function store(AuthorRequest $request, $user): array
    {
        $data = $request->validated();

        $photo = $this->upload(UploadDiskEnum::AUTHOR_CV->value, $request->file('cv'));

        return [
            'user_id' => $user->id,
            'cv' => $photo,
            'status' => "panding"
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return array|bool
     */

    public function update(AuthorRequest $request, Author $author): array|bool
    {

        $data = $request->validated();
        $old_photo = $author->photo;

        if ($request->hasFile('cv')) {
            $this->remove($old_photo);
            $old_photo = $this->upload(UploadDiskEnum::AUTHOR_CV->value, $request->file('cv'));
        }

        $author->update($data);

        return [
            'user_id' => auth()->id(),
            'cv' => $old_photo,
        ];
    }
}
