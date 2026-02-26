<?php
/* Template Name: FLOWページ */
get_header(); 

$steps = [
    [
        "title" => "ヒアリング・無料相談",
        "desc" => "貴社の抱える課題、達成したい目標、ご予算やスケジュール感について詳しくお伺いします。オンラインでのミーティングも可能です。"
    ],
    [
        "title" => "戦略設計・ご提案",
        "desc" => "ヒアリング内容をもとに、ターゲット分析、競合調査を行い、最適なWeb戦略とサイト構造（情報設計）をご提案。合わせてお見積りとスケジュールも提出いたします。"
    ],
    [
        "title" => "ワイヤー設計",
        "desc" => "各ページのレイアウトやコンテンツ配置を決定する「ワイヤーフレーム（画面設計図）」を作成します。ユーザーの視線誘導やコンバージョンへの導線を緻密に計算します。"
    ],
    [
        "title" => "デザイン作成",
        "desc" => "ワイヤーフレームをもとに、ブランドイメージに合わせたビジュアルデザインを制作します。PC、スマートフォンそれぞれで最適な見え方になるよう調整します。"
    ],
    [
        "title" => "実装（コーディング・システム）",
        "desc" => "確定したデザインをもとに、HTML/CSS/JSによるコーディング、WordPress等のCMS構築、必要な機能のシステム開発を行います。テスト環境で動作確認を重ねます。"
    ],
    [
        "title" => "公開（納品）",
        "desc" => "最終確認をお客様に行っていただき、問題がなければ本番サーバーにアップロードし、公開となります。公開後の操作マニュアルのお渡しも行います。"
    ],
    [
        "title" => "改善・運用（オプション）",
        "desc" => "公開後が本当のスタートです。GA4などのアクセス解析をもとにした改善提案、SEO対策、広告運用などの継続的なマーケティング支援を提供します。"
    ]
];
?>

<!-- Three.js Background Canvas -->
<canvas id="three-canvas-flow" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; pointer-events:none;"></canvas>

<!-- Page Header -->
<div class="page-header" style="position:relative; background:transparent; color:var(--primary-color); padding:150px 0 80px; text-align:center; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <h1 class="gsap-title" style="font-size: 4rem; font-weight: 900; letter-spacing: 0.1em; margin-bottom: 15px;">FLOW</h1>
        <p class="gsap-subtitle" style="color:var(--highlight-color); font-weight: bold; letter-spacing: 0.2em; font-size: 1rem;">制作の流れ</p>
    </div>
</div>

<main style="background: transparent; position:relative; overflow:hidden;">
    
    <div class="container" style="text-align:center; margin-bottom: 60px;">
        <p class="gsap-fade-up" style="font-size:1.15rem; font-weight:bold; color:var(--primary-color); line-height:2;">
            お問い合わせから公開、そしてその後の運用・改善までの<br>
            徹底したプロセスフローをご紹介します。
        </p>
    </div>

    <!-- Timeline Wrapper -->
    <div class="flow-wrapper">
        <style>
            .flow-wrapper { position: relative; max-width: 900px; margin: 0 auto; padding-top: 20px; padding-bottom: 100px; }
            .flow-line-bg { position: absolute; left: 49px; top: 0; bottom: 100px; width: 2px; background: rgba(145, 166, 180, 0.2); z-index: 0; }
            .flow-line-progress { position: absolute; left: 49px; top: 0; height: calc(100% - 100px); width: 2px; background: var(--highlight-color); z-index: 1; transform-origin: top; transform: scaleY(0); }
            
            .flow-item { display: flex; align-items: flex-start; margin-bottom: 80px; position: relative; z-index: 2; }
            .flow-item:last-child { margin-bottom: 0; }
            
            .flow-number-wrapper { width: 100px; display: flex; justify-content: center; flex-shrink: 0; padding-top: 15px; }
            .flow-dot { width: 50px; height: 50px; background: var(--white); border: 3px solid var(--primary-color); border-radius: 50%; display: flex; justify-content: center; align-items: center; font-weight: 900; font-size: 1.4rem; color: var(--primary-color); position:relative; z-index:3; transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1); box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
            
            .flow-content { flex-grow: 1; padding-left: 20px; }
            .flow-card { background: rgba(255,255,255,0.85); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); border-radius: 16px; padding: 40px; box-shadow: 0 15px 40px rgba(0,0,0,0.04); border-top: 4px solid transparent; border-bottom: 1px solid rgba(0,0,0,0.05); border-left: 1px solid rgba(0,0,0,0.05); border-right: 1px solid rgba(0,0,0,0.05); transition: all 0.5s ease; }
            
            /* Active Dynamic States */
            .flow-item.is-active .flow-dot { background: var(--highlight-color); border-color: var(--highlight-color); color: var(--white); box-shadow: 0 0 25px rgba(229, 57, 53, 0.4); transform: scale(1.1); }
            .flow-item.is-active .flow-card { border-top-color: var(--highlight-color); transform: translateX(10px); background: rgba(255,255,255,0.95); }

            @media (max-width: 768px) {
                .flow-line-bg, .flow-line-progress { left: 34px; }
                .flow-number-wrapper { width: 70px; }
                .flow-dot { width: 40px; height: 40px; font-size: 1.2rem; }
                .flow-card { padding: 30px 25px; }
            }
        </style>

        <div class="flow-line-bg"></div>
        <div class="flow-line-progress"></div>

        <?php foreach($steps as $index => $step): $num = $index + 1; ?>
        <div class="flow-item">
            <div class="flow-number-wrapper">
                <div class="flow-dot"><?php echo $num; ?></div>
            </div>
            <div class="flow-content">
                <div class="flow-card">
                    <h3 style="font-size: 1.6rem; font-weight: 800; color:var(--primary-color); margin-top:0; margin-bottom:20px;"><?php echo esc_html($step['title']); ?></h3>
                    <p style="font-size: 1.1rem; line-height: 1.8; color:var(--text-color); margin:0;">
                        <?php echo esc_html($step['desc']); ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

    <!-- Contact CTA -->
    <section class="contact-section" style="padding:140px 0; background:rgba(28, 37, 65, 0.95); text-align:center; color:var(--white);">
        <div class="container gsap-fade-up">
            <h2 style="font-size: 2.5rem; color:var(--white); margin-bottom: 25px; font-weight:700;">まずは無料でご相談ください</h2>
            <p style="margin-bottom: 50px; color:rgba(255,255,255,0.8); font-size:1.15rem; line-height:1.8;">御社の見えない課題に、最適なデジタルソリューションを。</p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cta-btn" style="font-size: 1.25rem; padding: 20px 60px;">無料相談・お問い合わせ</a>
        </div>
    </section>
</main>

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

    // Dynamic Line Filling Animation scrubbed via scroll
    gsap.fromTo(".flow-line-progress", 
        { scaleY: 0 },
        {
            scaleY: 1,
            ease: "none",
            scrollTrigger: {
                trigger: ".flow-wrapper",
                start: "top 50%",
                end: "bottom 50%",
                scrub: true
            }
        }
    );

    // Each flow card entrance and dot highglight
    gsap.utils.toArray('.flow-item').forEach((item) => {
        // Just the card appearing
        gsap.from(item.querySelector('.flow-card'), {
            scrollTrigger: {
                trigger: item,
                start: "top 85%"
            },
            y: 40,
            opacity: 0,
            duration: 1.0,
            ease: "power3.out"
        });

        // Toggle active class exactly when the line hits the dot (middle of viewport)
        ScrollTrigger.create({
            trigger: item,
            start: "top 50%", 
            onEnter: () => item.classList.add("is-active"),
            onLeaveBack: () => item.classList.remove("is-active")
        });
    });

    // Sub-page CTA Entrance
    gsap.from(".contact-section .gsap-fade-up", {
        scrollTrigger: {
            trigger: ".contact-section",
            start: "top 80%"
        },
        y: 50,
        opacity: 0,
        duration: 1.2,
        ease: "power3.out"
    });

    // Three.js Tech Matrix / Falling Data Background
    const canvas = document.getElementById('three-canvas-flow');
    if(canvas) {
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 50;
        
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        const group = new THREE.Group();
        scene.add(group);

        const count = 300;
        const geometry = new THREE.BufferGeometry();
        const positions = new Float32Array(count * 3);
        const speeds = new Float32Array(count);
        const colors = new Float32Array(count * 3);

        const baseColor = new THREE.Color('#91a6b4');
        const accentColor = new THREE.Color('#e53935');

        for(let i=0; i<count; i++) {
            positions[i*3] = (Math.random() - 0.5) * 150;     // x
            positions[i*3+1] = Math.random() * 200 - 100;     // y
            positions[i*3+2] = (Math.random() - 0.5) * 100;   // z
            
            speeds[i] = Math.random() * 0.2 + 0.1; // falling speed

            // Mostly base color, some red dots mimicking data points
            const mixedColor = baseColor.clone().lerp(accentColor, Math.random() > 0.8 ? 0.8 : 0);
            colors[i*3] = mixedColor.r;
            colors[i*3+1] = mixedColor.g;
            colors[i*3+2] = mixedColor.b;
        }

        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

        // Use points to simulate rain/data
        const material = new THREE.PointsMaterial({
            size: 0.4,
            vertexColors: true,
            transparent: true,
            opacity: 0.5
        });

        const particles = new THREE.Points(geometry, material);
        group.add(particles);

        function animate() {
            requestAnimationFrame(animate);

            // Move particles down
            const posAttr = geometry.attributes.position;
            for(let i=0; i<count; i++) {
                let y = posAttr.getY(i);
                y -= speeds[i];
                if(y < -100) {
                    y = 100; // Reset to top
                    posAttr.setX(i, (Math.random() - 0.5) * 150); // randomize X again slightly
                }
                posAttr.setY(i, y);
            }
            posAttr.needsUpdate = true;

            // Subtle rotation of the whole data field
            group.rotation.y += 0.001;
            group.rotation.z = 0.05; // slight tilt

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
