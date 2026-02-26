<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Three.js Background Canvas (Shared for Works Single) -->
<canvas id="three-canvas-works-single" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<!-- Animated Gradient Background for Header -->
<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1; max-width: 900px;">
        <div class="gsap-meta" style="margin-bottom:25px;">
            <span style="font-size:0.9rem; background:rgba(28,37,65,0.05); border:1px solid rgba(28,37,65,0.1); color:var(--primary-color); padding:8px 30px; border-radius:30px; font-weight:bold; letter-spacing:0.1em; display:inline-flex; align-items:center; gap:10px;">
                <span style="width:10px; height:10px; background:var(--highlight-color); border-radius:50%; box-shadow:0 0 10px var(--highlight-color); display:inline-block; animation: pulseRed 2s infinite;"></span>
                PROJECT STATUS: SHIPPED
            </span>
            <style>@keyframes pulseRed { 0% { transform: scale(1); opacity:1; } 50% { transform: scale(1.5); opacity:0.5; box-shadow:0 0 20px var(--highlight-color); } 100% { transform: scale(1); opacity:1; } }</style>
        </div>

        <h1 class="gsap-title" style="font-size: 3.5rem; font-weight: 900; line-height: 1.3; margin-bottom: 30px; color:var(--primary-color); word-break: break-word;"><?php the_title(); ?></h1>
        
        <div class="gsap-cats" style="display:flex; justify-content:center; gap:15px; flex-wrap:wrap;">
            <?php 
            $terms = get_the_terms($post->ID, 'work_cat'); 
            if($terms): foreach($terms as $term): ?>
                <span style="font-size:0.95rem; background:var(--primary-color); color:var(--white); padding:5px 20px; border-radius:30px; font-weight:bold; letter-spacing:0.05em;"><?php echo esc_html($term->name); ?></span>
            <?php endforeach; endif; ?>
        </div>
    </div>
</div>

<main style="background: transparent; position:relative; overflow:hidden; padding-bottom: 120px;">
    
    <!-- Central Tech Line scrub animation specifically for single -->
    <div style="position: absolute; left: 15%; top: 0; bottom: 0; width: 1px; background: rgba(145,166,180,0.2); z-index: 0;" class="tech-line-bg d-none d-md-block"></div>
    <div style="position: absolute; left: 15%; top: 0; height: 100%; width: 3px; background: linear-gradient(to bottom, var(--highlight-color), var(--accent-color)); transform: scaleY(0); transform-origin: top; z-index: 1;" class="tech-line-progress d-none d-md-block"></div>
    <style>
        @media (max-width: 991px) {
            .tech-line-bg, .tech-line-progress { display: none; }
        }
    </style>

    <div class="container" style="position:relative; z-index:2; max-width: 1000px;">
        
        <div class="gsap-feature-img" style="text-align:center; margin-bottom:80px;">
            <?php if( has_post_thumbnail() ): ?>
                <div style="border-radius:24px; overflow:hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.1); border: 1px solid rgba(255,255,255,0.4); display:inline-block; position:relative;">
                    <?php the_post_thumbnail('full', array('style'=>'max-width:100%; height:auto; display:block; transition:transform 0.5s ease;', 'class'=>'work-single-img')); ?>
                    <div style="position:absolute; inset:0; background:linear-gradient(135deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%); pointer-events:none; z-index:1;"></div>
                </div>
            <?php endif; ?>
        </div>

        <article class="work-single-article" style="position:relative;">
            
            <div class="gsap-work-section" style="display:flex; flex-wrap:wrap; gap:40px; margin-bottom:80px; background:rgba(255,255,255,0.85); backdrop-filter:blur(20px); -webkit-backdrop-filter:blur(20px); padding:50px; border-radius:20px; box-shadow:0 15px 40px rgba(0,0,0,0.04); border-top: 5px solid var(--accent-color); border: 1px solid rgba(0,0,0,0.05);">
                
                <!-- KPI Dashboard Style Output -->
                <div style="flex:1; min-width:300px; display:flex; flex-direction:column; gap:25px;">
                    <div>
                        <h3 style="font-size:1rem; color:var(--highlight-color); font-weight:800; letter-spacing:0.1em; margin-bottom:10px; display:flex; align-items:center; gap:8px;">
                            <span style="display:inline-block; width:20px; height:2px; background:var(--highlight-color);"></span> PROBLEM
                        </h3>
                        <p style="font-size:1.15rem; color:var(--primary-color); font-weight:bold; line-height:1.8; margin:0; padding-left:28px;">
                            <?php echo nl2br(esc_html(get_post_meta($post->ID, 'issue', true) ?: '未入力')); ?>
                        </p>
                    </div>

                    <div>
                        <h3 style="font-size:1rem; color:var(--highlight-color); font-weight:800; letter-spacing:0.1em; margin-bottom:10px; display:flex; align-items:center; gap:8px;">
                            <span style="display:inline-block; width:20px; height:2px; background:var(--highlight-color);"></span> SOLUTION
                        </h3>
                        <p style="font-size:1.15rem; color:var(--primary-color); font-weight:bold; line-height:1.8; margin:0; padding-left:28px;">
                            <?php echo nl2br(esc_html(get_post_meta($post->ID, 'measure', true) ?: '未入力')); ?>
                        </p>
                    </div>
                </div>

                <!-- High-tech Score Card -->
                <div style="flex:1; min-width:300px;">
                    <div style="background:var(--primary-color); color:var(--white); padding:40px; border-radius:16px; box-shadow:0 20px 40px rgba(28,37,65,0.2); height:100%; display:flex; flex-direction:column; justify-content:center; position:relative; overflow:hidden;">
                        <!-- SVG circuit line -->
                        <svg style="position:absolute; right:0; top:0; height:100%; opacity:0.1;" viewBox="0 0 100 200" preserveAspectRatio="none">
                            <path d="M100,0 L50,0 L50,50 L20,50 L20,100 L0,100 L0,150 L30,150 L30,200 L100,200 Z" fill="none" stroke="var(--white)" stroke-width="2"/>
                        </svg>
                        
                        <h3 style="font-size:1.1rem; color:rgba(255,255,255,0.7); font-weight:800; letter-spacing:0.15em; margin-bottom:15px; position:relative; z-index:1;">RESULTS / ACHIEVED</h3>
                        <p style="font-size:2rem; font-weight:900; line-height:1.4; color:var(--white); margin:0; position:relative; z-index:1;">
                            <?php echo nl2br(esc_html(get_post_meta($post->ID, 'result', true) ?: '未入力')); ?>
                        </p>
                        
                        <div style="margin-top:30px; pt-top:20px; border-top:1px dashed rgba(255,255,255,0.2); position:relative; z-index:1;">
                            <h3 style="font-size:0.9rem; color:rgba(255,255,255,0.7); font-weight:800; letter-spacing:0.1em; margin:15px 0 10px;">SCOPE OF WORK</h3>
                            <p style="font-size:1.1rem; color:var(--white); font-weight:bold; margin:0;">
                                <?php echo esc_html(get_post_meta($post->ID, 'scope', true) ?: '要件定義 / デザイン / システム構成 / 保守'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
            $selected_features = get_post_meta( $post->ID, 'works_features', true ) ?: [];
            $works_url = get_post_meta( $post->ID, 'works_url', true );
            if(!empty($selected_features) || !empty($works_url)): 
                $schema_json = get_option('blank_works_schema');
                if(!$schema_json && function_exists('blank_works_get_default_schema')) {
                    $schema_json = blank_works_get_default_schema();
                }
                $schema = json_decode($schema_json, true) ?: [];
                
                // create a map of id -> label from schema
                $feature_map = [];
                if(isset($schema['tabs'])) {
                    foreach($schema['tabs'] as $tab) {
                        if(isset($tab['groups'])) {
                            foreach($tab['groups'] as $group) {
                                if(isset($group['fields'])) {
                                    foreach($group['fields'] as $field) {
                                        $feature_map[$field['id']] = $field['label'];
                                    }
                                }
                            }
                        }
                    }
                }
            ?>
            <!-- Tech Specs & Features Matrix -->
            <div class="gsap-work-section" style="margin-bottom:80px; background:rgba(28, 37, 65, 0.95); backdrop-filter:blur(20px); -webkit-backdrop-filter:blur(20px); border-radius:20px; padding:50px; color:var(--white); box-shadow:0 15px 40px rgba(0,0,0,0.1); border-left:4px solid var(--highlight-color);">
                <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px; border-bottom:1px dashed rgba(255,255,255,0.2); padding-bottom:20px; margin-bottom:30px;">
                    <h3 style="font-size:1.4rem; color:var(--white); font-weight:800; letter-spacing:0.1em; margin:0; display:flex; align-items:center; gap:10px;">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        TECH SPECS / FEATURES
                    </h3>
                    <?php if($works_url): ?>
                    <a href="<?php echo esc_url($works_url); ?>" target="_blank" rel="noopener" style="display:inline-flex; align-items:center; gap:8px; font-weight:bold; color:var(--white); background:var(--highlight-color); padding:10px 25px; border-radius:30px; text-decoration:none; font-size:0.95rem; transition:transform 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)';" onmouseout="this.style.transform='translateY(0)';">
                        Launch Site <span style="font-size:1.2rem;">&nearr;</span>
                    </a>
                    <?php endif; ?>
                </div>
                
                <?php if(!empty($selected_features)): ?>
                <div style="display:flex; flex-wrap:wrap; gap:12px;">
                    <?php foreach($selected_features as $fid): 
                        if(isset($feature_map[$fid])):
                    ?>
                    <span style="background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.2); padding:8px 20px; border-radius:8px; font-size:0.95rem; font-weight:bold; color:var(--white);">
                        <span style="color:var(--highlight-color); margin-right:5px;">✓</span> <?php echo esc_html($feature_map[$fid]); ?>
                    </span>
                    <?php endif; endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- Main Content Area -->
            <div class="gsap-work-section contentArea" style="background:rgba(255,255,255,0.95); padding:60px; border-radius:20px; box-shadow:0 15px 40px rgba(0,0,0,0.03); border:1px solid rgba(0,0,0,0.05); line-height: 2.2; font-size:1.15rem; color:var(--primary-color);">
                <?php the_content(); ?>
                
                <style>
                    /* Custom styles for content to make it look tech-heavy and structured */
                    .work-single-article .contentArea h2 { font-size: 1.8rem; color: var(--primary-color); border-bottom: 2px solid rgba(145,166,180,0.2); padding-bottom: 15px; margin: 60px 0 30px; font-weight: 800; display:flex; align-items:center; gap:15px; }
                    .work-single-article .contentArea h2::before { content: "//"; font-family: 'Courier New', monospace; color: var(--highlight-color); font-size:1.4rem; font-weight:bold; }
                    .work-single-article .contentArea h3 { font-size: 1.5rem; color: var(--primary-color); margin: 40px 0 20px; font-weight: 700; border-left: 4px solid var(--accent-color); padding-left: 15px; }
                    .work-single-article .contentArea p { margin-bottom: 25px; }
                    .work-single-article .contentArea img { max-width: 100%; height: auto; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); margin: 40px 0; border: 1px solid rgba(145,166,180,0.1); }
                    .work-single-article .contentArea ul { background: rgba(145,166,180,0.03); padding: 30px 30px 30px 50px; border-radius: 12px; border-left: 4px solid var(--primary-color); margin-bottom: 30px; list-style-type:square; }
                    .work-single-article .contentArea li { margin-bottom: 15px; font-weight:bold;}
                    .work-single-article .contentArea a { color: var(--highlight-color); text-decoration: none; border-bottom:1px dashed var(--highlight-color); font-weight: bold; }
                </style>
            </div>
            
            <div class="back-link gsap-work-section" style="margin-top: 80px; text-align:center;">
                <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" style="display:inline-flex; align-items:center; gap:8px; font-weight:bold; color:var(--primary-color); border:2px solid var(--primary-color); padding:15px 50px; border-radius:30px; transition:all 0.3s cubic-bezier(0.16, 1, 0.3, 1); box-shadow:0 5px 15px rgba(0,0,0,0.05); font-size:1.1rem;" onmouseover="this.style.background='var(--primary-color)'; this.style.color='var(--white)'; this.style.transform='translateY(-5px)';" onmouseout="this.style.background='transparent'; this.style.color='var(--primary-color)'; this.style.transform='translateY(0)';">
                    &larr; BACK TO WORKS
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

    // Header Animated Entrance (High tech sweep)
    const tl = gsap.timeline();
    tl.from(".gsap-meta", {opacity: 0, scale: 0.9, y: -20, duration: 0.8, ease: "power3.out"})
      .from(".gsap-title", {opacity: 0, y: 50, duration: 1.2, ease: "expo.out"}, "-=0.4")
      .from(".gsap-cats span", {opacity: 0, x: -20, stagger:0.1, duration: 0.8, ease: "back.out(1.7)"}, "-=0.8")
      .from(".gsap-feature-img", {opacity: 0, y: 60, scale:0.95, duration: 1.5, ease: "power4.out"}, "-=0.6");

    // Scroll trigger for sections
    gsap.utils.toArray('.gsap-work-section').forEach((section) => {
        gsap.from(section, {
            scrollTrigger: {
                trigger: section,
                start: "top 85%"
            },
            y: 50,
            opacity: 0,
            duration: 1.2,
            ease: "power3.out"
        });
    });

    // Dynamic Central Tech Line Animation scrubbed via scroll
    if (document.querySelector('.tech-line-progress')) {
        gsap.to(".tech-line-progress", {
            scaleY: 1,
            ease: "none",
            scrollTrigger: {
                trigger: "main",
                start: "top top",
                end: "bottom bottom",
                scrub: true
            }
        });
    }

    // Three.js Abstract Blueprint Data Core
    const canvas = document.getElementById('three-canvas-works-single');
    if(canvas) {
        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2('#f8f9fa', 0.003); 

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 80;
        
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        const group = new THREE.Group();
        scene.add(group);

        // Core data structure: highly detailed wireframe cylinder simulating logic flows
        const geometry = new THREE.CylinderGeometry(20, 20, 100, 32, 10, true);
        const material = new THREE.MeshBasicMaterial({
            color: '#91a6b4',
            wireframe: true,
            transparent: true,
            opacity: 0.15
        });

        // Add 3 interlocking rotating tubes
        for(let i=0; i<3; i++) {
            const tube = new THREE.Mesh(geometry, material);
            tube.scale.set(1 + i*0.5, 1, 1 + i*0.5);
            
            // Randomly flip orientations
            tube.rotation.x = Math.random() * Math.PI;
            tube.userData = {
                rx: (Math.random() - 0.5) * 0.005,
                ry: (Math.random() - 0.5) * 0.005
            };
            group.add(tube);
        }

        // Add a single bright core line
        const coreLineGeo = new THREE.CylinderGeometry(0.5, 0.5, 200, 8);
        const coreLineMat = new THREE.MeshBasicMaterial({ color: '#e53935' });
        const coreLine = new THREE.Mesh(coreLineGeo, coreLineMat);
        group.add(coreLine);

        let mouseX = 0, mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - window.innerWidth / 2) * 0.05;
            mouseY = (e.clientY - window.innerHeight / 2) * 0.05;
        });

        function animate() {
            requestAnimationFrame(animate);

            // Rotate outer tubes
            group.children.forEach(mesh => {
                if(mesh.userData.rx) {
                    mesh.rotation.x += mesh.userData.rx;
                    mesh.rotation.y += mesh.userData.ry;
                }
            });

            // Parallax tracking
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
