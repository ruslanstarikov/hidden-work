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
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu" data-popover-placement="top">
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Find jobs</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Post a job</a>
                </div>
            </div>
            <a href="#" class="text-white hover:text-secondary-300 transition duration-300 mx-1 lg:mx-2">Escrow Services</a>
            <a href="#" class="text-white hover:text-secondary-300 transition duration-300 mx-1 lg:mx-2">Learn</a>
        </div>
            <div class="flex items-center space-x-4">
            <div class="relative group inline-block">
                <a href="#" class="text-white hover:text-secondary-300 transition duration-300 mx-1 lg:mx-2" data-ripple-light="true" data-popover-target="languages">Languages <i class="fas fa-caret-down"></i></a>
                <div data-popover="languages" class="absolute z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 group-hover:block ">
                    <div class="py-1">
                        <a href="#" class="flex items-center space-x-2 text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                            <img src="/flags/au.png" alt="English" class="w-4">
                            <span>English</span>
                        </a>
                        <a href="#" class="flex items-center space-x-2 text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                            <img src="/flags/fr.png" alt="French" class="w-4">
                            <span>French</span>
                        </a>
                        <a href="#" class="flex items-center space-x-2 text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                            <img src="/flags/de.png" alt="German" class="w-4">
                            <span>German</span>
                        </a>
                        <a href="#" class="flex items-center space-x-2 text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">
                            <img src="/flags/kr.png" alt="German" class="w-4">
                            <span>Korean</span>
                        </a>
                        <!-- Add more languages as needed -->
                    </div>
                </div>
            </div>
            <div class="space-x-2 lg:space-x-6 flex-grow flex items-center">
                <!-- ... other menu items ... -->

                @if(Auth::check()) <!-- Check if user is logged in -->
                <a href="{{ route('profile') }}" class="text-white hover:text-secondary-300 transition duration-300 mx-1 lg:mx-2 flex items-center">
                    <span>Profile</span>
                    <!-- Font Awesome Profile icon -->
                    <i class="fas fa-user-circle ml-1"></i>
                </a>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-secondary-300 transition duration-300 mx-1 lg:mx-2 flex items-center">
                        <span>Login</span>
                        <!-- Font Awesome Login icon -->
                        <i class="fas fa-sign-in-alt ml-1"></i>
                    </a>
                @endif
            </div>
        </div>

    </div>
</nav>
