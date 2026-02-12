<?php

namespace App\Console\Commands;

use App\Models\Image;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SyncBucketImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-bucket-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync images from the storage bucket to the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Scanning bucket...');

        $files = Storage::files('gallery');

        $bar = $this->output->createProgressBar(count($files));
        $bar->start();

        foreach ($files as $index => $path) {
            Image::firstOrCreate(
                ['file_path' => $path],
                [
                    'title' => basename($path),
                    'order' => $index,
                    'type' => 'tattoo',
                ]
            );

            $bar->advance();
        }

        $bar->finish();
        $this->info("\nSync complete!");
    }
}
