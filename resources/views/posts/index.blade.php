<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <style>
        /* Base styles */
        :root {
            --transition-speed: 0.3s;
        }

        body {
            transition: background-color var(--transition-speed), color var(--transition-speed);
            scroll-behavior: smooth;
        }

        /* Dark mode styles */
        .dark-mode {
            background-color: #1a202c;
            color: #e2e8f0;
        }

        .dark-mode .bg-white {
            background-color: #2d3748;
        }

        .dark-mode .text-gray-800 {
            color: #e2e8f0;
        }

        .dark-mode .bg-gray-100 {
            background-color: #4a5568;
        }

        .dark-mode .border {
            border-color: #4a5568;
        }

        /* Card hover effects */
        .post-card {
            transform: translateY(0);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .post-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        /* Button animations */
        .btn-animated {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-animated:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .btn-animated:active:after {
            width: 300px;
            height: 300px;
        }

        /* Comment section animations */
        .comment-appear {
            animation: fadeInUp 0.5s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Loader animation */
        .loader {
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: none;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Page transition */
        .page-transition {
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .page-visible {
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col transition-colors duration-300 page-transition">
    <header class="bg-white shadow sticky top-0 z-10 animate__animated animate__fadeInDown">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                <svg class="w-8 h-8 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v6a1 1 0 01-1 1H3a1 1 0 01-1-1V3a1 1 0 011-1h6a1 1 0 010 2H4v12h9v-5a1 1 0 011-1z" />
                </svg>
                <span>My Blog</span>
            </h1>
            <div class="flex items-center space-x-4">
                <button id="theme-toggle" class="p-2 rounded-full bg-gray-200 hover:bg-gray-300 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>
                <div class="relative group">
                    <button class="p-2 rounded-full bg-gray-200 hover:bg-gray-300 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden group-hover:block transition-opacity duration-200 opacity-0 group-hover:opacity-100">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Home</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Categories</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">About</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex-grow posts-container">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="bg-white rounded-lg shadow overflow-hidden post-card">
                    <div class="relative overflow-hidden">
                        <img src="{{ $post->image }}" alt="Post image" class="w-full h-48 object-cover transition-transform duration-700 hover:scale-110">
                        <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full p-4">
                            <span class="text-xs font-medium px-2 py-1 bg-blue-600 text-white rounded">{{ $post->category }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-3 text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-2 hover:text-blue-600 transition-colors duration-300">{{ $post->title }}</h2>
                        <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 100) }}</p>
                        <a href="#" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-300 btn-animated">Read More</a>
                    </div>
                    <div class="p-6 border-t">
                        <button class="flex items-center text-gray-600 hover:text-blue-600 mb-4 toggle-comments focus:outline-none" data-post-id="{{ $post->id }}">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                            </svg>
                            <span class="comment-count">{{ count($post->comments) }}</span> Comments
                            <svg class="w-4 h-4 ml-2 comment-chevron transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="comments-section-{{ $post->id }}" class="comments-section hidden">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Comments</h3>
                            <div id="comments-{{ $post->id }}" class="space-y-4 mb-4">
                                @foreach ($post->comments as $comment)
                                    <div class="bg-gray-100 p-3 rounded">
                                        <div class="flex items-center mb-2">
                                            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white mr-2">
                                                {{ substr($comment->user->name ?? 'A', 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-medium">{{ $comment->user->name ?? 'Anonymous' }}</p>
                                                <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                        <p class="text-gray-800">{{ $comment->content }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <form class="comment-form" data-post-id="{{ $post->id }}">
                                <textarea class="w-full p-3 border rounded mb-2 focus:ring focus:ring-blue-200 focus:border-blue-500 transition-all duration-300" placeholder="Add a comment..." required></textarea>
                                <div class="flex items-center">
                                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-300 btn-animated">Post Comment</button>
                                    <div class="loader ml-3"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </main>

    <footer class="bg-white shadow py-6 mt-8 animate__animated animate__fadeInUp">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">About My Blog</h3>
                    <p class="text-gray-600">A modern, responsive blog built with the latest web technologies to share ideas and connect with readers around the world.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-blue-600 hover:underline">Home</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">About</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Contact</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Subscribe</h3>
                    <p class="text-gray-600 mb-2">Stay updated with our latest posts</p>
                    <form class="flex">
                        <input type="email" placeholder="Your email" class="flex-1 p-2 border rounded-l focus:ring focus:ring-blue-200 focus:border-blue-500 transition-all duration-300">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700 transition-colors duration-300">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t text-center text-gray-600">
                © 2025 My Blog. All rights reserved.
            </div>
        </div>
    </footer>

    <button id="back-to-top" class="fixed bottom-8 right-8 bg-blue-600 text-white p-3 rounded-full shadow-lg opacity-0 transition-opacity duration-300 hover:bg-blue-700 focus:outline-none invisible">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <script>
        // Document ready handler
        document.addEventListener('DOMContentLoaded', function() {
            // Make page visible with animation
            setTimeout(() => {
                document.body.classList.add('page-visible');
            }, 100);

            // Animate post cards on scroll
            animateOnScroll();

            // Setup back to top button
            setupBackToTop();
        });

        // Dark mode toggle with enhanced animation
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            // Add a quick pulse animation when clicked
            themeToggle.classList.add('animate__animated', 'animate__pulse');
            setTimeout(() => {
                themeToggle.classList.remove('animate__animated', 'animate__pulse');
            }, 500);

            body.classList.toggle('dark-mode');
            const isDark = body.classList.contains('dark-mode');
            themeToggle.innerHTML = isDark
                ? `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>`
                : `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>`;
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });

        // Initialize theme from local storage
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark-mode');
            themeToggle.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>`;
        }

        // Toggle comments section
        document.querySelectorAll('.toggle-comments').forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.getAttribute('data-post-id');
                const commentsSection = document.getElementById(`comments-section-${postId}`);
                const chevron = this.querySelector('.comment-chevron');

                if (commentsSection.classList.contains('hidden')) {
                    commentsSection.classList.remove('hidden');
                    gsap.fromTo(commentsSection,
                        { height: 0, opacity: 0 },
                        { height: 'auto', opacity: 1, duration: 0.5, ease: 'power1.out' }
                    );
                    chevron.style.transform = 'rotate(180deg)';
                } else {
                    gsap.to(commentsSection, {
                        height: 0,
                        opacity: 0,
                        duration: 0.5,
                        ease: 'power1.in',
                        onComplete: () => {
                            commentsSection.classList.add('hidden');
                            commentsSection.style.height = 'auto';
                        }
                    });
                    chevron.style.transform = 'rotate(0deg)';
                }
            });
        });

        // AJAX for comment submission with loading animation
        document.querySelectorAll('.comment-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const postId = this.getAttribute('data-post-id');
                const textarea = this.querySelector('textarea');
                const content = textarea.value.trim();
                const loader = this.querySelector('.loader');

                if (!content) return;

                // Show loading spinner
                loader.style.display = 'block';

                fetch('{{ route("comments.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        post_id: postId,
                        content: content,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Hide loading spinner
                    loader.style.display = 'none';

                    const commentContainer = document.getElementById(`comments-${postId}`);
                    const commentDiv = document.createElement('div');
                    commentDiv.className = 'bg-gray-100 p-3 rounded comment-appear';

                    // Get current date in a readable format
                    const now = new Date();
                    const formattedDate = now.toLocaleString();

                    commentDiv.innerHTML = `
                        <div class="flex items-center mb-2">
                            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white mr-2">
                                A
                            </div>
                            <div>
                                <p class="font-medium">Anonymous</p>
                                <small class="text-gray-500">Just now</small>
                            </div>
                        </div>
                        <p class="text-gray-800">${data.content}</p>
                    `;

                    // Animate the new comment
                    commentContainer.appendChild(commentDiv);

                    // Clear the textarea
                    textarea.value = '';

                    // Update comment count
                    const countElement = form.closest('article').querySelector('.comment-count');
                    const currentCount = parseInt(countElement.textContent);
                    countElement.textContent = currentCount + 1;
                })
                .catch(error => {
                    console.error('Error:', error);
                    loader.style.display = 'none';
                });
            });
        });

        // Animate elements on scroll using Intersection Observer
        function animateOnScroll() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.post-card').forEach(card => {
                observer.observe(card);
            });
        }

        // Setup back to top button
        function setupBackToTop() {
            const backToTopButton = document.getElementById('back-to-top');

            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.remove('opacity-0', 'invisible');
                    backToTopButton.classList.add('opacity-100', 'visible');
                } else {
                    backToTopButton.classList.remove('opacity-100', 'visible');
                    backToTopButton.classList.add('opacity-0', 'invisible');
                }
            });

            backToTopButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    </script>
</body>
</html>
