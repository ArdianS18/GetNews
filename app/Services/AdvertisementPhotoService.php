<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\Dashboard\Article\UpdateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Advertisement;
use App\Traits\UploadTrait;

use function Laravel\Prompts\multisearch;

class AdvertisementPhotoService implements ShouldHandleFileUpload, CustomUploadValidation
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

    public function update(AdvertisementRequest $request, Advertisement $advertisement): array|bool
    {

        $data = $request->validated();

        return [
            'user_id' => auth()->user()->id,
            'type' => $data['type'],
            'page' => $data['page'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'url' => $data['url']
        ];
    }
}
