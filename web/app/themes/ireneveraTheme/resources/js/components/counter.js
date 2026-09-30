export default () => {
  document.addEventListener('DOMContentLoaded', () => {
    const animate = (el) => {
      const target = parseFloat(el.dataset.counterValue) || 0;
      const suffix = el.nextElementSibling;
      const duration = parseFloat(el.dataset.counterSpeed) || 2000;
      const ease = (t) => (t === 1 ? 1 : 1 - Math.pow(2, -10 * t));

      if (suffix) {
        const suffixChar = el
          .closest('.counter-display')
          .getAttribute('data-counter-suffix');

        suffix.innerHTML = suffixChar;

        const start = performance.now();

        const tick = (now) => {
          const progress = Math.min((now - start) / duration, 1);
          el.textContent = Math.round(ease(progress) * target).toLocaleString();
          if (progress < 1) requestAnimationFrame(tick);
          else el.textContent = target.toLocaleString();
        };

        requestAnimationFrame(tick);
      }
    };

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            animate(entry.target);
            observer.unobserve(entry.target); // play once, then stop watching
          }
        });
      },
      { threshold: 0.3 }, // 30% of element must be visible to trigger
    );

    document.querySelectorAll('[data-counter-value]').forEach((el) => {
      observer.observe(el);
    });
  });
};
