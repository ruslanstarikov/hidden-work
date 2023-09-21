@extends('base')
@section('content')
<section class="bg-secondary-100 py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-5xl font-bold mb-6">Empower Your Freelance Journey</h1>
        <p class="text-xl mb-8">Join a community of global talents, and get paid in Bitcoin.</p>
        <a href="#" class="bg-primary text-white py-2 px-6 rounded-full hover:bg-primary-600 transition duration-300">Sign Up Now</a>
    </div>
</section>

<!-- Features Section -->
<section class="py-20">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Single Feature -->
            <div class="text-center">
                <i class="fas fa-shield-alt text-4xl mb-6 text-primary"></i>
                <h2 class="text-2xl font-semibold mb-4">Secure & Trusted</h2>
                <p>Your payments are secured in escrow until project completion.</p>
            </div>
            <!-- Single Feature -->
            <div class="text-center">
                <i class="fas fa-lightbulb text-4xl mb-6 text-primary"></i>
                <h2 class="text-2xl font-semibold mb-4">Learn & Grow</h2>
                <p>Access resources on Bitcoin and freelancing best practices.</p>
            </div>
            <!-- Single Feature -->
            <div class="text-center">
                <i class="fas fa-globe-americas text-4xl mb-6 text-primary"></i>
                <h2 class="text-2xl font-semibold mb-4">Global Opportunities</h2>
                <p>Find jobs tailored to your skills from clients around the world.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="bg-gray-100 py-20">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-semibold mb-12">What Our Users Say</h2>
        <div class="flex flex-wrap justify-around">
            <!-- Single Testimonial -->
            <div class="w-full md:w-1/3 px-8 mb-8">
                <p class="text-lg italic mb-6">"Business CF has changed the way I freelance. Receiving payments in Bitcoin is a game changer!"</p>
                <h3 class="text-xl font-semibold mb-2">Jane Doe</h3>
                <span class="text-primary">UI/UX Designer</span>
            </div>
            <!-- Single Testimonial -->
            <div class="w-full md:w-1/3 px-8 mb-8">
                <p class="text-lg italic mb-6">"The platform's educational resources have been instrumental in my freelancing journey."</p>
                <h3 class="text-xl font-semibold mb-2">John Smith</h3>
                <span class="text-primary">Full-stack Developer</span>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-20">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-semibold mb-6">Ready to jumpstart your freelance career?</h2>
        <p class="text-xl mb-8">Join us and embrace the new era of freelancing.</p>
        <a href="#" class="bg-primary text-white py-2 px-6 rounded-full hover:bg-primary-600 transition duration-300">Get Started</a>
    </div>
</section>
@endsection
