<script>
    document.addEventListener("DOMContentLoaded", function() {
        broadcastBridge('{{ $channelName }}', '{{ $eventName }}', '{{ $targetElementId }}');
    });
    function broadcastBridge(channelName, eventName, targetElementId) {
        Echo.private(channelName).listen(eventName, (e) => {
            const targetElement = document.getElementById(targetElementId);
            if(targetElement) {
                htmx.trigger(targetElement, 'refresh');
            }
        });
    }
</script>
