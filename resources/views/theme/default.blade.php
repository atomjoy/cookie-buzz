<style>
:root {
	--cookie-color-green: #099949;
	--cookie-color-blue: #0a5dbd;
	--cookie-color-orange: #ea8600;
	--cookie-color-red: #eb0248;
	--cookie-color-checkbox: #e6f4ea;
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
	background: #11111122;
	z-index: 100000;
}

#cookie-buzz-preferences-wrapper {
	display: none;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #11111122;
	z-index: 100001;
}

#cookie-buzz-banner {
	background: #fff;
	color: #000;
	position: absolute;
	bottom: 10px;
	left: 10px;
	width: 90%;
	height: auto;
	max-width: 500px;
	overflow: hidden;
}

#cookie-buzz-preferences {
	color: #000;
	background: #fff;
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
	margin-top: 15px;
	margin-bottom: 5px;
	border-block: 1px solid #ddd;
}

.cookie-buzz-button-container {
	float: left;
	width: 100%;
	padding: 15px;
	display: flex;
	align-items: center;
	justify-content: space-between;
}

.cookie-buzz-links-container {
	float: left;
	width: 100%;
	padding: 10px 15px;
	display: flex;
	align-items: center;
	background: #f9f9f9;
}

.cookie-buzz-link-item {
	float: left;
	margin-right: 10px;
	font-size: 13px;
	color: #111;
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
	padding: 5px 10px;
	background: #111;
	color: #fff;
	margin-right: 15px;
	border-radius: 6px;
	transition: all .6s;
	cursor: pointer;
}

.cookie-buzz-button-preferences {
	float: right;
	margin-right: 0px;
}

.cookie-buzz-accept, .cookie-buzz-preferences-accept {
	background: #111;
}

.cookie-buzz-reject, .cookie-buzz-preferences-reject {
	background: #111;
}

.cookie-buzz-accept:hover, .cookie-buzz-preferences-accept:hover {
	background: #099949;
}

.cookie-buzz-reject:hover, .cookie-buzz-preferences-reject:hover {
	background: #eb0248;
}

.cookie-buzz-preferences-modal-footer {
	float: left;
	width: 100%;
	padding-top: 10px;
}

/* Improved Toggle Switch */
.cookie-toggle {
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
    background-color: #ccc;
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
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    border-radius: 50%;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}

.cookie-toggle input:checked + .cookie-toggle-slider {
    background-color: #e6f4ea;
}

.cookie-toggle input:checked + .cookie-toggle-slider:before {
    transform: translateX(20px);
}

.cookie-toggle input:disabled + .cookie-toggle-slider {
    background-color: #95a5a6;
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
	color: #111;
	border-radius: 6px;
	font-size: 14px;
	cursor: pointer;
}
</style>