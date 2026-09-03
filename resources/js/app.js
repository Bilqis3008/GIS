// Transparent hero nav → solid on scroll (only when the header opts in).
const header = document.getElementById('site-header');
if (header && header.dataset.transparent === 'true') {
    const sync = () => header.classList.toggle('is-solid', window.scrollY > 40);
    sync();
    window.addEventListener('scroll', sync, { passive: true });
}
