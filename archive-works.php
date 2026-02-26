<?php get_header(); ?>

<!-- Three.js Background Canvas (Shared for Works Archive) -->
<canvas id="three-canvas-works" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <h1 class="gsap-title" style="font-size: 4rem; font-weight: 900; letter-spacing: 0.1em; margin-bottom: 15px; color:var(--primary-color);">WORKS</h1>
        <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 1rem;">制作実績・プロジェクト</p>
    </div>
</div>

<main style="background: transparent; padding-bottom: 120px; position:relative; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1; max-width:1200px;">
        
        <div class="gsap-fade-up" style="margin-bottom: 60px; text-align:center;">
            <p style="text-align:center; margin-bottom:30px; color:var(--accent-color); font-size:1.15rem; line-height:2; font-weight:bold;">
                「美しさ」と「ビジネスの機能」を両立させた、<br>
                blankのアウトプットをご覧いただけます。
            </p>
            
            <!-- Category Filter mock -->
            <div style="display:flex; gap:12px; flex-wrap:wrap; justify-content:center; margin-top:30px;">
                <span style="background:var(--primary-color); padding:8px 25px; border-radius:30px; color:var(--white); font-weight:bold; font-size:0.9rem; letter-spacing:0.05em; box-shadow:0 5px 15px rgba(11,19,43,0.2);">すべて</span>
                <span style="background:rgba(255,255,255,0.8); backdrop-filter:blur(5px); padding:8px 25px; border-radius:30px; color:var(--primary-color); font-weight:bold; font-size:0.9rem; letter-spacing:0.05em; border:1px solid rgba(0,0,0,0.05); cursor:pointer; transition:all 0.3s;" onmouseover="this.style.background='var(--primary-color)'; this.style.color='var(--white)';" onmouseout="this.style.background='rgba(255,255,255,0.8)'; this.style.color='var(--primary-color)';">LP</span>
                <span style="background:rgba(255,255,255,0.8); backdrop-filter:blur(5px); padding:8px 25px; border-radius:30px; color:var(--primary-color); font-weight:bold; font-size:0.9rem; letter-spacing:0.05em; border:1px solid rgba(0,0,0,0.05); cursor:pointer; transition:all 0.3s;" onmouseover="this.style.background='var(--primary-color)'; this.style.color='var(--white)';" onmouseout="this.style.background='rgba(255,255,255,0.8)'; this.style.color='var(--primary-color)';">コーポレートサイト</span>
                <span style="background:rgba(255,255,255,0.8); backdrop-filter:blur(5px); padding:8px 25px; border-radius:30px; color:var(--primary-color); font-weight:bold; font-size:0.9rem; letter-spacing:0.05em; border:1px solid rgba(0,0,0,0.05); cursor:pointer; transition:all 0.3s;" onmouseover="this.style.background='var(--primary-color)'; this.style.color='var(--white)';" onmouseout="this.style.background='rgba(255,255,255,0.8)'; this.style.color='var(--primary-color)';">システム開発</span>
            </div>
        </div>

        <div class="works-grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px;">
            <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                $terms = get_the_terms($post->ID, 'work_cat'); 
                $cat_name = $terms ? esc_html($terms[0]->name) : '実績';
            ?>
            <a href="<?php the_permalink(); ?>" class="gsap-works-card" style="display:block; text-decoration:none; color:inherit; background:#ffffff; border-radius:16px; transition:transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1); border: 1px solid rgba(11,19,43,0.1); padding:25px; position:relative; z-index:2;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.08)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                
                <div class="img-wrapper" style="border-radius:12px; overflow:hidden; margin-bottom:25px; position:relative; aspect-ratio: 5/6; background:#edf2f6; display:flex; align-items:center; justify-content:center; padding:45px 30px;">
                    <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('large', ['style' => 'width:100%; height:100%; object-fit:contain; filter:drop-shadow(0 15px 25px rgba(0,0,0,0.15)); transition:transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);', 'class' => 'works-img']); ?>
                    <?php else: ?>
                        <!-- カスタムプレースホルダー -->
                        <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:var(--primary-color); opacity:0.3; font-size:1.5rem; font-weight:bold; background:rgba(145,166,180,0.1);" class="works-img">
                            WORKS
                        </div>
                    <?php endif; ?>
                    <style>
                        .gsap-works-card:hover .works-img { transform: translateY(-5px) scale(1.05); }
                    </style>
                </div>

                <div class="work-meta" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; padding:0 5px;">
                    <span style="font-size:0.85rem; background:#e53935; color:#ffffff; padding:6px 20px; border-radius:30px; font-weight:bold; letter-spacing:0.05em; display:inline-block;">
                        <?php echo $cat_name; ?>
                    </span>
                    <span style="font-size:0.9rem; color:#50575e; font-weight:bold; font-family:'Courier New', monospace; letter-spacing:0.1em;">
                        <?php echo get_the_date('Y.m.d'); ?>
                    </span>
                </div>

                <h3 style="font-size:1.6rem; font-weight:800; color:#91a6b4; margin:0 0 25px; line-height:1.4; text-align:left; padding:0 5px;"><?php the_title(); ?></h3>
                
                <div style="padding:0 5px;">
                    <div style="display:inline-flex; align-items:center; justify-content:center; gap:8px; font-size:1rem; font-weight:bold; color:#ffffff; background:#e53935; border-radius:6px; padding:12px 30px; transition:all 0.3s cubic-bezier(0.16, 1, 0.3, 1);" class="read-more-btn">
                        詳しく見る <span style="font-size:1.2rem; transition:transform 0.3s;" class="arrow">&rarr;</span>
                    </div>
                </div>
                <style>
                    .gsap-works-card:hover .read-more-btn { background: #c62828; transform: translateY(-2px); box-shadow:0 8px 15px rgba(229,57,53,0.3); }
                    .gsap-works-card:hover .arrow { transform: translateX(5px); }
                </style>
            </a>
            <?php 
            endwhile; else: ?>
                <p style="color:var(--accent-color); text-align:center; grid-column:1/-1;">まだ実績が登録されていません。</p>
            <?php endif; ?>
        </div>
        
        <div class="pagination gsap-fade-up" style="margin-top: 80px; text-align:center;">
            <?php the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => '&laquo; 前へ',
                'next_text' => '次へ &raquo;'
            )); ?>
        </div>
    </div>
</main>

<style>
.pagination .page-numbers {
    display: inline-block;
    padding: 10px 18px;
    margin: 0 5px;
    border-radius: 8px;
    background: rgba(255,255,255,0.8);
    backdrop-filter: blur(10px);
    color: var(--primary-color);
    text-decoration: none;
    font-weight: bold;
    border: 1px solid rgba(0,0,0,0.05);
    box-shadow: 0 4px 10px rgba(0,0,0,0.02);
    transition: all 0.3s ease;
}
.pagination .page-numbers.current,
.pagination .page-numbers:hover {
    background: var(--primary-color);
    color: var(--white);
    border-color: var(--primary-color);
    box-shadow: 0 5px 15px rgba(145,166,180,0.3);
}
</style>

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
      .from(".gsap-fade-up", {opacity: 0, y: 30, duration: 1, ease: "power3.out"}, "-=0.6");

    // Works Cards Dynamic Staggering Matrix Layout
    // Instead of simple upward stagger, we make them scale and slide into position
    gsap.from(".gsap-works-card", {
        scrollTrigger: {
            trigger: ".works-grid",
            start: "top 85%"
        },
        y: 100,
        opacity: 0,
        rotationX: 15,
        transformOrigin: "bottom center",
        stagger: {
            each: 0.1,
            grid: "auto",
            from: "start"
        },
        duration: 1.2,
        ease: "power4.out"
    });

    // Three.js Interactive Floating Layers / Tech Blueprint Background
    const canvas = document.getElementById('three-canvas-works');
    if(canvas) {
        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2('#f8f9fa', 0.003); 

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 80;
        camera.position.y = 20;
        camera.lookAt(0, 0, 0);
        
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        const group = new THREE.Group();
        scene.add(group);

        // Tech Blueprint / Grids floating horizontally
        const material = new THREE.LineBasicMaterial({
            color: '#91a6b4',
            transparent: true,
            opacity: 0.1
        });

        // Create 3 grid planes
        for(let lay=0; lay<3; lay++) {
            const gridHelper = new THREE.GridHelper(200, 20, '#91a6b4', '#91a6b4');
            gridHelper.position.y = (lay - 1) * 30; // -30, 0, 30
            
            // Adjust opacity for grids
            gridHelper.material.transparent = true;
            gridHelper.material.opacity = 0.08 - (lay * 0.02);
            
            group.add(gridHelper);
        }

        // Add some floating isometric cubes representing projects/data blocks
        const cubeMaterial = new THREE.MeshBasicMaterial({ 
            color: '#e53935', 
            wireframe: true, 
            transparent: true, 
            opacity: 0.2 
        });
        const cubeGeo = new THREE.BoxGeometry(4, 4, 4);
        
        const cubes = [];
        for(let i=0; i<40; i++) {
            const cube = new THREE.Mesh(cubeGeo, cubeMaterial);
            cube.position.set(
                (Math.random() - 0.5) * 180,
                (Math.random() - 0.5) * 80,
                (Math.random() - 0.5) * 180
            );
            cube.userData = {
                speedY: Math.random() * 0.05 + 0.01,
                speedRot: Math.random() * 0.02
            };
            cubes.push(cube);
            group.add(cube);
        }

        let mouseX = 0, mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - window.innerWidth / 2) * 0.05;
            mouseY = (e.clientY - window.innerHeight / 2) * 0.05;
        });

        function animate() {
            requestAnimationFrame(animate);

            // Move cubes upwards
            cubes.forEach(c => {
                c.position.y += c.userData.speedY;
                c.rotation.x += c.userData.speedRot;
                c.rotation.y += c.userData.speedRot;
                
                if(c.position.y > 60) {
                    c.position.y = -60;
                }
            });

            // Smooth parallax and slow world rotation
            group.rotation.y += 0.0005;

            camera.position.x += (mouseX - camera.position.x) * 0.02;
            camera.position.y += (20 - mouseY - camera.position.y) * 0.02; // Keep base Y offset
            camera.lookAt(0, 0, 0);

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
