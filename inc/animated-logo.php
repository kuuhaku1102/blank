<?php
// Function to generate a stylish tech-glitch animated version of the logo
// Can be used anywhere as a fallback thumbnail or cool tech visual

function blank_get_animated_logo_html($size = 'large') {
    $logo_url = get_template_directory_uri() . '/assets/images/logo.jpg';
    $size_px = $size === 'small' ? '80px' : '180px';
    ob_start();
    ?>
    <div class="tech-animated-logo-wrap tech-size-<?php echo esc_attr($size); ?>">
        
        <!-- Subtle Tech Particles Background -->
        <div class="tech-particles">
            <div class="particle p1"></div>
            <div class="particle p2"></div>
            <div class="particle p3"></div>
            <div class="particle p4"></div>
            <div class="particle p5"></div>
        </div>

        <div class="tech-logo-inner">
            <img src="<?php echo esc_url($logo_url); ?>" class="tech-logo-base" alt="Logo">
            
            <!-- Shimmer effect overlay layer -->
            <div class="tech-logo-shimmer">
                <div class="shimmer-sweep"></div>
            </div>
            
            <!-- Soft shadow -->
            <div class="tech-logo-shadow"></div>
        </div>
    </div>
    
    <style>
        .tech-animated-logo-wrap {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            min-height: 220px;
            background: linear-gradient(135deg, rgba(245,247,250,0.8), rgba(230,235,240,0.9));
            overflow: hidden;
            border-radius: inherit;
        }
        
        /* Stylish tech background particles */
        .tech-particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }
        .tech-particles .particle {
            position: absolute;
            background: var(--highlight-color, #1a56db);
            border-radius: 50%;
            opacity: 0.2;
            filter: blur(2px);
            animation: techFloat 8s infinite ease-in-out;
        }
        .particle.p1 { width: 40px; height: 40px; top: 10%; left: 15%; animation-duration: 12s; }
        .particle.p2 { width: 80px; height: 80px; bottom: 20%; right: 10%; animation-duration: 15s; animation-delay: -2s; opacity: 0.1; }
        .particle.p3 { width: 20px; height: 20px; top: 40%; right: 25%; animation-duration: 9s; animation-delay: -4s; }
        .particle.p4 { width: 60px; height: 60px; bottom: 10%; left: 20%; animation-duration: 14s; animation-delay: -5s; opacity: 0.15; }
        .particle.p5 { width: 30px; height: 30px; top: 70%; left: 50%; animation-duration: 11s; animation-delay: -1s; }

        @keyframes techFloat {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-30px) scale(1.1); }
        }

        .tech-logo-inner {
            position: relative;
            width: <?php echo $size_px; ?>;
            height: <?php echo $size_px; ?>;
            z-index: 1;
            /* Smooth floating animation */
            animation: logoHoverFloat 4s ease-in-out infinite;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(28, 37, 65, 0.15);
            background: #fff;
        }
        
        .tech-logo-base {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: contain;
            border-radius: 12px;
        }

        /* Shimmer Masking Setup */
        .tech-logo-shimmer {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            overflow: hidden;
            border-radius: 12px;
        }

        .shimmer-sweep {
            position: absolute;
            top: 0; left: -150%;
            width: 50%; height: 100%;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.8), transparent);
            transform: skewX(-25deg);
            animation: shimmerSweep 3s infinite cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Shadow beneath the floating logo */
        .tech-logo-shadow {
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 10px;
            background: radial-gradient(ellipse at center, rgba(145,166,180,0.4) 0%, transparent 70%);
            border-radius: 50%;
            animation: shadowScale 4s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes logoHoverFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }

        @keyframes shadowScale {
            0%, 100% { transform: translateX(-50%) scale(1); opacity: 0.6; }
            50% { transform: translateX(-50%) scale(0.8); opacity: 0.3; }
        }

        @keyframes shimmerSweep {
            0% { left: -150%; }
            50%, 100% { left: 200%; }
        }
    </style>
    <?php
    return ob_get_clean();
}
