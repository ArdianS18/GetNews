<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Contracts\Interfaces\AuthorInterface;
use App\Enums\RoleEnum;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\AuthorRequest;
use App\Http\Requests\Dashboard\Article\UpdateRequest;
use App\Models\Author;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

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
    public function store(AuthorRequest $request, AuthorInterface $author)
    {
        $data = $request->validated();
        $author = $author->store($data);
        $author->assignRole(RoleEnum::AUTHOR);

        $photo = $this->upload(UploadDiskEnum::AUTHOR_CV->value, $request->file('photo'));

        return [
            'photo' => $photo,
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

        if ($request->hasFile('photo')) {
            $this->remove($old_photo);
            $old_photo = $this->upload(UploadDiskEnum::AUTHOR_CV->value, $request->file('photo'));
        }

        $author->update($data);

        return [
            'user_id' => auth()->id(),
            'photo' => $old_photo,
        ];
    }
}
