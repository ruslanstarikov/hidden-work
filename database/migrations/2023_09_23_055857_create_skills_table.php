<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();  // The skill name
            $table->timestamps();
        });

        $skills = [
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            ['name' => 'JavaScript'],
            ['name' => 'PHP'],
            ['name' => 'Laravel'],
            ['name' => 'Vue.js'],
            ['name' => 'React'],
            ['name' => 'Node.js'],
            ['name' => 'Python'],
            ['name' => 'Django'],
            ['name' => 'Ruby on Rails'],
            ['name' => 'Java'],
            ['name' => 'Spring Boot'],
            ['name' => 'TypeScript'],
            ['name' => 'Angular'],
            ['name' => 'jQuery'],
            ['name' => 'Bootstrap'],
            ['name' => 'Tailwind CSS'],
            ['name' => 'Sass/SCSS'],
            ['name' => 'Webpack'],
            ['name' => 'Babel'],
            ['name' => 'GraphQL'],
            ['name' => 'REST API Development'],
            ['name' => 'SQL'],
            ['name' => 'NoSQL'],
            ['name' => 'MySQL'],
            ['name' => 'PostgreSQL'],
            ['name' => 'MongoDB'],
            ['name' => 'Docker'],
            ['name' => 'Kubernetes'],
            ['name' => 'Git'],
            ['name' => 'CI/CD'],
            ['name' => 'AWS'],
            ['name' => 'Azure'],
            ['name' => 'Google Cloud Platform'],
            ['name' => 'WebSockets'],
            ['name' => 'Redux'],
            ['name' => 'Vuex'],
            ['name' => 'Nuxt.js'],
            ['name' => 'Next.js'],
            ['name' => 'Jest'],
            ['name' => 'Mocha'],
            ['name' => 'Chai'],
            ['name' => 'Cypress'],
            ['name' => 'Responsive Design'],
            ['name' => 'Progressive Web Apps (PWA)'],
            ['name' => 'Serverless Architecture'],
            ['name' => 'GraphQL Apollo Server'],
            ['name' => 'WebAssembly'],
            ['name' => 'Three.js'],
            ['name' => 'WebGL'],
            ['name' => 'WebRTC'],
            ['name' => 'SVG Animation']
        ];
        DB::table('skills')->insert($skills);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
