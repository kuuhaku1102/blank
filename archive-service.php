<?php
get_header(); ?>

<!-- Three.js Background Canvas (Shared for Service Archive) -->
<canvas id="three-canvas-service" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<!-- Page Header -->
<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <h1 class="gsap-title" style="font-size: 4rem; font-weight: 900; letter-spacing: 0.1em; margin-bottom: 15px;">SERVICE</h1>
        <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 1rem;">事業内容と強み</p>
    </div>
</div>

<main class="service-archive-content" style="background: transparent;">

    <!-- 1. Concept -->
    <section class="service-concept" style="padding: 100px 0; text-align:center; position:relative; overflow:hidden; background:rgba(255,255,255,0.8); backdrop-filter:blur(10px); -webkit-backdrop-filter:blur(10px);">
        <!-- Delicate SVG decorative lines -->
        <svg style="position:absolute; top:20%; right:-5%; width:30%; opacity:0.04; transform:rotate(-15deg);" viewBox="0 0 200 200">
            <path d="M0 100 Q 50 50 100 100 T 200 100" fill="none" stroke="var(--primary-color)" stroke-width="2"/>
            <path d="M0 120 Q 50 70 100 120 T 200 120" fill="none" stroke="var(--primary-color)" stroke-width="2"/>
        </svg>

        <div class="container">
            <h2 class="gsap-fade-up" style="font-size: 2.5rem; font-weight: 700; color:var(--primary-color); margin-bottom: 20px; line-height:1.5;">デジタルの“余白”を、<br>価値に変える。</h2>
            <p class="gsap-fade-up delay-1" style="font-size: 1.5rem; font-weight:bold; color:var(--primary-color); margin-bottom:40px;">「構想を、実装へ。」</p>
            <p class="gsap-fade-up delay-2" style="font-size: 1.1rem; line-height: 2.2; color:var(--accent-color); margin-bottom: 40px; font-weight:500;">
                Web制作 × マーケティング × テクノロジーを統合し、<br>
                企業の成長を“設計”から“成果”まで一気通貫で支援する<br>
                実装型デジタルパートナーです。<br><br>
                <strong>構想 → 設計 → 実装 → 改善 → 収益化</strong><br>
                までを一社で完結させます。
            </p>
        </div>
    </section>

    <!-- 2. Business Domains (Dynamic Loop) -->
    <section class="business-domains" style="padding: 140px 0;">
        <div class="container">
            <div style="display:flex; flex-direction:column; gap: 80px;">
                <?php
                $service_query = new WP_Query( array(
                    'post_type' => 'service',
                    'posts_per_page' => -1,
                    'order' => 'ASC'
                ));
                $count = 1;
                if($service_query->have_posts()): while($service_query->have_posts()): $service_query->the_post();
                    $num = str_pad($count, 2, '0', STR_PAD_LEFT);
                ?>
                <div class="domain-block gsap-service-card" style="background:rgba(255,255,255,0.85); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); padding: 50px; border-radius:16px; box-shadow:0 15px 40px rgba(0,0,0,0.04); border-top: 4px solid var(--highlight-color); border-bottom: 1px solid rgba(0,0,0,0.05); border-left: 1px solid rgba(0,0,0,0.05); border-right: 1px solid rgba(0,0,0,0.05); position:relative; overflow:hidden;">
                    <!-- Number background overlay -->
                    <div style="position:absolute; top:-20px; right:-20px; font-size: 15rem; font-weight:900; color:rgba(229, 57, 53, 0.03); line-height:1; pointer-events:none;"><?php echo $num; ?></div>
                    
                    <div style="display:flex; align-items:flex-end; gap: 20px; margin-bottom:30px; position:relative; z-index:1;">
                        <span style="font-size: 2.5rem; font-weight:900; color:var(--highlight-color); line-height:1;"><?php echo $num; ?>.</span>
                        <h3 style="font-size:2rem; font-weight:800; color:var(--primary-color); margin:0; padding-bottom:5px;"><?php the_title(); ?></h3>
                    </div>
                    
                    <div style="font-size:1.1rem; color:var(--accent-color); line-height:2; margin-bottom:30px; position:relative; z-index:1;">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <div style="position:relative; z-index:1;">
                        <a href="<?php the_permalink(); ?>" style="display:inline-flex; align-items:center; gap:8px; font-weight:bold; color:var(--primary-color); border-bottom:2px solid var(--primary-color); padding-bottom:4px; transition:all 0.3s ease;" onmouseover="this.style.color='var(--highlight-color)'; this.style.borderColor='var(--highlight-color)';" onmouseout="this.style.color='var(--primary-color)'; this.style.borderColor='var(--primary-color)';">
                            詳しく見る <span style="font-size:1.2rem;">&rarr;</span>
                        </a>
                    </div>
                </div>
                <?php $count++; endwhile; wp_reset_postdata(); else: ?>
                    <p style="text-align:center;">現在サービスは準備中です。</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- 3. Contact -->
    <section class="contact-section" style="padding:140px 0; background:rgba(28, 37, 65, 0.95); text-align:center; color:var(--white);">
        <div class="container gsap-fade-up">
            <h2 style="font-size: 2.5rem; color:var(--white); margin-bottom: 25px; font-weight:700;">ビジネスを加速させませんか？</h2>
            <p style="margin-bottom: 50px; color:rgba(255,255,255,0.8); font-size:1.15rem; line-height:1.8;">新規プロジェクトのご相談、お見積り、DX推進に関するお悩みなど<br>些細なことでもお気軽にお問い合わせください。</p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cta-btn" style="font-size: 1.25rem; padding: 20px 60px;">無料相談・お問い合わせフォームへ</a>
        </div>
    </section>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    gsap.registerPlugin(ScrollTrigger);

    // Title Entrance (Drop down + flip)
    const tl = gsap.timeline();
    tl.from(".gsap-title", {opacity: 0, y: -50, rotationX: -90, duration: 1.2, ease: "expo.out"})
      .from(".gsap-subtitle", {opacity: 0, y: 20, duration: 1, ease: "power3.out"}, "-=0.6");

    // Fade Up Elements
    gsap.utils.toArray('.gsap-fade-up').forEach((el, index) => {
        gsap.from(el, {
            scrollTrigger: {
                trigger: el,
                start: "top 85%"
            },
            y: 50,
            opacity: 0,
            duration: 1.2,
            ease: "power3.out",
            delay: el.classList.contains('delay-1') ? 0.2 : (el.classList.contains('delay-2') ? 0.4 : 0)
        });
    });

    // Service Cards - Lateral Slide in Alternating
    gsap.utils.toArray('.gsap-service-card').forEach((card, i) => {
        let xOffset = i % 2 === 0 ? -100 : 100; // Alternating slide in from left/right
        gsap.from(card, {
            scrollTrigger: {
                trigger: card,
                start: "top 80%"
            },
            x: xOffset,
            opacity: 0,
            duration: 1.5,
            ease: "expo.out"
        });
    });

    // Three.js Abstract Service Background (Wave of particles)
    const canvas = document.getElementById('three-canvas-service');
    if(canvas) {
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 50;
        camera.position.y = 10;
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        const geometry = new THREE.BufferGeometry();
        const count = 1000;
        const positions = new Float32Array(count * 3);
        const colors = new Float32Array(count * 3);
        const colorPrimary = new THREE.Color('#91a6b4'); 
        const colorHighlight = new THREE.Color('#e53935');

        let i = 0, i3 = 0;
        for(let ix = 0; ix < 50; ix++) {
            for(let iy = 0; iy < 20; iy++) {
                positions[i3] = (ix - 25) * 4;     // x
                positions[i3+1] = 0;               // y (will be animated)
                positions[i3+2] = (iy - 10) * 4;   // z

                const mixedColor = colorPrimary.clone().lerp(colorHighlight, Math.random() * 0.2);
                colors[i3] = mixedColor.r;
                colors[i3+1] = mixedColor.g;
                colors[i3+2] = mixedColor.b;

                i++; i3 += 3;
            }
        }

        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

        const material = new THREE.PointsMaterial({
            size: 0.3,
            vertexColors: true,
            transparent: true,
            opacity: 0.6
        });

        const particles = new THREE.Points(geometry, material);
        scene.add(particles);

        let time = 0;
        function animate() {
            requestAnimationFrame(animate);
            time += 0.05;

            const posAttribute = geometry.attributes.position;
            for(let i = 0; i < count; i++) {
                const x = posAttribute.getX(i);
                const z = posAttribute.getZ(i);
                // Creating a smooth organic wave
                const y = Math.sin(x * 0.1 + time * 0.5) * 3 + Math.cos(z * 0.1 + time * 0.3) * 3 - 20; 
                posAttribute.setY(i, y);
            }
            posAttribute.needsUpdate = true;
            
            // Slow rotation for a majestic feel
            particles.rotation.y = Math.sin(time * 0.02) * 0.1;

            renderer.render(scene, camera);
        }
        animate();

        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    }
});
</script>

<?php get_footer(); ?>
