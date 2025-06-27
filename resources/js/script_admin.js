// DOM Elements
const navbar = document.getElementById('navbar');
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('nav-menu');
const navLinks = document.querySelectorAll('.nav-link');
const quoteText = document.getElementById('quote-text');
const quoteAuthor = document.getElementById('quote-author');
const heroTitle = document.getElementById('hero-title');
let idx          = 0;
const card       = document.getElementById("card");
const iconCircle = document.getElementById("iconCircle");
const icon       = document.getElementById("icon");
const dayEl      = document.getElementById("day");
const labelEl    = document.getElementById("label");
const timeEl     = document.getElementById("time");
const indicator  = document.getElementById("indicator");
const prevBtn    = document.getElementById("prev");
const nextBtn    = document.getElementById("next");
const schedule = window.GymSchedulesGet || [];
const iconImg = document.createElement("img");
const span = document.getElementById("iconSpace");
const reqTitle = document.getElementById("requestTitle");
const newTitle = document.getElementById("newTitle");
const selectedTitleEdit = document.getElementById("selectedTitleEdit");
const selectedTitleDelete = document.getElementById("selectedTitleDelete");
const selectedMotivationId = document.getElementById('selectedMotivationId');
const reqAuthor = document.getElementById('requestAuthor');
const reqMotivation = document.getElementById('requestMotivation');

// edit-add-delete title
document.getElementById("btnAdd").addEventListener("click", function() {
    const newTitleValue = newTitle.value.trim();

    if (newTitleValue === "") {
        alert("Please enter a new title.");
        return;
    }

    fetch('/admin/dashboard/addTitle', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            newTitle: newTitleValue
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert('Failed to add title : ' + data.error);
            window.location.assign('/admin/dashboard');
        } else {
            alert("new title added successfully " + data.new_title);
            window.location.assign('/admin/dashboard');
        }
    })
    .catch(error => {
        console.error("Error adding title:", error);
        alert("An error occurred while adding the title.", error);
    });
});

document.getElementById('btnSave').addEventListener('click', () => {
  const id   = selectedTitleEdit.value;   // id title yang dipilih
  const text = reqTitle.value.trim();     // judul baru

  if (!text) {
    alert('Judul kosong');
    return;
  }

  fetch(`/admin/dashboard/editTitle/${id}`, {
    method : 'PUT',
    headers: {
      'Content-Type' : 'application/json',
      'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({ newTitle: text })
  })
  .then(async r => {
      if (!r.ok) {
        const msg = await r.text();
        throw new Error(`HTTP ${r.status}: ${msg}`);
      }
      return r.json();            // data = { updated_title: "...", ... }
  })
  .then(data => {
      if (data.error) {
        alert(data.error);
        return;
      }

      heroTitle.textContent = data.updated_title;
      alert('Judul berhasil di-update: ' + data.updated_title);
      document.getElementById('editPopup')?.hidePopover();
      window.location.assign('/admin/dashboard');
  })
  .catch(err => {
      console.error(err);
      alert('Gagal update judul: ' + err.message);
  });
});


document.getElementById('btnDelete').addEventListener('click', () => {
  const id = selectedTitleDelete.value;
    if (!id) return alert('Pilih judul yang akan dihapus');
    if (!confirm('Yakin menghapus judul ini?')) return;
    fetch('/admin/dashboard/deleteTitle', {
        method : 'DELETE',
        headers: {
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            _method:'DELETE',
            id_title:id
        })
    })
    .then(async r => {
    if (!r.ok) {
        const text = await r.text();
        throw new Error(`HTTP ${r.status}: ${text.slice(0,100)}…`);
    }
    return r.json();
    })
    .then(data => {
        alert(data.message);
        document.getElementById('deletePopup').hidePopover();
        window.location.assign('/admin/dashboard');
    })
    .catch(err => {
        console.error(err);
        alert('Gagal hapus: ' + err.message);
    });
});

//edit-add-delete motivation letter
document.getElementById('btnSaveMot').addEventListener('click', () => {
  const id   = selectedMotivationId.value; 
  const author = reqAuthor.value.trim(); // nama author baru
  const letter = reqMotivation.value.trim();     // judul baru

  if (!letter && !author) {
    alert('Author atau letter masih kosong');
    return;
  }

  fetch(`/admin/dashboard/editMotivation/${id}`, {
    method : 'PUT',
    headers: {
      'Content-Type' : 'application/json',
      'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({ newAuthor: author, newMotivation: letter})
  })
  .then(async r => {
      if (!r.ok) {
        const msg = await r.text();
        throw new Error(`HTTP ${r.status}: ${msg}`);
      }
      return r.json();            // data = { updated_title: "...", ... }
  })
  .then(data => {
      if (data.error) {
        alert(data.error);
        return;
      }

      alert('Data berhasil diupdate' + data.updated_motivation);
      document.getElementById('editPopupMot')?.hidePopover();
      window.location.assign('/admin/dashboard');
  })
  .catch(err => {
      console.error(err);
      alert('Gagal update Motivation letter: ' + err.message);
  });
});


    /* ---------- render helper ---------- */
    function render(i) {
      const s = schedule[i];
      dayEl.textContent   = s.day;
      labelEl.textContent = s.label;
      timeEl.textContent  = s.time;
      iconImg.src = s.icon;
      iconImg.className = 'inline w-12 h-12';
      span.appendChild(iconImg);
      card.style.borderTopColor        = s.color;
      iconCircle.style.backgroundColor = s.color;
      timeEl.style.backgroundColor     = s.color;
      indicator.textContent = `${i + 1} / ${schedule.length}`;
      prevBtn.disabled = i === 0;
      nextBtn.disabled = i === schedule.length - 1;
    }

    /* ---------- animasi ganti ---------- */
    let busy = false; // cegah spam-klik

    function change(dir) {
      if (busy) return;

      const nextIdx = idx + dir;
      if (nextIdx < 0 || nextIdx >= schedule.length) return;

      busy = true;
      const slideOut = dir === 1 ? '-translate-x-10' : 'translate-x-10';

      /* step 1: fade + geser keluar */
      card.classList.add('opacity-0', slideOut);

      setTimeout(() => {
        /* step 2: ganti konten saat kartu tak terlihat */
        idx = nextIdx;
        render(idx);

        /* step 3: posisi awal masuk (dari arah berlawanan) */
        card.classList.remove(slideOut);
        card.classList.add(dir === 1 ? 'translate-x-10' : '-translate-x-10');

        /* reflow supaya Tailwind membaca class baru, lalu hapus utk animasi masuk */
        requestAnimationFrame(() => {
          card.classList.remove('translate-x-10', '-translate-x-10');
          card.classList.remove('opacity-0');
        });

        /* selesai */
        setTimeout(() => { busy = false; }, 550); // > duration-500
      }, 250); // separuh durasi: 250ms
    }

    /* ---------- event ---------- */
    prevBtn.addEventListener('click', () => change(-1));
    nextBtn.addEventListener('click', () => change( 1));

    /* ---------- init ---------- */
    render(idx);


// Navbar scroll effect
window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }

    // Reveal animation on scroll
    revealOnScroll();
});

// Mobile menu toggle
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
});

// Close mobile menu when clicking on nav links
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
    });
});

// Smooth scroll for navigation links
navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const targetId = link.getAttribute('href').substring(1);
        const targetSection = document.getElementById(targetId);

        if (targetSection) {
            const offsetTop = targetSection.offsetTop - 80;
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        }
    });
});

// Typing effect for quotes
function typeWriter(element, text, speed = 50) {
    element.innerHTML = '';
    let i = 0;

    function type() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }

    type();
}

const GymQuotes = window.GymMotivationGet || [];
let currentQuoteIndex = 0;
// Display quotes with typing effect
function displayQuote() {
    const quote = GymQuotes[currentQuoteIndex];

    // Fade out
    quoteText.style.opacity = '0';
    quoteAuthor.style.opacity = '0';

    setTimeout(() => {
        typeWriter(quoteText, `"${quote.text}"`, 30);

        setTimeout(() => {
            quoteAuthor.innerHTML = `- ${quote.author}`;
            quoteAuthor.style.opacity = '1';
        }, quote.text.length * 30 + 500);

        quoteText.style.opacity = '1';
    }, 500);

    currentQuoteIndex = (currentQuoteIndex + 1) % GymQuotes.length;
}

const gymTitles = window.GymTitlesGet || [];
let currentHeroTitleIndex = 0;
// Dynamic hero title function
function changeHeroTitle() {
    const newTitle = gymTitles[currentHeroTitleIndex];

    // Fade out current title
    heroTitle.style.opacity = '0';
    heroTitle.style.transform = 'translateY(-20px)';

    setTimeout(() => {
        // Type writer effect for new title
        typeWriter(heroTitle, newTitle, 80);

        // Fade in new title
        heroTitle.style.opacity = '1';
        heroTitle.style.transform = 'translateY(0)';

        // Move to next title
        currentHeroTitleIndex = (currentHeroTitleIndex + 1) % gymTitles.length;
    }, 500);
}

// Initialize quote display and hero title rotation
document.addEventListener('DOMContentLoaded', () => {
    displayQuote();
    setInterval(displayQuote, 8000); // Change quote every 8 seconds

    // Start hero title rotation after initial load
    setTimeout(() => {
        setInterval(changeHeroTitle, 6000); // Change hero title every 6 seconds
    }, 3000); // Wait 3 seconds before starting rotation
});

// Scroll reveal animation
function revealOnScroll() {
    const reveals = document.querySelectorAll('.schedule-card, .program-card, .trainer-card, .facility-card, .pricing-card');

    reveals.forEach(reveal => {
        const windowHeight = window.innerHeight;
        const elementTop = reveal.getBoundingClientRect().top;
        const elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
            reveal.classList.add('reveal', 'active');
        }
    });
}

// Add reveal class to elements on page load
document.addEventListener('DOMContentLoaded', () => {
    const elementsToReveal = document.querySelectorAll('.schedule-card, .program-card, .trainer-card, .facility-card, .pricing-card');
    elementsToReveal.forEach(element => {
        element.classList.add('reveal');
    });
});

// Button click animations and effects
document.addEventListener('DOMContentLoaded', () => {
    // CTA Button click effect
    const ctaButton = document.querySelector('.cta-button');
    ctaButton.addEventListener('click', () => {
        // Add ripple effect
        const ripple = document.createElement('span');
        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple 0.6s linear;
            left: 50%;
            top: 50%;
            transform-origin: center;
        `;

        ctaButton.style.position = 'relative';
        ctaButton.style.overflow = 'hidden';
        ctaButton.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);

        // Show success message (you can customize this)
        showNotification('Terima kasih! Tim kami akan segera menghubungi Anda.');
    });

    // Login button click effect
    /*const loginBtn = document.querySelector('.login-btn');
    loginBtn.addEventListener('click', () => {
        showNotification('Fitur login admin akan segera tersedia!');
    });*/

    // Pricing buttons
    const pricingBtns = document.querySelectorAll('.pricing-btn');
    pricingBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            showNotification('Silakan hubungi kami untuk informasi lebih lanjut!');
        });
    });
});

// Notification system
function showNotification(message) {
    // Remove existing notification
    const existingNotification = document.querySelector('.notification');
    if (existingNotification) {
        existingNotification.remove();
    }

    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-check-circle"></i>
            <span>${message}</span>
            <button class="notification-close">×</button>
        </div>
    `;

    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: linear-gradient(45deg, #ff4500, #ffd700);
        color: #000000;
        padding: 1rem 1.5rem;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(255, 69, 0, 0.3);
        z-index: 10000;
        transform: translateX(400px);
        transition: transform 0.3s ease;
        max-width: 300px;
        font-weight: 600;
    `;

    document.body.appendChild(notification);

    // Show notification
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);

    // Auto hide after 5 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(400px)';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 5000);

    // Close button functionality
    const closeBtn = notification.querySelector('.notification-close');
    closeBtn.addEventListener('click', () => {
        notification.style.transform = 'translateX(400px)';
        setTimeout(() => {
            notification.remove();
        }, 300);
    });
}

// Add CSS for notification content layout
const notificationStyles = document.createElement('style');
notificationStyles.textContent = `
    .notification-content {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .notification-content i {
        color: #2d7d32;
        font-size: 1.2rem;
    }

    .notification-close {
        background: none;
        border: none;
        color: #000000;
        font-size: 1.5rem;
        cursor: pointer;
        margin-left: auto;
        padding: 0;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: background 0.2s ease;
    }

    .notification-close:hover {
        background: rgba(0, 0, 0, 0.1);
    }
`;
document.head.appendChild(notificationStyles);

// Scroll indicator functionality
document.addEventListener('DOMContentLoaded', () => {
    const scrollIndicator = document.querySelector('.scroll-indicator');

    scrollIndicator.addEventListener('click', () => {
        const quotesSection = document.querySelector('.quotes');
        quotesSection.scrollIntoView({ behavior: 'smooth' });
    });
});

// Add intersection observer for better scroll animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
        }
    });
}, observerOptions);

// Observe elements for animation
document.addEventListener('DOMContentLoaded', () => {
    const elementsToObserve = document.querySelectorAll('.schedule-card, .program-card, .trainer-card, .facility-card, .pricing-card');
    elementsToObserve.forEach(el => {
        observer.observe(el);
    });
});

// Smooth scroll to top functionality
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Add scroll to top button (optional enhancement)
document.addEventListener('DOMContentLoaded', () => {
    const scrollTopBtn = document.createElement('button');
    scrollTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    scrollTopBtn.className = 'scroll-top-btn';
    scrollTopBtn.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: linear-gradient(45deg, #ff4500, #ffd700);
        color: #000000;
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        z-index: 1000;
        opacity: 0;
        transform: translateY(100px);
        box-shadow: 0 5px 15px rgba(255, 69, 0, 0.3);
    `;

    document.body.appendChild(scrollTopBtn);

    scrollTopBtn.addEventListener('click', scrollToTop);

    // Show/hide scroll to top button
    window.addEventListener('scroll', () => {
        if (window.scrollY > 500) {
            scrollTopBtn.style.opacity = '1';
            scrollTopBtn.style.transform = 'translateY(0)';
        } else {
            scrollTopBtn.style.opacity = '0';
            scrollTopBtn.style.transform = 'translateY(100px)';
        }
    });

    scrollTopBtn.addEventListener('mouseenter', () => {
        scrollTopBtn.style.transform = 'translateY(-5px) scale(1.1)';
    });

    scrollTopBtn.addEventListener('mouseleave', () => {
        scrollTopBtn.style.transform = 'translateY(0) scale(1)';
    });
});

// Performance optimization: Debounce scroll events
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Apply debouncing to scroll events
const debouncedScrollHandler = debounce(() => {
    if (window.scrollY > 100) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
    revealOnScroll();
}, 10);

// Replace the original scroll event listener
window.removeEventListener('scroll', () => {});
window.addEventListener('scroll', debouncedScrollHandler);

// Initialize all animations and effects when page loads
document.addEventListener('DOMContentLoaded', () => {
    // Add fade-in animation to hero content
    const heroContent = document.querySelector('.hero-content');
    heroContent.style.opacity = '0';
    heroContent.style.transform = 'translateY(50px)';

    setTimeout(() => {
        heroContent.style.transition = 'all 1s ease';
        heroContent.style.opacity = '1';
        heroContent.style.transform = 'translateY(0)';
    }, 500);

    // Preload images for better performance
    const imagesToPreload = [
        'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1920&h=1080&fit=crop',
        'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=300&h=300&fit=crop&crop=face',
        'https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?w=300&h=300&fit=crop&crop=face',
        'https://images.unsplash.com/photo-1567013127542-490d757e51cd?w=300&h=300&fit=crop&crop=face'
    ];

    imagesToPreload.forEach(src => {
        const img = new Image();
        img.src = src;
    });
});

document.addEventListener('DOMContentLoaded', function() {
        const sliderContainer = document.querySelector('.slider-container');
        const prevButton = document.querySelector('.prev-button');
        const nextButton = document.querySelector('.next-button');
        const paginationDots = document.querySelectorAll('.pagination-dot');

        let currentIndex = 0;
        const cardWidth = document.querySelector('.card').offsetWidth;
        const gap = 16; // 1rem = 16px
        const cardsPerView = window.innerWidth < 768 ? 1 : 2;
        const totalSlides = Math.ceil(document.querySelectorAll('.card').length / cardsPerView);

        function updateSliderPosition() {
            const offset = currentIndex * (cardsPerView * (cardWidth + gap));
            sliderContainer.style.transform = `translateX(-${offset}px)`;

            // Update pagination dots
            paginationDots.forEach((dot, index) => {
                if (index === currentIndex) {
                    dot.classList.add('bg-[#ff4500]');
                    dot.classList.remove('bg-gray-600');
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('bg-[#ff4500]');
                    dot.classList.add('bg-gray-600');
                    dot.classList.remove('active');
                }
            });

            // Show/hide navigation buttons based on position
            prevButton.style.opacity = currentIndex === 0 ? '0.5' : '1';
            prevButton.style.pointerEvents = currentIndex === 0 ? 'none' : 'auto';

            nextButton.style.opacity = currentIndex === totalSlides - 1 ? '0.5' : '1';
            nextButton.style.pointerEvents = currentIndex === totalSlides - 1 ? 'none' : 'auto';
        }

        // Initialize slider position
        updateSliderPosition();

        // Event listeners for navigation buttons
        prevButton.addEventListener('click', function() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSliderPosition();
            }
        });

        nextButton.addEventListener('click', function() {
            if (currentIndex < totalSlides - 1) {
                currentIndex++;
                updateSliderPosition();
            }
        });

        // Event listeners for pagination dots
        paginationDots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                currentIndex = index;
                updateSliderPosition();
            });
        });

        // Add hover effect to cards
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 15px 30px rgba(255, 69, 0, 0.3)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.boxShadow = 'none';
            });
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            // Recalculate dimensions
            const newCardsPerView = window.innerWidth < 768 ? 1 : 2;

            if (newCardsPerView !== cardsPerView) {
                location.reload(); // Simple solution to handle responsive changes
            }
        });
    });
