<?php
get_header(); ?>

<!-- Three.js Background Canvas (Shared for Service Archive) -->
<canvas id="three-canvas-service-single" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<!-- Page Header -->
<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <h1 class="gsap-title" style="font-size: 3.5rem; font-weight: 900; letter-spacing: 0.05em; margin-bottom: 20px;"><?php the_title(); ?></h1>
        <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 1rem;">SERVICE DETAILS</p>
    </div>
</div>

<main class="service-single-content" style="background: transparent;">

    <div class="container" style="max-width:900px; padding-bottom: 120px;">
        <div class="service-single-card" style="background:rgba(255,255,255,0.85); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); padding: 60px; border-radius:20px; box-shadow:0 15px 40px rgba(0,0,0,0.04); border-top: 5px solid var(--highlight-color); border-bottom: 1px solid rgba(0,0,0,0.05); border-left: 1px solid rgba(0,0,0,0.05); border-right: 1px solid rgba(0,0,0,0.05);">
            
            <?php if(has_post_thumbnail()): ?>
            <div class="service-img fade-up" style="margin-bottom: 40px; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <?php the_post_thumbnail('large', ['style' => 'width:100%; height:auto; display:block;']); ?>
            </div>
            <?php endif; ?>

            <div class="service-content gsap-content" style="font-size:1.15rem; line-height:2.2; color:var(--primary-color);">
                <?php the_content(); ?>
            </div>
            
            <div class="back-link" style="margin-top: 60px; text-align:center;">
                <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" style="display:inline-flex; align-items:center; gap:8px; font-weight:bold; color:var(--accent-color); border:1px solid var(--accent-color); padding:12px 30px; border-radius:30px; transition:all 0.3s ease;" onmouseover="this.style.background='var(--accent-color)'; this.style.color='var(--white)';" onmouseout="this.style.background='transparent'; this.style.color='var(--accent-color)';">
                    &larr; サービス一覧へ戻る
                </a>
            </div>
        </div>
    </div>

    <!-- 3. Contact -->
    <section class="contact-section" style="padding:140px 0; background:var(--secondary-color); text-align:center; color:var(--white);">
        <div class="container fade-up">
            <h2 style="font-size: 2.5rem; color:var(--white); margin-bottom: 25px; font-weight:700;">ビジネスを加速させませんか？</h2>
            <p style="margin-bottom: 50px; color:rgba(255,255,255,0.8); font-size:1.15rem; line-height:1.8;">新規プロジェクトのご相談、お見積り、DX推進に関するお悩みなど<br>些細なことでもお気軽にお問い合わせください。</p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cta-btn" style="font-size: 1.25rem; padding: 20px 60px;">無料相談・お問い合わせフォームへ</a>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    gsap.registerPlugin(ScrollTrigger);

    const tl = gsap.timeline();
    tl.from(".gsap-subtitle", {opacity: 0, y: -20, duration: 1, ease: "power3.out"})
      .from(".gsap-title", {opacity: 0, y: 30, rotationX: -90, duration: 1.2, ease: "expo.out"}, "-=0.6")
      .from(".service-single-card", {opacity: 0, y: 50, duration: 1.5, ease: "power4.out"}, "-=0.8");

    // Fade Up Elements
    gsap.utils.toArray('.fade-up').forEach((el) => {
        gsap.from(el, {
            scrollTrigger: { trigger: el, start: "top 85%" },
            y: 50, opacity: 0, duration: 1.2, ease: "power3.out"
        });
    });

    const canvas = document.getElementById('three-canvas-service-single');
    if(canvas) {
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 20;

        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        const geometry = new THREE.IcosahedronGeometry(12, 1);
        const material = new THREE.MeshBasicMaterial({ 
            color: '#91a6b4', 
            wireframe: true, 
            transparent: true, 
            opacity: 0.1 
        });
        const mesh = new THREE.Mesh(geometry, material);
        scene.add(mesh);
        
        let mouseX = 0, mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX / window.innerWidth) * 2 - 1;
            mouseY = -(e.clientY / window.innerHeight) * 2 + 1;
        });

        function animate() {
            requestAnimationFrame(animate);
            mesh.rotation.y += 0.002;
            mesh.rotation.x += 0.001;
            
            // Interactive tilt
            mesh.rotation.x += (mouseY * 0.5 - mesh.rotation.x) * 0.05;
            mesh.rotation.y += (mouseX * 0.5 - mesh.rotation.y) * 0.05;

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
