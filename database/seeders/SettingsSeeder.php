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
            'site_name' => [
                'label' => 'Site Name',
                'value' => 'Your Site Name'
            ],
            'currency' => [
                'label' => 'Currency',
                'value' => '₹'
            ],
            'header_logo' => [
                'label' => 'Header Logo',
                'value' => '',
                'type' => settings()->fileType(),
            ],
            'footer_logo' => [
                'label' => 'Footer Logo',
                'value' => '',
                'type' => settings()->fileType(),
            ],
            'site_favicon' => [
                'label' => 'Site Favicon',
                'value' => '',
                'type' => settings()->fileType(),
            ],
            'primary_email' => [
                'label' => 'Primary Email Address',
                'value' => 'vinay@dd4you.in'
            ],
            'secondary_email' => [
                'label' => 'Secondary Email Address',
                'value' => ''
            ],
            'primary_phone' => [
                'label' => 'Primary Phone Number',
                'value' => '+91 70079XXXXX'
            ],
            'secondary_phone' => [
                'label' => 'Secondary Phone Number',
                'value' => ''
            ],
            'address' => [
                'label' => 'Address',
                'value' => ''
            ],
            'facebook_url' => [
                'label' => 'Facebook',
                'value' => 'https://facebook.com/dd4youofficial'
            ],
            'github_url' => [
                'label' => 'Github',
                'value' => 'https://github.com/dd4you'
            ],
            'instagram_url' => [
                'label' => 'Instagram',
                'value' => 'https://instagram.com/_dd4you'
            ],
            'linkedin_url' => [
                'label' => 'Linkedin',
                'value' => 'https://linkedin.com/company/dd4you/'
            ],
            'twitter_url' => [
                'label' => 'Twitter',
                'value' => 'https://twitter.com/_dd4you'
            ],
            'youtube_url' => [
                'label' => 'Youtube',
                'value' => 'https://youtube.com/@dd4you'
            ],
            'privacy_policy' => [
                'label' => 'Privacy Policy',
                'value' => '',
                'type' => settings()->longTextType(),
            ],
        ];

        settings()->set($settings);
    }
}
