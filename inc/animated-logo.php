<?php
// Function to generate a stylish tech-glitch animated version of the logo
// Can be used anywhere as a fallback thumbnail or cool tech visual

function blank_get_animated_logo_html($size = 'large') {
    ob_start();
    ?>
    <div class="abstract-tech-wrapper tech-size-<?php echo esc_attr($size); ?>">
        <div class="tech-glass-container">
            <svg class="tech-abstract-svg" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="primary-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="var(--primary-color, #1c2541)" />
                        <stop offset="100%" stop-color="#3a4b73" />
                    </linearGradient>
                    <linearGradient id="highlight-grad" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="var(--highlight-color, #e53935)" />
                        <stop offset="100%" stop-color="#ff6b6b" />
                    </linearGradient>
                    <filter id="glow-light" x="-20%" y="-20%" width="140%" height="140%">
                        <feGaussianBlur stdDeviation="3" result="blur" />
                        <feComposite in="SourceGraphic" in2="blur" operator="over" />
                    </filter>
                    <filter id="glow-strong" x="-30%" y="-30%" width="160%" height="160%">
                        <feGaussianBlur stdDeviation="6" result="blur" />
                        <feComposite in="SourceGraphic" in2="blur" operator="over" />
                    </filter>
                </defs>

                <!-- Soft background pulse rings -->
                <circle cx="100" cy="100" r="60" fill="url(#primary-grad)" opacity="0.04" class="bg-pulse-1" />
                <circle cx="100" cy="100" r="85" fill="url(#highlight-grad)" opacity="0.02" class="bg-pulse-2" />

                <!-- Orbital Rings (Data Tracks) -->
                <g class="orbit-group-1">
                    <circle cx="100" cy="100" r="50" fill="none" stroke="url(#primary-grad)" stroke-width="1" stroke-dasharray="4 8" opacity="0.3" />
                    <circle cx="100" cy="50" r="3" fill="var(--highlight-color, #e53935)" filter="url(#glow-light)" class="data-particle" />
                </g>
                <g class="orbit-group-2">
                    <circle cx="100" cy="100" r="70" fill="none" stroke="var(--accent-color, #91a6b4)" stroke-width="0.8" stroke-dasharray="15 10 5 10" opacity="0.4" />
                    <circle cx="100" cy="30" r="2.5" fill="var(--primary-color, #1c2541)" />
                </g>

                <!-- Data Flow Waves -->
                <path d="M -20 100 Q 40 60 100 100 T 220 100" fill="none" stroke="url(#primary-grad)" stroke-width="1.5" class="data-wave wave-1" opacity="0.5"/>
                <path d="M -20 100 Q 40 140 100 100 T 220 100" fill="none" stroke="url(#highlight-grad)" stroke-width="1" class="data-wave wave-2" opacity="0.3"/>

                <!-- Core Nodes (Network) -->
                <line x1="65" y1="85" x2="100" y2="100" stroke="var(--accent-color, #91a6b4)" stroke-width="1.2" opacity="0.5" class="node-link nl-1" />
                <line x1="135" y1="80" x2="100" y2="100" stroke="var(--accent-color, #91a6b4)" stroke-width="1.2" opacity="0.5" class="node-link nl-2" />
                <line x1="105" y1="135" x2="100" y2="100" stroke="var(--accent-color, #91a6b4)" stroke-width="1.2" opacity="0.5" class="node-link nl-3" />

                <!-- Central Core -->
                <circle cx="100" cy="100" r="14" fill="url(#primary-grad)" filter="url(#glow-strong)" class="core-node" />
                
                <!-- Satellite Nodes -->
                <circle cx="65" cy="85" r="5" fill="#fff" stroke="var(--highlight-color, #e53935)" stroke-width="2" class="sub-node" />
                <circle cx="135" cy="80" r="4" fill="#fff" stroke="var(--primary-color, #1c2541)" stroke-width="2" class="sub-node sub-node-delay-1" />
                <circle cx="105" cy="135" r="6" fill="#fff" stroke="var(--primary-color, #1c2541)" stroke-width="2" class="sub-node sub-node-delay-2" />

            </svg>
        </div>
    </div>

    <style>
        .abstract-tech-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 260px;
            background: #f8fafc;
            border-radius: inherit;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* Subtle architectural grid pattern background (Trust/Authority/Minimal) */
        .abstract-tech-wrapper::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(28, 37, 65, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(28, 37, 65, 0.04) 1px, transparent 1px);
            background-size: 30px 30px;
            z-index: 0;
            mask-image: radial-gradient(circle at center, white 20%, transparent 90%);
            -webkit-mask-image: radial-gradient(circle at center, white 20%, transparent 90%);
        }

        /* Glassmorphism plate */
        .tech-glass-container {
            position: relative;
            width: 85%;
            height: 85%;
            max-width: 320px;
            max-height: 320px;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 24px;
            box-shadow: 
                0 20px 40px rgba(28, 37, 65, 0.04),
                inset 0 0 0 1px rgba(255, 255, 255, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            padding: 20px;
            box-sizing: border-box;
        }
        
        .abstract-tech-wrapper:hover .tech-glass-container {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 
                0 30px 50px rgba(28, 37, 65, 0.08),
                inset 0 0 0 1px rgba(255, 255, 255, 0.8);
            background: rgba(255, 255, 255, 0.65);
        }

        .tech-abstract-svg {
            width: 100%;
            height: 100%;
            overflow: visible;
            filter: drop-shadow(0 10px 15px rgba(28, 37, 65, 0.05));
        }

        /* SVG Animations */
        .bg-pulse-1 { animation: pulseBg 6s infinite alternate ease-in-out; }
        .bg-pulse-2 { animation: pulseBg 8s infinite alternate-reverse ease-in-out; }

        .orbit-group-1 {
            transform-origin: 100px 100px;
            animation: rotateOrbit 14s linear infinite;
        }
        .orbit-group-2 {
            transform-origin: 100px 100px;
            animation: rotateOrbit 20s linear infinite reverse;
        }
        .data-particle {
            animation: pulseParticle 2s infinite alternate;
        }

        .data-wave {
            stroke-dasharray: 400;
            stroke-dashoffset: 400;
            animation: animateWave 6s infinite linear;
            stroke-linecap: round;
        }
        .wave-2 { animation-duration: 9s; animation-direction: reverse; }

        .core-node {
            transform-origin: 100px 100px;
            animation: pulseCore 3s infinite alternate ease-in-out;
        }
        .sub-node {
            transform-origin: center;
            transform-box: fill-box;
            animation: pulseSubNode 3s infinite alternate ease-in-out;
        }
        .sub-node-delay-1 { animation-delay: 1s; }
        .sub-node-delay-2 { animation-delay: 2s; }

        .node-link {
            stroke-dasharray: 60;
            stroke-dashoffset: 60;
            animation: animateLink 3s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
            stroke-linecap: round;
        }
        .nl-1 { animation-delay: 0s; }
        .nl-2 { animation-delay: 0.8s; }
        .nl-3 { animation-delay: 1.6s; }

        @keyframes pulseBg {
            0% { transform: scale(0.85); opacity: 0.02; }
            100% { transform: scale(1.15); opacity: 0.06; }
        }
        @keyframes rotateOrbit {
            100% { transform: rotate(360deg); }
        }
        @keyframes animateWave {
            0% { stroke-dashoffset: 400; transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            100% { stroke-dashoffset: -400; transform: translateX(-5px); }
        }
        @keyframes pulseCore {
            0% { transform: scale(0.9); opacity: 0.85; filter: drop-shadow(0 0 5px rgba(28,37,65,0.2)); }
            100% { transform: scale(1.05); opacity: 1; filter: drop-shadow(0 0 15px rgba(28,37,65,0.4)); }
        }
        @keyframes pulseSubNode {
            0% { transform: scale(0.9); border-width: 1px; }
            100% { transform: scale(1.2); border-width: 3px; }
        }
        @keyframes animateLink {
            0% { stroke-dashoffset: 60; opacity: 0.1; }
            100% { stroke-dashoffset: 0; opacity: 0.7; }
        }
        @keyframes pulseParticle {
            0% { opacity: 0.4; transform: scale(0.7); }
            100% { opacity: 1; transform: scale(1.4); }
        }
    </style>
    <?php
    return ob_get_clean();
}
