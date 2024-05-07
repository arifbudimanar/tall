<footer class="w-full bg-white border-t dark:bg-zinc-900 border-zinc-200 dark:border-zinc-800">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-4 overflow-hidden sm:rounded-lg sm:p-6 lg:p-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-6">
                {{-- Logo --}}
                <div>
                    <x-logo />
                    <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400">
                        {{ __('A TALL Stack boilerplate with minimalist design, ready to boost your web app development journey.') }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-6 mt-12 xl:col-span-2 xl:mt-0 md:grid-cols-3 xl:grid-cols-4">
                    {{-- Navigations --}}
                    <div>
                        <h3 class="text-sm font-bold tracking-wider uppercase text-zinc-900 dark:text-zinc-100">
                            {{ __('Navigations') }}
                        </h3>

                        <ul role="list" class="mt-4 space-y-2">
                            @guest
                                <li>
                                    <a href="{{ route('login') }}" wire:navigate
                                        class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                        {{ __('Login') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" wire:navigate
                                        class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            @endguest
                            <li>
                                <a href="{{ route('home') }}" wire:navigate
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            @auth
                                <li>
                                    <a href="{{ route('user.dashboard') }}" wire:navigate
                                        class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                        {{ __('User Dashboard') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.profile') }}" wire:navigate
                                        class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                        {{ __('Profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.setting') }}" wire:navigate
                                        class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                        {{ __('Setting') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" wire:navigate
                                        class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                        {{ __('Admin Dashboard') }}
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>

                    {{-- Legals --}}
                    <div>
                        <h3 class="text-sm font-bold tracking-wider uppercase text-zinc-900 dark:text-zinc-100">
                            {{ __('Legals') }}
                        </h3>

                        <ul role="list" class="mt-4 space-y-2">
                            <li>
                                <a href="{{ route('termsofservice') }}" target="_blank"
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('Terms of Service') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('privacypolicy') }}" target="_blank"
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('Privacy Policy') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- Socials --}}
                    <div>
                        <h3 class="text-sm font-bold tracking-wider uppercase text-zinc-900 dark:text-zinc-100">
                            {{ __('Socials') }}
                        </h3>

                        <ul role="list" class="mt-4 space-y-2">
                            <li>
                                <a href="https://arifbudimanar.github.io/" target="_blank"
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('Portofolio') }}
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/arifbudimanar" target="_blank"
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('Github') }}
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/arifbudiman_id" target="_blank"
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('Twitter') }}
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/arifbudimanarrosyid/" target="_blank"
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('Instagram') }}
                                </a>
                            </li>
                            <li>
                                <a href="https://www.threads.net/@arifbudimanarrosyid" target="_blank"
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('Threads') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- Other --}}
                    <div class="md:col-span-3 xl:col-span-1">
                        <h3 class="text-sm font-bold tracking-wider uppercase text-zinc-900 dark:text-zinc-100">
                            {{ __('Others') }}
                        </h3>

                        <ul role="list" class="mt-4 space-y-2">
                            <li>
                                <a href="https://marketplace.visualstudio.com/items?itemName=arifbudimanar.better-laravel-extension-pack"
                                    target="_blank"
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('Better Laravel Extension Pack') }}
                                </a>
                            </li>
                            <li>
                                <a href="https://marketplace.visualstudio.com/items?itemName=arifbudimanar.arifcode-theme"
                                    target="_blank"
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('ArifCode Theme Original') }}
                                </a>
                            </li>
                            <li>
                                <a href="https://marketplace.visualstudio.com/items?itemName=arifbudimanar.arifcode-theme-exclusive"
                                    target="_blank"
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('ArifCode Theme Exclusive') }}
                                </a>
                            </li>
                            <li>
                                <a href="https://marketplace.visualstudio.com/items?itemName=arifbudimanar.arifcode-theme-windows"
                                    target="_blank"
                                    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none">
                                    {{ __('ArifCode Theme Windows') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Watermark --}}
            <div class="flex mt-12 xl:justify-center">
                <span class="text-sm text-zinc-600 dark:text-zinc-400">
                    {{ __('Developed by') }}
                    <a href="https://github.com/arifbudimanar"
                        class="hover:text-indigo-600 dark:hover:text-indigo-400 focus:text-indigo-600 dark:focus:text-indigo-400 focus:outline-none"
                        rel="noopener noreferrer">
                        Arif Budiman Arrosyid
                    </a>
                </span>
            </div>
            {{-- <div class="flex mt-1 xl:justify-center">
                <span class="text-sm text-zinc-600 dark:text-zinc-400">
                    © {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
                </span>
            </div> --}}
        </div>
    </div>
</footer>
