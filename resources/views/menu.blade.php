<nav class="bg-primary py-3 shadow-lg">
    <div class="container mx-auto px-8 flex items-center justify-between">
        <!-- Logo or Brand Name -->
        <div class="text-3xl font-semibold pr-6">
            <a href="#" class="text-white hover:text-secondary-300">CF</a>
        </div>

        <!-- Navigation Links for Freelancers and Clients -->
        <div class="space-x-2 lg:space-x-6 flex-grow flex items-center">
            <a href="#" class="text-white hover:text-secondary-300 transition duration-300 mx-1 lg:mx-2" data-ripple-light="true" data-popover-target="menu">Jobs</a>
            <div data-popover="menu" data-popover-placement="bottom" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu" data-popover-placement="bottom">
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Find jobs</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Post a job</a>
                </div>
            </div>
            <a href="#" class="text-white hover:text-secondary-300 transition duration-300 mx-1 lg:mx-2">Escrow Services</a>
            <a href="#" class="text-white hover:text-secondary-300 transition duration-300 mx-1 lg:mx-2">Learn</a>
        </div>

        <!-- Auth and Region Links -->
        <div class="space-x-4 lg:space-x-6 flex items-center">
            <div class="hidden lg:block text-accent-1-200 mr-2">Language:</div>
            <select class="bg-accent-1-500 text-white rounded px-2 py-1 transition duration-300 hover:bg-accent-1-600">
                <option value="en">English</option>
                <!-- Add other languages here -->
            </select>

            <a href="#" class="text-white hover:text-secondary-300 transition duration-300">Sign In</a>
            <a href="#" class="bg-accent-1-500 hover:bg-accent-1-700 text-white py-1 px-4 rounded transition duration-300">Sign Up</a>
        </div>
    </div>
</nav>
