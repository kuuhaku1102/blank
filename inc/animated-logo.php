<?php
// Function to generate a stylish tech-glitch animated version of the logo
// Can be used anywhere as a fallback thumbnail or cool tech visual

function blank_get_animated_logo_html($size = 'large') {
    $size_px = $size === 'small' ? '80px' : '220px';
    ob_start();
    ?>
    <div class="cube-tech-wrapper tech-size-<?php echo esc_attr($size); ?>">
        <svg class="cube-abstract-svg" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" style="width:<?php echo $size_px; ?>; height:<?php echo $size_px; ?>;">
            <defs>
                <!-- Isometric Cube Faces Gradients -->
                <linearGradient id="cube-top" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#ffffff"/>
                    <stop offset="100%" stop-color="#f8f9fa"/>
                </linearGradient>
                <linearGradient id="cube-left" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#f1f5f9"/>
                    <stop offset="100%" stop-color="#e2e8f0"/>
                </linearGradient>
                <linearGradient id="cube-right" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#e9ecef"/>
                    <stop offset="100%" stop-color="#cbd5e1"/>
                </linearGradient>
                
                <!-- Soft Drop Shadow for Cubes -->
                <filter id="cube-shadow" x="-50%" y="-20%" width="200%" height="200%">
                    <feDropShadow dx="0" dy="12" stdDeviation="8" flood-color="#1c2541" flood-opacity="0.08" />
                </filter>
                <filter id="cube-blur" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur stdDeviation="1.5" />
                </filter>

                <!-- Reusable Isometric Cube -->
                <g id="iso-cube">
                    <!-- Top Face -->
                    <polygon points="0,-20 17.3,-10 0,0 -17.3,-10" fill="url(#cube-top)" stroke="#ffffff" stroke-width="0.5" stroke-linejoin="round"/>
                    <!-- Left Face -->
                    <polygon points="-17.3,-10 0,0 0,20 -17.3,10" fill="url(#cube-left)" stroke="#ffffff" stroke-width="0.5" stroke-linejoin="round"/>
                    <!-- Right Face -->
                    <polygon points="0,0 17.3,-10 17.3,10 0,20" fill="url(#cube-right)" stroke="#ffffff" stroke-width="0.5" stroke-linejoin="round"/>
                </g>
            </defs>

            <!-- Base Ground Shadow (Optional subtle depth) -->
            <ellipse cx="100" cy="170" rx="45" ry="12" fill="#1c2541" opacity="0.03" filter="url(#cube-blur)" class="base-shadow" />

            <g class="cubes-container">
                <!-- Distant out-of-focus cubes (background) -->
                <g transform="translate(40, 50) scale(0.6)" filter="url(#cube-blur)" opacity="0.6">
                    <g class="cube-float-4"><use href="#iso-cube" /></g>
                </g>
                <g transform="translate(160, 60) scale(0.5)" filter="url(#cube-blur)" opacity="0.5">
                    <g class="cube-float-5"><use href="#iso-cube" /></g>
                </g>

                <!-- Midground cubes -->
                <g transform="translate(50, 130) scale(0.9)">
                    <g class="cube-float-2"><use href="#iso-cube" filter="url(#cube-shadow)" /></g>
                </g>
                <g transform="translate(155, 120) scale(1.1)">
                    <g class="cube-float-3"><use href="#iso-cube" filter="url(#cube-shadow)" /></g>
                </g>
                <g transform="translate(100, 35) scale(0.7)">
                    <g class="cube-float-1"><use href="#iso-cube" filter="url(#cube-shadow)" /></g>
                </g>
                <g transform="translate(130, 170) scale(0.6)">
                    <g class="cube-float-6"><use href="#iso-cube" filter="url(#cube-shadow)" /></g>
                </g>

                <!-- Main foreground cube -->
                <g transform="translate(100, 95) scale(1.8)">
                    <g class="cube-float-main"><use href="#iso-cube" filter="url(#cube-shadow)" /></g>
                </g>
            </g>
            
            <!-- Delicate minimal floating particles -->
            <circle cx="80" cy="70" r="1.5" fill="#91a6b4" opacity="0.4" class="particle pt-1" />
            <circle cx="140" cy="150" r="2" fill="#91a6b4" opacity="0.3" class="particle pt-2" />
            <circle cx="120" cy="40" r="1" fill="#91a6b4" opacity="0.5" class="particle pt-3" />
        </svg>
    </div>

    <style>
        .cube-tech-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 260px;
            background: radial-gradient(circle at 50% 30%, #ffffff 0%, #f0f4f8 100%);
            border-radius: 12px;
            box-shadow: inset 0 0 40px rgba(145, 166, 180, 0.05); /* very soft inner depth */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            /* In case it's in a grid card, inherit border radius */
            border-radius: inherit;
        }

        .cube-abstract-svg {
            position: relative;
            z-index: 2;
            width: 80%;
            max-width: 250px;
            height: auto;
            aspect-ratio: 1;
            overflow: visible;
        }

        /* Container slight pan matching mouse/breath */
        .cubes-container {
            transform-origin: 100px 100px;
            animation: slowPan 15s ease-in-out infinite alternate;
        }

        /* Float Animations for individual cubes */
        .cube-float-main { animation: cubeFloat 6s cubic-bezier(0.4, 0, 0.2, 1) infinite alternate; }
        .cube-float-1 { animation: cubeFloat 7s cubic-bezier(0.4, 0, 0.2, 1) infinite alternate-reverse; }
        .cube-float-2 { animation: cubeFloat 8s cubic-bezier(0.4, 0, 0.2, 1) infinite alternate; animation-delay: 1s; }
        .cube-float-3 { animation: cubeFloat 9s cubic-bezier(0.4, 0, 0.2, 1) infinite alternate-reverse; animation-delay: 1.5s; }
        .cube-float-4 { animation: cubeFloat 10s cubic-bezier(0.4, 0, 0.2, 1) infinite alternate; animation-delay: 2s; }
        .cube-float-5 { animation: cubeFloat 11s cubic-bezier(0.4, 0, 0.2, 1) infinite alternate-reverse; animation-delay: 0.5s; }
        .cube-float-6 { animation: cubeFloat 6.5s cubic-bezier(0.4, 0, 0.2, 1) infinite alternate; animation-delay: 2.5s; }

        /* Floor shadow breathing */
        .base-shadow {
            transform-origin: center;
            animation: shadowBreathe 6s cubic-bezier(0.4, 0, 0.2, 1) infinite alternate;
        }

        /* Particles floating up */
        .particle {
            animation: particleRise 10s linear infinite;
        }
        .pt-1 { animation-delay: 0s; animation-duration: 12s; }
        .pt-2 { animation-delay: 4s; animation-duration: 15s; }
        .pt-3 { animation-delay: 2s; animation-duration: 9s; }

        /* Keyframes */
        @keyframes cubeFloat {
            0% { transform: translateY(8px); }
            100% { transform: translateY(-12px); }
        }

        @keyframes slowPan {
            0% { transform: translateY(0) rotate(0deg); }
            100% { transform: translateY(-5px) rotate(0.5deg); }
        }

        @keyframes shadowBreathe {
            0% { transform: scale(1.1); opacity: 0.04; }
            100% { transform: scale(0.9); opacity: 0.01; }
        }

        @keyframes particleRise {
            0% { transform: translateY(20px); opacity: 0; }
            20% { opacity: 0.5; }
            80% { opacity: 0.5; }
            100% { transform: translateY(-30px); opacity: 0; }
        }
    </style>
    <?php
    return ob_get_clean();
}
