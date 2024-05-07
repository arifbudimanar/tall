<div>
    <x-slot:header>
        <x-breadcrumb.item :href="route('user.dashboard')" :title="__('Dashboard')">
        </x-breadcrumb.item>
    </x-slot:header>

    <div class="py-2 space-y-2 sm:py-8 sm:space-y-8">
        <x-card.app description="{{ __('You are logged in as :name.', ['name' => auth()->user()->name]) }}">
            <x-slot:title>
                {{ __('Welcome to :appname User Dashboard', ['appname' => config('app.name')]) }}
            </x-slot:title>
        </x-card.app>
    </div>
</div>
