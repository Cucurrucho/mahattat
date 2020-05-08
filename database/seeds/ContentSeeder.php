<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ContentSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        $this->contentFillIfEmpty('about_us_ar');
        $this->contentFillIfEmpty('concepts_ar');
        $this->contentFillIfEmpty('groups_ar');
        $this->contentFillIfEmpty('contact_ar');
        $this->contentFillIfEmpty('about_us_en');
        $this->contentFillIfEmpty('concepts_en');
        $this->contentFillIfEmpty('groups_en');
        $this->contentFillIfEmpty('contact_en');
    }

    protected function contentFillIfEmpty($key) {
        $content = app('content');
        if ($content->get($key) === null) {
            $content->put($key, 'يرجى كتابة المحتوى هنا');
        }
    }
}
