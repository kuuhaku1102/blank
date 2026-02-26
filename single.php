<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
    $categories = get_the_category();
?>

<!-- Three.js Background Canvas (Shared for Syllabus Single) -->
<canvas id="three-canvas-syllabus-single" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1; max-width: 900px;">
        
        <div class="gsap-meta" style="margin-bottom:20px; display:flex; justify-content:center; gap:15px; align-items:center; flex-wrap:wrap;">
            <span style="font-size:1rem; color:var(--highlight-color); font-weight:bold; letter-spacing:0.1em; border-right:2px solid rgba(145,166,180,0.3); padding-right:15px;">
                <?php echo get_the_date('Y.m.d'); ?>
            </span>
            <?php if ( ! empty( $categories ) ) : ?>
            <span style="display:inline-block; font-size:0.9rem; background:rgba(229,57,53,0.1); color:var(--highlight-color); padding:6px 20px; border-radius:30px; font-weight:bold; border: 1px solid rgba(229,57,53,0.2);">
                <?php echo esc_html( $categories[0]->name ); ?>
            </span>
            <?php endif; ?>
        </div>

        <h1 class="gsap-title" style="font-size: 2.8rem; font-weight: 900; line-height: 1.4; margin-bottom: 0; color:var(--primary-color); word-break: break-word;"><?php the_title(); ?></h1>
    </div>
</div>

<main style="background: transparent; position:relative; overflow:hidden; padding-bottom: 120px;">
    <div class="container" style="position:relative; z-index:1; max-width: 900px;">
        
        <div class="gsap-feature-img" style="text-align:center; margin-bottom:60px;">
            <?php if( has_post_thumbnail() ): ?>
                <div style="border-radius:20px; overflow:hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.08); display:inline-block; position:relative;">
                    <?php the_post_thumbnail('large', array('style'=>'max-width:100%; height:auto; display:block; transition:transform 0.4s ease;', 'class'=>'syllabus-single-img')); ?>
                    <div style="position:absolute; inset:0; background:linear-gradient(45deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0) 100%); opacity:0; pointer-events:none; transition:opacity 0.5s ease;" class="glass-reflection"></div>
                </div>
                <style>
                    .gsap-feature-img:hover .syllabus-single-img { transform: scale(1.02); }
                    .gsap-feature-img:hover .glass-reflection { opacity: 1; }
                </style>
            <?php endif; ?>
        </div>

        <!-- Content Area with Glassmorphism -->
        <article class="syllabus-single-article gsap-article" style="background:rgba(255,255,255,0.9); backdrop-filter:blur(20px); -webkit-backdrop-filter:blur(20px); padding:60px; border-radius:20px; box-shadow:0 15px 40px rgba(0,0,0,0.05); border-top: 5px solid var(--accent-color); border-bottom: 1px solid rgba(0,0,0,0.05); border-left: 1px solid rgba(0,0,0,0.05); border-right: 1px solid rgba(0,0,0,0.05);">
            
            <div class="syllabus-content contentArea" style="line-height:2.2; font-size:1.1rem; color:var(--primary-color);">
                <?php the_content(); ?>
            </div>
            
            <!-- WordPress Post Content Styling Adjustments specifically for syllabus -->
            <style>
                .syllabus-content h2 { font-size: 1.8rem; color: var(--primary-color); border-bottom: 2px solid rgba(145,166,180,0.2); padding-bottom: 15px; margin: 60px 0 30px; font-weight: 800; display:flex; align-items:center; gap:10px; }
                .syllabus-content h2::before { content: ""; display:block; width: 6px; height: 1.8rem; background: var(--highlight-color); border-radius: 3px; }
                .syllabus-content h3 { font-size: 1.5rem; color: var(--primary-color); margin: 40px 0 20px; font-weight: 700; border-left: 4px solid var(--accent-color); padding-left: 15px; }
                .syllabus-content p { margin-bottom: 25px; }
                .syllabus-content img { max-width: 100%; height: auto; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin: 30px 0; }
                .syllabus-content ul { background: rgba(145,166,180,0.05); padding: 25px 25px 25px 45px; border-radius: 12px; border: 1px solid rgba(145,166,180,0.1); margin-bottom: 30px; }
                .syllabus-content li { margin-bottom: 10px; }
                .syllabus-content a { color: var(--highlight-color); text-decoration: underline; font-weight: bold; }
                .syllabus-content blockquote { background: var(--bg-color); border-left: 5px solid var(--primary-color); padding: 20px 30px; font-style: italic; color: var(--accent-color); border-radius: 8px; margin: 30px 0; font-weight: bold; }
            </style>
            
            <div class="back-link" style="margin-top: 80px; text-align:center; padding-top:40px; border-top:1px dashed rgba(145,166,180,0.3);">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" style="display:inline-flex; align-items:center; gap:8px; font-weight:bold; color:var(--accent-color); border:2px solid var(--accent-color); padding:15px 40px; border-radius:30px; transition:all 0.3s ease; box-shadow:0 5px 15px rgba(0,0,0,0.05);" onmouseover="this.style.background='var(--primary-color)'; this.style.color='var(--white)'; this.style.borderColor='var(--primary-color)'; this.style.transform='translateY(-3px)';" onmouseout="this.style.background='transparent'; this.style.color='var(--accent-color)'; this.style.borderColor='var(--accent-color)'; this.style.transform='translateY(0)';">
                    &larr; SYLLABUS一覧へ戻る
                </a>
            </div>

        </article>
    </div>
</main>
<?php endwhile; endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    gsap.registerPlugin(ScrollTrigger);

    // Header Animated Entrance (Reading flow focus)
    const tl = gsap.timeline();
    tl.from(".gsap-meta", {opacity: 0, y: -20, duration: 0.8, ease: "power3.out"})
      .from(".gsap-title", {opacity: 0, y: 30, rotationX: -90, duration: 1.2, ease: "expo.out"}, "-=0.4")
      .from(".gsap-feature-img", {opacity: 0, y: 50, scale:0.95, duration: 1.5, ease: "power4.out"}, "-=0.8")
      .from(".gsap-article", {opacity: 0, y: 60, duration: 1.2, ease: "power4.out"}, "-=1.0");

    // Three.js Abstract Knowledge Particle Ring
    const canvas = document.getElementById('three-canvas-syllabus-single');
    if(canvas) {
        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2('#f8f9fa', 0.003); 

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 80;
        
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        const group = new THREE.Group();
        scene.add(group);

        // Ring of glowing abstract knowledge fragments
        const count = 300;
        const geometry = new THREE.BufferGeometry();
        const positions = new Float32Array(count * 3);
        const sizes = new Float32Array(count);

        for(let i=0; i<count; i++) {
            // Torus-like distribution
            const theta = Math.random() * Math.PI * 2;
            const radius = 50 + (Math.random() - 0.5) * 20;
            const yOffset = (Math.random() - 0.5) * 10;
            
            positions[i*3] = Math.cos(theta) * radius;
            positions[i*3+1] = yOffset;
            positions[i*3+2] = Math.sin(theta) * radius;

            sizes[i] = Math.random() * 2;
        }

        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        geometry.setAttribute('size', new THREE.BufferAttribute(sizes, 1));

        // Use custom shader material for beautiful glowing particles
        const vertexShader = `
            attribute float size;
            void main() {
                vec4 mvPosition = modelViewMatrix * vec4(position, 1.0);
                gl_PointSize = size * (300.0 / -mvPosition.z);
                gl_Position = projectionMatrix * mvPosition;
            }
        `;
        const fragmentShader = `
            void main() {
                // Circle point
                vec2 xy = gl_PointCoord.xy - vec2(0.5);
                float ll = length(xy);
                if(ll > 0.5) discard;
                gl_FragColor = vec4(0.56, 0.65, 0.70, 0.4 * (1.0 - (ll*2.0))); // Matching primary/accent colors approx
            }
        `;

        const material = new THREE.ShaderMaterial({
            vertexShader: vertexShader,
            fragmentShader: fragmentShader,
            transparent: true,
            depthWrite: false
        });

        const particles = new THREE.Points(geometry, material);
        group.add(particles);

        let mouseX = 0, mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - window.innerWidth / 2) * 0.05;
            mouseY = (e.clientY - window.innerHeight / 2) * 0.05;
        });

        function animate() {
            requestAnimationFrame(animate);

            // Ring rotates very slowly
            group.rotation.x = Math.sin(Date.now() * 0.0001) * 0.2;
            group.rotation.y += 0.001;

            camera.position.x += (mouseX - camera.position.x) * 0.02;
            camera.position.y += (-mouseY - camera.position.y) * 0.02;
            camera.lookAt(scene.position);

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
