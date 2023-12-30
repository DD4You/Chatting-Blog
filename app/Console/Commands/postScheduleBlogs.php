<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Console\Command;

class postScheduleBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:post-schedule-blogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Blog::where('status', 'Scheduled')
            ->where('published_at', '<=', Carbon::now())
            ->each(function ($user) {
                $user->update([
                    'published_at' => null,
                    'status' => 'Published'
                ]);
            });
    }
}
