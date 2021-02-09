<div class="block">
    <div class="header">@lang('app.creator.labels.interests.section_title')</div>
    @foreach($resume->contents['interests'] ?? [] as $interest)
        <div class="body">
            {{ $interest['name'] }}
        </div>
    @endforeach
</div>