<x-layouts.main-layout :title="'Contact Us'">
    <div class="bg-gradient-to-br from-slate-50 via-white to-slate-100 min-h-screen">
    <!-- Hero Section -->
    <section class="relative px-6 py-16 overflow-hidden bg-cover bg-center" style="background-image: url('{{ asset('assets/img/contact.jpg') }}')">
        <div class="absolute top-0 bottom-0 left-0 right-0 bg-black z-20 opacity-30"></div>
        <div class="relative max-w-7xl mx-auto my-20 z-30">
            <div class="text-center mb-16">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                    Let's Start a
                    <span class="bg-gradient-to-r from-blue-600 via-blue-500 to-blue-600 bg-clip-text text-transparent">
                        Conversation
                    </span>
                </h1>
                <p class="text-xl text-white max-w-2xl mx-auto leading-relaxed">
                    We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="px-6 py-16">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Contact Info -->
                <div class="space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold text-slate-900 mb-6">Get in Touch</h2>
                        <p class="text-lg text-slate-600 leading-relaxed">
                            Ready to take your project to the next level? We're here to help you succeed.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <!-- Email -->
                        <div class="flex items-center space-x-4 p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900 mb-1">Email Us</h3>
                                <p class="text-slate-600">admin@transnetsumbar.id</p>
                                <p class="text-slate-600">marawatransmisimedia@gmail.com</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-4 p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900 mb-1">Call Us</h3>
                                <p class="text-slate-600">0751-8959999</p>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="flex items-center space-x-4 p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900 mb-1">Visit Us</h3>
                                <p class="text-slate-600">PT Marawa Transmisi Media(Transnet)<br>Batang Anai 2A Komplek GOR Haji Agus Salim, Padang, Sumatera Barat</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact CTA Section -->
                <div class="relative">
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-white/20">
                        <div class="text-center space-y-8">
                            <div>
                                <h3 class="text-2xl font-bold text-slate-900 mb-4">Ready to Work Together?</h3>
                                <p class="text-slate-600 leading-relaxed">
                                    Choose your preferred way to connect with us and let's start building something amazing.
                                </p>
                            </div>

                            <div class="space-y-4">
                                <!-- Email CTA -->
                                <a href="mailto:marawatransmisimedia@gmail.com" target="_blank"
                                   class="w-full flex items-center justify-center space-x-3 bg-gradient-to-r from-violet-600 to-indigo-600 text-white font-semibold py-4 px-6 rounded-xl hover:from-violet-700 hover:to-indigo-700 focus:ring-4 focus:ring-violet-500/50 transition-all duration-300 shadow-lg hover:shadow-xl hover-scale">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>Send us an Email</span>
                                </a>

                                <!-- Phone CTA -->
                                <a href="tel:+07518959999" target="_blank"
                                   class="w-full flex items-center justify-center space-x-3 bg-white border-2 border-slate-200 text-slate-700 font-semibold py-4 px-6 rounded-xl hover:border-violet-300 hover:bg-violet-50 focus:ring-4 focus:ring-violet-500/20 transition-all duration-300 shadow-sm hover:shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span>Call us Now</span>
                                </a>

                                <!-- WhatsApp CTA -->
                                <a href="https://wa.me/6282382541525" target="_blank"
                                   class="w-full flex items-center justify-center space-x-3 bg-green-500 text-white font-semibold py-4 px-6 rounded-xl hover:bg-green-600 focus:ring-4 focus:ring-green-500/50 transition-all duration-300 shadow-lg hover:shadow-xl hover-scale">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.700"/>
                                    </svg>
                                    <span>WhatsApp Chat</span>
                                </a>
                            </div>

                            <div class="bg-gradient-to-r from-violet-50 to-indigo-50 rounded-2xl p-6">
                                <h4 class="font-semibold text-slate-900 mb-2">Quick Response Guarantee</h4>
                                <p class="text-sm text-slate-600">We typically respond within 2 hours during business hours</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</x-layouts.main-layout>
