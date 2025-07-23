<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         ContactMessage::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'subject' => 'Inquiry about product',
            'message' => 'I would like to know more about your product offerings.',
        ]);

        ContactMessage::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'subject' => 'Support request',
            'message' => 'I am having an issue with my account login.',
        ]);

        ContactMessage::create([
            'name' => 'Michael Johnson',
            'email' => 'michael.johnson@example.com',
            'subject' => 'Feedback',
            'message' => 'Great website! I love the design and user experience.',
        ]);
    }
}
