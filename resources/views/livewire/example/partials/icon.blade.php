<x-card.app :title="__('Icon')" :description="__('All the available icon.')">
    <x-slot:actions>
        <x-button.link.secondary href="https://heroicons.com/" target="_blank" :title="__('Heroicon')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"
                    stroke-width="1.5">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 1L12.764 1.75425C14.6898 3.65543 17.2874 4.81977 20.1481 4.81977C20.1937 4.81977 20.2392 4.81948 20.2846 4.81889L21.0994 4.80834L21.3539 5.61528C21.7735 6.94553 22 8.36575 22 9.83881C22 16.1368 17.8677 21.4257 12.277 22.9257L12 23L11.723 22.9257C6.13227 21.4257 2 16.1368 2 9.83881C2 8.36575 2.22653 6.94553 2.6461 5.61528L2.90061 4.80834L3.71542 4.81889C3.76083 4.81948 3.8063 4.81977 3.85185 4.81977C6.71264 4.81977 9.31016 3.65543 11.236 1.75425L12 1ZM4.54144 7.11742C4.33305 7.98766 4.22222 8.89906 4.22222 9.83881C4.22222 14.9497 7.50843 19.2634 12 20.6039C16.4916 19.2634 19.7778 14.9497 19.7778 9.83881C19.7778 8.89906 19.6669 7.98766 19.4586 7.11742C16.6401 6.96329 14.059 5.87001 12 4.13358C9.94101 5.87001 7.35985 6.96329 4.54144 7.11742Z"
                        fill="#8B5CF6" />
                </svg>
            </x-slot:icon>
        </x-button.link.secondary>
        <x-button.link.secondary href="https://lucide.dev/" target="_blank" :title="__('Lucide')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="block w-5 h-5 dark:hidden" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path
                        d="M14 12C14 9.79086 12.2091 8 10 8C7.79086 8 6 9.79086 6 12C6 16.4183 9.58172 20 14 20C18.4183 20 22 16.4183 22 12C22 8.446 20.455 5.25285 18 3.05557" />
                    <path
                        d="M10 12C10 14.2091 11.7909 16 14 16C16.2091 16 18 14.2091 18 12C18 7.58172 14.4183 4 10 4C5.58172 4 2 7.58172 2 12C2 15.5841 3.57127 18.8012 6.06253 21"
                        stroke="#F56565" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="hidden w-5 h-5 dark:block" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" id="lucide-logo">
                    <path
                        d="M14 12C14 9.79086 12.2091 8 10 8C7.79086 8 6 9.79086 6 12C6 16.4183 9.58172 20 14 20C18.4183 20 22 16.4183 22 12C22 8.446 20.455 5.25285 18 3.05557"
                        stroke="#fff" />
                    <path
                        d="M10 12C10 14.2091 11.7909 16 14 16C16.2091 16 18 14.2091 18 12C18 7.58172 14.4183 4 10 4C5.58172 4 2 7.58172 2 12C2 15.5841 3.57127 18.8012 6.06253 21"
                        stroke="#F56565" />
                </svg>
            </x-slot:icon>
        </x-button.link.secondary>
    </x-slot:actions>

    <x-slot:content>
        <p>
            The default icon component doesn't have width and height, so you should add it by add
            class="w-5 h-5".
        </p>
        <p>
            To add another icon I recomend to use outline icon with stroke-width = 1.5 from Heroicon or Lucide
            to keep the same style.
        </p>
        <p class="mt-4 mb-2">
            Outline Icons
        </p>
        <div class="grid max-w-lg grid-cols-9 gap-4 sm:grid-cols-12">
            <x-icon.adjustments-horizontal class="w-5 h-5" />
            <x-icon.adjustments-vertical class="w-5 h-5" />
            <x-icon.archive-box-x-mark class="w-5 h-5" />
            <x-icon.archive-box class="w-5 h-5" />
            <x-icon.arrow-in class="w-5 h-5" />
            <x-icon.arrow-left class="w-5 h-5" />
            <x-icon.arrow-out class="w-5 h-5" />
            <x-icon.arrow-path class="w-5 h-5" />
            <x-icon.arrow-right class="w-5 h-5" />
            <x-icon.badge-check class="w-5 h-5" />
            <x-icon.bars-2 class="w-5 h-5" />
            <x-icon.bars-3-bottom-left class="w-5 h-5" />
            <x-icon.bars-3-center-left class="w-5 h-5" />
            <x-icon.bars-3 class="w-5 h-5" />
            <x-icon.calendar class="w-5 h-5" />
            <x-icon.check-circle class="w-5 h-5" />
            <x-icon.check class="w-5 h-5" />
            <x-icon.chevron-down class="w-5 h-5" />
            <x-icon.chevron-left class="w-5 h-5" />
            <x-icon.chevron-right class="w-5 h-5" />
            <x-icon.chevron-up class="w-5 h-5" />
            <x-icon.chevrons-down class="w-5 h-5" />
            <x-icon.chevrons-up-down class="w-5 h-5" />
            <x-icon.chevrons-up class="w-5 h-5" />
            <x-icon.computer-desktop class="w-5 h-5" />
            <x-icon.device-phone-mobile class="w-5 h-5" />
            <x-icon.device-tablet class="w-5 h-5" />
            <x-icon.exclamation-triangle class="w-5 h-5" />
            <x-icon.eye-slash class="w-5 h-5" />
            <x-icon.eye class="w-5 h-5" />
            <x-icon.filter class="w-5 h-5" />
            <x-icon.filter-x class="w-5 h-5" />
            <x-icon.globe-alt class="w-5 h-5" />
            <x-icon.heart class="w-5 h-5" />
            <x-icon.home class="w-5 h-5" />
            <x-icon.information-circle class="w-5 h-5" />
            <x-icon.link-off class="w-5 h-5" />
            <x-icon.link class="w-5 h-5" />
            <x-icon.lock-close class="w-5 h-5" />
            <x-icon.lock-open class="w-5 h-5" />
            <x-icon.mail-check class="w-5 h-5" />
            <x-icon.mail-x class="w-5 h-5" />
            <x-icon.more-horizontal-circle class="w-5 h-5" />
            <x-icon.more-horizontal class="w-5 h-5" />
            <x-icon.more-vertical class="w-5 h-5" />
            <x-icon.no-symbol class="w-5 h-5" />
            <x-icon.pencil-square class="w-5 h-5" />
            <x-icon.plus class="w-5 h-5" />
            <x-icon.rectangle-stack class="w-5 h-5" />
            <x-icon.send class="w-5 h-5" />
            <x-icon.shield-check class="w-5 h-5" />
            <x-icon.shield-exclamation class="w-5 h-5" />
            <x-icon.slash class="w-5 h-5" />
            <x-icon.trash class="w-5 h-5" />
            <x-icon.user-group class="w-5 h-5" />
            <x-icon.user class="w-5 h-5" />
            <x-icon.users class="w-5 h-5" />
            <x-icon.x-circle class="w-5 h-5" />
            <x-icon.x class="w-5 h-5" />
        </div>
        <p class="mt-4 mb-2">
            Other Icons
        </p>
        <div class="grid max-w-lg grid-cols-9 gap-4 sm:grid-cols-12">
            <x-icon.github class="w-5 h-5" />
            <x-icon.google class="w-5 h-5" />
        </div>
    </x-slot:content>

</x-card.app>
