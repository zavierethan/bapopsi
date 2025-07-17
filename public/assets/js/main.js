$(document).ready(function() {
    // Mobile menu toggle
    $('#mobile-menu-btn').click(function() {
        $('#mobile-menu').toggleClass('hidden');
    });

    // Slider functionality
    let currentSlide = 0;
    const slides = $('.slide');
    const totalSlides = slides.length;
    const dots = $('.slider-dot');

    function showSlide(index) {
        slides.removeClass('active');
        dots.removeClass('bg-white').addClass('bg-white bg-opacity-50');

        $(slides[index]).addClass('active');
        $(dots[index]).removeClass('bg-opacity-50').addClass('bg-white');

        currentSlide = index;
    }

    function nextSlide() {
        const next = (currentSlide + 1) % totalSlides;
        showSlide(next);
    }

    function prevSlide() {
        const prev = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(prev);
    }

    // Auto slider
    if (slides.length > 0) {
        setInterval(nextSlide, 5000);

        // Navigation controls
        $('#next-slide').click(nextSlide);
        $('#prev-slide').click(prevSlide);

        // Dot navigation
        dots.click(function() {
            const slideIndex = $(this).data('slide');
            showSlide(slideIndex);
        });

        // Initialize first slide
        showSlide(0);
    }

    // Gallery lightbox
    $('.gallery-item img').click(function() {
        const src = $(this).attr('src');
        const alt = $(this).attr('alt');

        $('#lightbox-img').attr('src', src).attr('alt', alt);
        $('#lightbox').fadeIn(300);
    });

    // Close lightbox
    $('.close, #lightbox').click(function(e) {
        if (e.target === this) {
            $('#lightbox').fadeOut(300);
        }
    });

    // Smooth scrolling for navigation links
    $('a[href^="#"]').click(function(e) {
        e.preventDefault();
        const target = $($(this).attr('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 70
            }, 800);
        }
        // Close mobile menu if open
        $('#mobile-menu').addClass('hidden');
    });

    // Add active state to navigation based on scroll position
    $(window).scroll(function() {
        const scrollPos = $(window).scrollTop() + 100;

        $('section[id]').each(function() {
            const section = $(this);
            const sectionTop = section.offset().top;
            const sectionHeight = section.outerHeight();
            const sectionId = section.attr('id');

            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                $('nav a[href="#' + sectionId + '"]').addClass('text-blue-600').removeClass('text-gray-700');
            } else {
                $('nav a[href="#' + sectionId + '"]').removeClass('text-blue-600').addClass('text-gray-700');
            }
        });
    });

    // Counter animation for achievements
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(function() {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            $(element).text(Math.floor(current));
        }, 20);
    }

    // Trigger counter animation when in viewport
    function checkCounters() {
        $('.counter').each(function() {
            const counter = $(this);
            const target = parseInt(counter.data('target'));
            const rect = this.getBoundingClientRect();

            if (rect.top < window.innerHeight && rect.bottom > 0 && !counter.hasClass('animated')) {
                counter.addClass('animated');
                animateCounter(counter, target);
            }
        });
    }

    $(window).scroll(checkCounters);
    checkCounters(); // Check on load

    // Search functionality
    $('#search-btn').click(function() {
        const query = $('#search-input').val().toLowerCase();
        if (query.trim() === '') {
            alert('Masukkan kata kunci pencarian');
            return;
        }

        // Simple search implementation
        $('.news-item, .sport-category').each(function() {
            const text = $(this).text().toLowerCase();
            if (text.includes(query)) {
                $(this).show().addClass('bg-yellow-100');
            } else {
                $(this).hide();
            }
        });
    });

    // Reset search
    $('#reset-search').click(function() {
        $('#search-input').val('');
        $('.news-item, .sport-category').show().removeClass('bg-yellow-100');
    });

    // Filter functionality for sports
    $('.filter-btn').click(function() {
        const filter = $(this).data('filter');

        $('.filter-btn').removeClass('bg-blue-600 text-white').addClass('bg-gray-200 text-gray-700');
        $(this).removeClass('bg-gray-200 text-gray-700').addClass('bg-blue-600 text-white');

        if (filter === 'all') {
            $('.sport-category').show();
        } else {
            $('.sport-category').hide();
            $(`.sport-category[data-category="${filter}"]`).show();
        }
    });

    // Load more functionality
    $('.load-more-btn').click(function() {
        const button = $(this);
        const originalText = button.text();

        button.html('<span class="loading"></span> Memuat...');

        // Simulate loading
        setTimeout(function() {
            // Show hidden items
            $('.hidden-item').slice(0, 3).removeClass('hidden-item').hide().fadeIn();

            button.text(originalText);

            // Hide button if no more items
            if ($('.hidden-item').length === 0) {
                button.hide();
            }
        }, 1000);
    });

    // Back to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });

    $('#back-to-top').click(function() {
        $('html, body').animate({scrollTop: 0}, 800);
    });

    // Form validation
    $('form').submit(function(e) {
        e.preventDefault();

        let isValid = true;
        const form = $(this);

        form.find('input[required], textarea[required]').each(function() {
            const field = $(this);
            if (field.val().trim() === '') {
                field.addClass('border-red-500');
                isValid = false;
            } else {
                field.removeClass('border-red-500');
            }
        });

        if (isValid) {
            alert('Pesan berhasil dikirim! Terima kasih.');
            form[0].reset();
        } else {
            alert('Mohon lengkapi semua field yang wajib diisi.');
        }
    });

    // Tooltip functionality
    $('[data-tooltip]').hover(
        function() {
            const tooltip = $(this).data('tooltip');
            $(this).append('<div class="tooltip absolute bg-gray-800 text-white text-xs rounded py-1 px-2 -top-8 left-1/2 transform -translate-x-1/2">' + tooltip + '</div>');
        },
        function() {
            $('.tooltip').remove();
        }
    );
});
