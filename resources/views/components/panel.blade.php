<div class="panel {{ isset($class) ? $class : '' }}">
    <h2>
        {!! isset($icon) ? '<ion-icon name="'.$icon.'"></ion-icon>' : '' !!}
        {{ $title }}
    </h2>

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