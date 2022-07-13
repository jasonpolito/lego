<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = env("COMPANY_NAME");
        $privacy_content = \File::get(storage_path('stubs/privacypolicy.txt'));
        $uppercase = ucwords($company);
        $words = explode(" ", "$uppercase");
        $abbr = "";
        foreach ($words as $word) {
            $abbr .= $word[0];
        }

        DB::table("twill_users")->insert([
            "name" => "Jason",
            "published" => 1,
            "role" => "SUPERADMIN",
            "email" => "jason@placementlabs.com",
            "password" => \Hash::make("qwerasdf"),
        ]);
        DB::table("pages")->insert([
            "title" => "Homepage",
            "published" => 1,
            "meta_title" => "Welcome to $company",
            "meta_description" => "Welcome to $company",
            "og_title" => "Welcome to $company",
            "og_description" => "Welcome to $company",
            "meta_noindex" => 1,
        ]);
        DB::table("page_slugs")->insert([
            "locale" => "en",
            "page_id" => 1,
            "active" => 1,
            "slug" => '',
        ]);
        DB::table("pages")->insert([
            "title" => "About",
            "published" => 1,
            "meta_title" => "About | $company",
            "meta_description" => "This is the about page.",
            "og_title" => "About | $company",
            "og_description" => "This is the about page.",
            "meta_noindex" => 1,
        ]);
        DB::table("page_slugs")->insert([
            "locale" => "en",
            "page_id" => 2,
            "active" => 1,
            "slug" => 'about',
        ]);
        DB::table("pages")->insert([
            "title" => "Privacy Policy",
            "published" => 1,
            "meta_title" => "Privacy Policy | $company",
            "meta_description" => "This is the about page.",
            "og_title" => "Privacy Policy | $company",
            "og_description" => "This is the about page.",
            "meta_noindex" => 1,
        ]);
        DB::table("page_slugs")->insert([
            "locale" => "en",
            "page_id" => 3,
            "active" => 1,
            "slug" => 'privacy-policy',
        ]);
        DB::table("variables")->insert([
            "title" => "Company Name",
            "published" => 1,
            "search" => "company_name",
            "replace" => "$company",
        ]);
        DB::table("variables")->insert([
            "title" => "Company URL",
            "published" => 1,
            "search" => "company_url",
            "replace" => env("APP_URL"),
        ]);
        DB::table("variables")->insert([
            "title" => "Company Abbreviation",
            "published" => 1,
            "search" => "company_abbr",
            "replace" => "$abbr",
        ]);
        DB::table("variables")->insert([
            "title" => "Phone Number",
            "published" => 1,
            "search" => "phone",
            "replace" => "(555) 555-5555",
        ]);
        DB::table("variables")->insert([
            "title" => "Phone Number (tel:)",
            "published" => 1,
            "search" => "tel",
            "replace" => "tel:5555555555",
        ]);
        DB::table("blocks")->insert([
            "blockable_id" => 1,
            "position" => 1,
            "blockable_type" => "App\Models\Page",
            "content" => json_encode([
                "align" => 'start',
                "content" => "<p>testing</p>"
            ]),
            "type" => "text_content"
        ]);
        DB::table("blocks")->insert([
            "blockable_id" => 3,
            "position" => 1,
            "blockable_type" => "App\Models\Page",
            "content" => json_encode([
                "align" => 'start',
                "content" => $privacy_content
            ]),
            "type" => "text_content"
        ]);
    }
}
