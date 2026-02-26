<?php get_header(); ?>

<!-- Three.js Background Canvas (Shared for Case Study) -->
<canvas id="three-canvas-cs" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <h1 class="gsap-title" style="font-size: 4rem; font-weight: 900; letter-spacing: 0.1em; margin-bottom: 15px; color:var(--primary-color);">CASE STUDIES</h1>
        <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 1rem;">成功事例・実装インパクト</p>
    </div>
</div>

<main style="background: transparent; padding-bottom: 120px; position:relative; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1; max-width:1200px;">
        
        <p class="gsap-fade-up" style="text-align:center; margin-bottom:80px; color:var(--accent-color); font-size:1.15rem; line-height:2; font-weight:bold;">
            デジタルの“余白”に設計と実装を入れ込み、<br>
            ビジネスの成長を劇的に加速させた具体的なプロジェクトの成果をご紹介します。
        </p>

        <div class="works-grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px;">
            <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                $industry = get_post_meta(get_the_ID(), 'cs_industry', true);
            ?>
            <a href="<?php the_permalink(); ?>" class="gsap-cs-card" style="display:block; text-decoration:none; color:inherit; background:rgba(255,255,255,0.85); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); border-radius:16px; transition:transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s ease; box-shadow:0 15px 40px rgba(0,0,0,0.04); border-top: 4px solid var(--primary-color); border-bottom: 1px solid rgba(0,0,0,0.05); border-left: 1px solid rgba(0,0,0,0.05); border-right: 1px solid rgba(0,0,0,0.05); padding:25px; position:relative; overflow:hidden;" onmouseover="this.style.transform='translateY(-10px) scale(1.02)'; this.style.boxShadow='0 25px 60px rgba(0,0,0,0.08)'; this.style.borderColor='var(--highlight-color)';" onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.04)'; this.style.borderColor='var(--primary-color)';">
                
                <div class="img-wrapper" style="border-radius:12px; overflow:hidden; margin-bottom:25px; position:relative; aspect-ratio: 16/10; background:#f4f7f6;">
                    <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('large', ['style' => 'width:100%; height:100%; object-fit:cover; transition:transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);', 'class' => 'cs-img']); ?>
                    <?php else: ?>
                        <!-- カスタムプレースホルダー -->
                        <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:var(--primary-color); opacity:0.3; font-size:1.5rem; font-weight:bold; background:linear-gradient(135deg, rgba(145,166,180,0.1), rgba(145,166,180,0.2));" class="cs-img">
                            CASE STUDY
                        </div>
                    <?php endif; ?>
                    <div class="overlay" style="position:absolute; inset:0; background:rgba(229,57,53,0.15); opacity:0; transition:opacity 0.4s ease;"></div>
                    <style>
                        .gsap-cs-card:hover .cs-img { transform: scale(1.08); }
                        .gsap-cs-card:hover .overlay { opacity: 1; }
                    </style>
                </div>

                <div class="work-meta" style="display:flex; gap:10px; margin-bottom:15px; flex-wrap:wrap;">
                    <?php if($industry): ?>
                    <span style="font-size:0.8rem; background:rgba(145,166,180,0.1); color:var(--primary-color); padding:6px 15px; border-radius:30px; font-weight:bold; border:1px solid rgba(145,166,180,0.2);"><?php echo esc_html($industry); ?></span>
                    <?php endif; ?>
                </div>

                <h3 style="font-size:1.4rem; font-weight:800; color:var(--primary-color); margin:0 0 20px; line-height:1.5;"><?php the_title(); ?></h3>
                
                <div style="font-size:1rem; color:var(--primary-color); font-weight:bold; display:flex; align-items:center; gap:8px; margin-top:10px; transition:color 0.3s;" class="read-more-link">
                    詳しく見る <span style="font-size:1.4rem; transition:transform 0.3s; display:inline-block;" class="arrow">&rarr;</span>
                </div>
                <style>
                    .gsap-cs-card:hover .read-more-link { color: var(--highlight-color); }
                    .gsap-cs-card:hover .arrow { transform: translateX(5px); }
                </style>
            </a>
            <?php 
            endwhile; else: ?>
                <p style="color:var(--accent-color); text-align:center; grid-column:1/-1;">まだ成功事例が登録されていません。</p>
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

    // Header Entrance
    const tl = gsap.timeline();
    tl.from(".gsap-title", {opacity: 0, y: -50, rotationX: -90, duration: 1.2, ease: "expo.out"})
      .from(".gsap-subtitle", {opacity: 0, y: 20, duration: 1, ease: "power3.out"}, "-=0.6")
      .from(".gsap-fade-up", {opacity: 0, y: 30, duration: 1, ease: "power3.out"}, "-=0.6");

    // Case Study Cards Stagger Animation
    gsap.from(".gsap-cs-card", {
        scrollTrigger: {
            trigger: ".works-grid",
            start: "top 85%"
        },
        y: 80,
        opacity: 0,
        scale: 0.95,
        stagger: 0.15,
        duration: 1.2,
        ease: "power4.out"
    });

    // Three.js Interactive Floating Cubes (Tech/Data Packets)
    const canvas = document.getElementById('three-canvas-cs');
    if(canvas) {
        const scene = new THREE.Scene();
        // Light fog to blend with background
        scene.fog = new THREE.FogExp2(0xf8f9fa, 0.005);

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 100;
        
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        const group = new THREE.Group();
        scene.add(group);

        // Create elegant floating wireframe cubes (representing structured data/case studies)
        const geometry = new THREE.BoxGeometry(8, 8, 8);
        const material = new THREE.MeshBasicMaterial({
            color: '#91a6b4',
            wireframe: true,
            transparent: true,
            opacity: 0.15
        });

        const cubes = [];
        for(let i=0; i<30; i++) {
            const mesh = new THREE.Mesh(geometry, material);
            mesh.position.set(
                (Math.random() - 0.5) * 300,
                (Math.random() - 0.5) * 300,
                (Math.random() - 0.5) * 200 - 50
            );
            mesh.rotation.set(
                Math.random() * Math.PI,
                Math.random() * Math.PI,
                Math.random() * Math.PI
            );
            
            // Random rotation speeds
            mesh.userData = {
                rx: (Math.random() - 0.5) * 0.01,
                ry: (Math.random() - 0.5) * 0.01,
                rz: (Math.random() - 0.5) * 0.01,
                floatSpeed: Math.random() * 0.05 + 0.01,
                floatOffset: Math.random() * Math.PI * 2,
                baseY: mesh.position.y
            };
            
            cubes.push(mesh);
            group.add(mesh);
        }

        let mouseX = 0, mouseY = 0;
        let targetX = 0, targetY = 0;
        
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - window.innerWidth / 2) * 0.05;
            mouseY = (e.clientY - window.innerHeight / 2) * 0.05;
        });

        let time = 0;
        function animate() {
            requestAnimationFrame(animate);
            time += 0.01;

            // Camera subtle parallax
            targetX = mouseX * 0.1;
            targetY = mouseY * 0.1;
            camera.position.x += (targetX - camera.position.x) * 0.05;
            camera.position.y += (-targetY - camera.position.y) * 0.05;
            camera.lookAt(scene.position);

            group.rotation.y = time * 0.1;

            cubes.forEach(cube => {
                cube.rotation.x += cube.userData.rx;
                cube.rotation.y += cube.userData.ry;
                cube.rotation.z += cube.userData.rz;
                // Gentle floating
                cube.position.y = cube.userData.baseY + Math.sin(time + cube.userData.floatOffset) * 10;
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
