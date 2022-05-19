<div class="organosoft-menu">
    <button type="button" wire:click="toggleMenu" class="organosoft-menu__toggle">
        {{ $name }}
        <div class="organosoft-menu__dropdown {{ $show ? 'show' : '' }}">
            @foreach ($links as $link)
                <a href="{{ $link['route'] }}" class="organosoft-menu__menu-item {{ $link['active'] ? 'active' : '' }}">
                    {{ $link['name'] }}
                </a>
            @endforeach
        </div>
    </button>
</div>
