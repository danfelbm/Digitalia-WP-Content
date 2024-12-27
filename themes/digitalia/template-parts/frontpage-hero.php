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
    class GlitchEffect {
    constructor(parentId) {
        // Configuration
        this.gridSize = 32;
        this.totalGlitches = 8;
        this.colors = ["#C700e3", "#10bed2", "#3f27ff", "#FFDA00", "#FFFFFF"];
        
        // Setup canvas
        this.canvas = document.createElement('canvas');
        this.ctx = this.canvas.getContext('2d');
        
        // Style canvas
        this.canvas.style.position = 'absolute';
        this.canvas.style.top = '0';
        this.canvas.style.left = '0';
        this.canvas.style.zIndex = '-5';
        
        // Add to parent element
        const parent = document.getElementById(parentId) || document.body;
        parent.appendChild(this.canvas);
        
        // Setup resize handler
        this.resizeHandler = () => this.windowResized();
        window.addEventListener('resize', this.resizeHandler);
        
        // Initial setup
        this.windowResized();
        this.draw();
    }
    
    // Utility functions
    random(min, max) {
        if (max === undefined) {
            max = min;
            min = 0;
        }
        return Math.random() * (max - min) + min;
    }
    
    floor(n) {
        return Math.floor(n);
    }
    
    // Fisher-Yates shuffle algorithm
    shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }
    
    windowResized() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
        this.draw();
    }
    
    draw() {
        // Clear canvas
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        
        const cols = this.floor(this.canvas.width / this.gridSize);
        const rows = this.floor(this.canvas.height / this.gridSize);
        
        // Create positions array
        const positions = [];
        for (let x = 0; x < cols; x++) {
            for (let y = 0; y < rows; y++) {
                positions.push({ x, y });
            }
        }
        
        // Shuffle and slice positions
        this.shuffle(positions);
        const glitchPositions = positions.slice(0, this.totalGlitches);
        
        // Draw glitches
        for (const pos of glitchPositions) {
            const glitchWidth = this.gridSize * this.floor(this.random(1, 3));
            const glitchHeight = this.gridSize * this.floor(this.random(1, 1));
            const color = this.colors[this.floor(this.random(this.colors.length))];
            
            const px = pos.x * this.gridSize;
            const py = pos.y * this.gridSize;
            
            if (px + glitchWidth <= this.canvas.width && 
                py + glitchHeight <= this.canvas.height) {
                this.ctx.fillStyle = color;
                this.ctx.fillRect(px, py, glitchWidth, glitchHeight);
            }
        }
    }
    
    // Cleanup method
    destroy() {
        window.removeEventListener('resize', this.resizeHandler);
        this.canvas.remove();
    }
}

// Usage example:
const glitchEffect = new GlitchEffect('section1');
</script>