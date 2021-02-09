<div class="block">
    <div class="header">@lang('app.creator.labels.education.section_title')</div>
    @foreach($resume->contents['education'] ?? [] as $education)
        <div class="body">
            <div class="row align-items-center mb-2">
                <div class="col-auto pr-0">
                    <div class="highlight">
                        @php
                            $months = __('sources.months');

                            $start_date = explode('-', $education['startDate']);
                            $start = $months[$start_date[1]] . ' ' . $start_date[0];
                        @endphp

                        @if ($education['endDate'] == 'actual')
                            @lang('app.creator.labels.education.from_to_actual', [
                                'start' => $start,
                            ])
                        @else
                            @php
                                $end_date = explode('-', $education['endDate']);
                                $end = $months[$end_date[1]] . ' ' . $end_date[0];
                            @endphp
                            @lang('app.creator.labels.education.from_to', [
                                'start' => $start,
                                'end' => $end
                            ])
                        @endif
                    </div>
                </div>
                <div class="col py-2" style="font-size: 1.2em">
                    <strong>{{ $education['area'] }}</strong><br>
                    {{ $education['institution'] }}
                    @if ($education['city'] ?? '' != '')
                        ({!! $education['city'] ?? '' !!})
                    @endif
                </div>
            </div>

            @isset($education['summary'])
                <div class="box">
                    {!! nl2br($education['summary']) !!}
                </div>
            @endisset
        </div>
    @endforeach
</div>