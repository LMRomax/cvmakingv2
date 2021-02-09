<div class="block">
    <div class="header">@lang('app.creator.labels.skills.section_title')</div>
    <div class="body">
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
                </div>
            </div>
        @endforeach
    </div>
</div>