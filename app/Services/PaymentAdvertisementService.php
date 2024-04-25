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
use App\Http\Requests\PaymentAdvertisementsRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementPhoto;
use App\Models\News;
use App\Models\NewsPhoto;
use App\Models\Tag;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

use function Laravel\Prompts\multisearch;

class PaymentAdvertisementService implements ShouldHandleFileUpload, CustomUploadValidation
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
    public function store(PaymentAdvertisementsRequest $request)
    {
        // dd($request);
        $data = $request->validated();

        // $multi_photo = [];
        //     if ($request->hasFile('multi_photo')) {
        //         foreach ($request->file('multi_photo') as $image) {
        //             $stored_image = $image->store(UploadDiskEnum::ADVERTISEMENT_PHOTO->value , 'public');
        //             $multi_photo[] = $stored_image;
        //         }
        //     }

        return [
            'advertisement_id' => $data['advertisement_id'],
            'payment_method' => $data['payment_method'],
            'voucher' => $data['voucher']
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return array|bool
     */

    public function update(PaymentAdvertisementsRequest $request): array|bool
    {
        $data = $request->validated();

        return [
            'advertisement_id' => $data['advertisement_id'],
            'payment_method' => $data['payment_method'],
            'voucher' => $data['voucher']
        ];
    }
}
