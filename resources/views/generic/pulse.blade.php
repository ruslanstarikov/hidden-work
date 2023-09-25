<style>
    .htmx-indicator{
        opacity:0;
        transition: opacity 500ms ease-in;
        display: none;
    }
    .htmx-request .htmx-indicator{
        opacity:1;
        display: block;
    }
    .htmx-request.htmx-indicator{
        opacity:1;
        display: block;
    }
</style>
{{--<div class="pulse-placeholder htmx-indicator animate-pulse">--}}
{{--    <div class="space-y-4">--}}
{{--        <div class="h-10 w-1/2 bg-gray-300 rounded"></div>--}}
{{--        <div class="h-20 w-full bg-gray-300 rounded"></div>--}}
{{--        <div class="h-10 w-1/4 bg-gray-300 rounded"></div>--}}
{{--    </div>--}}
{{--</div>--}}

<div id="pulse-placeholder" class="htmx-indicator pulse-placeholder fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 invisible z-50">
    <div class="animate-pulse bg-primary-200 w-32 h-32 rounded-full"></div>
</div>

