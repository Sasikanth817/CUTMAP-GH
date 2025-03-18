// Select the custom cursor element
const cursor = document.querySelector('.custom-cursor');

// Listen for mouse movement
document.addEventListener('mousemove', (e) => {
    // Add smooth trailing effect
    cursor.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
});

// Optional: Make cursor smaller on click for interactive feel
document.addEventListener('mousedown', () => {
    cursor.style.transform += ' scale(0.8)';
});
document.addEventListener('mouseup', () => {
    cursor.style.transform = cursor.style.transform.replace(' scale(0.8)', '');
});
