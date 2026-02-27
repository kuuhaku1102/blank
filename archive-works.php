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
            
            <!-- Functional Category & Industry Filters -->
            <?php
            $current_cat = isset($_GET['work_cat']) ? sanitize_text_field($_GET['work_cat']) : '';
            $current_ind = isset($_GET['industry']) ? sanitize_text_field($_GET['industry']) : '';

            $categories = get_terms(['taxonomy' => 'work_cat', 'hide_empty' => false]);

            $schema_json = get_option('blank_works_schema') ?: (function_exists('blank_works_get_default_schema') ? blank_works_get_default_schema() : '');
            $schema = json_decode($schema_json, true) ?: [];
            $industry_fields = [];
            if(isset($schema['tabs']['industry']['groups'])) {
                foreach($schema['tabs']['industry']['groups'] as $group) {
                    if(isset($group['fields'])) {
                        foreach($group['fields'] as $f) {
                            $industry_fields[$f['id']] = $f['label'] ?? '';
                        }
                    }
                }
            }
            ?>
            <div style="display:flex; flex-direction:column; gap:20px; align-items:center; margin-top:30px;">
                <!-- Taxonomy (Work Category) -->
                <div style="display:flex; gap:12px; flex-wrap:wrap; justify-content:center;">
                    <a href="?industry=<?php echo urlencode($current_ind); ?>" style="<?php echo empty($current_cat) ? 'background:var(--primary-color); color:var(--white); box-shadow:0 5px 15px rgba(11,19,43,0.2);' : 'background:rgba(255,255,255,0.8); backdrop-filter:blur(5px); color:var(--primary-color);'; ?> padding:8px 25px; border-radius:30px; font-weight:bold; font-size:0.9rem; letter-spacing:0.05em; border:1px solid rgba(0,0,0,0.05); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.background='var(--primary-color)'; this.style.color='var(--white)';" onmouseout="<?php echo empty($current_cat) ? "this.style.background='var(--primary-color)'; this.style.color='var(--white)';" : "this.style.background='rgba(255,255,255,0.8)'; this.style.color='var(--primary-color)';"; ?>">すべて</a>
                    
                    <?php foreach($categories as $cat): ?>
                        <a href="?work_cat=<?php echo $cat->slug; ?>&industry=<?php echo urlencode($current_ind); ?>" style="<?php echo $current_cat === $cat->slug ? 'background:var(--primary-color); color:var(--white); box-shadow:0 5px 15px rgba(11,19,43,0.2);' : 'background:rgba(255,255,255,0.8); backdrop-filter:blur(5px); color:var(--primary-color);'; ?> padding:8px 25px; border-radius:30px; font-weight:bold; font-size:0.9rem; letter-spacing:0.05em; border:1px solid rgba(0,0,0,0.05); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.background='var(--primary-color)'; this.style.color='var(--white)';" onmouseout="<?php echo $current_cat === $cat->slug ? "this.style.background='var(--primary-color)'; this.style.color='var(--white)';" : "this.style.background='rgba(255,255,255,0.8)'; this.style.color='var(--primary-color)';"; ?>"><?php echo esc_html($cat->name); ?></a>
                    <?php endforeach; ?>
                </div>

                <!-- JSON Meta (Industry Hashtags) -->
                <div style="display:flex; gap:15px; flex-wrap:wrap; justify-content:center; margin-top:5px;">
                    <a href="?work_cat=<?php echo urlencode($current_cat); ?>" style="<?php echo empty($current_ind) ? 'color:#1a56db; border-bottom:2px solid #1a56db;' : 'color:#91a6b4;'; ?> font-weight:bold; font-size:0.95rem; letter-spacing:0.05em; text-decoration:none; padding:5px 10px; transition:color 0.3s;" onmouseover="this.style.color='#1a56db';" onmouseout="<?php echo empty($current_ind) ? "this.style.color='#1a56db';" : "this.style.color='#91a6b4';"; ?>">#すべての業種・用途</a>
                    
                    <?php foreach($industry_fields as $id => $label): ?>
                         <a href="?work_cat=<?php echo urlencode($current_cat); ?>&industry=<?php echo urlencode($id); ?>" style="<?php echo $current_ind === $id ? 'color:#1a56db; border-bottom:2px solid #1a56db;' : 'color:#91a6b4;'; ?> font-weight:bold; font-size:0.95rem; letter-spacing:0.05em; text-decoration:none; padding:5px 10px; transition:color 0.3s;" onmouseover="this.style.color='#1a56db';" onmouseout="<?php echo $current_ind === $id ? "this.style.color='#1a56db';" : "this.style.color='#91a6b4';"; ?>">#<?php echo esc_html($label); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="works-grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px; margin-top:50px;">
            <?php 
            global $wp_query;
            $query_args = array(
                'post_type' => 'works',
                'posts_per_page' => -1
            );

            if(!empty($current_cat)) {
                $query_args['tax_query'] = array(
                    array(
                        'taxonomy' => 'work_cat',
                        'field' => 'slug',
                        'terms' => $current_cat
                    )
                );
            }

            if(!empty($current_ind)) {
                $query_args['meta_query'] = array(
                    array(
                        'key' => 'works_features',
                        'value' => '"' . $current_ind . '"',
                        'compare' => 'LIKE'
                    )
                );
            }

            $wp_query = new WP_Query($query_args);

            $card_index = 0;
            if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                $card_index++;
                $is_hidden = $card_index > 9;
            ?>
            <a href="<?php the_permalink(); ?>" class="gsap-works-card <?php echo $is_hidden ? 'hidden-card' : 'initial-load'; ?>" style="display:<?php echo $is_hidden ? 'none' : 'block'; ?>; text-decoration:none; color:inherit; background:#ffffff; border-radius:16px; border: 1px solid rgba(11,19,43,0.1); padding:25px; position:relative; z-index:2;">
                
                <!-- Upper Flex Area: Image on Left, Details on Right -->
                <div style="display:flex; gap:25px; margin-bottom:25px; align-items:flex-start;">
                    
                    <!-- Left: Compact Image Container -->
                    <div class="img-wrapper" style="width:140px; flex-shrink:0; border-radius:12px; overflow:hidden; position:relative; aspect-ratio: 5/6; background:#edf2f6; display:flex; align-items:center; justify-content:center; padding:15px;">
                        <?php if(has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('medium', ['style' => 'width:100%; height:100%; object-fit:contain; filter:drop-shadow(0 10px 15px rgba(0,0,0,0.15)); transition:transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);', 'class' => 'works-img']); ?>
                        <?php else: ?>
                            <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:var(--primary-color); opacity:0.3; font-size:1rem; font-weight:bold; background:rgba(145,166,180,0.1);" class="works-img">
                                NO IMAGE
                            </div>
                        <?php endif; ?>
                        <style>
                            .gsap-works-card:hover .works-img { transform: translateY(-5px) scale(1.05); }
                        </style>
                    </div>

                    <!-- Right: Info Area (Badge, Date, Title) -->
                    <div style="flex-grow:1; display:flex; flex-direction:column; padding-top:10px;">
                        <div class="work-meta" style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:10px;">
                            <span style="font-size:0.85rem; color:#91a6b4; font-weight:bold; font-family:'Courier New', monospace; letter-spacing:0.1em;">
                                <?php echo get_the_date('Y.m.d'); ?>
                            </span>
                        </div>
                        <h3 style="font-size:1.3rem; font-weight:800; color:#1c2541; margin:0 0 15px; line-height:1.5; text-align:left;"><?php the_title(); ?></h3>
                        
                        <!-- Tags -->
                        <div style="display:flex; flex-wrap:wrap; gap:6px;">
                            <?php 
                            // Category / Industry Tags
                            $card_industry_tags = [];
                            $card_terms = get_the_terms($post->ID, 'work_cat'); 
                            if($card_terms) {
                                foreach($card_terms as $t) {
                                    $card_industry_tags[] = $t->name;
                                }
                            }
                            
                            $selected_features = get_post_meta( $post->ID, 'works_features', true ) ?: [];
                            if(!empty($selected_features)) {
                                foreach($industry_fields as $fid => $flabel) {
                                    if(in_array($fid, $selected_features)) {
                                        $card_industry_tags[] = $flabel;
                                    }
                                }
                            }
                            
                            $card_industry_tags = array_filter(array_unique($card_industry_tags));
                            if(empty($card_industry_tags)) $card_industry_tags[] = '実績';
                            
                            foreach($card_industry_tags as $tag_name): ?>
                                <span style="font-size:0.75rem; background:#ffebee; color:#c62828; border:1px solid #ffcdd2; padding:4px 10px; border-radius:4px; font-weight:bold; white-space:nowrap;">
                                    <?php echo esc_html($tag_name); ?>
                                </span>
                            <?php endforeach; ?>
                            
                            <?php 
                            // Scope Tags
                            $scope = get_post_meta( $post->ID, 'scope', true ) ?: [];
                            if (!is_array($scope)) $scope = [];
                            foreach($scope as $s): ?>
                                <span style="font-size:0.75rem; background:#f0f4f8; color:#4a5568; border:1px solid #e2e8f0; padding:4px 10px; border-radius:4px; font-weight:bold; white-space:nowrap;">
                                    <?php echo esc_html($s); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Bottom Area: Read More CTA -->
                <div style="display:block; width:100%;">
                    <div style="display:flex; align-items:center; justify-content:center; box-sizing:border-box; gap:8px; font-size:1rem; font-weight:bold; color:#ffffff; background:#e53935; border-radius:8px; padding:14px 30px; transition:all 0.3s cubic-bezier(0.16, 1, 0.3, 1); width:100%; text-align:center;" class="read-more-btn">
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
        
        <div class="load-more-container gsap-fade-up" style="margin-top: 80px; text-align:center;">
            <?php if ($wp_query->post_count > 9): ?>
            <button id="load-more-btn" style="background:#ffffff; color:var(--primary-color); border:2px solid var(--primary-color); padding:15px 50px; border-radius:30px; font-weight:bold; font-size:1.1rem; letter-spacing:0.1em; cursor:pointer; transition:all 0.3s;" onmouseover="this.style.background='var(--primary-color)'; this.style.color='#ffffff';" onmouseout="this.style.background='#ffffff'; this.style.color='var(--primary-color)';">
                もっと見る &darr;
            </button>
            <?php endif; ?>
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
    gsap.from(".gsap-works-card.initial-load", {
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

    // Load More Logic
    const loadMoreBtn = document.getElementById("load-more-btn");
    if(loadMoreBtn) {
        const hiddenCards = Array.from(document.querySelectorAll(".gsap-works-card.hidden-card"));
        
        loadMoreBtn.addEventListener("click", function(e) {
            e.preventDefault();
            const cardsToShow = hiddenCards.splice(0, 9); // Take next 9
            
            if(cardsToShow.length > 0) {
                cardsToShow.forEach((card) => {
                    card.style.display = "block";
                    card.classList.remove("hidden-card");
                });
                
                gsap.fromTo(cardsToShow, 
                    {opacity: 0, y: 50, rotationX: 10, scale: 0.95}, 
                    {opacity: 1, y: 0, rotationX: 0, scale: 1, duration: 0.8, ease: "power3.out", stagger: 0.1}
                );
                
                setTimeout(() => ScrollTrigger.refresh(), 500);
            }
            
            if(hiddenCards.length === 0) {
                // Fade out button
                gsap.to(loadMoreBtn, {opacity: 0, duration: 0.5, onComplete: () => {
                    loadMoreBtn.style.display = "none";
                }});
            }
        });
    }

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
