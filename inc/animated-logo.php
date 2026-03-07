<?php
// Function to generate a stylish tech-glitch animated version of the logo
// Can be used anywhere as a fallback thumbnail or cool tech visual

function blank_get_animated_logo_html($size = 'large') {
    $logo_url = get_template_directory_uri() . '/assets/images/logo-icon.png';
    $size_px = $size === 'small' ? '80px' : '150px';
    ob_start();
    ?>
    <div class="tech-animated-logo-wrap tech-size-<?php echo esc_attr($size); ?>">
        <div class="tech-logo-inner">
            <img src="<?php echo esc_url($logo_url); ?>" class="tech-logo-base" alt="Logo">
            <img src="<?php echo esc_url($logo_url); ?>" class="tech-logo-glitch glitch-1" alt="Logo">
            <img src="<?php echo esc_url($logo_url); ?>" class="tech-logo-glitch glitch-2" alt="Logo">
            <div class="tech-scanline"></div>
        </div>
    </div>
    
    <!-- We generate styles inline so they apply independently if this is embedded in an archive card or single post -->
    <style>
        .tech-animated-logo-wrap {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            min-height: 200px;
            background: linear-gradient(135deg, rgba(26,86,219,0.03), rgba(145,166,180,0.08));
            overflow: hidden;
            /* Allow parent container to control rounding if needed, else provide generic */
            border-radius: inherit;
        }
        .tech-animated-logo-wrap::before {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: 
                linear-gradient(rgba(26,86,219,0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(26,86,219,0.05) 1px, transparent 1px);
            background-size: 20px 20px, 20px 20px;
            z-index: 0;
            opacity: 0.8;
            animation: techGridMove 15s linear infinite;
        }
        @keyframes techGridMove {
            0% { background-position: 0 0, 0 0; }
            100% { background-position: 40px 40px, 40px 40px; }
        }
        .tech-logo-inner {
            position: relative;
            width: <?php echo $size_px; ?>;
            height: <?php echo $size_px; ?>;
            z-index: 1;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
        }
        .tech-logo-base, .tech-logo-glitch {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: contain;
        }
        .tech-logo-base {
            animation: techPulseAnim 4s infinite alternate ease-in-out;
        }
        .tech-logo-glitch {
            opacity: 0.8;
            mix-blend-mode: multiply;
        }
        .glitch-1 {
            animation: techGlitchAnim1 3.5s infinite linear alternate-reverse;
            clip-path: polygon(0 20%, 100% 20%, 100% 30%, 0 30%);
            transform: translate(-5px, 2px);
            filter: hue-rotate(180deg) opacity(0.5); /* shift color */
        }
        .glitch-2 {
            animation: techGlitchAnim2 4s infinite linear alternate-reverse;
            clip-path: polygon(0 60%, 100% 60%, 100% 70%, 0 70%);
            transform: translate(5px, -2px);
            filter: hue-rotate(-90deg) opacity(0.5);
        }
        .tech-scanline {
            position: absolute;
            top: -10%; left: -20%;
            width: 140%; height: 3px;
            background: linear-gradient(to right, rgba(255,255,255,0), var(--highlight-color), rgba(255,255,255,0));
            opacity: 0.9;
            box-shadow: 0 0 15px var(--highlight-color);
            animation: techScanLine 3s infinite cubic-bezier(0.4, 0.0, 0.2, 1);
        }
        @keyframes techPulseAnim {
            0% { transform: scale(1); filter: brightness(1) drop-shadow(0 0 0px transparent); }
            100% { transform: scale(1.05); filter: brightness(1.1) drop-shadow(0 10px 20px rgba(26,86,219,0.3)); }
        }
        @keyframes techGlitchAnim1 {
            0% { clip-path: polygon(0 20%, 100% 20%, 100% 30%, 0 30%); transform: translate(-4px, 2px); }
            20% { clip-path: polygon(0 12%, 100% 12%, 100% 25%, 0 25%); transform: translate(3px, -1px); }
            40% { clip-path: polygon(0 45%, 100% 45%, 100% 55%, 0 55%); transform: translate(-2px, 4px); }
            60% { clip-path: polygon(0 80%, 100% 80%, 100% 85%, 0 85%); transform: translate(4px, -2px); }
            80% { clip-path: polygon(0 35%, 100% 35%, 100% 45%, 0 45%); transform: translate(-5px, 2px); }
            100% { clip-path: polygon(0 60%, 100% 60%, 100% 70%, 0 70%); transform: translate(3px, 3px); }
        }
        @keyframes techGlitchAnim2 {
            0% { clip-path: polygon(0 65%, 100% 65%, 100% 75%, 0 75%); transform: translate(4px, -3px); }
            20% { clip-path: polygon(0 15%, 100% 15%, 100% 20%, 0 20%); transform: translate(-3px, 2px); }
            40% { clip-path: polygon(0 55%, 100% 55%, 100% 70%, 0 70%); transform: translate(3px, -4px); }
            60% { clip-path: polygon(0 25%, 100% 25%, 100% 35%, 0 35%); transform: translate(-4px, 3px); }
            80% { clip-path: polygon(0 75%, 100% 75%, 100% 90%, 0 90%); transform: translate(5px, -2px); }
            100% { clip-path: polygon(0 10%, 100% 10%, 100% 20%, 0 20%); transform: translate(-3px, -3px); }
        }
        @keyframes techScanLine {
            0% { top: -20%; }
            100% { top: 120%; }
        }
    </style>
    <?php
    return ob_get_clean();
}
