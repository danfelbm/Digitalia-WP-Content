<?php
/**
 * Front page hero
 *
 * @package Digitalia
 */
?>

<section id="section1" class="py-16 lg:p-0 overflow-hidden">
  <div class="absolute inset-0 -z-10 h-full w-full overflow-hidden">
    <!-- Base gradient with center focus -->
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-red-300/30 to-transparent"></div>
    <!-- Overlapping color rays -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(59,130,246,0.3)_0%,transparent_70%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_60%_50%,rgba(45,212,191,0.3)_0%,transparent_60%)]"></div>
    <!-- Animated light rays effect -->
    <div class="absolute inset-0 bg-[conic-gradient(from_0deg_at_50%_50%,transparent_0deg,rgba(255,255,255,0.1)_90deg,transparent_180deg)] animate-[spin_8s_linear_infinite]"></div>
    <!-- Top right glow -->
    <div class="absolute -top-1/2 right-0 h-[500px] w-[500px] rounded-full bg-gradient-to-bl from-red-400/40 to-transparent blur-3xl"></div>
    <!-- Bottom fade to white -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
    <!-- Side fades for smooth horizontal transitions -->
    <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-white to-transparent"></div>
    <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-white to-transparent"></div>
  </div>
  <div class="container">
    <div class="flex flex-col items-center justify-between gap-20 lg:flex-row">
      <div class="absolute inset-0 -z-10 h-full w-full bg-[linear-gradient(to_right,rgba(59,130,246,0.1)_1px,transparent_1px),linear-gradient(to_bottom,rgba(45,212,191,0.1)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_50%_100%_at_50%_50%,#000_60%,transparent_100%)]"></div>
      <div class="min-w-[40%] flex flex-col items-center gap-6 text-center lg:items-start lg:text-left">
        <h1 class="text-pretty text-6xl font-bold lg:max-w-md lg:text-6xl">Digital·IA</h1>
        <p class="max-w-xl text-xl font-medium lg:text-2xl">Digital-IA es un novedoso ecosistema público de Educomunicación destinado a crear y fortalecer capacidades, habilidades y competencias ciudadanas de cara a los nuevos desafíos de la desinformación.</p>
        <div class="flex w-full justify-center lg:justify-start">
          <a href="/que-es-digitalia" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8 w-full sm:w-auto">
            <i class="fa fa-arrow-right mr-2"></i>Quiero saber más </a>
        </div>
      </div>
      <img src="/wp-content/uploads/2024/12/hero-img2.png" alt="placeholder hero" class="hidden lg:block pointer-events-none aspect-video rounded-md object-cover" style="aspect-ratio: 13 / 9">
    </div>
  </div>
</section>

<script>
    let gridSize = 32;
    let totalGlitches = 8;
    let colors = ["#C700e3", "#10bed2", "#3f27ff", "#FFDA00", "#FFFFFF"];

    function setup() {
        let canvas = createCanvas(windowWidth, windowHeight);
        canvas.parent('section1');
        canvas.style('position', 'absolute');
        canvas.style('top', '0');
        canvas.style('left', '0');
        canvas.style('z-index', '-5');
        noLoop();
        noStroke();
    }

    function windowResized() {
        resizeCanvas(windowWidth, windowHeight);
        draw();
    }

    function draw() {
        clear();
        
        let cols = floor(width / gridSize);
        let rows = floor(height / gridSize);
        
        let positions = [];

        for (let x = 0; x < cols; x++) {
            for (let y = 0; y < rows; y++) {
                positions.push({ x: x, y: y });
            }
        }

        shuffle(positions, true);
        let glitchPositions = positions.slice(0, totalGlitches);

        for (let pos of glitchPositions) {
            let glitchWidth = gridSize * floor(random(1, 3));
            let glitchHeight = gridSize * floor(random(1, 1));
            let c = random(colors);

            let px = pos.x * gridSize;
            let py = pos.y * gridSize;
            if (px + glitchWidth <= width && py + glitchHeight <= height) {
                fill(c);
                rect(px, py, glitchWidth, glitchHeight);
            }
        }
    }
</script>