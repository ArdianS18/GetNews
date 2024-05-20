<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\News;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewsUpdateRequest;
use App\Http\Requests\Dashboard\Article\UpdateRequest;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\NewsDraftRequest;
use App\Models\Contact;

class ContactService implements ShouldHandleFileUpload, CustomUploadValidation
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
    public function store(ContactRequest $request)
    {
        $data = $request->validated();
        $image = $this->upload(UploadDiskEnum::LOGO->value, $request->file('logo'));

        return [
            'logo' => $image,
            'slogan' => $data['slogan'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'url_facebook' => $data['url_facebook'],
            'url_twitter' => $data['url_twitter'],
            'url_instagram' => $data['url_instagram'],
            'url_linkedin' => $data['url_linkedin'],
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return array|bool
     */

    public function update(ContactRequest $request, Contact $contact)
    {
        $data = $request->validated();

        $old_photo = $contact->logo;
        $new_photo= "";

        if ($request->file('logo')) {
            $this->remove($old_photo);
            $new_photo = $this->upload(UploadDiskEnum::LOGO->value, $request->file('logo'));
        }

        return [
            'logo' => $old_photo ?: $new_photo,
            'slogan' => $data['slogan'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'url_facebook' => $data['url_facebook'],
            'url_twitter' => $data['url_twitter'],
            'url_instagram' => $data['url_instagram'],
            'url_linkedin' => $data['url_linkedin'],
        ];
    }
}

