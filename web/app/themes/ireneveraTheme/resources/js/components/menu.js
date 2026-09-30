import gsap from 'gsap';

export default () => {
  const menuIcons = document.querySelectorAll('.menu');
  const mobileNav = document.querySelector('#mobNav');
  const backdrop = document.querySelector('#backdrop');
  const headerBanner = document.querySelector('.header-trigger .banner');
  const bodyApp = document.body;
  let isOpen = false;

  if (!mobileNav || !backdrop) {
    return;
  }

  menuIcons.forEach((el) => {
    el.addEventListener('click', () => {
      if (!isOpen) {
        openMenu();
      } else {
        closeMenu();
      }
    });
  });

  function openMenu() {
    isOpen = true;
    menuIcons.forEach((el) => updateMenuIconState(el));
    backdrop.classList.remove('hidden');
    bodyApp.classList.add('overflow-y-hidden');

    gsap.to(mobileNav, {
      x: '0%',
      duration: 0.6,
      ease: 'power3.out',
      onStart: fadeInMenuItems,
    });
  }

  function closeMenu() {
    isOpen = false;
    menuIcons.forEach((el) => updateMenuIconState(el));
    bodyApp.classList.remove('overflow-y-hidden');
    closeMobileNav();
  }

  function updateMenuIconState(el) {
    const topLine = el.querySelector('.top-line');
    const middleLine = el.querySelector('.middle-line');
    const bottomLine = el.querySelector('.bottom-line');

    if (isOpen) {
      el.classList.add('opened');
      topLine.classList.add('open');
      middleLine.classList.add('open');
      bottomLine.classList.add('open');
    } else {
      el.classList.remove('opened');
      topLine.classList.remove('open');
      middleLine.classList.remove('open');
      bottomLine.classList.remove('open');
    }
  }

  const closeMobileNav = () => {
    gsap.to(mobileNav, {
      x: '-100%',
      duration: 0.6,
      ease: 'power3.out',
      onStart: () => {
        backdrop.classList.add('hidden');
      },
    });
  };

  // Don't preventDefault -> browser still scrolls to section/hash naturally.
  mobileNav.addEventListener('click', (e) => {
    const anchor = e.target.closest('a[href]');
    if (!anchor || !mobileNav.contains(anchor)) return;
    closeMenu();
  });

  backdrop.addEventListener('click', closeMenu);

  window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
      closeMenu();
    }
  });

  // Appending Child Menu Height to Parent Menu
  const mobileChildMenuLinks = document.querySelectorAll('.child-menu');

  if (mobileChildMenuLinks) {
    mobileChildMenuLinks.forEach((link) => {
      const childMenu = link.nextElementSibling;

      if (childMenu) {
        const parentMenu = link.closest('.navigation-menu-lists');
        const parentMenuHeight = parentMenu?.scrollHeight;
        const childMenuHeight = childMenu.scrollHeight;

        link.addEventListener('click', (e) => {
          parentMenu.style.maxHeight =
            parentMenuHeight + childMenuHeight + 'px';
        });
      }
    });
  }
};

const fadeInMenuItems = () => {
  const mobileMenuItems = document.querySelectorAll('.mobile-menu-item');
  mobileMenuItems.forEach((item, index) => {
    gsap.fromTo(
      item,
      {
        opacity: 0,
        x: -50,
      },
      {
        opacity: 1,
        x: 0,
        duration: 1.2,
        ease: 'power2.out',
        delay: index * 0.1,
      },
    );
  });
};
