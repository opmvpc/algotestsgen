<div class="panel {{ isset($class) ? $class : '' }}">
    @isset($title)
        <h2>
            @if (isset($icon))
                @svg('icon-' .$icon, [])
            @endif
            {{ $title }}
        </h2>
    @endisset

    <div class="d-flex">

        @if (isset($subSectionList))
            <div class="sub-sections-list">
                <ul class="links-list">
                    @foreach ($subSectionList as $item)
                        <li>
                            @component('theme::components.buttons.link', [
                                'ancre' => $item['ancre'],
                            ])
                                {{ $item['label'] }}
                            @endcomponent
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="panel-content shadow-lg rounded-lg w-100">
            {{ $slot }}
        </div>

    </div>
</div>
