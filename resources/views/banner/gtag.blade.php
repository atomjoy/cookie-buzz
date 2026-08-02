{{-- @include('cookie-buzz::banner.actions', ['gtagId' => 'G-XXXXXXX', 'pixelId' => 'F-XXXXXXX']) --}}

@props([
    'gtagId' => null, // Set Google Id
    'pixelId' => null, // Set Pixel Id
])

@if($gtagId)
<!-- INIT GOOGLE TAG (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtagId }}"></script>
<script>
    window.dataLayer = window.dataLayer || []
    function gtag() {
        dataLayer.push(arguments)
    }

    gtag('js', new Date())
    gtag('config', '{{ $gtagId }}')
    gtag('consent', 'default', {
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied',
        analytics_storage: 'denied',
		wait_for_update: 1000
    })
</script>
@endif

@if($pixelId)
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');

    fbq('consent', 'revoke');
    fbq('init', '{{ $pixelId }}');
    fbq('track', 'PageView');
</script>
@endif