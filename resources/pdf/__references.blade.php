<div class="block">
    <div class="header">@lang('app.creator.labels.references.section_title')</div>
    @foreach($resume->contents['references'] ?? [] as $reference)
        <div class="body">
            <strong>{{ $reference['name'] }}</strong><br>
            {{ $reference['reference'] }}
        </div>
    @endforeach
</div>