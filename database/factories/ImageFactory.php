<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'source' => 'https://www.panacomp.net/wp-content/uploads/2015/10/img_6711.jpg',
            'gallery_id' => Gallery::inRandomOrder()->first()->id
        ];
    }
}
