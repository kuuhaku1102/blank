<?php
/* Template Name: CONTACTページ */
get_header(); ?>

<!-- Three.js Background Canvas -->
<canvas id="three-canvas-contact" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<!-- Page Header -->
<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <h1 class="gsap-title" style="font-size: 4rem; font-weight: 900; letter-spacing: 0.1em; margin-bottom: 15px;">CONTACT</h1>
        <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 1rem;">お問い合わせ</p>
    </div>
</div>

<main style="background: transparent; position:relative; overflow:hidden; padding-bottom: 100px;">
    
    <div class="container" style="text-align:center; margin-bottom: 80px; position:relative; z-index:10;">
        <p class="gsap-fade-up" style="font-size:1.15rem; font-weight:bold; color:var(--primary-color); line-height:2;">
            Web制作、LP制作、マーケティング支援に関するご相談や<br>
            お見積り等を承っております。<br>
            お気軽にお問い合わせください。
        </p>
    </div>

    <div class="container" style="max-width: 800px; margin: 0 auto; position:relative; z-index:10;">
        <div class="gsap-fade-up" style="background:rgba(255,255,255,0.9); backdrop-filter:blur(10px); -webkit-backdrop-filter:blur(10px); border-radius: 16px; box-shadow:0 15px 40px rgba(0,0,0,0.05); border:1px solid rgba(0,0,0,0.05); padding: 50px 40px; margin-bottom:100px;">
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                <?php 
                $content = get_the_content();
                // Check if CF7 or the BowNow MA script is present in the content
                if(trim(strip_tags($content)) === '' && !has_shortcode($content, 'contact-form-7') && strpos($content, 'bownow_cs_sid') === false) : ?>
                    <!-- ダミーのお問い合わせフォーム表示 (WPにコンテンツが未入力の場合) -->
                    <form action="#" method="post" style="display:flex; flex-direction:column; gap:25px;">
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:bold; color:var(--primary-color);">会社名 / 組織名</label>
                            <input type="text" placeholder="例: 株式会社○○" style="width:100%; padding: 15px; border: 1px solid #ccd0d4; border-radius: 8px; font-size: 1rem; outline:none; transition:border-color 0.3s;" onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#ccd0d4'">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:bold; color:var(--primary-color);">お名前 <span style="color:#e53935;">*</span></label>
                            <input type="text" required placeholder="例: 山田 太郎" style="width:100%; padding: 15px; border: 1px solid #ccd0d4; border-radius: 8px; font-size: 1rem; outline:none; transition:border-color 0.3s;" onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#ccd0d4'">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:bold; color:var(--primary-color);">メールアドレス <span style="color:#e53935;">*</span></label>
                            <input type="email" required placeholder="例: info@example.com" style="width:100%; padding: 15px; border: 1px solid #ccd0d4; border-radius: 8px; font-size: 1rem; outline:none; transition:border-color 0.3s;" onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#ccd0d4'">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:bold; color:var(--primary-color);">ご相談内容 <span style="color:#e53935;">*</span></label>
                            <textarea required rows="8" placeholder="お問い合わせ内容をご記入ください。" style="width:100%; padding: 15px; border: 1px solid #ccd0d4; border-radius: 8px; font-size: 1rem; outline:none; transition:border-color 0.3s; resize:vertical;" onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#ccd0d4'"></textarea>
                        </div>
                        <div style="text-align:center; margin-top:20px;">
                            <!-- dummy button -->
                            <button type="button" onclick="alert('これはデモ用のデザインフォームです。\n実際の送信は行われません。\n\n管理画面の固定ページ「contact」の本文に、MAツール（BowNow等）のスクリプトやContact Form 7をご入力いただくと、本物のフォームに自動で切り替わります。')" style="background:var(--primary-color); color:#fff; font-weight:bold; font-size:1.2rem; padding:15px 60px; border:none; border-radius:30px; cursor:pointer; box-shadow:0 10px 20px rgba(11,19,43,0.2); transition:transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 30px rgba(11,19,43,0.3)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px rgba(11,19,43,0.2)';">
                                送信内容を確認する
                            </button>
                        </div>
                    </form>
                <?php else : ?>
                    <!-- If the user has put something like Contact Form 7 shortcode or BowNow script into the WP editor, it prints gracefully -->
                    <div class="contentArea wp-form-wrapper" style="line-height:1.8;">
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>

            <?php endwhile; endif; ?>

        </div>
    </div>
</main>

<style>
/* Style adjustments for standard plugin forms like Contact Form 7 */
.wp-form-wrapper input[type="text"],
.wp-form-wrapper input[type="email"],
.wp-form-wrapper input[type="url"],
.wp-form-wrapper input[type="tel"],
.wp-form-wrapper textarea,
.wp-form-wrapper select {
    width: 100%;
    padding: 15px;
    border: 1px solid #ccd0d4;
    border-radius: 8px;
    font-size: 1rem;
    margin-bottom: 10px;
    outline: none;
    transition: border-color 0.3s;
    background: #fff;
    font-family: inherit;
    box-sizing: border-box;
}
.wp-form-wrapper input[type="text"]:focus,
.wp-form-wrapper input[type="email"]:focus,
.wp-form-wrapper input[type="url"]:focus,
.wp-form-wrapper input[type="tel"]:focus,
.wp-form-wrapper textarea:focus,
.wp-form-wrapper select:focus {
    border-color: var(--primary-color);
}
.wp-form-wrapper input[type="submit"],
.wp-form-wrapper button[type="submit"] {
    background: var(--primary-color);
    color: #fff;
    font-weight: bold;
    font-size: 1.2rem;
    padding: 15px 60px;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    box-shadow: 0 10px 20px rgba(11,19,43,0.2);
    display: block;
    margin: 30px auto 0;
    transition: transform 0.3s, box-shadow 0.3s;
}
.wp-form-wrapper input[type="submit"]:hover,
.wp-form-wrapper button[type="submit"]:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(11,19,43,0.3);
}
.wp-form-wrapper label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: var(--primary-color);
}
.wpcf7-form-control-wrap {
    display: block !important;
    margin-bottom: 20px;
}
.wpcf7-not-valid-tip {
    font-size: 0.85em;
    font-weight: bold;
    color: #e53935;
    margin-top: -5px;
    margin-bottom: 10px;
    display: block;
}
div.wpcf7-response-output {
    border-radius: 8px;
    padding: 15px;
    font-weight: bold;
    margin-top: 30px;
}
div.wpcf7-validation-errors {
    border-color: #ffa500;
}
@media (max-width: 768px) {
    .wp-form-wrapper input[type="submit"],
    .wp-form-wrapper button[type="submit"] {
        width: 100%;
        padding: 15px 0;
    }
    .gsap-fade-up {
        padding: 30px 20px !important;
    }
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Basic GSAP interactions
    if(window.gsap && window.ScrollTrigger) {
        gsap.from(".gsap-title", { y:50, opacity:0, duration:1, ease:"power3.out" });
        gsap.from(".gsap-subtitle", { y:30, opacity:0, duration:1, ease:"power3.out", delay:0.2 });
        gsap.utils.toArray('.gsap-fade-up').forEach(el => {
            gsap.from(el, {
                y: 50, opacity: 0, duration: 1, ease: "power3.out",
                scrollTrigger: { trigger: el, start: "top 85%" }
            });
        });
    }

    // Optional Three.js elegant dust/particles background for Contact Page
    const canvas = document.getElementById('three-canvas-contact');
    if(canvas) {
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 30;
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        const geo = new THREE.BufferGeometry();
        const count = 300;
        const pos = new Float32Array(count * 3);
        const colors = new Float32Array(count * 3);
        const c1 = new THREE.Color('#91a6b4');
        const c2 = new THREE.Color('#e53935');
        for(let i=0; i<count*3; i+=3) {
            pos[i] = (Math.random()-0.5)*100;
            pos[i+1] = (Math.random()-0.5)*100;
            pos[i+2] = (Math.random()-0.5)*50;
            const mx = c1.clone().lerp(c2, Math.random()*0.2);
            colors[i] = mx.r; colors[i+1] = mx.g; colors[i+2] = mx.b;
        }
        geo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
        geo.setAttribute('color', new THREE.BufferAttribute(colors, 3));
        const mat = new THREE.PointsMaterial({ size: 0.2, vertexColors: true, transparent:true, opacity:0.3 });
        const mesh = new THREE.Points(geo, mat);
        scene.add(mesh);

        const clock = new THREE.Clock();
        const animate = function() {
            requestAnimationFrame(animate);
            mesh.rotation.y += 0.0005;
            mesh.position.y += Math.sin(clock.getElapsedTime())*0.01;
            renderer.render(scene, camera);
        };
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
