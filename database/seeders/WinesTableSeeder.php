<?php

namespace Database\Seeders;

use App\Models\Wine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class WinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrayApi = ['reds', 'whites', 'sparkling', 'rose', 'dessert', 'port'];
        foreach ($arrayApi as $curApi) {
            $variabile = Http::withOptions(['verify' => false])->get('https://api.sampleapis.com/wines/' . $curApi)->json();
            foreach ($variabile as $index => $wineData) {
                // dd($index);
                    $newWine = new Wine([
                        'wine' => $wineData['wine'],
                        'review' => (int)$wineData['rating']['reviews'],
                        'average' => $wineData['rating']['average'],
                        'genre' => $curApi,
                        'image' => $wineData['image'],
                        'winery' => $wineData['winery'],
                        'location' => $wineData['location'],
                        'slug' => Str::slug($wineData['wine']) . '-'. $index,
                    ]);

                    $newWine->save();
                }
        }
    }
    
}
