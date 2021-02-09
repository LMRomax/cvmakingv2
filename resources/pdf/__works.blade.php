<div class="block">
    <div class="header">@lang('app.creator.labels.works.section_title')</div>
    @foreach($resume->contents['works'] ?? [] as $work)
        <div class="body">
            <div class="row align-items-center mb-2">
                <div class="col-auto pr-0">
                    <div class="highlight">
                        @php
                            $months = __('sources.months');

                            $start_date = explode('-', $work['startDate']);
                            $start = $months[$start_date[1]] . ' ' . $start_date[0];
                        @endphp

                        @if ($work['endDate'] == 'actual')
                            @lang('app.creator.labels.works.from_to_actual', [
                                'start' => $start
                            ])
                        @else
                            @php
                                $end_date = explode('-', $work['endDate']);
                                $end = $months[$end_date[1]] . ' ' . $end_date[0];
                            @endphp
                            @lang('app.creator.labels.works.from_to', [
                                'start' => $start,
                                'end' => $end
                            ])
                        @endif
                    </div>
                </div>
                <div class="col py-2" style="font-size: 1.2em">
                    @lang('app.creator.labels.works.at', $work)
                    @if ($work['city'] ?? '' != '')
                        ({!! $work['city'] ?? '' !!})
                    @endif
                </div>
            </div>

            @isset($work['summary'])
                <div class="box">
                    {!! nl2br($work['summary']) !!}
                </div>
            @endisset
        </div>
    @endforeach
</div>