<div id="jobs-list" class="container mx-auto p-6 space-y-4">
    @foreach($jobs as $job)
        @include('jobs.search.result', ['job' => $job])
    @endforeach

    <!-- Pagination Links -->
    <div class="mb-4">
        <a href="#" class="px-3 py-2 border rounded text-blue-500 hover:bg-blue-500 hover:text-white">1</a>
        <a href="#" class="px-3 py-2 border rounded text-blue-500 hover:bg-blue-500 hover:text-white">2</a>
        <a href="#" class="px-3 py-2 border rounded text-blue-500 hover:bg-blue-500 hover:text-white">Next</a>
    </div>
</div>
