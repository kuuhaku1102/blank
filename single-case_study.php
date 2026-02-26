<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
    $industry = get_post_meta(get_the_ID(), 'cs_industry', true);
    $issue    = get_post_meta(get_the_ID(), 'cs_issue', true);
    $impl     = get_post_meta(get_the_ID(), 'cs_implementation', true);
    $result   = get_post_meta(get_the_ID(), 'cs_result', true);
    $val      = get_post_meta(get_the_ID(), 'cs_value', true);
?>

<!-- Three.js Background Canvas (Shared for Case Study) -->
<canvas id="three-canvas-cs-single" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1; max-width: 900px;">
        <h1 class="gsap-title" style="font-size: 3rem; font-weight: 900; line-height: 1.4; margin-bottom: 30px; color:var(--primary-color);"><?php the_title(); ?></h1>
        <?php if($industry): ?>
        <span class="gsap-subtitle" style="display:inline-block; font-size:0.9rem; background:var(--primary-color); color:var(--white); padding:8px 25px; border-radius:30px; font-weight:bold; letter-spacing:0.1em; box-shadow:0 5px 15px rgba(11,19,43,0.3); transform-origin:center;"><?php echo esc_html($industry); ?></span>
        <?php endif; ?>
    </div>
</div>

<main style="background: transparent; position:relative; overflow:hidden; padding-bottom: 120px;">
    <div class="container" style="position:relative; z-index:1; max-width: 900px;">
        
        <div class="gsap-cs-feature-img" style="text-align:center; margin-bottom:60px;">
            <?php if( has_post_thumbnail() ): ?>
                <div style="border-radius:16px; overflow:hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.1); display:inline-block; position:relative;">
                    <?php the_post_thumbnail('large', array('style'=>'max-width:100%; height:auto; display:block; transition:transform 0.4s ease;', 'class'=>'cs-single-img')); ?>
                    <!-- Glass reflection overlay -->
                    <div style="position:absolute; inset:0; background:linear-gradient(45deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%); opacity:0; pointer-events:none; transition:opacity 0.5s ease;" class="glass-reflection"></div>
                </div>
                <style>
                    .gsap-cs-feature-img:hover .cs-single-img { transform: scale(1.02); }
                    .gsap-cs-feature-img:hover .glass-reflection { opacity: 1; }
                </style>
            <?php endif; ?>
        </div>

        <!-- Content Area with Glassmorphism -->
        <article class="cs-single-article gsap-cs-article" style="background:rgba(255,255,255,0.9); backdrop-filter:blur(20px); -webkit-backdrop-filter:blur(20px); padding:60px; border-radius:20px; box-shadow:0 15px 40px rgba(0,0,0,0.05); border-top: 5px solid var(--highlight-color); border-bottom: 1px solid rgba(0,0,0,0.05); border-left: 1px solid rgba(0,0,0,0.05); border-right: 1px solid rgba(0,0,0,0.05);">
            
            <?php if($issue): ?>
            <div class="gsap-cs-section" style="margin-bottom: 60px;">
                <h2 style="font-size: 1.8rem; color: var(--primary-color); border-bottom: 2px solid rgba(145,166,180,0.2); padding-bottom: 15px; margin-bottom: 30px; display:flex; align-items:center; gap:15px; font-weight:800;">
                    <span style="color:var(--highlight-color); font-size:2.5rem; line-height:1;">課題</span>
                    <span style="font-size:0.9rem; color:var(--accent-color); letter-spacing:0.15em;">ISSUES</span>
                </h2>
                <div style="background:var(--white); padding:30px; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,0.03);">
                    <p style="font-size:1.15rem; line-height:2.2; color:var(--text-color); font-weight:bold; white-space:pre-wrap; margin:0;"><?php echo esc_html($issue); ?></p>
                </div>
            </div>
            <?php endif; ?>

            <?php if($impl): ?>
            <div class="gsap-cs-section" style="margin-bottom: 60px;">
                <h2 style="font-size: 1.8rem; color: var(--primary-color); border-bottom: 2px solid rgba(145,166,180,0.2); padding-bottom: 15px; margin-bottom: 30px; display:flex; align-items:center; gap:15px; font-weight:800;">
                    <span style="color:var(--highlight-color); font-size:2.5rem; line-height:1;">実装施策</span>
                    <span style="font-size:0.9rem; color:var(--accent-color); letter-spacing:0.15em;">IMPLEMENTATION</span>
                </h2>
                <div style="position:relative; background:var(--bg-color); padding:40px; border-radius:12px; border-left: 6px solid var(--highlight-color); overflow:hidden;">
                    <!-- SVG Decor in Implementation Block -->
                    <svg style="position:absolute; right:-5%; bottom:-20%; width:150px; opacity:0.04; transform:rotate(-15deg);" viewBox="0 0 100 100">
                        <rect x="10" y="10" width="80" height="80" fill="none" stroke="var(--primary-color)" stroke-width="4" transform="rotate(45 50 50)"/>
                    </svg>
                    <p style="font-size:1.1rem; line-height:2.2; color:var(--primary-color); font-weight:bold; margin:0; white-space:pre-wrap; position:relative; z-index:1;"><?php echo esc_html($impl); ?></p>
                </div>
            </div>
            <?php endif; ?>

            <?php if($result): ?>
            <div class="gsap-cs-section" style="margin-bottom: 60px;">
                <h2 style="font-size: 1.8rem; color: var(--primary-color); border-bottom: 2px solid rgba(145,166,180,0.2); padding-bottom: 15px; margin-bottom: 30px; display:flex; align-items:center; gap:15px; font-weight:800;">
                    <span style="color:var(--highlight-color); font-size:2.5rem; line-height:1;">成果</span>
                    <span style="font-size:0.9rem; color:var(--accent-color); letter-spacing:0.15em;">RESULTS</span>
                </h2>
                <div style="background:var(--primary-color); color:var(--white); padding:50px 40px; border-radius:16px; box-shadow:0 15px 30px rgba(28,37,65,0.2); text-align:center; position:relative; overflow:hidden;">
                    <!-- Light burst effect -->
                    <div style="position:absolute; top:-50%; left:-50%; width:200%; height:200%; background:radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%); pointer-events:none;"></div>
                    <p style="font-size:1.4rem; line-height:2.4; font-weight:900; margin:0; white-space:pre-wrap; position:relative; z-index:1;"><?php echo esc_html($result); ?></p>
                </div>
            </div>
            <?php endif; ?>

            <?php if($val): ?>
            <div class="gsap-cs-section gsap-value-box" style="margin-top: 80px; text-align:center; padding:50px; border-top:2px dashed rgba(145,166,180,0.3); background:rgba(145,166,180,0.05); border-radius: 0 0 20px 20px; border-left:4px solid var(--accent-color); border-right:4px solid var(--accent-color);">
                <p style="font-size:1.1rem; font-weight:900; color:var(--accent-color); margin-bottom:15px; letter-spacing:0.1em; display:inline-flex; align-items:center; gap:10px;"><span style="height:2px; width:20px; background:var(--highlight-color);"></span> The blank Value <span style="height:2px; width:20px; background:var(--highlight-color);"></span></p>
                <p style="font-size:1.5rem; color:var(--primary-color); font-weight:800; line-height:1.6; margin:0;">「<?php echo esc_html($val); ?>」</p>
            </div>
            <?php endif; ?>
            
            <div class="back-link" style="margin-top: 60px; text-align:center;">
                <a href="<?php echo esc_url(get_post_type_archive_link('case_study')); ?>" style="display:inline-flex; align-items:center; gap:8px; font-weight:bold; color:var(--primary-color); border:2px solid var(--primary-color); padding:15px 40px; border-radius:30px; transition:all 0.3s ease; box-shadow:0 5px 15px rgba(0,0,0,0.05);" onmouseover="this.style.background='var(--primary-color)'; this.style.color='var(--white)'; this.style.transform='translateY(-3px)';" onmouseout="this.style.background='transparent'; this.style.color='var(--primary-color)'; this.style.transform='translateY(0)';">
                    &larr; 成功事例一覧へ戻る
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

    // Header Animated Entrance
    const tl = gsap.timeline();
    tl.from(".gsap-subtitle", {opacity: 0, scale: 0.8, y: -20, duration: 0.8, ease: "back.out(1.7)"})
      .from(".gsap-title", {opacity: 0, y: 30, rotationX: -90, duration: 1.2, ease: "expo.out"}, "-=0.4")
      .from(".gsap-cs-feature-img", {opacity: 0, y: 50, scale:0.95, duration: 1.5, ease: "power4.out"}, "-=0.8")
      .from(".gsap-cs-article", {opacity: 0, y: 80, duration: 1.5, ease: "power4.out"}, "-=1.0");

    // Internal Sections Staggered Scroll Reveal
    gsap.utils.toArray('.gsap-cs-section').forEach((section) => {
        gsap.from(section, {
            scrollTrigger: {
                trigger: section,
                start: "top 85%"
            },
            y: 40,
            opacity: 0,
            duration: 1.2,
            ease: "power3.out"
        });
    });

    // Three.js Interactive Abstract Matrix Background specific to Single Case Study (Zoomed in Wireframe)
    const canvas = document.getElementById('three-canvas-cs-single');
    if(canvas) {
        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2(0xf8f9fa, 0.003); // Softer fog

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 60;
        
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        const group = new THREE.Group();
        scene.add(group);

        // Minimalistic huge wireframes
        const geometry = new THREE.TetrahedronGeometry(40, 1);
        const material = new THREE.MeshBasicMaterial({
            color: '#91a6b4',
            wireframe: true,
            transparent: true,
            opacity: 0.05
        });

        for(let i=0; i<5; i++) {
            const mesh = new THREE.Mesh(geometry, material);
            mesh.position.set(
                (Math.random() - 0.5) * 200,
                (Math.random() - 0.5) * 200,
                (Math.random() - 0.5) * 100 - 50
            );
            mesh.rotation.set(Math.random() * Math.PI, Math.random() * Math.PI, Math.random() * Math.PI);
            
            mesh.userData = {
                rx: (Math.random() - 0.5) * 0.01,
                ry: (Math.random() - 0.5) * 0.01,
                rz: (Math.random() - 0.5) * 0.01
            };
            group.add(mesh);
        }

        let mouseX = 0, mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - window.innerWidth / 2) * 0.1;
            mouseY = (e.clientY - window.innerHeight / 2) * 0.1;
        });

        function animate() {
            requestAnimationFrame(animate);

            // Gentle parallax
            camera.position.x += (mouseX - camera.position.x) * 0.02;
            camera.position.y += (-mouseY - camera.position.y) * 0.02;
            camera.lookAt(scene.position);

            group.children.forEach(mesh => {
                mesh.rotation.x += mesh.userData.rx;
                mesh.rotation.y += mesh.userData.ry;
                mesh.rotation.z += mesh.userData.rz;
            });

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
