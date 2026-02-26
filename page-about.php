<?php
/* Template Name: ABOUTページ */
get_header(); ?>

<!-- Three.js Background Canvas (Shared for About) -->
<canvas id="three-canvas-about" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<!-- Page Header -->
<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <h1 class="gsap-title" style="font-size: 4rem; font-weight: 900; letter-spacing: 0.1em; margin-bottom: 15px;">ABOUT</h1>
        <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 1rem;">会社情報・テクノロジー</p>
    </div>
</div>

<main style="background: transparent; position:relative; overflow:hidden; padding-bottom: 120px;">
    
    <div class="container" style="position:relative; z-index:1; max-width: 900px;">
        
        <p class="gsap-fade-up" style="text-align:center; margin-bottom:100px; color:var(--accent-color); font-size:1.2rem; line-height:2; font-weight:bold;">
            デジタルの本質を見極め、ビジネスの新しい“余白”を創造する。<br>
            私たちは、技術とデザインの融合で次世代のスタンダードを構築します。
        </p>

        <!-- Dynamic Tech Line Connector -->
        <div style="position: absolute; left: 50%; top: 200px; bottom: 0; width: 1px; background: rgba(145,166,180,0.2); transform: translateX(-50%); z-index: 0;" class="tech-line-bg d-none d-md-block"></div>
        <div style="position: absolute; left: 50%; top: 200px; height: 100%; width: 2px; background: linear-gradient(to bottom, var(--highlight-color), var(--primary-color)); transform: translateX(-50%) scaleY(0); transform-origin: top; z-index: 1;" class="tech-line-progress d-none d-md-block"></div>
        <style>
            @media (max-width: 768px) {
                .tech-line-bg, .tech-line-progress { display: none; }
            }
        </style>

        <!-- 1. Mission / Vision (Card Style 1) -->
        <section class="about-section gsap-section" style="margin-bottom: 100px; position:relative; z-index:2;">
            <div style="text-align:center; margin-bottom:40px;">
                <span style="display:inline-block; font-family:'Courier New', monospace; color:var(--highlight-color); font-weight:bold; letter-spacing:0.2em; font-size:0.9rem; margin-bottom:10px;">// 01. CORE PHILOSOPHY</span>
                <h2 style="font-size: 2.2rem; color:var(--primary-color); font-weight:900;">MISSION & VISION</h2>
            </div>
            
            <div style="display:flex; flex-direction:column; gap:30px;">
                <div class="gsap-card" style="background:rgba(255,255,255,0.85); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); padding:50px; border-radius:16px; box-shadow:0 15px 40px rgba(0,0,0,0.04); border-top:4px solid var(--primary-color); border-bottom:1px solid rgba(0,0,0,0.05); border-left:1px solid rgba(0,0,0,0.05); border-right:1px solid rgba(0,0,0,0.05); position:relative; overflow:hidden;">
                    <div style="position:absolute; top:-20px; right:-20px; font-size:6rem; font-weight:900; color:rgba(11,19,43,0.03); line-height:1; pointer-events:none;">M</div>
                    <h3 style="color:var(--highlight-color); font-size:1.1rem; letter-spacing:0.1em; margin-bottom:15px; font-weight:bold;">MISSION</h3>
                    <p style="font-size:1.6rem; font-weight:800; color:var(--primary-color); line-height:1.5; margin-bottom:20px;">デジタルの力で、<br>ビジネスの可能性を最大化する</p>
                    <p style="font-size:1.1rem; color:var(--text-color); line-height:1.8; margin:0;">私たちの使命は、クライアントの隠れた魅力を引き出し、デジタル空間において確実な結果を生み出すことです。単なるシステム構築ではなく、事業の成長エンジンを創ります。</p>
                </div>
                
                <div class="gsap-card" style="background:rgba(28, 37, 65, 0.95); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); padding:50px; border-radius:16px; box-shadow:0 15px 40px rgba(28,37,65,0.2); border-top:4px solid var(--highlight-color); color:var(--white); position:relative; overflow:hidden;">
                    <div style="position:absolute; top:-20px; right:-20px; font-size:6rem; font-weight:900; color:rgba(255,255,255,0.03); line-height:1; pointer-events:none;">V</div>
                    <h3 style="color:var(--highlight-color); font-size:1.1rem; letter-spacing:0.1em; margin-bottom:15px; font-weight:bold;">VISION</h3>
                    <p style="font-size:1.6rem; font-weight:800; color:var(--white); line-height:1.5; margin-bottom:20px;">クリエイティブの力で、<br>社会に新しいスタンダードを</p>
                    <p style="font-size:1.1rem; color:rgba(255,255,255,0.8); line-height:1.8; margin:0;">常に変化する技術トレンドをキャッチアップしながらも、本質的な価値を生み出すアーキテクチャ設計で、持続可能なビジネスモデルを支援するパートナーであり続けます。</p>
                </div>
            </div>
        </section>

        <!-- 2. blank Concept -->
        <section class="about-section gsap-section" style="margin-bottom: 100px; position:relative; z-index:2;">
            <div style="text-align:center; margin-bottom:40px;">
                <span style="display:inline-block; font-family:'Courier New', monospace; color:var(--highlight-color); font-weight:bold; letter-spacing:0.2em; font-size:0.9rem; margin-bottom:10px;">// 02. ORIGIN</span>
                <h2 style="font-size: 2.2rem; color:var(--primary-color); font-weight:900;">WHY "blank"?</h2>
            </div>
            
            <div class="gsap-card" style="background:rgba(255,255,255,0.85); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); padding:50px; border-radius:16px; box-shadow:0 15px 40px rgba(0,0,0,0.04); border:1px solid rgba(0,0,0,0.05);">
                <div style="border-left: 4px solid var(--highlight-color); padding-left:20px; margin-bottom:40px;">
                    <h3 style="font-size:1.4rem; color:var(--primary-color); margin-bottom:15px; font-weight:800;">成果から逆算するアーキテクチャ</h3>
                    <p style="font-size:1.1rem; color:var(--text-color); line-height:2; margin:0;">
                        「美しい」だけではなく、「機能する」デザインを。事業目標から逆算し、AIや高度なスクリプトを用いた技術的アプローチと心理的導線設計を融合させた最適解を提供します。
                    </p>
                </div>
                
                <div style="border-left: 4px solid var(--accent-color); padding-left:20px;">
                    <h3 style="font-size:1.4rem; color:var(--primary-color); margin-bottom:15px; font-weight:800;">空白（blank）に描く可能性</h3>
                    <p style="font-size:1.1rem; color:var(--text-color); line-height:2; margin:0;">
                        社名「blank」には、クライアントのビジネスにおける未知の領域（余白）を技術で埋め、新しい価値を描き出すという意味が込められています。ゼロベースからのインテグレーションで、未来をコードに落とし込みます。
                    </p>
                </div>
            </div>
        </section>

        <!-- 3. Message -->
        <section class="about-section gsap-section" style="margin-bottom: 100px; position:relative; z-index:2;">
            <div style="text-align:center; margin-bottom:40px;">
                <span style="display:inline-block; font-family:'Courier New', monospace; color:var(--highlight-color); font-weight:bold; letter-spacing:0.2em; font-size:0.9rem; margin-bottom:10px;">// 03. MESSAGE</span>
                <h2 style="font-size: 2.2rem; color:var(--primary-color); font-weight:900;">DIRECTOR'S MESSAGE</h2>
            </div>
            
            <div class="gsap-card" style="background:linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(240,244,248,0.9) 100%); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); padding:50px; border-radius:16px; box-shadow:0 15px 40px rgba(0,0,0,0.05); border:1px solid rgba(255,255,255,1); position:relative;">
                <svg style="position:absolute; top:30px; left:30px; width:40px; opacity:0.1;" viewBox="0 0 24 24" fill="var(--primary-color)"><path d="M14.017,21L16.48,15.75c3.04-6.42,2.83-11.2,1.35-12.75c-1.28-1.55-5.91-1.29-9.15,0.56 C6.73,4.66,4.65,6.58,3.56,9.25C2.47,11.92,2.6,14.63,4.02,16.59C5.44,18.55,8.08,19,10.65,18.25L14.017,21z"/></svg>
                
                <p style="font-size:1.15rem; line-height:2.2; color:var(--primary-color); font-weight:bold; position:relative; z-index:1;">
                    Web業界には高度な技術を持つ企業が数多く存在しますが、真の意味で「データとデザインを結合し、ビジネスの課題解決に直結させる」クリエイティブチームは多くありません。<br><br>
                    blankは、単なるWeb制作会社ではなく、デジタル領域の戦略的インテグレーターです。常にその先にある「ユーザー体験」と「事業成長」を見据え、最新のテクノロジーを活用した強力なソリューションを提供し続けます。
                </p>
                <p style="text-align:right; font-size:1.2rem; font-weight:900; color:var(--primary-color); margin-top:30px; position:relative; z-index:1;">
                    代表取締役<span style="font-size:1.6rem; margin-left:15px; border-bottom:2px solid var(--highlight-color); padding-bottom:5px;">本田 純一</span>
                </p>
            </div>
        </section>

        <!-- 4. Company Profile Outline -->
        <section class="about-section gsap-section" style="position:relative; z-index:2;">
            <div style="text-align:center; margin-bottom:40px;">
                <span style="display:inline-block; font-family:'Courier New', monospace; color:var(--highlight-color); font-weight:bold; letter-spacing:0.2em; font-size:0.9rem; margin-bottom:10px;">// 04. COMPANY</span>
                <h2 style="font-size: 2.2rem; color:var(--primary-color); font-weight:900;">PROFILE</h2>
            </div>
            
            <div class="gsap-card" style="background:rgba(255,255,255,0.85); backdrop-filter:blur(15px); -webkit-backdrop-filter:blur(15px); border-radius:16px; box-shadow:0 15px 40px rgba(0,0,0,0.04); border:1px solid rgba(0,0,0,0.05); overflow:hidden;">
                <table style="width:100%; border-collapse: collapse; text-align:left;">
                    <tbody>
                        <tr style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                            <th style="padding: 25px 30px; font-size:1.1rem; color:var(--primary-color); background:rgba(145,166,180,0.05); width:30%; font-weight:800;">社名</th>
                            <td style="padding: 25px 30px; font-size:1.1rem; color:var(--text-color); font-weight:bold;">株式会社blank <span style="font-size:0.9rem; color:var(--accent-color); font-weight:normal; margin-left:10px;">(blank Inc.)</span></td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                            <th style="padding: 25px 30px; font-size:1.1rem; color:var(--primary-color); background:rgba(145,166,180,0.05); font-weight:800;">設立</th>
                            <td style="padding: 25px 30px; font-size:1.1rem; color:var(--text-color); font-weight:bold;">2026年2月20日</td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                            <th style="padding: 25px 30px; font-size:1.1rem; color:var(--primary-color); background:rgba(145,166,180,0.05); font-weight:800;">代表取締役</th>
                            <td style="padding: 25px 30px; font-size:1.1rem; color:var(--text-color); font-weight:bold;">本田 純一</td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                            <th style="padding: 25px 30px; font-size:1.1rem; color:var(--primary-color); background:rgba(145,166,180,0.05); font-weight:800;">所在地</th>
                            <td style="padding: 25px 30px; font-size:1.1rem; color:var(--text-color); font-weight:bold; line-height:1.6;">〒744-0028<br>山口県下松市藤光町</td>
                        </tr>
                        <tr>
                            <th style="padding: 25px 30px; font-size:1.1rem; color:var(--primary-color); background:rgba(145,166,180,0.05); font-weight:800; vertical-align:top;">事業内容</th>
                            <td style="padding: 25px 30px; font-size:1.1rem; color:var(--text-color); font-weight:bold; line-height:2.2;">
                                <span style="color:var(--highlight-color); margin-right:5px;">/</span> 高機能Webサイト・コーポレートサイト構築<br>
                                <span style="color:var(--highlight-color); margin-right:5px;">/</span> UI/UX情報設計・ランディングページ制作<br>
                                <span style="color:var(--highlight-color); margin-right:5px;">/</span> Webシステム開発・インフラ構築<br>
                                <span style="color:var(--highlight-color); margin-right:5px;">/</span> デジタルマーケティング・SEOコンサルティング<br>
                                <span style="color:var(--highlight-color); margin-right:5px;">/</span> 古物商取引
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </div>
</main>

<!-- Contact CTA -->
<section class="contact-section" style="padding:140px 0; background:rgba(28, 37, 65, 0.95); text-align:center; color:var(--white);">
    <div class="container gsap-fade-up">
        <h2 style="font-size: 2.5rem; color:var(--white); margin-bottom: 25px; font-weight:700;">ビジネスを加速させませんか？</h2>
        <p style="margin-bottom: 50px; color:rgba(255,255,255,0.8); font-size:1.15rem; line-height:1.8;">御社の見えない課題に、最適なデジタルソリューションを。</p>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cta-btn" style="font-size: 1.25rem; padding: 20px 60px;">無料相談・お問い合わせ</a>
    </div>
</section>

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

    // Dynamic Central Tech Line Animation scrubbed via scroll
    if (document.querySelector('.tech-line-progress')) {
        gsap.to(".tech-line-progress", {
            scaleY: 1,
            ease: "none",
            scrollTrigger: {
                trigger: "main",
                start: "top 20%",
                end: "bottom 80%",
                scrub: true
            }
        });
    }

    // Scroll trigger for sections
    gsap.utils.toArray('.about-section').forEach((section) => {
        gsap.from(section.querySelectorAll('.gsap-card'), {
            scrollTrigger: {
                trigger: section,
                start: "top 80%"
            },
            y: 50,
            opacity: 0,
            stagger: 0.2, // cascades multiple cards in a section
            duration: 1.2,
            ease: "power3.out"
        });
    });

    // Three.js Abstract Digital Network / Nodes
    const canvas = document.getElementById('three-canvas-about');
    if(canvas) {
        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2('#f8f9fa', 0.002); 

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 120;
        
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        const group = new THREE.Group();
        scene.add(group);

        // Core central geometric node (representing 'blank')
        const coreGeo = new THREE.IcosahedronGeometry(15, 0);
        const coreMat = new THREE.MeshBasicMaterial({ color: '#1c2541', wireframe: true, transparent: true, opacity: 0.3 });
        const coreMesh = new THREE.Mesh(coreGeo, coreMat);
        group.add(coreMesh);

        // Outer data nodes
        const particleCount = 100;
        const pGeo = new THREE.BufferGeometry();
        const pPos = new Float32Array(particleCount * 3);
        const pColors = new Float32Array(particleCount * 3);
        
        const baseColor = new THREE.Color('#91a6b4');
        const highlightColor = new THREE.Color('#e53935');

        for(let i=0; i<particleCount; i++) {
            // spherical distribution
            const theta = Math.random() * Math.PI * 2;
            const phi = Math.acos((Math.random() * 2) - 1);
            const r = 40 + Math.random() * 60;

            pPos[i*3] = r * Math.sin(phi) * Math.cos(theta);
            pPos[i*3+1] = r * Math.sin(phi) * Math.sin(theta);
            pPos[i*3+2] = r * Math.cos(phi);

            // Mix some highlight red pixels
            const cc = Math.random() > 0.9 ? highlightColor : baseColor;
            pColors[i*3] = cc.r;
            pColors[i*3+1] = cc.g;
            pColors[i*3+2] = cc.b;
        }

        pGeo.setAttribute('position', new THREE.BufferAttribute(pPos, 3));
        pGeo.setAttribute('color', new THREE.BufferAttribute(pColors, 3));

        const pMat = new THREE.PointsMaterial({
            size: 1.5,
            vertexColors: true,
            transparent: true,
            opacity: 0.6
        });

        const points = new THREE.Points(pGeo, pMat);
        group.add(points);

        // Tech lines connecting outer nodes to core
        const lineGeo = new THREE.BufferGeometry();
        const linePos = [];
        for(let i=0; i<particleCount; i++) {
            // only connect some of them
            if(Math.random() > 0.6) {
                linePos.push(0, 0, 0); // core
                linePos.push(pPos[i*3], pPos[i*3+1], pPos[i*3+2]); // node
            }
        }
        lineGeo.setAttribute('position', new THREE.Float32BufferAttribute(linePos, 3));
        const lineMat = new THREE.LineBasicMaterial({ color: '#91a6b4', transparent: true, opacity: 0.1 });
        const lines = new THREE.LineSegments(lineGeo, lineMat);
        group.add(lines);


        let mouseX = 0, mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - window.innerWidth / 2) * 0.05;
            mouseY = (e.clientY - window.innerHeight / 2) * 0.05;
        });

        function animate() {
            requestAnimationFrame(animate);

            // Core rotation
            coreMesh.rotation.x += 0.005;
            coreMesh.rotation.y += 0.005;
            
            // Outer network rotation
            points.rotation.y -= 0.001;
            points.rotation.z += 0.0005;
            lines.rotation.y -= 0.001;
            lines.rotation.z += 0.0005;

            // Parallax
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
