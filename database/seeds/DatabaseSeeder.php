<?php

use Illuminate\Database\Seeder;
use App\Widget;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Widget::unguard();
        Widget::truncate();
        factory(Widget::class)->create();
        Widget::reguard();
    }
}
