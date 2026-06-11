document.addEventListener('DOMContentLoaded', function() {
    let visits = localStorage.getItem('visits') || 0;
    visits++;
    localStorage.setItem('visits', visits);
    const footer = document.querySelector('footer');
    const visitorCounter = document.createElement('div');
    visitorCounter.textContent = `Visitantes: ${visits}`;
    footer.appendChild(visitorCounter);
});
