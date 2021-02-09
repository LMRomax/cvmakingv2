<h1 class="mt-3">@lang('app.creator.labels.skills.section_title')</h1>
@foreach ($resume->contents['skills'] as $skill)
    <div class="row align-items-center mb-2">
        <div class="col pr-0">
            @if ($skill['level'] == 100)
                <strong>{{ $skill['name'] }}</strong>
            @else
                {{ $skill['name'] }}
            @endif
        </div>
        <div class="col-auto">
            @if (($show ?? 'stars') == 'stars')
                @switch($skill['level'])
                    @case(100)
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        @break
                    @case(75)
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-muted"></i>
                        @break
                    @case(50)
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        @break
                    @case(25)
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        @break
                    @case(20)
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        @break
                @endswitch
            @elseif (($show ?? 'stars') == 'progress')
                @switch($skill['level'])
                    @case(100)
                        <div style="height: 2px; background-color: #0c8996; width: 100%">&nbsp;</div>
                        @break
                    @case(75)
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-muted"></i>
                        @break
                    @case(50)
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        @break
                    @case(25)
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        @break
                    @case(20)
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        <i class="fas fa-star text-muted"></i>
                        @break
                @endswitch
            @endif
        </div>
    </div>
@endforeach