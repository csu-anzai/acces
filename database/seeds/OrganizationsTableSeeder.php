<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizations = [
            ['name' => 'None'],  
            ['name' => 'Catholic Charismatic Carolinians'],  
            ['name' => 'Supreme Student Council'],  
            ['name' => 'USC-Chemical Engineering Council'],  
            ['name' => 'USC Electronics Engineering Council'],  
            ['name' => 'Sophia Organization'],  
            ['name' => 'Psychology Society'],  
            ['name' => 'Electrical Engineering Council'],  
            ['name' => 'Computer Engineering Council'],  
            ['name' => 'Junior Philippine Pharmacists Association'],  
            ['name' => 'Science Education Students Organization'],  
            ['name' => 'Datalogics Society'],  
            ['name' => 'Industrial Engineering Council'],  
            ['name' => 'Mechanical Engineering Council'],  
            ['name' => 'Civil Engineering Council'],  
            ['name' => 'Collegiate Engineering Council'],  
            ['name' => 'Carolinian Physics Society'],  
            ['name' => 'Manufacturing Engineering Council'],  
            ['name' => 'Carolinian Library and Information Science Association'],  
            ['name' => 'USC Architecture Society'],  
            ['name' => 'Integrated Students of the Interior Design Education'],  
            ['name' => 'Solares'],  
            ['name' => 'Nutrition and Dietetics Student Organization'],  
            ['name' => 'Nursing Student Body Organization'],  
            ['name' => 'Dynamic Communication Society'],  
            ['name' => 'Biology Integrated Organization'],  
            ['name' => 'Chemistry Student Association'],  
            ['name' => 'Students Electronic Society'],  
            ['name' => 'Amateur Radio Club'],  
            ['name' => 'Movir Engineering Society'],  
            ['name' => 'Pathways'],  
            ['name' => 'Chemical Engineering Society'],  
            ['name' => 'Society of Circuit Researchers'],  
            ['name' => 'Computer Driven Enthusiasts'],  
            ['name' => 'Association of Civil Engineering Students'],  
            ['name' => 'Philippine Institute of Civil Engineers'],  
            ['name' => 'USC Medics'],  
            ['name' => 'Junior People Management Association of the Philippines'],  
            ['name' => 'Carolinian Residents Association'],  
            ['name' => 'Youth For Christ'],  
            ['name' => 'Safety First'],  
            ['name' => 'Rotarac Club of Cebu'],  
            ['name' => 'Philippine Junior Jaycees Inc. - USC Chapter'],  
            ['name' => 'Carolinian Economics Society'],  
            ['name' => 'School of Education Council'],  
            ['name' => 'CAWSA'],  
            ['name' => 'Junior Financial Executives'],  
            ['name' => 'Carolinian Political Science'],  
            ['name' => 'Junior Philippine Institute of Accountants - USC Chapter'],  
            ['name' => 'SHOTS'],  
            ['name' => 'PJJJI'],  
            ['name' => 'CES OFFICE'],  
            ['name' => 'Red Cross Youth - USC Council']
            
        ];

        DB::table('organizations')->insert($organizations);
    }
}
