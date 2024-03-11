<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\Dashboard\Article\UpdateRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Http\Requests\ViewRequest;
use App\Models\News;
use App\Models\NewsPhoto;
use App\Models\View;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

use function Laravel\Prompts\multisearch;

class ViewService implements ShouldHandleFileUpload, CustomUploadValidation
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
    public function store(ViewRequest $request, View $view)
    {
        $data = $request->validated();

        return [
            'user_id' => auth()->id(),
            'news_id' => $view->id,
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return array|bool
     */

    public function update()
    {
        //
    }
}
