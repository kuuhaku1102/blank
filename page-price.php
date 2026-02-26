<?php
/* Template Name: PRICEページ */
get_header(); ?>

<!-- Three.js Background Canvas (Shared for Price) -->
<canvas id="three-canvas-price" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<!-- Page Header -->
<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <h1 class="gsap-title" style="font-size: 4rem; font-weight: 900; letter-spacing: 0.1em; margin-bottom: 15px;">PRICE</h1>
        <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 1rem;">料金プラン</p>
    </div>
</div>

<main style="background: transparent; position:relative; overflow:hidden; padding-bottom: 100px;">
    
    <div class="container" style="text-align:center; margin-bottom: 80px;">
        <p class="gsap-fade-up" style="font-size:1.15rem; font-weight:bold; color:var(--primary-color); line-height:2;">
            プロジェクト規模や目標ごとの目標となる料金体系です。<br>
            詳細はお見積りをご依頼ください。
        </p>
    </div>

    <!-- Pricing Cards Layout -->
    <div class="container" style="max-width: 1100px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; margin-bottom: 100px; align-items: center;">
            
            <!-- Web制作プラン -->
            <div class="gsap-price-card" style="background:rgba(255,255,255,0.85); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); border-radius:16px; box-shadow:0 15px 40px rgba(0,0,0,0.04); border-top: 4px solid var(--primary-color); border-bottom: 1px solid rgba(0,0,0,0.05); border-left: 1px solid rgba(0,0,0,0.05); border-right: 1px solid rgba(0,0,0,0.05); padding: 50px 30px; text-align:center; position:relative; transition:transform 0.4s ease, box-shadow 0.4s ease;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.04)';">
                <h3 style="font-size:1.6rem; color:var(--primary-color); margin-bottom:15px; font-weight:800;">Web制作プラン</h3>
                <p style="color:var(--accent-color); font-size:0.95rem; margin-bottom:30px; line-height:1.6;">企業ブランディングを強化する<br>高品質なコーポレートサイト</p>
                <div style="font-size:3rem; font-weight:900; color:var(--primary-color); margin-bottom:30px; line-height:1;">
                    <span style="font-size:1.5rem; vertical-align:top; margin-right:5px;">¥</span>800,000<span style="font-size:1.2rem; margin-left:5px;">〜</span>
                </div>
                <ul style="text-align:left; margin-bottom:40px; border-top:1px solid rgba(0,0,0,0.08); padding-top:30px; line-height:2.2; list-style:none; padding-left:0; font-weight:500;">
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>戦略設計・要件定義</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>オリジナルデザイン (〜10P)</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>スマホ対応 (レスポンシブ)</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>WordPress基本構築機能</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>お問い合わせフォーム実装</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>基本SEO対策設定</li>
                </ul>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="display:inline-block; width:100%; border:2px solid var(--primary-color); color:var(--primary-color); padding: 15px 0; border-radius: 8px; font-weight:bold; transition:all 0.3s;" onmouseover="this.style.background='var(--primary-color)'; this.style.color='#fff';" onmouseout="this.style.background='transparent'; this.style.color='var(--primary-color)';">詳細を見る</a>
            </div>

            <!-- LP制作プラン (Premium/Popular) -->
            <div class="gsap-price-card" style="background:rgba(28, 37, 65, 0.95); backdrop-filter:blur(20px); -webkit-backdrop-filter:blur(20px); border-radius:16px; box-shadow:0 20px 50px rgba(229, 57, 53, 0.2); border-top: 6px solid var(--highlight-color); border-bottom: 1px solid rgba(255,255,255,0.1); border-left: 1px solid rgba(255,255,255,0.1); border-right: 1px solid rgba(255,255,255,0.1); padding: 60px 30px; text-align:center; position:relative; transform:scale(1.05); z-index:2; transition:transform 0.4s ease, box-shadow 0.4s ease;" onmouseover="this.style.transform='scale(1.05) translateY(-10px)'; this.style.boxShadow='0 30px 60px rgba(229, 57, 53, 0.3)';" onmouseout="this.style.transform='scale(1.05) translateY(0)'; this.style.boxShadow='0 20px 50px rgba(229, 57, 53, 0.2)';">
                <div style="position:absolute; top:-18px; left:50%; transform:translateX(-50%); background:var(--highlight-color); color:var(--white); padding:8px 30px; border-radius:30px; font-weight:900; font-size:1rem; letter-spacing:0.1em; box-shadow: 0 4px 15px rgba(229, 57, 53, 0.5);">RECOMMENDED</div>
                <h3 style="font-size:2rem; color:var(--white); margin-bottom:15px; font-weight:900;">LP特化制作プラン</h3>
                <p style="color:rgba(255,255,255,0.7); font-size:1rem; margin-bottom:30px; line-height:1.6;">圧倒的なコンバージョンを生む<br>成果特化型のランディングページ</p>
                <div style="font-size:3.5rem; font-weight:900; color:var(--white); margin-bottom:30px; line-height:1;">
                    <span style="font-size:1.8rem; vertical-align:top; margin-right:5px; color:var(--highlight-color);">¥</span>400,000<span style="font-size:1.2rem; margin-left:5px; color:rgba(255,255,255,0.7);">〜</span>
                </div>
                <ul style="text-align:left; margin-bottom:40px; border-top:1px solid rgba(255,255,255,0.1); padding-top:30px; line-height:2.2; list-style:none; padding-left:0; font-weight:500; color:rgba(255,255,255,0.9);">
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>競合調査・ペルソナ設計</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>刺さるコピーライティング</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>CVR特化型デザイン</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>スマホ対応 (レスポンシブ)</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>スクロール追従CTA実装</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>ヒートマップ導入支援</li>
                </ul>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-btn" style="display:inline-block; width:100%; font-size:1.1rem; padding: 18px 0; border-radius: 8px;">お見積りを依頼する</a>
            <!-- Keep scale correct for mobile -->
            <style>
                @media (max-width: 900px) {
                    .gsap-price-card:nth-child(2) { transform: scale(1) !important; margin-top:20px; z-index:1; }
                    .gsap-price-card:nth-child(2):hover { transform: translateY(-5px) !important; }
                }
            </style>
            </div>

            <!-- 月額改善プラン -->
            <div class="gsap-price-card" style="background:rgba(255,255,255,0.85); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); border-radius:16px; box-shadow:0 15px 40px rgba(0,0,0,0.04); border-top: 4px solid var(--accent-color); border-bottom: 1px solid rgba(0,0,0,0.05); border-left: 1px solid rgba(0,0,0,0.05); border-right: 1px solid rgba(0,0,0,0.05); padding: 50px 30px; text-align:center; position:relative; transition:transform 0.4s ease, box-shadow 0.4s ease;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.04)';">
                <h3 style="font-size:1.6rem; color:var(--primary-color); margin-bottom:15px; font-weight:800;">月額改善プラン</h3>
                <p style="color:var(--accent-color); font-size:0.95rem; margin-bottom:30px; line-height:1.6;">サイト公開後のLPO・CRO<br>継続的なデータドリブン改善</p>
                <div style="font-size:3rem; font-weight:900; color:var(--primary-color); margin-bottom:30px; line-height:1;">
                    <span style="font-size:1.5rem; vertical-align:top; margin-right:5px;">¥</span>100,000<span style="font-size:1.2rem; margin-left:5px;">/月〜</span>
                </div>
                <ul style="text-align:left; margin-bottom:40px; border-top:1px solid rgba(0,0,0,0.08); padding-top:30px; line-height:2.2; list-style:none; padding-left:0; font-weight:500;">
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>GA4/ヒートマップ解析</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>月次改善レポート提出</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>ABテスト実施</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>月1〜3箇所の改修実装</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>定例ミーティング</li>
                    <li style="position:relative; padding-left:25px;"><span style="position:absolute; left:0; color:var(--highlight-color); font-weight:bold;">✓</span>広告運用連携</li>
                </ul>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="display:inline-block; width:100%; border:2px solid var(--accent-color); color:var(--accent-color); padding: 15px 0; border-radius: 8px; font-weight:bold; transition:all 0.3s;" onmouseover="this.style.background='var(--primary-color)'; this.style.color='#fff'; this.style.borderColor='var(--primary-color)';" onmouseout="this.style.background='transparent'; this.style.color='var(--accent-color)'; this.style.borderColor='var(--accent-color)';">詳細を見る</a>
            </div>

        </div>

        <!-- Ad Plan Section -->
        <div class="gsap-fade-up" style="background:rgba(255,255,255,0.7); backdrop-filter:blur(10px); -webkit-backdrop-filter:blur(10px); padding: 50px; border-radius: 16px; box-shadow:0 15px 40px rgba(0,0,0,0.03); border:1px solid rgba(0,0,0,0.05); position:relative; overflow:hidden;">
            <!-- Decor SVG -->
            <svg style="position:absolute; bottom:-20%; right:-5%; width:40%; opacity:0.03; transform:rotate(-15deg); pointer-events:none;" viewBox="0 0 200 200">
                <circle cx="100" cy="100" r="80" fill="none" stroke="var(--primary-color)" stroke-width="2"/>
                <circle cx="100" cy="100" r="50" fill="none" stroke="var(--primary-color)" stroke-width="2"/>
                <circle cx="100" cy="100" r="20" fill="var(--primary-color)"/>
            </svg>

            <h2 style="font-size:1.8rem; font-weight:800; color:var(--primary-color); margin-bottom:20px; display:inline-flex; align-items:center; gap:15px;">
                <span style="display:inline-block; width:8px; height:30px; background:var(--highlight-color); border-radius:4px;"></span>
                デジタル広告運用プラン
            </h2>
            <p style="font-size:1.1rem; line-height:2; color:var(--text-color); margin-bottom:30px; max-width:800px;">
                Google広告、Meta（Facebook/Instagram）広告などの運用代行を行います。<br>
                LP制作と合わせてご依頼いただくことで、仮説検証のサイクルを最速で回し、CPA（顧客獲得単価）を引き下げながら売上最大化を図ります。
            </p>
            <div style="background:var(--white); padding:30px; border-left:5px solid var(--accent-color); border-radius:0 8px 8px 0; box-shadow:0 5px 15px rgba(0,0,0,0.02); display:inline-block;">
                <p style="margin:0; font-size:1.2rem; font-weight:bold; color:var(--primary-color);">
                    運用代行手数料: <span style="font-size:1.8rem; color:var(--highlight-color); margin:0 5px;">広告費の20%</span>（最低手数料制あり）
                </p>
                <p style="margin:10px 0 0; font-size:0.95rem; color:var(--accent-color);">※広告の初期セットアップ費用・タグ埋設費用が別途発生する場合があります。</p>
            </div>
        </div>

    </div>
</main>

<!-- Contact Section -->
<section class="contact-section" style="padding:140px 0; background:rgba(28, 37, 65, 0.95); text-align:center; color:var(--white);">
    <div class="container gsap-fade-up">
        <h2 style="font-size: 2.5rem; color:var(--white); margin-bottom: 25px; font-weight:700;">最適なプランをご提案します</h2>
        <p style="margin-bottom: 50px; color:rgba(255,255,255,0.8); font-size:1.15rem; line-height:1.8;">御社の見えない課題に、最適なデジタルソリューションを。<br>まずはざっくりとした予算感や目標をお聞かせください。</p>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cta-btn" style="font-size: 1.25rem; padding: 20px 60px;">無料相談・お問い合わせ</a>
    </div>
</section>

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

    // Price Cards Stagger
    gsap.from(".gsap-price-card", {
        scrollTrigger: {
            trigger: ".gsap-price-card",
            start: "top 85%"
        },
        y: 80,
        opacity: 0,
        stagger: 0.2, // cascades them in!
        duration: 1.2,
        ease: "power4.out"
    });

    // Fade Up Elements generic
    gsap.utils.toArray('.gsap-fade-up').forEach((el) => {
        // Only if it doesn't already have an animation in timeline
        if(!el.closest('.page-header') && !el.closest('.container:first-of-type')) {
            gsap.from(el, {
                scrollTrigger: {
                    trigger: el,
                    start: "top 85%"
                },
                y: 50,
                opacity: 0,
                duration: 1.2,
                ease: "power3.out"
            });
        }
    });

    // Three.js Abstract Network Background
    const canvas = document.getElementById('three-canvas-price');
    if(canvas) {
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 100;
        
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        // We'll create a subtle connected line abstract structure (Plexus effect simplified)
        const group = new THREE.Group();
        scene.add(group);

        const particleCount = 200;
        const geometry = new THREE.BufferGeometry();
        const positions = new Float32Array(particleCount * 3);
        const velocities = [];

        for(let i=0; i<particleCount; i++) {
            positions[i*3] = (Math.random() - 0.5) * 400;     // x
            positions[i*3+1] = (Math.random() - 0.5) * 400;   // y
            positions[i*3+2] = (Math.random() - 0.5) * 200;   // z

            velocities.push({
                x: (Math.random() - 0.5) * 0.2,
                y: (Math.random() - 0.5) * 0.2,
                z: (Math.random() - 0.5) * 0.2
            });
        }

        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

        const material = new THREE.PointsMaterial({
            color: '#91a6b4',
            size: 1.5,
            transparent: true,
            opacity: 0.3
        });

        const points = new THREE.Points(geometry, material);
        group.add(points);

        // Lines setup (we recreate lines dynamically if close enough, or just draw some static ones)
        // For performance, we'll draw static lines that just rotate with the group
        const lineMaterial = new THREE.LineBasicMaterial({
            color: '#91a6b4',
            transparent: true,
            opacity: 0.05
        });

        const lineGeometry = new THREE.BufferGeometry();
        const linePositions = [];
        
        // Connect nearby points to form a solid network mesh
        for(let i=0; i<particleCount; i++) {
            for(let j=i+1; j<particleCount; j++) {
                const dx = positions[i*3] - positions[j*3];
                const dy = positions[i*3+1] - positions[j*3+1];
                const dz = positions[i*3+2] - positions[j*3+2];
                const dist = Math.sqrt(dx*dx + dy*dy + dz*dz);
                
                if(dist < 50) { // connection distance threshold
                    linePositions.push(
                        positions[i*3], positions[i*3+1], positions[i*3+2],
                        positions[j*3], positions[j*3+1], positions[j*3+2]
                    );
                }
            }
        }
        
        lineGeometry.setAttribute('position', new THREE.Float32BufferAttribute(linePositions, 3));
        const linesMesh = new THREE.LineSegments(lineGeometry, lineMaterial);
        group.add(linesMesh);

        let time = 0;
        function animate() {
            requestAnimationFrame(animate);

            time += 0.005;
            
            // Very slow, majestic rotation
            group.rotation.x = Math.sin(time) * 0.1;
            group.rotation.y = time * 0.5;

            // Optional: gently float the points (update positions buffer)
            const posAttr = points.geometry.attributes.position;
            for(let i=0; i<particleCount; i++) {
                posAttr.setX(i, posAttr.getX(i) + velocities[i].x);
                posAttr.setY(i, posAttr.getY(i) + velocities[i].y);
                
                // bounds checking
                if(Math.abs(posAttr.getX(i)) > 200) velocities[i].x *= -1;
                if(Math.abs(posAttr.getY(i)) > 200) velocities[i].y *= -1;
            }
            posAttr.needsUpdate = true;
            // (Note: we aren't updating line segments dynamically here to keep performance very high and smooth)

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
