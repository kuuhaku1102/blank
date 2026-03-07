<?php
// Function to generate a stylish tech-glitch animated version of the logo
// Can be used anywhere as a fallback thumbnail or cool tech visual

function blank_get_animated_logo_html($size = 'large') {
    ob_start();
    ?>
    <div class="digital-tech-wrapper tech-size-<?php echo esc_attr($size); ?>">
        <!-- Digital Grid Background -->
        <div class="digital-grid-overlay"></div>
        
        <!-- Cyber HUD Elements / SVG -->
        <svg class="digital-cyber-svg" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="cyber-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="rgba(145, 166, 180, 0.2)" />
                    <stop offset="100%" stop-color="rgba(28, 37, 65, 0.4)" />
                </linearGradient>
                <filter id="cyber-glow" x="-20%" y="-20%" width="140%" height="140%">
                    <feGaussianBlur stdDeviation="2" result="blur" />
                    <feComposite in="SourceGraphic" in2="blur" operator="over" />
                </filter>
            </defs>

            <!-- Rotating Radar Rings -->
            <g class="hud-rings">
                <circle cx="100" cy="100" r="85" fill="none" stroke="#1c2541" stroke-width="0.5" stroke-dasharray="10 20" opacity="0.3" class="ring-spin-slow" />
                <circle cx="100" cy="100" r="70" fill="none" stroke="rgb(145, 166, 180)" stroke-width="1.5" stroke-dasharray="80 20 10 20" class="ring-spin-fast" />
                <circle cx="100" cy="100" r="55" fill="none" stroke="#e53935" stroke-width="0.5" stroke-dasharray="2 4" class="ring-spin-reverse" />
            </g>

            <!-- Digital Circuit Lines -->
            <g class="circuit-board">
                <!-- Top Left -->
                <path d="M 20 40 L 40 40 L 50 50 L 80 50" fill="none" stroke="#1c2541" stroke-width="1.5" class="circuit-path cp-1" />
                <circle cx="80" cy="50" r="3" fill="#e53935" class="circuit-node cn-1" filter="url(#cyber-glow)" />
                <circle cx="20" cy="40" r="2" fill="rgb(145, 166, 180)" class="circuit-node cn-2" />

                <!-- Bottom Right -->
                <path d="M 180 160 L 160 160 L 150 150 L 120 150" fill="none" stroke="rgb(145, 166, 180)" stroke-width="1.5" class="circuit-path cp-2" />
                <circle cx="120" cy="150" r="3" fill="#1c2541" class="circuit-node cn-3" />
                <circle cx="180" cy="160" r="2" fill="#e53935" class="circuit-node cn-4" filter="url(#cyber-glow)" />

                <!-- Top Right -->
                <path d="M 160 30 L 150 40 L 120 40" fill="none" stroke="#e53935" stroke-width="1" class="circuit-path cp-3" />
                <circle cx="120" cy="40" r="2" fill="rgb(145, 166, 180)" class="circuit-node cn-5" />

                <!-- Bottom Left -->
                <path d="M 40 170 L 50 160 L 80 160" fill="none" stroke="#1c2541" stroke-width="1" class="circuit-path cp-4" />
                <circle cx="80" cy="160" r="2" fill="rgb(145, 166, 180)" class="circuit-node cn-6" />
            </g>

            <!-- Central Data Core -->
            <polygon points="100,75 125,100 100,125 75,100" fill="url(#cyber-grad)" stroke="rgb(145, 166, 180)" stroke-width="2" class="data-core-shape" />
            <polygon points="100,85 115,100 100,115 85,100" fill="#1c2541" class="data-core-inner" />
            <circle cx="100" cy="100" r="4" fill="#e53935" filter="url(#cyber-glow)" class="data-core-eye" />
            
            <!-- Tech Data Bars -->
            <g class="data-bars" transform="translate(140, 75)">
                <rect x="0" y="0" width="4" height="15" fill="rgb(145, 166, 180)" class="d-bar db-1" />
                <rect x="8" y="0" width="4" height="25" fill="#1c2541" class="d-bar db-2" />
                <rect x="16" y="0" width="4" height="10" fill="#e53935" class="d-bar db-3" />
                <rect x="24" y="0" width="4" height="20" fill="rgb(145, 166, 180)" class="d-bar db-4" />
            </g>
            <g class="data-bars" transform="translate(45, 105)">
                <rect x="0" y="0" width="4" height="20" fill="#1c2541" class="d-bar db-4" />
                <rect x="8" y="0" width="4" height="10" fill="rgb(145, 166, 180)" class="d-bar db-3" />
                <rect x="16" y="0" width="4" height="25" fill="#e53935" class="d-bar db-2" />
                <rect x="24" y="0" width="4" height="15" fill="rgb(145, 166, 180)" class="d-bar db-1" />
            </g>
            
            <!-- Scanning Line -->
            <line x1="10" y1="100" x2="190" y2="100" stroke="#e53935" stroke-width="1.5" opacity="0.6" class="hud-scanner" filter="url(#cyber-glow)" />

        </svg>

        <!-- Streaming Code Snippets (Hex/Binary vibes) -->
        <div class="cyber-code code-left">0x7F<br>SYS<br>ACK</div>
        <div class="cyber-code code-right">DATA<br>SYNC<br>0x9C</div>

    </div>

    <style>
        .digital-tech-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 260px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(28, 37, 65, 0.08);
            border: 1px solid rgba(145, 166, 180, 0.2);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Courier New', Courier, monospace;
        }

        /* High-tech Blueprint/Digital Grid */
        .digital-grid-overlay {
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(145, 166, 180, 0.15) 1px, transparent 1px),
                linear-gradient(90deg, rgba(145, 166, 180, 0.15) 1px, transparent 1px);
            background-size: 20px 20px;
            z-index: 0;
        }
        
        /* Subtle Vignette for depth */
        .digital-tech-wrapper::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, transparent 40%, rgba(248, 249, 250, 0.9) 100%);
            z-index: 1;
            pointer-events: none;
        }

        .digital-cyber-svg {
            position: relative;
            z-index: 2;
            width: 80%;
            max-width: 250px;
            height: auto;
            aspect-ratio: 1;
        }

        /* SVG Animations */
        .hud-rings { transform-origin: 100px 100px; }
        .ring-spin-slow { animation: cyberSpin 20s linear infinite; }
        .ring-spin-fast { animation: cyberSpin 10s linear infinite; }
        .ring-spin-reverse { animation: cyberSpin 15s linear infinite reverse; }

        .circuit-path {
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
            animation: circuitDraw 4s infinite cubic-bezier(0.4, 0, 0.2, 1) alternate;
        }
        .cp-1 { animation-delay: 0s; }
        .cp-2 { animation-delay: 1.5s; }
        .cp-3 { animation-delay: 0.5s; }
        .cp-4 { animation-delay: 2s; }

        .circuit-node {
            animation: nodeBlink 2s infinite alternate;
        }
        .cn-1 { animation-delay: 0.5s; }
        .cn-2 { animation-delay: 1s; }
        .cn-3 { animation-delay: 2s; }
        .cn-4 { animation-delay: 2.5s; }
        
        .data-core-shape {
            transform-origin: 100px 100px;
            animation: coreSpin 12s linear infinite;
        }
        .data-core-inner {
            transform-origin: 100px 100px;
            animation: coreSpin 8s linear infinite reverse;
        }
        .data-core-eye {
            animation: eyePulse 1.5s infinite alternate;
        }

        .d-bar {
            transform-origin: bottom;
            animation: barJump 1s infinite alternate ease-in-out;
        }
        .db-1 { animation-duration: 0.8s; }
        .db-2 { animation-duration: 1.2s; }
        .db-3 { animation-duration: 0.9s; }
        .db-4 { animation-duration: 1.5s; }

        .hud-scanner {
            transform-origin: 100px 100px;
            animation: cyberScan 3s infinite linear;
        }

        /* Streaming Text */
        .cyber-code {
            position: absolute;
            z-index: 2;
            color: #1c2541;
            font-size: 0.7rem;
            font-weight: bold;
            line-height: 1.2;
            opacity: 0.5;
        }
        .code-left {
            left: 20px;
            top: 40px;
            border-left: 2px solid #e53935;
            padding-left: 5px;
            animation: textFlicker 4s infinite alternate;
        }
        .code-right {
            right: 20px;
            bottom: 40px;
            text-align: right;
            border-right: 2px solid rgb(145, 166, 180);
            padding-right: 5px;
            animation: textFlicker 5s infinite alternate-reverse;
        }

        /* Keyframes */
        @keyframes cyberSpin { 100% { transform: rotate(360deg); } }
        @keyframes coreSpin { 100% { transform: rotate(360deg); } }
        @keyframes circuitDraw {
            0%, 20% { stroke-dashoffset: 100; }
            80%, 100% { stroke-dashoffset: 0; }
        }
        @keyframes nodeBlink {
            0% { opacity: 0.2; transform: scale(0.8); }
            100% { opacity: 1; transform: scale(1.2); }
        }
        @keyframes eyePulse {
            0% { opacity: 0.6; transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1.4); }
        }
        @keyframes barJump {
            0% { transform: scaleY(0.3); }
            100% { transform: scaleY(1.2); }
        }
        @keyframes cyberScan {
            0% { transform: translateY(-70px); opacity: 0; }
            10%, 90% { opacity: 0.7; }
            100% { transform: translateY(70px); opacity: 0; }
        }
        @keyframes textFlicker {
            0%, 100% { opacity: 0.5; }
            45% { opacity: 0.5; }
            50% { opacity: 0.1; }
            55% { opacity: 0.8; }
        }
    </style>
    <?php
    return ob_get_clean();
}
