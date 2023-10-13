<div class="container mx-auto p-6">
    <div class="mb-4">
        <input type="text" hx-get="/jobs" hx-trigger="keyup changed delay:500ms" name="keyword" placeholder="Search jobs..." class="p-2 w-full border rounded">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <select hx-get="/jobs" hx-trigger="change" name="location" class="p-2 w-full border rounded">
            <option value="">All Locations</option>
            <!-- Locations will be populated here -->
        </select>
        <select hx-get="/jobs" hx-trigger="change" name="skill" class="p-2 w-full border rounded">
            <option value="">All Skills</option>
            <!-- Skills will be populated here -->
        </select>
        <select hx-get="/jobs" hx-trigger="change" name="job_type" class="p-2 w-full border rounded">
            <option value="">All Job Types</option>
            <!-- Job Types like Full-Time, Part-Time, Contract will be populated here -->
        </select>
    </div>
</div>
