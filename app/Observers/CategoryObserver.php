<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{

            /**
     * Handle the User "creating" event.
     *
     * @param User $user
     * @return void
     */
    public function creating(Category $category): void
    {
        $category->slug = Str::slug($category->name);
    }

    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        $category->slug = Str::slug($category->name);
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleting(Category $category): void
    {
        //untuk menghapus semua postingan user yang dihapus
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        //
    }
}
