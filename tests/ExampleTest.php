<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 10) as $key) {
            $data = [
                'name' => $faker->name,
                'description' => $faker->text
            ];

            $this->post('/api/films', $data)->seeJsonEquals([
                'created' => true
            ]);
        }
    }
}
