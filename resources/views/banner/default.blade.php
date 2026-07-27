@props(['cookieConfig' => null])

@php
    $prefix = md5(config('cookie-buzz.cookie_prefix', 'cookie_prefix'));
    $categories = json_encode(config('cookie-buzz.cookie_categories'));
    $icon = config('cookie-buzz.cookie_icon_public_path');
	$icon_url = app()->request->getSchemeAndHttpHost() . '/' . ltrim($icon, '/');
@endphp

<div id="cookie-buzz-banner-wrapper">
	<div id="cookie-buzz-banner">
		<div id="cookie-buzz-banner-header">
			@if ($icon)
			<img src="{{ $icon_url }}" alt="" id="cookie-buzz-icon">
			@endif
			<div class="cookie-buzz-banner-title">@lang(config('cookie-buzz.cookie_title', 'Cookie Disclaimer'))</div>
		</div>

		<p class="cookie-buzz-banner-description">@lang(config('cookie-buzz.cookie_description'))</p>

		<div class="cookie-buzz-button-container">
			<div class="cookie-buzz-button-action">
				<button type="button" id="cookie-buzz-accept" class="cookie-buzz-button cookie-buzz-button-accept" aria-label="@lang('Accept cookies')">
					@lang(config('cookie-buzz.cookie_accept_btn_text', 'Accept all'))
				</button>
				<button type="button" id="cookie-buzz-reject" class="cookie-buzz-button cookie-buzz-button-reject" aria-label="@lang('Reject cookies')">
					@lang(config('cookie-buzz.cookie_reject_btn_text', 'Reject all'))
				</button>
			</div>

			@if (config('cookie-buzz.cookie_modal_enabled', true))
				<button type="button" id="cookie-buzz-preferences-open" class="cookie-buzz-button cookie-buzz-button-preferences" aria-expanded="false" aria-controls="cookie-preferences-modal">
					@lang(config('cookie-buzz.cookie_preferences_btn_text', 'Manage preferences'))
				</button>
			@endif
		</div>

		@if(config('cookie-buzz.policy_links') != null)
			@if(count(config('cookie-buzz.policy_links')) > 0)
				<div class="cookie-buzz-links-container">
					@foreach (config('cookie-buzz.policy_links') as $links)
						<div class="cookie-buzz-link-item">
							<a target="_blank" rel="noopener noreferrer" href="{{ $links['link'] }}"
							class="cookie-buzz-link">
								@lang($links['text'])
							</a>
						</div>
					@endforeach
				</div>
			@endif
		@endif
	</div>
</div>

<div id="cookie-buzz-preferences-wrapper">
	<div id="cookie-buzz-preferences">
		<div>
			<div class="cookie-buzz-preferences-title">@lang(config('cookie-buzz.cookie_modal_title', 'Cookie Preferences '))
				<button type="button" id="cookie-buzz-preferences-close" aria-label="@lang('Close cookie preferences')">
                <svg width="12" height="12" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M12 4L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                    <path d="M4 4L12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                </svg>
            </button>
		</div>
			<p class="cookie-buzz-preferences-description">@lang(config('cookie-buzz.cookie_modal_description'))</p>
		</div>

		<div class="cookie-buzz-categories">
			@foreach (config('cookie-buzz.cookie_categories') as $category => $details)
				@if ($details['enabled'])
					<div class="cookie-buzz-category cookie-buzz-category-{{ $category }}">
						<div class="cookie-buzz-category-header">
							<h3 class="cookie-buzz-category-title"> <i>+</i> {{ __($details['title']) }}</h3>
							<label class="cookie-toggle">
								<input
									type="checkbox"
									id="cookie-buzz-checkbox-{{ $category }}"
									{{ $details['locked'] ? 'disabled checked' : '' }}
									data-category="{{ $category }}"
									data-action="{{ $details['js_action'] ?? null }}"
									aria-label="{{ __($details['title']) }} toggle"
									onclick="cookieBuzzUpdate(this)"
								>
								<span class="cookie-toggle-slider"></span>
							</label>
						</div>
						<p class="cookie-buzz-category-description">{{ __($details['description']) }}</p>
					</div>
				@endif
			@endforeach

			<div class="cookie-buzz-preferences-tip">
				@lang(config('cookie-buzz.cookie_modal_policy_text', 'Click the checkbox to update your cookie policy.'))
			</div>
		</div>

		<div class="cookie-buzz-preferences-modal-footer">
            <div class="cookie-buzz-preferences-group">
				<button type="button" id="cookie-buzz-accept-preferences" class="cookie-buzz-button cookie-buzz-button-accept" aria-label="@lang('Accept cookies')">
					@lang(config('cookie-buzz.cookie_accept_btn_text', 'Accept all'))
				</button>
				<button type="button" id="cookie-buzz-reject-preferences" class="cookie-buzz-button cookie-buzz-button-reject" aria-label="@lang('Reject cookies')">
					@lang(config('cookie-buzz.cookie_reject_btn_text', 'Reject all'))
				</button>
            </div>
        </div>
	</div>
</div>

<script>
	const cookieBuzzBanner = document.getElementById('cookie-buzz-banner-wrapper')
	const cookieBuzzModal = document.getElementById('cookie-buzz-preferences-wrapper')
	const cookieBuzzClose = document.getElementById('cookie-buzz-preferences-close')
	const cookieBuzzOpen = document.getElementById('cookie-buzz-preferences-open')
	const cookieBuzzAccept = document.getElementById('cookie-buzz-accept')
	const cookieBuzzReject = document.getElementById('cookie-buzz-reject')
	const cookieBuzzAcceptPreferences = document.getElementById('cookie-buzz-accept-preferences')
	const cookieBuzzRejectPreferences = document.getElementById('cookie-buzz-reject-preferences')

	cookieBuzzClose.addEventListener('click', function(e) {
		toggleCookieBuzzPreferences()
	})

	cookieBuzzOpen.addEventListener('click', function(e) {
		toggleCookieBuzzPreferences()
	})

	cookieBuzzReject.addEventListener('click', function(e) {
		toggleCookieBuzzBanner()
		rejectCookieBuzz()
	})

	cookieBuzzAccept.addEventListener('click', function(e) {
		toggleCookieBuzzBanner()
		allowCookieBuzz()
	})

	cookieBuzzRejectPreferences.addEventListener('click', function(e) {
		closeCookieBuzzBanner()
		rejectCookieBuzz()
	})

	cookieBuzzAcceptPreferences.addEventListener('click', function(e) {
		closeCookieBuzzBanner()
		allowCookieBuzz()
	})

	function toggleCookieBuzzPreferences() {
		cookieBuzzModal.classList.toggle('is-visible')
	}

	function toggleCookieBuzzBanner() {
		cookieBuzzBanner.classList.toggle('hide-banner')
		localStorage.setItem('cookie-buuz-banner-{{ $prefix }}', localStorage.getItem('cookie-buuz-banner-{{ $prefix }}') == 1 ? 0 : 1)
	}

	function closeCookieBuzzBanner() {
		cookieBuzzBanner.classList.add('hide-banner')
		localStorage.setItem('cookie-buuz-banner-{{ $prefix }}', 1)
	}

	function cookieBuzzUpdate(checkbox) {
		const key = 'cookie_buzz_{{ $prefix }}_' + checkbox.dataset.category;
		localStorage.setItem(key, checkbox.checked);
		// Run action function if checked
		if(checkbox.checked){
			evalAction(checkbox.dataset.action)
		}
		console.log("Update cookie key:", key, "Value:", localStorage.getItem(key));
	}

	function evalAction(name) {
		// Run function from string
		if(name) {
			const action = eval(name);
			action()
		}
	}

	function allowCookieBuzz() {
		const obj = JSON.parse(@json($categories));

		Object.entries(obj).forEach(category => {
			const name = category[0] ?? 'null';
			const details = category[1] ?? null;
			const key = 'cookie_buzz_{{ $prefix }}_' + name;
			const el = document.getElementById('cookie-buzz-checkbox-' + name)

			if(el && !details['locked']) {
				el.checked = true
				localStorage.setItem(key, true);
				evalAction(details['js_action'])
			}
		})
	}

	function rejectCookieBuzz() {
		const obj = JSON.parse(@json($categories));

		Object.entries(obj).forEach(category => {
			const name = category[0] ?? 'null';
			const details = category[1] ?? null;
			const key = 'cookie_buzz_{{ $prefix }}_' + name;
			const el = document.getElementById('cookie-buzz-checkbox-' + name)

			if(el && !details['locked']) {
				el.checked = false
				localStorage.setItem(key, false);
				evalAction(details['js_action_reject'])
			}
		})
	}

	function loadCookieBuzzBanner() {
		const hide = localStorage.getItem('cookie-buuz-banner-{{ $prefix }}') ?? 0
		if(hide == 1) {
			cookieBuzzBanner.classList.add('hide-banner')
		} else {
			cookieBuzzBanner.classList.remove('hide-banner')
		}
	}

	function loadCookieBuzz() {
		const obj = JSON.parse(@json($categories));

		Object.entries(obj).forEach(category => {
			const name = category[0] ?? 'null';
			const details = category[1] ?? null;
			const key = 'cookie_buzz_{{ $prefix }}_' + name;
			const el = document.getElementById('cookie-buzz-checkbox-' + name)

			// console.log("--------------");
			// console.log("Category:", category);
			// console.log("Category Key:", key);
			// console.log("Category Details:", details);
			// console.log("Current Storage:", localStorage.getItem(key));
			// console.log("Locked: ", details['locked']);

			if(el && !details['locked']) {
				el.checked = localStorage.getItem(key) == 'true' ? true : false;
				if(el.checked){
					evalAction(details['js_action'])
				}
			}
		})
	}

	loadCookieBuzzBanner();
	loadCookieBuzz();
</script>