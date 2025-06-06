<x-layouts.main-layout>
    <!-- Content Section -->
    <div class="container mx-auto px-4 py-12 mt-15">
        <div class="flex -mx-4 w-full">
            <!-- Main Content -->
            <div class="flex flex-col gap-8 w-full mx-10">
                @foreach ($contents as $post)
                <div class="w-full px-4">
                    <div class="bg-white rounded-lg shadow-sm">
                        <!-- Thumbnail -->
                        <div class="w-full h-[400px]">
                            <img class="w-full h-full rounded-t-lg" src="{{ asset('assets/img/news.jpg') }}" alt="">
                        </div>
                        <!-- Excerpt -->
                        <div class="text-lg text-gray-600 font-medium border-l-4 border-primary pl-4 italic">
                            {{ $post->excerpt ?? ''}}
                        </div>

                        <!-- Content -->
                        <div class="prose max-w-none md:p-8" x-data="{
                            readingTime: '{{ ceil(str_word_count(strip_tags($post->content ?? '')) / 200) }} min read',
                            showComments: false,
                            likeCount: 42,
                            liked: false,
                            toggleLike() {
                                this.liked = !this.liked;
                                this.likeCount = this.liked ? this.likeCount + 1 : this.likeCount - 1;
                            }
                        }">
                            {!! $post->content ?? ''!!}

                            <!-- Author Bio -->
                            <div class="bg-white rounded-lg mt-8 flex flex-col md:flex-row items-center md:items-start">
                                <img src="{{ $post->user->avatar }}}}" alt="Author" class="w-12 h-12 rounded-full mb-4 md:mb-0 md:mr-6">
                                <div>
                                    <h3 class="font-bold mb-2">{{ $post->user->name ?? 'Author Name' }}</h3>
                                    <p class="text-sm text-gray-600 mb-4">{{ ucfirst($post->user->role) }} - {{ $post->user->email }}</p>
                                </div>
                            </div>
                            <!-- Article Footer -->
                            <div class="border-t border-gray-200 mt-10 pt-6 flex flex-wrap justify-between items-center">
                                <div class="flex items-center space-x-4 mb-4 md:mb-0">
                                    <button @click="toggleLike()" class="flex items-center space-x-1 text-gray-600 hover:text-red-500 transition">
                                        <i class="fas" :class="liked ? 'fa-heart text-red-500' : 'fa-heart'"></i>
                                        <span x-text="likeCount"></span>
                                    </button>
                                    <button @click="showComments = !showComments" class="flex items-center space-x-1 text-gray-600 hover:text-primary transition">
                                        <i class="far fa-comment"></i>
                                        <span>24</span>
                                    </button>
                                    <div class="text-gray-500 text-sm" x-text="readingTime"></div>
                                </div>

                                <div class="flex space-x-3">
                                    <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Comments Section -->
                            <div x-show="showComments" x-cloak class="mt-8">
                                <h3 class="text-xl font-bold mb-6">Comments (24)</h3>

                                <!-- Comment Form -->
                                <form class="mb-8">
                                    <textarea class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" rows="4" placeholder="Write your comment..."></textarea>
                                    <button type="submit" class="mt-3 bg-primary hover:bg-secondary text-white font-medium py-2 px-4 rounded-lg transition">Post Comment</button>
                                </form>

                                <!-- Comments List -->
                                <div class="space-y-6">
                                    @for($i = 0; $i < 3; $i++)
                                    <div class="flex">
                                        <img src="https://i.pravatar.cc/40?u={{ $i }}" alt="Commenter" class="w-10 h-10 rounded-full mr-4">
                                        <div>
                                            <div class="flex items-center mb-1">
                                                <h4 class="font-medium mr-2">John Doe</h4>
                                                <span class="text-gray-500 text-sm">{{ date('M d, Y', strtotime('-' . $i . ' days')) }}</span>
                                            </div>
                                            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.</p>
                                            <div class="mt-2">
                                                <button class="text-gray-500 hover:text-primary text-sm mr-4">Reply</button>
                                                <button class="text-gray-500 hover:text-primary text-sm">Like</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor

                                    <button class="text-primary font-medium hover:underline">Load more comments</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Author Bio -->
                    {{-- <div class="bg-white rounded-lg shadow-sm p-6 md:p-8 mt-8 flex flex-col md:flex-row items-center md:items-start">
                        <img src="https://i.pravatar.cc/100?u={{ $post->user_id ?? '' }}" alt="Author" class="w-24 h-24 rounded-full mb-4 md:mb-0 md:mr-6">
                        <div>
                            <h3 class="text-xl font-bold mb-2">{{ $post->user->name ?? 'Author Name' }}</h3>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.</p>
                            <div class="flex space-x-3">
                                <a href="#" class="text-gray-600 hover:text-primary"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-gray-600 hover:text-primary"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="text-gray-600 hover:text-primary"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                @endforeach
            </div>

            <!-- Sidebar -->
            <div class="w-1/3 px-4 mt-8 lg:mt-0">
                <!-- Search -->
                <div class="bg-white rounded-lg shadow-sm p-6" x-data="{ search: '' }">
                    <h3 class="text-lg font-bold mb-4">Search</h3>
                    <div class="relative">
                        <input
                            type="text"
                            x-model="search"
                            placeholder="Search articles..."
                            class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        >
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <!-- Popular Posts -->
                <div class="bg-white rounded-lg shadow-sm p-6 mt-6">
                    <h3 class="text-lg font-bold mb-4">Popular Posts</h3>
                    <div class="space-y-4">
                        @foreach($popularPosts ?? [] as $index => $popularPost)
                        <a href="/blog/{{ $popularPost->slug ?? 'post-' . $index }}" class="flex group">
                            <div class="w-20 h-20 bg-cover bg-center rounded" style="background-image: url('{{ $popularPost->thumbnail ?? '/placeholder.svg?height=80&width=80' }}')"></div>
                            <div class="ml-4">
                                <h4 class="font-medium group-hover:text-primary transition line-clamp-2">{{ $popularPost->title ?? 'Popular Post Title ' . ($index + 1) }}</h4>
                                <div class="text-sm text-gray-500 mt-1">{{ $popularPost->published_at ?? date('M d, Y', strtotime('-' . $index . ' weeks')) }}</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Tags Cloud -->
                <div class="bg-white rounded-lg shadow-sm p-6 mt-6">
                    <h3 class="text-lg font-bold mb-4">Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($tags ?? ['Design', 'Development', 'UX', 'UI', 'Technology', 'Business', 'Marketing', 'SEO', 'Tutorial'] as $tag)
                        <a href="#" class="bg-gray-100 hover:bg-primary hover:text-white text-gray-700 px-3 py-1 rounded-full text-sm transition">
                            {{ is_string($tag) ? $tag : $tag->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main-layout>
