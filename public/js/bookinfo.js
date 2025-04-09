
    document.getElementById('swapBtn').addEventListener('click', function() {
        var departure = document.getElementById('departure');
        var destination = document.getElementById('destination');
        var temp = departure.value;
        departure.value = destination.value;
        destination.value = temp;
    });
  
// Function to handle scroll animations
function setupScrollAnimations() {
    const animatedElements = document.querySelectorAll('.scroll-animate');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const animation = entry.target.getAttribute('data-animation');
                const delay = entry.target.getAttribute('data-delay') || '0';
                entry.target.classList.add('animate__animated', `animate__${animation}`);
                entry.target.style.setProperty('--animate-delay', delay);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    animatedElements.forEach(element => {
        observer.observe(element);
    });
}

// Initialize animations when DOM is loaded
document.addEventListener('DOMContentLoaded', setupScrollAnimations);
