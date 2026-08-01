{{-- GoogleTagManager --}}
{{-- @include('cookie-buzz:banner.gtm', ['gtmId' => 'GTM-XXXXXXX']) --}}

@props([
	'gtmId' => null, // GTM-XXXXXXX
])

<!-- Definition of the gtag() function and default consents (Consent Mode v2) -->
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){window.dataLayer.push(arguments);}

	// Required by law: Block tracking by default before user's decision
	gtag('consent', 'default', {
		ad_storage: 'denied',
		analytics_storage: 'denied',
		ad_user_data: 'denied',
		ad_personalization: 'denied',
		wait_for_update: 1000
	});
</script>

@if($gtmId)
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{{ $gtmId }}');</script>
<!-- End Google Tag Manager -->
@endif