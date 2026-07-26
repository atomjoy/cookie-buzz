{{-- @include('cookie-buz:banner.actions', ['gtmId' => 'GTM-XXXXXXX', 'pixelId' => 'FB-XXXXXXX']) --}}

@props([
    'gtmId' => null, // Set TAG_ID GTM
    'pixelId' => null, // Set Pixel Id
])

@if($gtmId)
<!-- INIT GOOGLE TAG (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtmId }}"></script>
<script>
    window.dataLayer = window.dataLayer || []
    function gtag() {
        dataLayer.push(arguments)
    }

    gtag('js', new Date())
    gtag('config', '{{ $gtmId }}')
    gtag('consent', 'default', {
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied',
        analytics_storage: 'denied',
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

<script>
function loadAnalytics() {
    console.log("Analytics action works!");

	try {
		gtag('consent', 'update', {
			analytics_storage: 'granted',
		});
	} catch (e) {
		console.log(e);
	}
}

function loadMarketing() {
    console.log("Marketing action works!");

	try {
		gtag('consent', 'update', {
			ad_storage: 'granted',
			ad_user_data: 'granted',
			ad_personalization: 'granted',
		});

		// Facebook
		fbq('consent', 'grant');
	} catch (e) {
		console.log(e);
	}
}

function rejectAnalytics() {
    console.log("Analytics action works!");

	try {
		gtag('consent', 'update', {
			analytics_storage: 'denied',
		});
	} catch (e) {
		console.log(e);
	}
}

function rejectMarketing() {
    console.log("Marketing action works!");

	try {
		gtag('consent', 'update', {
			ad_storage: 'denied',
			ad_user_data: 'denied',
			ad_personalization: 'denied',
		});

		// Facebook
		fbq('consent', 'revoke');
	} catch (e) {
		console.log(e);
	}
}
</script>