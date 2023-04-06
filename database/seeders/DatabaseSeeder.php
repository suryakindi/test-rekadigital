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
        \App\Models\User::create([
           'name'=>'admin',
           'email'=>'admin@mail.com',
           'password'=>bcrypt('12345'),
         ]);

         \App\Models\Namecompany::create([
            'part'=>'title_company',
             'namecompany' => 'GYB Company',
             'tagline_1'=>'Grow Your Bussiness with us',
             'tagline_2'=>'Unlock Your Business growth',
             'banner' => 'banner.jpg',
         ]);
         \App\Models\About::create([
            'part'=>'about_company',
            'heading' => 'The Best Marketing Agency to Improve Your Business',
            'content' => 
            'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s  when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
            
         ]);
         \App\Models\Service::create([
            'name_service'=>'Digital Marketing',
            'content_service'=>'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet',
            'logo_service'=>'icon-5.png',
         ]);
         \App\Models\Service::create([
            'name_service'=>'Internet Marketing',
            'content_service'=>'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet',
            'logo_service'=>'icon-6.png',
         ]);
         \App\Models\Service::create([
            'name_service'=>'Content Marketing',
            'content_service'=>'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet',
            'logo_service'=>'icon-7.png',
         ]);
         \App\Models\Service::create([
            'name_service'=>'Social Marketing',
            'content_service'=>'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet',
            'logo_service'=>'icon-8.png',
         ]);
         \App\Models\Service::create([
            'name_service'=>'B2B Marketing',
            'content_service'=>'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet',
            'logo_service'=>'icon-9.png',
         ]);
         \App\Models\Service::create([
            'name_service'=>'Email Marketing',
            'content_service'=>'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet',
            'logo_service'=>'icon-10.png',
         ]);

         \App\Models\Ourteam::create([
            'name'=>'Alex Robin',
            'potition'=>'CEO',
            'instagram'=>'https://instagram/@example',
            'linkedin'=>'https://linkedin/in/@example',
            'images'=>'team-1.jpg'
         ]);
         \App\Models\Ourteam::create([
            'name'=>'Adam Crew',
            'potition'=>'CEO',
            'instagram'=>'https://instagram/@example',
            'linkedin'=>'https://linkedin/in/@example',
            'images'=>'team-2.jpg'
         ]);
         \App\Models\Ourteam::create([
            'name'=>'Santiago Reger',
            'potition'=>'CEO',
            'instagram'=>'https://instagram/@example',
            'linkedin'=>'https://linkedin/in/@example',
            'images'=>'team-3.jpg'
         ]);
         \App\Models\Ourteam::create([
            'name'=>'Luis Hernandes',
            'potition'=>'CEO',
            'instagram'=>'https://instagram/@example',
            'linkedin'=>'https://linkedin/in/@example',
            'images'=>'team-4.jpg'
         ]);
         \App\Models\Contact::create([
            'part' => 'contact_company',
            'address'=>'123, Jakarta, ID',
            'phonenumber'=>'+628586647362',
            'email' =>'example@mail.com',
         ]);
    }
}
