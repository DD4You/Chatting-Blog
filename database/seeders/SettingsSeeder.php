<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'about_us' => [
                'label' => 'About Us',
                'value' => '',
                'type' => settings()->longTextType(),
            ],
            'privacy_policy' => [
                'label' => 'Privacy Policy',
                'value' => '',
                'type' => settings()->longTextType(),
            ],
            'terms_of_use' => [
                'label' => 'Terms Of Use',
                'value' => '',
                'type' => settings()->longTextType(),
            ],
            'disclaimer' => [
                'label' => 'Disclaimer',
                'value' => '',
                'type' => settings()->longTextType(),
            ],
            'contact_us' => [
                'label' => 'Contact Us',
                'value' => '',
                'type' => settings()->longTextType(),
            ],
        ];

        settings()->set($settings);
    }
}
