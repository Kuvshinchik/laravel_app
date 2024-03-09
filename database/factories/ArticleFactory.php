<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
//use Psy\Util\Str;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     *@var string
     *
     * @return array<string, mixed>
     */
    protected $model = Article::class;
    public function definition()
    {
		//faker — это PHP-библиотека, которая генерирует для вас поддельные данные.
        $title = $this->faker->sentence(6, true);
        $slug = Str::substr(Str::lower(preg_replace('/\s*/', '-', $title)), 8, -1);

        return [
            'title' => $title,
            'body' => $this->faker->paragraph(100, true),
            'slug' => $slug,
           'img' => 'https://via.placeholder.com/600/5F1138/FFFFFF/?text=LARAVEL:8.*',
		   //функция dateTimeBetween рандомно генерирует дату создания статей
            'created_at' => $this->faker->dateTimeBetween('-1 years'),
        ];
    }
}
