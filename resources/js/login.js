// Tab switching functionality
const loginTab = document.getElementById('loginTab');
const registerTab = document.getElementById('registerTab');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');

loginTab.addEventListener('click', () => {
    loginTab.classList.add('active');
    registerTab.classList.remove('active');
    loginForm.classList.remove('hidden');
    registerForm.classList.add('hidden');

    // Animation
    loginForm.style.opacity = '0';
    loginForm.style.transform = 'translateX(-10px)';
    setTimeout(() => {
        loginForm.style.opacity = '1';
        loginForm.style.transform = 'translateX(0)';
    }, 50);
});

registerTab.addEventListener('click', () => {
    registerTab.classList.add('active');
    loginTab.classList.remove('active');
    registerForm.classList.remove('hidden');
    loginForm.classList.add('hidden');

    // Animation
    registerForm.style.opacity = '0';
    registerForm.style.transform = 'translateX(10px)';
    setTimeout(() => {
        registerForm.style.opacity = '1';
        registerForm.style.transform = 'translateX(0)';
    }, 50);
});

// Button ripple effect
const buttons = document.querySelectorAll('.btn-primary');
buttons.forEach(button => {
    button.addEventListener('click', function(e) {
        const x = e.clientX - e.target.getBoundingClientRect().left;
        const y = e.clientY - e.target.getBoundingClientRect().top;

        const ripple = document.createElement('span');
        ripple.style.position = 'absolute';
        ripple.style.width = '1px';
        ripple.style.height = '1px';
        ripple.style.borderRadius = '50%';
        ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.7)';
        ripple.style.transform = 'scale(0)';
        ripple.style.left = `${x}px`;
        ripple.style.top = `${y}px`;
        ripple.style.animation = 'ripple 0.6s linear';

        this.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    });
});
