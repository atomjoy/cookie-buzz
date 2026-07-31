<style>
:root {
	--cookie-buzz-bg: #ffffff;
	--cookie-buzz-text: #111111;
	--cookie-buzz-border: #e9e9e9;
	--cookie-buzz-policy-bg: #f0f0f0;
	--cookie-buzz-btn-bg: #111;
	--cookie-buzz-btn-text: #fff;
	--cookie-buzz-checkbox: #ccc;
	--cookie-buzz-checkbox-enabled: #b9f4ca;
	--cookie-buzz-checkbox-disabled: #95a5a6;

	--cookie-buzz-green: #099949;
	--cookie-buzz-blue: #0a5dbd;
	--cookie-buzz-orange: #ea8600;
	--cookie-buzz-red: #eb0248;
	--cookie-buzz-mate: #e6f4ea;

	--cookie-buzz-g-green: #3aa757;
	--cookie-buzz-g-blue: #4688f1;
	--cookie-buzz-g-navy: #0b57d0;
	--cookie-buzz-g-red: #ea4335;
	--cookie-buzz-g-yellow: #fbbc04;
}


[theme="dark"], .dark {
    --cookie-buzz-bg: #161a1c;
    --cookie-buzz-text: #f0f0f0;
	--cookie-buzz-border: #252525;
    --cookie-buzz-policy-bg: #111111;
	--cookie-buzz-btn-bg: #fff;
	--cookie-buzz-btn-text: #111;
	--cookie-buzz-checkbox: #ccc;
	--cookie-buzz-checkbox-enabled: #b9f4ca;
	--cookie-buzz-checkbox-disabled: #95a5a6;
}

#cookie-buzz-icon {
	float: left;
	width: 40px;
	height: 40px;
	margin-right: 10px;
}

#cookie-buzz-preferences-close {
	float: right;
	padding: 5px;
	background: #1111;
	border-radius: 6px;
	cursor: pointer;
}

#cookie-buzz-banner-wrapper {
	position: fixed;
	top: 0px;
	left: 0px;
	width: 100%;
	height: 100%;
	background: #11111133;
	z-index: 100000;
}

#cookie-buzz-preferences-wrapper {
	display: none;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #11111133;
	z-index: 100001;
}

#cookie-buzz-banner {
	color: var(--cookie-buzz-text);
	background: var(--cookie-buzz-bg);
	position: absolute;
	bottom: 10px;
	left: 10px;
	width: 90%;
	height: auto;
	max-width: 500px;
	overflow: hidden;
}

#cookie-buzz-preferences {
	color: var(--cookie-buzz-text);
	background: var(--cookie-buzz-bg);
	position: absolute;
	padding: 20px;
	top: 50%;
	left: 50%;
	width: 90%;
	height: auto;
	max-width: 600px;
	max-height: 100%;
	overflow: hidden;
	transform: translate(-50%, -50%);
	display: flex;
	flex-direction: column;
}

#cookie-buzz-banner-header {
	float: left;
	width: 100%;
	padding: 15px;
	padding-bottom: 0px;
	display: flex;
	align-items: center;
	margin-bottom: 15px;
}

.cookie-buzz-categories {
	padding-right: 10px;
	overflow-y: auto;
	scrollbar-width: thin;
	max-height: 400px;
	padding: 15px;
	padding-top: 25px;
	padding-inline: 0px;
	margin-top: 15px;
	margin-bottom: 5px;
	border-block: 1px solid var(--cookie-buzz-border);
}

.cookie-buzz-button-container {
	float: left;
	width: 100%;
	padding: 15px;
}

.cookie-buzz-links-container {
	float: left;
	width: 100%;
	padding: 10px 15px;
	display: flex;
	align-items: center;
	background: var(--cookie-buzz-policy-bg);
}

.cookie-buzz-link-item {
	float: left;
	margin-right: 10px;
	font-size: 13px;
	color: var(--cookie-buzz-text);
}

.cookie-buzz-banner-title {
	font-size: 16px;
	font-weight: 600;
}

.cookie-buzz-banner-description {
	float: left;
	width: 100%;
	padding-inline: 15px;
	font-size: 15px;
	opacity: .7;
}

.cookie-buzz-preferences-title {
	font-size: 17px;
	font-weight: 600
}

.cookie-buzz-preferences-description {
	font-size: 15px;
	opacity: .7;
}

.cookie-buzz-preferences-tip {
	float: left;
	width: 100%;
	margin-top: 10px;
	font-size: 13px;
}

.cookie-buzz-category {
	float: left;
	width: 100%;
	margin-bottom: 15px;
}

.cookie-buzz-category-header {
	display: flex;
	justify-content: space-between;
}

.cookie-buzz-category-title {
	font-size: 15px;
	font-weight: 500;
}

.cookie-buzz-category-description {
	font-size: 14px;
	margin-top: 5px;
	opacity: .7;
}

.cookie-buzz-button {
	font-size: 15px;
	float: left;
	padding: 8px 10px;
	color: var(--cookie-buzz-btn-text);
	background: var(--cookie-buzz-btn-bg);
	border-radius: 6px;
	transition: all .6s;
	cursor: pointer;
}

.cookie-buzz-button-preferences {
	float: left;
	width: 100%;
}

.cookie-buzz-button-preferences:hover {
	background: var(--cookie-buzz-orange);
}

.cookie-buzz-button-accept, .cookie-buzz-button-preferences-accept {
	color: var(--cookie-buzz-btn-text);
	background: var(--cookie-buzz-btn-bg);
	width: 50%;
}

.cookie-buzz-button-reject, .cookie-buzz-button-preferences-reject {
	color: var(--cookie-buzz-btn-text);
	background: var(--cookie-buzz-btn-bg);
	width: 50%;
}

.cookie-buzz-button-accept:hover, .cookie-buzz-button-preferences-accept:hover {
	background: var(--cookie-buzz-green);
}

.cookie-buzz-button-reject:hover, .cookie-buzz-button-preferences-reject:hover {
	background: var(--cookie-buzz-red);
}

.cookie-buzz-preferences-modal-footer {
	float: left;
	width: 100%;
	padding-top: 10px;
}

.cookie-buzz-preferences-group {
	float: left;
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 20px;
}

.cookie-buzz-button-actions {
	float: left;
	width: 100%;
	margin-bottom: 15px;
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 20px;
}

/* Improved Toggle Switch */
.cookie-toggle {
	float: right;
    position: relative;
    display: inline-block;
    width: 44px;
    height: 24px;
}

.cookie-toggle input {
    opacity: 0;
    width: 0;
    height: 0;
}

.cookie-toggle-slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: var(--cookie-buzz-checkbox);
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    border-radius: 24px;
}

.cookie-toggle-slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 2px;
    bottom: 2px;
    background-color: white;
    border-radius: 50%;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.cookie-toggle input:checked + .cookie-toggle-slider {
    background-color: var(--cookie-buzz-checkbox-enabled);
}

.cookie-toggle input:checked + .cookie-toggle-slider:before {
    transform: translateX(20px);
}

.cookie-toggle input:disabled + .cookie-toggle-slider {
    background-color: var(--cookie-buzz-checkbox-disabled);
    cursor: not-allowed;
}

.cookie-toggle input:focus + .cookie-toggle-slider {
    box-shadow: none;
}

/* Banner toggle */
#cookie-buzz-banner-wrapper.hide-banner {
    display: none;
    pointer-events: none;
}

/* Modal preferences toggle */
#cookie-buzz-preferences-wrapper.is-visible {
    display: inherit;
    pointer-events: auto;
}

/* Toggle cookie banner */
#cookie-buzz-preferences-toggle {
	float: left;
	color: var(--cookie-buzz-text);
	border-radius: 6px;
	font-size: 14px;
	cursor: pointer;
}

/* Summary */

.cookie-buzz-details {
	float: left;
	width: 100%;
	margin-bottom: 5px;
	border-radius: 6px;
}

.cookie-buzz-details[open] .cookie-buzz-summary i{
	transform: rotate(45deg);
}

.cookie-buzz-summary {
	float: left;
	width: 100%;
	padding: 10px 15px;
	border-radius: 6px;
	border: 1px solid var(--cookie-buzz-border);
	cursor: pointer;
}

.cookie-buzz-summary::marker {
	cursor: pointer;
}

.cookie-buzz-summary-description {
	float: left;
	width: 100%;
	padding: 10px 15px;
	margin-bottom: 5px;
	font-size: 14px;
	opacity: .75;
}
</style>