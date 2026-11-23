<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Attack on Titan',
                'type' => 'Anime',
                'genre' => 'Action, Drama',
                'release_year' => 2013,
            ],
            [
                'title' => 'Boku no Hero Academia',
                'type' => 'Anime',
                'genre' => 'School, Super Power',
                'release_year' => 2016,
            ],
            [
                'title' => 'Boku no Hero Academia 2',
                'type' => 'Anime',
                'genre' => 'Action, Comedy',
                'release_year' => 2017,
            ],
            [
                'title' => 'One Punch Man',
                'type' => 'Anime',
                'genre' => 'Action, Comedy',
                'release_year' => 2015,
            ],
            [
                'title' => 'Boku no Hero Academia 3',
                'type' => 'Anime',
                'genre' => 'Comedy, Super Power',
                'release_year' => 2018,
            ],
        ];

        foreach ($items as $item) {
            Media::firstOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
