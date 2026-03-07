<?php
// Function to generate a stylish tech-glitch animated version of the logo
// Can be used anywhere as a fallback thumbnail or cool tech visual

function blank_get_animated_logo_html($size = 'large') {
    $size_px = $size === 'small' ? '80px' : '220px';
    ob_start();
    ?>
    <div class="elegant-tech-wrapper tech-size-<?php echo esc_attr($size); ?>">
        <svg class="tech-svg-logo" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" style="width:<?php echo $size_px; ?>; height:<?php echo $size_px; ?>;">
            <defs>
                <linearGradient id="grad-blue" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#1a56db" />
                    <stop offset="100%" stop-color="#4e88ff" />
                </linearGradient>
                <linearGradient id="grad-dark" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#1c2541" />
                    <stop offset="100%" stop-color="#3a4b73" />
                </linearGradient>
                <linearGradient id="grad-accent" x1="0%" y1="100%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#91a6b4" />
                    <stop offset="100%" stop-color="#cbd5e1" />
                </linearGradient>
                <filter id="tech-glow" x="-20%" y="-20%" width="140%" height="140%">
                    <feGaussianBlur stdDeviation="3" result="blur" />
                    <feComposite in="SourceGraphic" in2="blur" operator="over" />
                </filter>
            </defs>

            <!-- Tech Background Rings -->
            <circle cx="100" cy="100" r="85" fill="none" stroke="url(#grad-accent)" stroke-width="0.5" stroke-dasharray="4 6" class="tech-ring tr-1" />
            <circle cx="100" cy="100" r="70" fill="none" stroke="url(#grad-blue)" stroke-width="1" stroke-dasharray="20 10 5 10" class="tech-ring tr-2" />
            <circle cx="100" cy="100" r="55" fill="none" stroke="url(#grad-dark)" stroke-width="0.5" class="tech-ring tr-3" opacity="0.3" />

            <!-- The Matrix "B" -->
            <g transform="translate(42, 35)">
                <!-- Fragmented blocks on the left (digital dissolution) -->
                <!-- Column 1 -->
                <rect x="-15" y="15" width="12" height="12" fill="url(#grad-blue)" class="tech-block tb-float-1" />
                <rect x="-25" y="55" width="10" height="10" fill="url(#grad-dark)" class="tech-block tb-float-2" />
                <rect x="-10" y="90" width="14" height="14" fill="url(#grad-accent)" class="tech-block tb-float-3" />
                
                <!-- Column 2 (Main Pillar) -->
                <rect x="0" y="0" width="20" height="20" fill="url(#grad-dark)" class="tech-block tb-pulse-1" />
                <rect x="0" y="22" width="20" height="20" fill="url(#grad-accent)" class="tech-block tb-pulse-2" />
                <rect x="0" y="44" width="20" height="20" fill="url(#grad-blue)" class="tech-block tb-pulse-3" />
                <rect x="0" y="66" width="20" height="20" fill="url(#grad-dark)" class="tech-block tb-pulse-4" />
                <rect x="0" y="88" width="20" height="20" fill="url(#grad-accent)" class="tech-block tb-pulse-5" />
                <rect x="0" y="110" width="20" height="20" fill="url(#grad-blue)" class="tech-block tb-pulse-1" />

                <!-- Column 3 (Inner connections) -->
                <rect x="22" y="0" width="20" height="20" fill="url(#grad-blue)" class="tech-block tb-pulse-5" />
                <rect x="22" y="44" width="20" height="20" fill="url(#grad-dark)" class="tech-block tb-pulse-2" />
                <rect x="22" y="110" width="20" height="20" fill="url(#grad-dark)" class="tech-block tb-pulse-4" />

                <!-- The Curves of the 'B' -->
                <!-- Top Curve -->
                <path d="M 44 10 L 70 10 C 90 10, 100 20, 100 35 C 100 50, 90 60, 70 60 L 44 60" fill="none" stroke="url(#grad-blue)" stroke-width="16" class="tech-path tp-1" />
                
                <!-- Bottom Curve -->
                <path d="M 44 60 L 75 60 C 100 60, 110 75, 110 95 C 110 115, 100 130, 75 130 L 44 130" fill="none" stroke="url(#grad-dark)" stroke-width="16" class="tech-path tp-2" />
                
                <!-- Glowing data nodes -->
                <circle cx="70" cy="35" r="4" fill="#fff" class="tech-node tn-1" filter="url(#tech-glow)" />
                <circle cx="75" cy="95" r="4" fill="#fff" class="tech-node tn-2" filter="url(#tech-glow)" />
            </g>

            <!-- Decorative Data Lines -->
            <path d="M 5 100 L 25 100" stroke="url(#grad-blue)" stroke-width="2" class="tech-line tl-1" />
            <path d="M 175 120 L 195 120" stroke="url(#grad-dark)" stroke-width="2" class="tech-line tl-2" />
        </svg>
    </div>
    
    <style>
        .elegant-tech-wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            min-height: 240px;
            background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(240,244,248,0.95));
            overflow: hidden;
            border-radius: inherit;
        }
        .elegant-tech-wrapper::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: 
                radial-gradient(rgba(26,86,219,0.06) 1px, transparent 1px);
            background-size: 24px 24px;
            z-index: 0;
        }
        .elegant-tech-wrapper::after {
            content: "";
            position: absolute;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: conic-gradient(from 0deg, transparent, rgba(26,86,219,0.03), transparent);
            animation: techRadar 10s linear infinite;
            z-index: 0;
            pointer-events: none;
        }
        
        .tech-svg-logo {
            position: relative;
            z-index: 2;
            filter: drop-shadow(0 15px 30px rgba(28, 37, 65, 0.15));
            overflow: visible;
        }

        /* Rings */
        .tech-ring {
            transform-origin: 100px 100px;
        }
        .tr-1 { animation: techSpin 24s linear infinite; }
        .tr-2 { animation: techSpin 18s linear infinite reverse; }
        .tr-3 { animation: techPulseRing 4s ease-in-out infinite alternate; }

        /* Blocks */
        .tech-block, .tech-node {
            transform-box: fill-box;
            transform-origin: center;
        }
        .tb-pulse-1 { animation: tbPulse 3s infinite alternate; animation-delay: 0s; }
        .tb-pulse-2 { animation: tbPulse 3s infinite alternate; animation-delay: 0.5s; }
        .tb-pulse-3 { animation: tbPulse 3s infinite alternate; animation-delay: 1.0s; }
        .tb-pulse-4 { animation: tbPulse 3s infinite alternate; animation-delay: 1.5s; }
        .tb-pulse-5 { animation: tbPulse 3s infinite alternate; animation-delay: 2.0s; }

        .tb-float-1 { animation: tbFloat 4s infinite ease-in-out alternate; }
        .tb-float-2 { animation: tbFloat 5s infinite ease-in-out alternate-reverse; }
        .tb-float-3 { animation: tbFloat 6s infinite ease-in-out alternate; }

        /* Paths */
        .tech-path {
            stroke-dasharray: 250;
            stroke-dashoffset: 250;
            animation: tpDraw 4s cubic-bezier(0.4, 0, 0.2, 1) infinite alternate;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .tp-1 { animation-delay: 0s; }
        .tp-2 { animation-delay: 1s; }

        /* Nodes */
        .tech-node {
            animation: tnGlow 2s infinite alternate;
        }
        .tn-1 { animation-delay: 0s; }
        .tn-2 { animation-delay: 1s; }

        /* Small Lines */
        .tech-line {
            stroke-dasharray: 40;
            stroke-dashoffset: 40;
            animation: tlShoot 3s infinite;
            stroke-linecap: round;
        }
        .tl-1 { animation-delay: 0s; }
        .tl-2 { animation-delay: 1.5s; }

        /* Keyframes */
        @keyframes techSpin { 100% { transform: rotate(360deg); } }
        @keyframes techPulseRing { 0% { transform: scale(0.95); opacity: 0.2; } 100% { transform: scale(1.05); opacity: 0.5; } }
        @keyframes tbPulse { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.6; transform: scale(0.8); } }
        @keyframes tbFloat { 0% { transform: translate(0, 0); opacity: 0.5; } 100% { transform: translate(-8px, -12px); opacity: 1; } }
        @keyframes tpDraw { 0%, 20% { stroke-dashoffset: 250; } 80%, 100% { stroke-dashoffset: 0; } }
        @keyframes tnGlow { 0% { opacity: 0.3; transform: scale(0.8); } 100% { opacity: 1; transform: scale(1.2); } }
        @keyframes tlShoot { 0% { stroke-dashoffset: 40; } 50%, 100% { stroke-dashoffset: -40; } }
        @keyframes techRadar { 100% { transform: rotate(360deg); } }
    </style>
    <?php
    return ob_get_clean();
}
