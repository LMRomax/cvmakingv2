@extends('layouts.app')

@section('Banniere')
@stop

@section('content')
    <div id="loading" class="container-fluid loader-container-fluid">
        <div id="loader" class="loader"></div>
    </div>

    <div id="is-load" class="is-load">
        <div class="makingcv-deco"></div>

        <div class="container making-cv-steps">
            <div class="row justify-content-center">
                <div class="making-cv-step in-step">
                    <a href="{{ route('making-cv') }}">
                        <div class="making-cv-step-bubble step-in">
                            1
                        </div>
                        <div class="making-cv-step-text">
                            Mes données
                        </div>
                    </a>
                </div>

                <div class="making-cv-step">
                    <a>
                        <div class="making-cv-step-bubble step-in">
                            2
                        </div>
                        <div class="making-cv-step-text">
                            Choix du modèle
                        </div>
                    </a>
                </div>

                <div class="making-cv-step">
                    <a>
                        <div class="making-cv-step-bubble">
                            3
                        </div>
                        <div class="making-cv-step-text">
                            Contenu
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="container select-cv-container">

            <form action="{{ route('selected-design') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    @foreach ($designs as $design)
                        <div class="col-lg-4 col-md-6 col-12 design--card">
                            <div class="design--card__inner">
                                <label>
                                    <div class="title--design">
                                        {{ $design->name }}
                                    </div>
                                    <div class="img--design">
                                        <img src="{{ asset($design->img_link) }}" alt="{{ $design->name }}">
                                    </div>
                                    <div class="input--radio__design">
                                        <input type="radio" class="question-form__input-radio" name="designCv"
                                            value={{ $design->id }} />
                                        <span></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="form-group form-button">
                    <div class="btn-center">
                        <button type="submit" class="btn btn-outformbox">
                            {{ __('translations.makingcv.button_nextstep') }}
                            <div class="btn_arrow_right"><i class="fas fa-chevron-right"></i></div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
