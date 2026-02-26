<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Clean Abstract Background for Works Single -->
<div style="position:fixed; top:0; left:0; width:100%; height:100%; background:#fafcff; z-index:-1; pointer-events:none;"></div>
<canvas id="three-canvas-works-single" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:0; pointer-events:none; opacity:0.4;"></canvas>

<main style="background: transparent; position:relative; overflow:hidden; padding: 120px 0;">
    <div class="container" style="position:relative; z-index:2; max-width: 1100px;">
        
        <!-- Breadcrumbs (Simplified) -->
        <div style="font-size:0.9rem; color:#91a6b4; margin-bottom: 40px;">
            <a href="<?php echo home_url(); ?>" style="color:inherit; text-decoration:none;">Home</a> &raquo; 
            <a href="<?php echo get_post_type_archive_link('works'); ?>" style="color:inherit; text-decoration:none;">制作実績</a> &raquo; 
            <strong style="color:var(--primary-color);"><?php the_title(); ?></strong>
        </div>

        <!-- 1. Top Section: Image (Left) + Details (Right) -->
        <div class="works-single-header" style="display:flex; flex-wrap:wrap; gap:60px; margin-bottom:80px; align-items:flex-start;">
            
            <!-- Left: Feature Image (Mobile Mockup style) -->
            <div class="gsap-feature-img" style="flex: 0 0 320px; text-align:center;">
                <?php if( has_post_thumbnail() ): ?>
                    <div style="border-radius:30px; overflow:hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.1); background:#fff; padding:10px; border: 1px solid rgba(145,166,180,0.2);">
                        <?php the_post_thumbnail('full', array('style'=>'width:100%; height:auto; display:block; border-radius:24px;', 'class'=>'work-single-img')); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right: Title, Meta, and Buttons -->
            <div class="gsap-work-info" style="flex: 1; min-width: 300px; padding-top:20px;">
                
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; border-bottom:1px solid rgba(145,166,180,0.2); padding-bottom:15px;">
                    <!-- Categories -->
                    <div style="display:flex; gap:10px; flex-wrap:wrap;">
                        <?php 
                        $terms = get_the_terms($post->ID, 'work_cat'); 
                        if($terms): foreach($terms as $term): ?>
                            <span style="font-size:0.85rem; background:#f0f4f8; color:#1c2541; border:1px solid #e1e8f0; padding:6px 16px; border-radius:30px; font-weight:bold;"><?php echo esc_html($term->name); ?></span>
                        <?php endforeach; endif; ?>
                    </div>
                    <!-- Date -->
                    <div style="font-size:0.95rem; color:#91a6b4; font-weight:bold;">
                        <?php echo get_the_date('Y年n月j日'); ?>
                    </div>
                </div>

                <h1 class="gsap-title" style="font-size: 2.5rem; font-weight: 800; line-height: 1.4; margin-bottom: 40px; color:var(--primary-color);"><?php the_title(); ?></h1>
                
                <!-- Scope of Work tags -->
                <div style="margin-bottom:40px; display:flex; gap:10px; flex-wrap:wrap;">
                    <?php 
                    $scope = get_post_meta( $post->ID, 'scope', true ) ?: [];
                    if ( !is_array($scope) ) $scope = []; // Handle edge case for old text data
                    foreach($scope as $s): ?>
                        <span style="font-size:0.85rem; color:#1a56db; background:rgba(26,86,219,0.05); border:1px solid rgba(26,86,219,0.2); padding:6px 16px; border-radius:30px; font-weight:bold;">
                            <span style="margin-right:4px;">✓</span> <?php echo esc_html($s); ?>
                        </span>
                    <?php endforeach; ?>
                </div>

                <!-- CTA Buttons -->
                <div style="display:flex; gap:15px; flex-wrap:wrap;">
                    <?php $works_url = get_post_meta( $post->ID, 'works_url', true ); ?>
                    <?php if($works_url): ?>
                        <a href="<?php echo esc_url($works_url); ?>" target="_blank" rel="noopener" style="display:inline-flex; align-items:center; justify-content:center; font-weight:bold; color:var(--white); background:var(--primary-color); padding:15px 35px; border-radius:8px; text-decoration:none; font-size:1rem; transition:background 0.3s ease;">
                            サイトを見る
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo home_url('/contact'); ?>" style="display:inline-flex; align-items:center; justify-content:center; font-weight:bold; color:var(--primary-color); background:#ffffff; border:1px solid #d1d9e0; padding:15px 35px; border-radius:8px; text-decoration:none; font-size:1rem; transition:border-color 0.3s ease;" onmouseover="this.style.borderColor='var(--primary-color)';" onmouseout="this.style.borderColor='#d1d9e0';">
                        制作のご相談
                    </a>
                </div>

                <!-- Problem / Issue -->
                <?php $issue = get_post_meta($post->ID, 'issue', true); if($issue): ?>
                <div style="margin-top: 50px; background:#f8fafc; border-left: 4px solid #1a56db; padding: 25px 30px; border-radius: 0 12px 12px 0;">
                    <h3 style="font-size:1.1rem; color:var(--primary-color); font-weight:800; letter-spacing:0.05em; margin-bottom:15px; display:flex; align-items:center; gap:10px;">
                        課題 (PROBLEM)
                    </h3>
                    <p style="font-size:1.05rem; color:#4a5568; font-weight:500; line-height:1.8; margin:0;">
                        <?php echo nl2br(esc_html($issue)); ?>
                    </p>
                </div>
                <?php endif; ?>

            </div>
        </div>
        <article class="work-single-article" style="position:relative; border-top: 1px solid #e1e8f0; padding-top:60px;">

            <!-- 2. Implementation Features (Using JSON Schema Groups) -->
            <?php 
            $selected_features = get_post_meta( $post->ID, 'works_features', true ) ?: [];
            if(!empty($selected_features)): 
                // Load schema to group selected features
                $schema_json = get_option('blank_works_schema');
                if(!$schema_json && function_exists('blank_works_get_default_schema')) {
                    $schema_json = blank_works_get_default_schema();
                }
                $schema = json_decode($schema_json, true) ?: [];
                
                $grouped_features = [];
                if(isset($schema['tabs'])) {
                    foreach($schema['tabs'] as $tab) {
                        if(isset($tab['groups'])) {
                            foreach($tab['groups'] as $group) {
                                $group_title = $group['label'] ?? ($group['title'] ?? 'カテゴリ');
                                $group_matches = [];
                                if(isset($group['fields'])) {
                                    foreach($group['fields'] as $field) {
                                        if(in_array($field['id'], $selected_features)) {
                                            $group_matches[] = $field['label'];
                                        }
                                    }
                                }
                                if(!empty($group_matches)) {
                                    $grouped_features[$group_title] = $group_matches;
                                }
                            }
                        }
                    }
                }

                if(!empty($grouped_features)):
            ?>
            <div class="gsap-work-section feature-blocks" style="margin-bottom:80px;">
                <h2 style="font-size:1.4rem; font-weight:bold; color:var(--primary-color); margin-bottom:30px; display:flex; align-items:center;">
                    実装機能
                </h2>
                
                <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap:20px;">
                    <?php foreach($grouped_features as $group_name => $features): ?>
                        <div style="background:#ffffff; border:1px solid #e1e8f0; border-radius:12px; padding:25px; box-shadow:0 5px 15px rgba(0,0,0,0.02);">
                            <h3 style="font-size:1.1rem; color:#1a56db; font-weight:bold; margin:0 0 20px;"><?php echo esc_html($group_name); ?></h3>
                            <div style="display:flex; flex-wrap:wrap; gap:10px;">
                                <?php foreach($features as $f): ?>
                                    <span style="font-size:0.9rem; color:#1c2541; background:#f8fafc; border:1px solid #e2e8f0; padding:6px 16px; border-radius:30px; font-weight:500;">
                                        <?php echo esc_html($f); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; endif; ?>

            <!-- Main Content Area (Optional if user adds content in editor) -->
            <?php if(trim(get_the_content())): ?>
            <div class="gsap-work-section contentArea" style="margin-bottom:80px; font-size:1.1rem; color:#4a5568; line-height:2.0;">
                <?php the_content(); ?>
                <style>
                    /* Clean typography for content */
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
            <?php endif; ?>
            
            <!-- Related Works Area (Added per Mockup) -->
            <?php
            $related_args = array(
                'post_type' => 'works',
                'posts_per_page' => 5, // Match mockup exactly showing 5
                'post__not_in' => array($post->ID),
                'orderby' => 'rand'
            );
            // Optionally filter by same term if desired
            $related_terms = get_the_terms($post->ID, 'work_cat');
            if($related_terms) {
                $related_args['tax_query'] = array(
                    array(
                        'taxonomy' => 'work_cat',
                        'field' => 'term_id',
                        'terms' => $related_terms[0]->term_id
                    )
                );
            }
            $related_query = new WP_Query($related_args);
            if($related_query->have_posts()):
            ?>
            <div class="gsap-work-section" style="margin-top:100px;">
                <h2 style="font-size:1.4rem; font-weight:bold; color:var(--primary-color); margin-bottom:30px;">関連する制作実績</h2>
                <div style="display:flex; gap:20px; overflow-x:auto; padding-bottom:20px; flex-wrap:nowrap;">
                    <?php while($related_query->have_posts()): $related_query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" style="flex: 0 0 200px; display:block; text-decoration:none; color:inherit; border:1px solid #e1e8f0; border-radius:12px; background:#fff; padding:15px; transition:box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 10px 20px rgba(0,0,0,0.05)';" onmouseout="this.style.boxShadow='none';">
                            <div style="aspect-ratio:5/6; background:#edf2f6; border-radius:8px; margin-bottom:15px; overflow:hidden; display:flex; align-items:center; justify-content:center; padding:15px;">
                                <?php if(has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('medium', ['style'=>'width:100%; height:100%; object-fit:contain; filter:drop-shadow(0 5px 10px rgba(0,0,0,0.1));']); ?>
                                <?php else: ?>
                                    <span style="opacity:0.3; font-weight:bold;">WORKS</span>
                                <?php endif; ?>
                            </div>
                            <h4 style="font-size:0.95rem; margin:0; text-align:center; font-weight:bold; color:var(--primary-color);"><?php the_title(); ?></h4>
                        </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="back-link gsap-work-section" style="margin-top: 80px; text-align:center;">
                <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" style="display:inline-flex; align-items:center; justify-content:center; gap:8px; font-weight:bold; color:var(--primary-color); border:1px solid #d1d9e0; background:#fff; padding:15px 50px; border-radius:30px; transition:all 0.3s ease; font-size:1.05rem;" onmouseover="this.style.background='#f0f4f8';" onmouseout="this.style.background='#fff';">
                    一覧へ戻る
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
            y: 30,
            opacity: 0,
            duration: 1.0,
            ease: "power3.out"
        });
    });

    // Extremely Subtle Tech Background (Three.js Geometric Nodes)
    const canvas = document.getElementById('three-canvas-works-single');
    if(canvas) {
        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2('#fafcff', 0.002);

        const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 1, 1000);
        camera.position.z = 200;
        
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        const group = new THREE.Group();
        scene.add(group);

        const particleCount = 60; // Few particles to not be distracting
        const geometry = new THREE.BufferGeometry();
        const positions = new Float32Array(particleCount * 3);
        const velocities = [];

        for(let i=0; i<particleCount; i++) {
            positions[i*3]   = (Math.random() - 0.5) * 600;
            positions[i*3+1] = (Math.random() - 0.5) * 500;
            positions[i*3+2] = (Math.random() - 0.5) * 200;
            velocities.push({
                x: (Math.random() - 0.5) * 0.1,  // Very slow
                y: (Math.random() - 0.5) * 0.1,
                z: (Math.random() - 0.5) * 0.1
            });
        }
        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

        const material = new THREE.PointsMaterial({
            color: '#91a6b4', 
            size: 2,
            transparent: true,
            opacity: 0.15 // barely visible
        });
        
        const particles = new THREE.Points(geometry, material);
        group.add(particles);

        const lineMaterial = new THREE.LineBasicMaterial({
            color: '#91a6b4',
            transparent: true,
            opacity: 0.05 // extremely subtle lines
        });
        
        const lineGeo = new THREE.BufferGeometry();
        const lineMesh = new THREE.LineSegments(lineGeo, lineMaterial);
        group.add(lineMesh);

        let mouseX = 0, mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - window.innerWidth / 2) * 0.01;
            mouseY = (e.clientY - window.innerHeight / 2) * 0.01;
        });

        function animate() {
            requestAnimationFrame(animate);

            const posAttr = geometry.attributes.position;
            const positionsArray = posAttr.array;

            for(let i=0; i<particleCount; i++) {
                positionsArray[i*3]   += velocities[i].x;
                positionsArray[i*3+1] += velocities[i].y;
                positionsArray[i*3+2] += velocities[i].z;

                if(Math.abs(positionsArray[i*3]) > 300) velocities[i].x *= -1;
                if(Math.abs(positionsArray[i*3+1]) > 250) velocities[i].y *= -1;
                if(Math.abs(positionsArray[i*3+2]) > 100) velocities[i].z *= -1;
            }
            posAttr.needsUpdate = true;

            const linePositions = [];
            for(let i=0; i<particleCount; i++) {
                for(let j=i+1; j<particleCount; j++) {
                    const dx = positionsArray[i*3] - positionsArray[j*3];
                    const dy = positionsArray[i*3+1] - positionsArray[j*3+1];
                    const dz = positionsArray[i*3+2] - positionsArray[j*3+2];
                    const distSq = dx*dx + dy*dy + dz*dz;
                    
                    if(distSq < 15000) { // Connect only if relatively close
                        linePositions.push(
                            positionsArray[i*3], positionsArray[i*3+1], positionsArray[i*3+2],
                            positionsArray[j*3], positionsArray[j*3+1], positionsArray[j*3+2]
                        );
                    }
                }
            }
            lineGeo.setAttribute('position', new THREE.Float32BufferAttribute(linePositions, 3));

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
