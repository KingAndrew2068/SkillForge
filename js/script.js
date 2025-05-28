
  const dropdownBtn = document.getElementById('dropdownBtn');
  const dropdownContent = document.getElementById('dropdownContent');


  dropdownBtn.addEventListener('click', (e) => {
    e.stopPropagation(); 
    dropdownContent.classList.toggle('show');
  });


  window.addEventListener('click', () => {
    dropdownContent.classList.remove('show');
  });

  document.addEventListener('DOMContentLoaded', () => {
    const faders = document.querySelectorAll('.fade-in-section');
  
    const options = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };
  
    const appearOnScroll = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target); // animă o singură dată
      });
    }, options);
  
    faders.forEach(fader => {
      appearOnScroll.observe(fader);
    });
  });

