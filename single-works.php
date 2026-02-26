<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Clean Abstract Background for Works Single -->
<div style="position:fixed; top:0; left:0; width:100%; height:100%; background:#fafcff; z-index:-1; pointer-events:none;"></div>

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
                
                <!-- Tag area below title (if needed) -->
                <div style="margin-bottom:40px; display:flex; gap:10px; flex-wrap:wrap;">
                    <!-- Additional generic tags could go here based on mockup -->
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
            </div>
        </div>
                
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
                                $group_title = $group['title'];
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
            y: 30,
            opacity: 0,
            duration: 1.0,
            ease: "power3.out"
        });
    });
});
</script>

<?php get_footer(); ?>
