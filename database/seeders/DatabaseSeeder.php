<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
		//создаем 10 тегов и загоняем их в переменную $tags 
        $tags = \App\Models\Tag::factory(10)->create();
		//создаем 20 статей и загоняем их в переменную $articles
        $articles = \App\Models\Article::factory(20)->create();
        
		//метод pluck формирует массив всех 'id' из $tags
		$tags_id = $tags->pluck('id');

        $articles->each(function ($article) use ($tags_id)
        {
            //для каждой статьи $article создаем три коммента
			$article->tags()->attach($tags_id->random(3));
            \App\Models\Comment::factory(3)->create([
                'article_id' => $article->id
            ]);
			\App\Models\State::factory(1)->create([
                'article_id' => $article->id
            ]);
			
        });
    }
}
