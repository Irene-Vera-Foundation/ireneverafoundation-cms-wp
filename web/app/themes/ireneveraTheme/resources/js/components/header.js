export default () => {
  const headerBanner = document.querySelector('.header-trigger .banner');

  function initHeaderScrollState() {
    if (!headerBanner) return;

    let isTicking = false;

    const updateScrolledState = () => {
      headerBanner.classList.toggle('scrolled', window.scrollY > 0);
      isTicking = false;
    };

    updateScrolledState();

    window.addEventListener(
      'scroll',
      () => {
        if (isTicking) return;
        isTicking = true;
        window.requestAnimationFrame(updateScrolledState);
      },
      { passive: true },
    );
  }

  initHeaderScrollState();
};
