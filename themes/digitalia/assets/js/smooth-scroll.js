document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('nav a[href^="#"]');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                // Smooth scroll with offset for sticky header
                const offset = 100; // Adjust this value based on your sticky header height
                const elementPosition = targetSection.getBoundingClientRect().top + window.pageYOffset;
                
                window.scrollTo({
                    top: elementPosition - offset,
                    behavior: 'smooth'
                });

                // Update active state
                navLinks.forEach(l => {
                    l.classList.remove('border', 'border-solid', 'border-muted2', 'shadow-sm');
                    l.classList.remove('bg-background', 'text-foreground');
                });
                this.classList.add('border', 'border-solid', 'border-muted2', 'shadow-sm');
                this.classList.add('bg-background', 'text-foreground');
            }
        });
    });
});
