<x-layouts.order-layout :title="'Berita Terbaru'">
    <!-- Content Section -->
    <div class="container mx-auto px-4 py-12 mt-15">
        <div class="flex -mx-4 w-full">
            <!-- Main Content -->
            <div class="flex flex-col gap-8 w-full mx-10">
                <!-- Breadcrumb -->
                <nav class="flex items-center space-x-2 px-4 text-black/50 mt-8">
                    <a href="/" class="hover:text-black! transition-colors duration-200">
                        <i class="fas fa-home mr-1"></i>Home
                    </a>
                    <i class="fas fa-chevron-right"></i>
                    <span class="text-black font-medium">Berita Terbaru                                                                                                         </span>
                </nav>
                @forelse ($contents as $post)
                <div class="w-full px-4">
                    <div class="bg-white rounded-lg shadow-sm">
                        <!-- Thumbnail -->
                        <div class="w-full h-[400px]">
                            <img class="w-full h-full rounded-t-lg" src="{{ asset('assets/img/news.jpg') }}" alt="">
                        </div>
                        <div class="text-2xl text-gray-800 font-semibold mx-4 mt-4 p-4">
                            "{{ $post->title }}"
                        </div>
                        <!-- Excerpt -->
                        <div class="text-lg text-gray-600 bg-gray-100 font-medium border-l-2 border-blue-500! mx-4 mb-8 p-4 italic">
                            {{ $post->excerpt ?? ''}}
                        </div>

                        <!-- Content -->
                        <div class="prose max-w-none md:px-8 md:pb-8" x-data="{
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
                        </div>
                    </div>
                </div>
                @empty
                <section class="flex items-center justify-center h-full">
                    <div class="text-center max-w-md p-6 rounded-2xl">
                        <img src="{{ asset('assets/img/notfound.png') }}" alt="">
                        <h2 class="text-2xl font-semibold text-gray-700">Content tidak ditemukan</h2>
                        <p class="text-sm text-gray-500 mt-2">Tidak ada hasil untuk keyword <span class="font-medium text-primary">"{{ $keyword }}"</span>. Coba gunakan kata kunci lain.</p>
                    </div>
                </section>
                @endforelse
            </div>

            <!-- Sidebar -->
            <div class="w-1/3 px-4 mt-8 lg:mt-0 hidden lg:block">
                <!-- Search -->
                <div class="bg-white rounded-lg shadow-sm p-6" x-data="{ search: '' }">
                    <h3 class="text-lg font-bold mb-4">Search</h3>
                    <form action="{{ route('search.news') }}" method="POST" class="relative">
                        @csrf
                        <input
                            type="text"
                            name="keyword"
                            x-model="search"
                            placeholder="Search articles..."
                            class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        >
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </form>
                </div>

                <!-- Popular Posts -->
                <div class="bg-white rounded-lg shadow-sm p-6 mt-6">
                    <h3 class="text-lg font-bold mb-4">Popular Posts</h3>
                    <div class="space-y-4">
                        @foreach($popularPosts ?? [] as $index => $popularPost)
                        <a href="/blog/{{ $popularPost->slug ?? 'post-' . $index }}" class="flex group">
                            <div class="w-20 h-20 bg-cover bg-center rounded" style="background-image: url('{{asset('assets/img/news.jpg')}}')"></div>
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
                        @foreach($tags ?? ['InternetProvider', 'LayananInternet', 'ISPIndonesia', 'JaringanFiberOptik', 'KecepatanInternet', 'GangguanInternet', 'InternetUnlimited', 'PaketInternetMurah', 'TeknologiISP', 'BeritaISP'] as $tag)
                        <div class="bg-gray-100 hover:bg-gray-800! hover:text-white text-gray-700 px-3 py-1 rounded-full text-sm transition">
                            {{ is_string($tag) ? $tag : $tag->name }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main-layout>
