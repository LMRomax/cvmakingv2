<h1 class="mt-3">@lang('app.creator.labels.languages.section_title')</h1>
@foreach ($resume->contents['languages'] as $language)
    <div class="row align-items-center mb-2">
        <div class="col pr-0">
            @if ($language['level'] == 100)
                <strong>{{ $language['name'] }}</strong>
            @else
                {{ $language['name'] }}
            @endif
        </div>
        <div class="col-auto">
            @switch($language['level'])
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