
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <style>
       * {
	border: 0;
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}
:root {
	--hue: 223;
	--bg: hsl(var(--hue),10%,90%);
	--fg: hsl(var(--hue),10%,10%);
	--primary: hsl(var(--hue),90%,55%);
	--trans-dur: 0.3s;
	font-size: calc(16px + (20 - 16) * (100vw - 320px) / (1280 - 320));
}
body {
	background-color: var(--bg);
	color: var(--fg);
	font: 1em/1.5 "DM Sans", sans-serif;
	height: 100vh;
	display: grid;
	place-items: center;
	transition:
		background-color var(--trans-dur),
		color var(--trans-dur);
}
.preloader {
	text-align: center;
	max-width: 20em;
	width: 100%;
}
.preloader__text {
	position: relative;
	height: 1.5em;
}
.preloader__msg {
	animation: msg 0.3s 13.7s linear forwards;
	position: absolute;
	width: 100%;
}
.preloader__msg--last {
	animation-direction: reverse;
	animation-delay: 14s;
	visibility: hidden;
}
.cart {
	display: block;
	margin: 0 auto 1.5em auto;
	width: 8em;
	height: 8em;
}
.cart__lines,
.cart__top,
.cart__wheel1,
.cart__wheel2,
.cart__wheel-stroke {
	animation: cartLines 2s ease-in-out infinite;
}
.cart__lines {
	stroke: var(--primary);
}
.cart__top {
	animation-name: cartTop;
}
.cart__wheel1 {
	animation-name: cartWheel1;
	transform: rotate(-0.25turn);
	transform-origin: 43px 111px;
}
.cart__wheel2 {
	animation-name: cartWheel2;
	transform: rotate(0.25turn);
	transform-origin: 102px 111px;
}
.cart__wheel-stroke {
	animation-name: cartWheelStroke
}
.cart__track {
	stroke: hsla(var(--hue),10%,10%,0.1);
	transition: stroke var(--trans-dur);
}

/* Dark theme */
@media (prefers-color-scheme: dark) {
	:root {
		--bg: hsl(var(--hue),10%,10%);
		--fg: hsl(var(--hue),10%,90%);
	}
	.cart__track {
		stroke: hsla(var(--hue),10%,90%,0.1);
	}
}

/* Animations */
@keyframes msg {
	from {
		opacity: 1;
		visibility: visible;
	}
	99.9% {
		opacity: 0;
		visibility: visible;
	}
	to {
		opacity: 0;
		visibility: hidden;
	}
}
@keyframes cartLines {
	from,
	to {
		opacity: 0;
	}
	8%,
	92% {
		opacity: 1;
	}
}
@keyframes cartTop {
	from {
		stroke-dashoffset: -338;
	}
	50% {
		stroke-dashoffset: 0;
	}
	to {
		stroke-dashoffset: 338;
	}
}
@keyframes cartWheel1 {
	from {
		transform: rotate(-0.25turn);
	}
	to {
		transform: rotate(2.75turn);
	}
}
@keyframes cartWheel2 {
	from {
		transform: rotate(0.25turn);
	}
	to {
		transform: rotate(3.25turn);
	}
}
@keyframes cartWheelStroke {
	from,
	to {
		stroke-dashoffset: 81.68;
	}
	50% {
		stroke-dashoffset: 40.84;
	}
}
    </style>
</head>
<body>


    


<div class="preloader">
	<svg class="cart" role="img" aria-label="Shopping cart line animation" viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
		<g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
			<g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
				<polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
				<circle cx="43" cy="111" r="13" />
				<circle cx="102" cy="111" r="13" />
			</g>
			<g class="cart__lines" stroke="currentColor">
				<polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" stroke-dasharray="338 338" stroke-dashoffset="-338" />
				<g class="cart__wheel1" transform="rotate(-90,43,111)">
					<circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
				</g>
				<g class="cart__wheel2" transform="rotate(90,102,111)">
					<circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
				</g>
			</g>
		</g>
	</svg>
	<div class="preloader__text">
		<p class="preloader__msg">Processing to List of Stores..</p>
		<p class="preloader__msg preloader__msg--last">This is taking long. Something’s wrong.</p>
	</div>
</div>

    <!-- JavaScript to Redirect After 3 Seconds -->
    <script>
        // Function to redirect after a delay
        function redirectAfterDelay(url, delay) {
            setTimeout(function() {
                window.location.href = url;
            }, delay);
        }

        // Call the function with the desired URL and delay time (in milliseconds)
        redirectAfterDelay("store.php", 2000); // 3000 milliseconds = 3 seconds
    </script>
</body>
</html>
