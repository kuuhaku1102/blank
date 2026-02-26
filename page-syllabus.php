<?php
/* Template Name: SYLLABUS一覧ページ */
get_header(); ?>

<!-- Three.js Background Canvas (Shared for Syllabus) -->
<canvas id="three-canvas-syllabus" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <h1 class="gsap-title" style="font-size: 4rem; font-weight: 900; letter-spacing: 0.1em; margin-bottom: 15px; color:var(--primary-color);">SYLLABUS</h1>
        <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 1rem;">専門知識・メソッド</p>
    </div>
</div>

<main style="background: transparent; padding-bottom: 120px; position:relative; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1; max-width:1100px;">
        
        <p class="gsap-fade-up" style="text-align:center; margin-bottom:80px; color:var(--accent-color); font-size:1.15rem; line-height:2; font-weight:bold;">
            デジタル戦略から最新のAI実装、マーケティング手法まで、<br>
            ビジネスの最前線で活用できる実践的なナレッジを展開します。
        </p>

        <div class="works-grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 40px;">
            <?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 9,
    'paged' => $paged
);
$syllabus_query = new WP_Query($args);

if ( $syllabus_query->have_posts() ) : while ( $syllabus_query->have_posts() ) : $syllabus_query->the_post();
                $categories = get_the_category();
            ?>
            <a href="<?php the_permalink(); ?>" class="gsap-syllabus-card" style="display:block; text-decoration:none; color:inherit; background:rgba(255,255,255,0.85); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); border-radius:16px; transition:transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s ease; box-shadow:0 15px 40px rgba(0,0,0,0.04); border-top: 4px solid var(--accent-color); border-bottom: 1px solid rgba(0,0,0,0.05); border-left: 1px solid rgba(0,0,0,0.05); border-right: 1px solid rgba(0,0,0,0.05); padding:25px; position:relative; overflow:hidden;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 60px rgba(0,0,0,0.08)'; this.style.borderColor='var(--highlight-color)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.04)'; this.style.borderColor='var(--accent-color)';">
                
                <div class="img-wrapper" style="border-radius:12px; overflow:hidden; margin-bottom:20px; position:relative; aspect-ratio: 16/10; background:#f4f7f6;">
                    <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('large', ['style' => 'width:100%; height:100%; object-fit:cover; transition:transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);', 'class' => 'syllabus-img']); ?>
                    <?php else: ?>
                        <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:var(--primary-color); opacity:0.3; font-size:1.5rem; font-weight:bold; background:linear-gradient(135deg, rgba(145,166,180,0.1), rgba(145,166,180,0.2));" class="syllabus-img">
                            SYLLABUS
                        </div>
                    <?php endif; ?>
                    <div class="overlay" style="position:absolute; inset:0; background:rgba(28,37,65,0.1); opacity:0; transition:opacity 0.4s ease;"></div>
                    <style>
                        .gsap-syllabus-card:hover .syllabus-img { transform: scale(1.08); }
                        .gsap-syllabus-card:hover .overlay { opacity: 1; }
                    </style>
                </div>

                <div class="work-meta" style="display:flex; gap:10px; margin-bottom:15px; flex-wrap:wrap; align-items:center;">
                    <span style="font-size:0.85rem; color:var(--accent-color); font-weight:bold; border-right:2px solid var(--light-gray); padding-right:10px;">
                        <?php echo get_the_date('Y.m.d'); ?>
                    </span>
                    <?php if ( ! empty( $categories ) ) : ?>
                    <span style="font-size:0.8rem; background:rgba(229,57,53,0.1); color:var(--highlight-color); padding:4px 12px; border-radius:30px; font-weight:bold;">
                        <?php echo esc_html( $categories[0]->name ); ?>
                    </span>
                    <?php endif; ?>
                </div>

                <h3 style="font-size:1.25rem; font-weight:800; color:var(--primary-color); margin:0 0 15px; line-height:1.6;"><?php the_title(); ?></h3>
                
                <p style="font-size:0.95rem; color:var(--accent-color); line-height:1.8; margin-bottom:20px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                    <?php echo wp_trim_words( get_the_excerpt(), 40, '...' ); ?>
                </p>

                <div style="font-size:0.95rem; color:var(--primary-color); font-weight:bold; display:flex; align-items:center; gap:5px; transition:color 0.3s;" class="read-more-link">
                    Read Article <span style="font-size:1.2rem; transition:transform 0.3s; display:inline-block;" class="arrow">&rarr;</span>
                </div>
                <style>
                    .gsap-syllabus-card:hover .read-more-link { color: var(--highlight-color); }
                    .gsap-syllabus-card:hover .arrow { transform: translateX(5px); }
                </style>
            </a>
            <?php 
            endwhile; else: ?>
                <p style="color:var(--accent-color); text-align:center; grid-column:1/-1;">準備中です。</p>
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

    // Case Study Cards Stagger Animation
    gsap.from(".gsap-syllabus-card", {
        scrollTrigger: {
            trigger: ".works-grid",
            start: "top 85%"
        },
        y: 80,
        opacity: 0,
        scale: 0.95,
        stagger: 0.1,
        duration: 1.2,
        ease: "power4.out"
    });

    // Three.js Interactive Abstract Structure (Syllabus/Knowledge Base metaphor)
    const canvas = document.getElementById('three-canvas-syllabus');
    if(canvas) {
        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2('#f8f9fa', 0.003); 

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 60;
        
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        const group = new THREE.Group();
        scene.add(group);

        // Abstract "knowledge spheres" connected
        const geometry = new THREE.SphereGeometry(3, 16, 16);
        const material = new THREE.MeshBasicMaterial({
            color: '#91a6b4',
            wireframe: true,
            transparent: true,
            opacity: 0.2
        });

        for(let i=0; i<40; i++) {
            const mesh = new THREE.Mesh(geometry, material);
            mesh.position.set(
                (Math.random() - 0.5) * 250,
                (Math.random() - 0.5) * 250,
                (Math.random() - 0.5) * 100 - 20
            );
            
            mesh.userData = {
                ax: (Math.random() - 0.5) * 0.01,
                ay: (Math.random() - 0.5) * 0.01,
                az: (Math.random() - 0.5) * 0.01
            };
            group.add(mesh);
        }

        let mouseX = 0, mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - window.innerWidth / 2) * 0.05;
            mouseY = (e.clientY - window.innerHeight / 2) * 0.05;
        });

        function animate() {
            requestAnimationFrame(animate);

            camera.position.x += (mouseX - camera.position.x) * 0.02;
            camera.position.y += (-mouseY - camera.position.y) * 0.02;
            camera.lookAt(scene.position);

            group.rotation.y += 0.002;
            group.rotation.z += 0.001;

            group.children.forEach(mesh => {
                mesh.rotation.x += mesh.userData.ax;
                mesh.rotation.y += mesh.userData.ay;
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
