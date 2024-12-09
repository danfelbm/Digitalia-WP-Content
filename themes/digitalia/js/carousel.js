document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel-container');
    const prevButton = document.querySelector('.carousel-prev');
    const nextButton = document.querySelector('.carousel-next');

    if (!carousel || !prevButton || !nextButton) return;

    const slideWidth = 360; // Width of each slide including padding
    let currentPosition = 0;
    const slides = carousel.children;
    const totalWidth = slides.length * slideWidth;
    const viewportWidth = carousel.parentElement.offsetWidth;
    
    // Interaction handling variables
    let startX = 0;
    let isDragging = false;
    let startPosition = 0;
    let hasMoved = false;
    
    function updateButtons() {
        prevButton.disabled = currentPosition >= 0;
        nextButton.disabled = currentPosition <= -totalWidth + viewportWidth;
    }

    function setTransform(position, withTransition = true) {
        carousel.style.transition = withTransition ? 'transform 0.3s ease-out' : 'none';
        carousel.style.transform = `translateX(${position}px)`;
    }

    // Button click handler
    function slide(direction) {
        const step = direction * slideWidth;
        let newPosition = currentPosition + step;
        
        // Prevent overscrolling
        if (newPosition > 0) {
            newPosition = 0;
        } else if (newPosition < -totalWidth + viewportWidth) {
            newPosition = -totalWidth + viewportWidth;
        }
        
        currentPosition = newPosition;
        setTransform(currentPosition);
        updateButtons();
    }

    // Generic drag handler for both mouse and touch
    function handleDragMove(clientX) {
        if (!isDragging) return;
        
        const diff = clientX - startX;
        let newPosition = startPosition + diff;

        // Add slight resistance at the edges
        if (newPosition > 0) {
            newPosition = newPosition * 0.5;
        } else if (newPosition < -totalWidth + viewportWidth) {
            const overscroll = newPosition + totalWidth - viewportWidth;
            newPosition = -totalWidth + viewportWidth + (overscroll * 0.5);
        }

        setTransform(newPosition, false);
        return newPosition;
    }

    // Mouse event handlers
    function handleMouseDown(e) {
        // Prevent default drag behavior
        e.preventDefault();
        isDragging = true;
        startX = e.clientX;
        startPosition = currentPosition;
        setTransform(currentPosition, false);
        
        // Change cursor
        carousel.style.cursor = 'grabbing';
        carousel.style.userSelect = 'none';
    }

    function handleMouseMove(e) {
        e.preventDefault();
        if (handleDragMove(e.clientX)) {
            hasMoved = true;
        }
    }

    function handleMouseUp(e) {
        if (!isDragging) return;
        isDragging = false;
        
        // If we've dragged, prevent the upcoming click
        if (hasMoved) {
            e.preventDefault();
            // Add click prevention for a short duration after drag
            const preventClick = (e) => {
                e.preventDefault();
                e.stopPropagation();
                carousel.removeEventListener('click', preventClick, true);
            };
            carousel.addEventListener('click', preventClick, true);
        }
        
        // Reset cursor and flags
        carousel.style.cursor = 'grab';
        carousel.style.userSelect = '';
        hasMoved = false;
        
        const finalPosition = parseFloat(carousel.style.transform.replace('translateX(', '').replace('px)', ''));
        
        // Bounce back if overscrolled
        if (finalPosition > 0) {
            currentPosition = 0;
        } else if (finalPosition < -totalWidth + viewportWidth) {
            currentPosition = -totalWidth + viewportWidth;
        } else {
            currentPosition = finalPosition;
        }
        
        setTransform(currentPosition, true);
        updateButtons();
    }

    // Touch event handlers
    function handleTouchStart(e) {
        isDragging = true;
        startX = e.touches[0].clientX;
        startPosition = currentPosition;
        setTransform(currentPosition, false);
    }

    function handleTouchMove(e) {
        e.preventDefault();
        handleDragMove(e.touches[0].clientX);
    }

    function handleTouchEnd(e) {
        handleMouseUp(e);
    }

    // Add event listeners
    prevButton.addEventListener('click', () => slide(1));
    nextButton.addEventListener('click', () => slide(-1));

    // Mouse events
    carousel.addEventListener('mousedown', handleMouseDown);
    window.addEventListener('mousemove', handleMouseMove);
    window.addEventListener('mouseup', handleMouseUp);
    carousel.addEventListener('mouseleave', handleMouseUp);

    // Prevent default drag on all carousel items
    Array.from(carousel.children).forEach(item => {
        item.addEventListener('dragstart', e => e.preventDefault());
    });

    // Touch events
    carousel.addEventListener('touchstart', handleTouchStart, { passive: false });
    carousel.addEventListener('touchmove', handleTouchMove, { passive: false });
    carousel.addEventListener('touchend', handleTouchEnd);

    // Prevent click events when dragging
    carousel.addEventListener('click', (e) => {
        if (isDragging) {
            e.preventDefault();
            e.stopPropagation();
        }
    }, true);

    // Set initial grab cursor
    carousel.style.cursor = 'grab';

    // Initial button state
    updateButtons();

    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            currentPosition = 0;
            setTransform(0);
            updateButtons();
        }, 250);
    });
});
