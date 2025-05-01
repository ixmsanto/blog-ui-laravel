<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
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
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col transition-colors duration-300">
    <header class="bg-white shadow sticky top-0 z-10">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">My Blog</h1>
            <button id="theme-toggle" class="p-2 rounded-md bg-gray-200 hover:bg-gray-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </button>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex-grow">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="{{ $post->image }}" alt="Post image" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                        <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 100) }}</p>
                        <a href="#" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Read More</a>
                    </div>
                    <div class="p-6 border-t">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Comments</h3>
                        <div id="comments-{{ $post->id }}" class="space-y-4 mb-4">
                            @foreach ($post->comments as $comment)
                                <div class="bg-gray-100 p-3 rounded">
                                    <p class="text-gray-800">{{ $comment->content }}</p>
                                    <small class="text-gray-500">{{ $comment->created_at->toDateTimeString() }}</small>
                                </div>
                            @endforeach
                        </div>
                        <form class="comment-form" data-post-id="{{ $post->id }}">
                            <textarea class="w-full p-2 border rounded mb-2" placeholder="Add a comment..." required></textarea>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Post Comment</button>
                        </form>
                    </div>
                </article>
            @endforeach
        </div>
    </main>

    <footer class="bg-white shadow py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-600">
            © 2025 My Blog. All rights reserved.
        </div>
    </footer>

    <script>
        // Dark mode toggle
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            const isDark = body.classList.contains('dark-mode');
            themeToggle.innerHTML = isDark
                ? `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>`
                : `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>`;
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });

        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark-mode');
            themeToggle.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>`;
        }

        // AJAX for comment submission
        document.querySelectorAll('.comment-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const postId = this.getAttribute('data-post-id');
                const textarea = this.querySelector('textarea');
                const content = textarea.value.trim();

                if (!content) return;

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
                    const commentContainer = document.getElementById(`comments-${postId}`);
                    const commentDiv = document.createElement('div');
                    commentDiv.className = 'bg-gray-100 p-3 rounded';
                    commentDiv.innerHTML = `
                        <p class="text-gray-800">${data.content}</p>
                        <small class="text-gray-500">${data.created_at}</small>
                    `;
                    commentContainer.appendChild(commentDiv);
                    textarea.value = '';
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</body>
</html>
