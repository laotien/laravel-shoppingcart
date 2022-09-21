<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use App\Models\NewsPosts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;

class BlogSeeder extends Seeder
{
    use WithFaker;

    public function __construct()
    {
        $this->setUpFaker();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert Category

        $categories = [
            'name'     => 'Root',
            'children' => [
                [
                    'name'        => 'Ecommerce',
                    'description' => 'Placeat quas voluptatem occaecati aut voluptatem beatae. Illo non magnam at architecto ab minus ut. Voluptates quasi aut aperiam cum. Inventore ut aut dolorem accusamus quisquam nobis reiciendis.',
                    'create_user' => 1,
                ],
                [
                    'name'        => 'Fashion',
                    'description' => 'Eius delectus architecto non minus. Deserunt eveniet sed nihil eveniet. Id dolor vero sit deserunt.',
                    'create_user' => 1,
                ],
                [
                    'name'        => 'Electronic',
                    'description' => 'Autem voluptatem repellendus ut et. Quisquam aliquam quasi porro quasi magni necessitatibus facere recusandae. Modi eos rerum voluptatem ut pariatur vitae. Et hic in dicta et.',
                    'create_user' => 1,
                ],
                [
                    'name'        => 'Commercial',
                    'description' => 'Autem hic ut impedit est consequatur omnis. Nesciunt est eum modi non ut velit quibusdam. Quis voluptatem repellendus at.',
                    'create_user' => 1,
                ],
            ],
        ];

        NewsCategory::create($categories);

        // Insert Post
        $posts = [
            [
                'name' => 'The day on Paris',
                'slug' => Str::slug('The day on Paris', '-'),
                'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
                'status' => "published",
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Pure Luxe in Punta Mita',
                'slug' => Str::slug('Pure Luxe in Punta Mita', '-'),
                'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
                'status' => "published",
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'All Aboard the Rocky Mountaineer',
                'slug' => Str::slug('All Aboard the Rocky Mountaineer', '-'),
                'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
                'status' => "published",

                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'City Spotlight: Philadelphia',
                'slug' => Str::slug('City Spotlight: Philadelphia', '-'),
                'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
                'status' => "published",
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Tiptoe through the Tulips of Washington',
                'slug' => Str::slug('Tiptoe through the Tulips of Washington', '-'),
                'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
                'status' => "published",
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],

            [
                'name' => 'A Seaside Reset in Laguna Beach',
                'slug' => Str::slug('A Seaside Reset in Laguna Beach', '-'),
                'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
                'status' => "published",
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],

            [
                'name' => 'America  National Parks with Denver',
                'slug' => Str::slug('America  National Parks with Denver', '-'),
                'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
                'status' => "published",
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Morning in the Northern sea',
                'slug' => Str::slug('Morning in the Northern sea', '-'),
                'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
                'status' => "published",
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ]
        ];

        foreach ($posts as $index => $item) {
            $item['views'] = $this->faker->numberBetween(100, 2500);
            $item['is_featured'] = $index < 6;
            $item['image'] = 'news/' . ($index + 1) . '.jpg';
            $item['description'] = $this->faker->text();

            $post = NewsPosts::create($item);

            $post->categories()->sync([
                $this->faker->numberBetween(1, 4),
                $this->faker->numberBetween(5, 7),
          ]);
        }

    }
}
