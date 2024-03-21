<?php

namespace App\Observers;

use App\Models\SubCategory;
use Illuminate\Support\Str;

class SubCategoryObserver
{

            /**
     * Handle the User "creating" event.
     *
     * @param User $user
     * @return void
     */
    public function creating(SubCategory $subCategory): void
    {
        $subCategory->slug = Str::slug($subCategory->name);
    }

    /**
     * Handle the Category "created" event.
     */
    public function created(SubCategory $category): void
    {
        //
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(SubCategory $subCategory): void
    {
        $subCategory->slug = Str::slug($subCategory->name);
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleting(SubCategory $subCategory): void
    {
        //untuk menghapus semua postingan user yang dihapus
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(SubCategory $subCategory): void
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(SubCategory $subCategory): void
    {
        //
    }
}
