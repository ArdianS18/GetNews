<?php

namespace App\Jobs;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteOldSoftDeletedData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $twoAgoInDays = Carbon::now()->subDays(1);

        News::where('deleted_at', '<=', $twoAgoInDays)
            ->forceDelete();
    }
}
