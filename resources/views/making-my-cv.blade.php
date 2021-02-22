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
                <div class="making-cv-step">
                    <a>
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
                        <div class="making-cv-step-bubble">
                            2
                        </div>
                        <div class="making-cv-step-text">
                            Contenu
                        </div>
                    </a>
                </div>

                <div class="making-cv-step">
                    <a>
                        <div class="making-cv-step-bubble ">
                            3
                        </div>
                        <div class="making-cv-step-text">
                            Choix du modèle
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="container making-cv-container">
            <div class="making-cv-inner">
                <form action="{{ route('post-basics') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row justify-content-center">

                        <div class="input-file-cvphoto col-auto">

                            @if(isset($cv))  
                                @if($cv->cvphoto != null)
                                    <img id="cvphoto-preview" src=" {{ asset('cvphoto/'.$cv->cvphoto) }}" alt="CV_photo">
                                @else 
                                    <img id="cvphoto-preview" src="{{ asset('images/avatar-placehold.webp') }} " alt="CV_photo">
                                @endif
                            @else
                                <img id="cvphoto-preview" src="{{ asset('images/avatar-placehold.webp') }} " alt="CV_photo">
                            @endif
                            

                            <div class="form-group input-file-container">
                                <input id="cvphoto-modify" type="file" class="input-file" ref="cvphoto" name="cvphoto"/>
                                <label for="cvphoto-modify" class="input-file-trigger">Modifier</label>
                                @if ($errors->has('cvphoto'))
                                    <div class="alert-half alert-danger" role="alert" style="margin-top: 10px;">
                                        {{ $errors->first('cvphoto') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">

                                <label for="makingcv_name">{{__('translations.makingcv.label_name')}}</label>
        
                                <input type="text" id="makingcv_name" class="form-control @error('makingcv_name') is-invalid @enderror" ref="makingcv_name" 
                                name="makingcv_name" 
                                @if($cv_basics !== null && $cv_basics->makingcv_name !== null)
                                    value="{{ $cv_basics->makingcv_name }}"
                                @else
                                    value="{{ old('makingcv_name') }}"
                                @endif
                                required>
                            
                                @error('makingcv_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">

                                <label for="makingcv_poste">{{__('translations.makingcv.label_poste')}}</label>
        
                                <input type="text" id="makingcv_poste" class="form-control @error('makingcv_poste') is-invalid @enderror" ref="makingcv_poste" 
                                name="makingcv_poste" 
                                @if($cv_basics !== null && $cv_basics->makingcv_poste !== null)
                                    value="{{ $cv_basics->makingcv_poste }}"
                                @else
                                    value="{{ old('makingcv_poste') }}"
                                @endif
                                required>
                            
                                @error('makingcv_poste')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6 col-12">
                            <div class="form-group">

                                <label for="makingcv_phone">{{__('translations.makingcv.label_phone')}}</label>
        
                                <input type="number" id="makingcv_phone" class="form-control @error('makingcv_phone') is-invalid @enderror" ref="makingcv_phone" 
                                name="makingcv_phone" 
                                @if($cv_basics !== null && $cv_basics->makingcv_phone !== null)
                                    value="{{ $cv_basics->makingcv_phone }}"
                                @else
                                    value="{{ old('makingcv_phone') }}"
                                @endif
                                required>
                            
                                @error('makingcv_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">

                                <label for="makingcv_email">{{__('translations.makingcv.label_email')}}</label>
        
                                <input type="email" id="makingcv_email" class="form-control @error('makingcv_email') is-invalid @enderror" ref="makingcv_email" 
                                name="makingcv_email" 
                                @if($cv_basics !== null && $cv_basics->makingcv_email !== null)
                                    value="{{ $cv_basics->makingcv_email }}"
                                @else
                                    value="{{ old('makingcv_email') }}"
                                @endif
                                required>
                            
                                @error('makingcv_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">

                            <label for="makingcv_address">{{__('translations.makingcv.label_address')}}</label>
    
                            <input type="text" id="makingcv_address" class="form-control @error('makingcv_address') is-invalid @enderror" ref="makingcv_address" 
                            name="makingcv_address" 
                            @if($cv_basics !== null && $cv_basics->makingcv_address !== null)
                                value="{{ $cv_basics->makingcv_address }}"
                            @else
                                value="{{ old('makingcv_address') }}"
                            @endif
                            required>
                        
                            @error('makingcv_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6 col-12">
                            <div class="form-group">

                                <label for="makingcv_zipcode">{{__('translations.makingcv.label_zipcode')}}</label>
        
                                <input type="number" id="makingcv_zipcode" class="form-control @error('makingcv_zipcode') is-invalid @enderror" ref="makingcv_zipcode" 
                                name="makingcv_zipcode" 
                                @if($cv_basics !== null && $cv_basics->makingcv_zipcode !== null)
                                    value="{{ $cv_basics->makingcv_zipcode }}"
                                @else
                                    value="{{ old('makingcv_zipcode') }}"
                                @endif
                                required>
                            
                                @error('makingcv_zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">

                                <label for="makingcv_city">{{__('translations.makingcv.label_city')}}</label>
        
                                <input type="text" id="makingcv_city" class="form-control @error('makingcv_city') is-invalid @enderror" ref="makingcv_city" 
                                name="makingcv_city" 
                                @if($cv_basics !== null && $cv_basics->makingcv_city !== null)
                                    value="{{ $cv_basics->makingcv_city }}"
                                @else
                                    value="{{ old('makingcv_city') }}"
                                @endif
                                required>
                            
                                @error('makingcv_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                   
                    <div id="more" style="display: none;">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
        
                                    <label for="makingcv_birthdate">{{__('translations.makingcv.label_birthdate')}}</label>
            
                                    <input type="date" id="makingcv_birthdate" class="form-control @error('makingcv_birthdate') is-invalid @enderror" ref="makingcv_birthdate" 
                                    name="makingcv_birthdate" 
                                    @if($cv_basics !== null && $cv_basics->makingcv_birthdate !== null)
                                        value="{{ $cv_basics->makingcv_birthdate }}"
                                    @else
                                        value="{{ old('makingcv_birthdate') }}"
                                    @endif>
                                
                                    @error('makingcv_birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6 col-12">
                                <div class="form-group">
        
                                    <label for="makingcv_birthcity">{{__('translations.makingcv.label_birthcity')}}</label>
            
                                    <input type="text" id="makingcv_birthcity" class="form-control @error('makingcv_birthcity') is-invalid @enderror" ref="makingcv_birthcity" 
                                    name="makingcv_birthcity" 
                                    @if($cv_basics !== null && $cv_basics->makingcv_birthcity !== null)
                                        value="{{ $cv_basics->makingcv_birthcity }}"
                                    @else
                                        value="{{ old('makingcv_birthcity') }}"
                                    @endif>
                                
                                    @error('makingcv_birthcity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
        
                                    <label for="makingcv_drivinglicenses">{{__('translations.makingcv.label_drivinglicenses')}}</label>
            
                                    <select multiple="multiple" name="makingcv_drivinglicenses" id="makingcv_drivinglicenses" class="makingcv_drivinglicenses form-control @error('makingcv_drivinglicenses') is-invalid @enderror">
                                        <option value="" @if($cv_basics == null || $cv_basics->makingcv_drivinglicenses == null) selected @endif>
                                            {{__('translations.makingcv.select_driving_licence')}}
                                        </option>
                                        <option value="A"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "A")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_a')}}
                                        </option>

                                        <option value="AM"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "AM")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_am')}}
                                        </option>

                                        <option value="B"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "B")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_b')}}
                                        </option>

                                        <option value="BE"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "BE")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_be')}}
                                        </option>

                                        <option value="C"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "C")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_c')}}
                                        </option>

                                        <option value="CE"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "CE")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_ce')}}
                                        </option>

                                        <option value="C1"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "C1")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_c1')}}
                                        </option>

                                        <option value="C1E"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "C1E")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_c1e')}}
                                        </option>

                                        <option value="D"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "D")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_d')}}
                                        </option>

                                        <option value="DE"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "DE")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_de')}}
                                        </option>

                                        <option value="D1"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "D1")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_d1')}}
                                        </option>

                                        <option value="D1E"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "D1E")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_d1e')}}
                                        </option>

                                        <option value="T"
                                        @if($cv_basics !== null && $cv_basics->makingcv_drivinglicenses !== null && $cv_basics->makingcv_drivinglicenses == "T")
                                            selected
                                        @endif>
                                            {{__('translations.makingcv.dl_t')}}
                                        </option>
                                    </select>
                                
                                    @error('makingcv_drivinglicenses')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6 col-12">
                                <div class="form-group">
        
                                    <label for="makingcv_sexe">{{__('translations.makingcv.label_sexe')}}</label>

                                    <select name="makingcv_sexe" id="makingcv_sexe" class="makingcv_sexe form-control @error('makingcv_sexe') is-invalid @enderror">
                                        <option value="">{{__('translations.makingcv.select_sex')}}</option>
                                        <option value="M"
                                        @if($cv_basics !== null && $cv_basics->makingcv_sexe !== null && $cv_basics->makingcv_sexe == "M")
                                            selected
                                        @endif>{{__('translations.makingcv.sex_men')}}</option>
                                        <option value="W"
                                        @if($cv_basics !== null && $cv_basics->makingcv_sexe !== null && $cv_basics->makingcv_sexe == "W")
                                            selected
                                        @endif>{{__('translations.makingcv.sex_women')}}</option>
                                        <option value="O"
                                        @if($cv_basics !== null && $cv_basics->makingcv_sexe !== null && $cv_basics->makingcv_sexe == "O")
                                            selected
                                        @endif>{{__('translations.makingcv.sex_other')}}</option>
                                    </select>
                                
                                    @error('makingcv_sexe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
        
                                    <label for="makingcv_national">{{__('translations.makingcv.label_national')}}</label>
            
                                    <input type="text" id="makingcv_national" class="form-control @error('makingcv_national') is-invalid @enderror" ref="makingcv_national" 
                                    name="makingcv_national" 
                                    @if($cv_basics !== null && $cv_basics->makingcv_national !== null)
                                        value="{{ $cv_basics->makingcv_national }}"
                                    @else
                                        value="{{ old('makingcv_national') }}"
                                    @endif>
                                
                                    @error('makingcv_national')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6 col-12">
                                <div class="form-group">
        
                                    <label for="makingcv_civilstate">{{__('translations.makingcv.label_civilstate')}}</label>
            
                                    <input type="text" id="makingcv_civilstate" class="form-control @error('makingcv_civilstate') is-invalid @enderror" ref="makingcv_civilstate" 
                                    name="makingcv_civilstate" 
                                    @if($cv_basics !== null && $cv_basics->makingcv_civilstate !== null)
                                        value="{{ $cv_basics->makingcv_civilstate }}"
                                    @else
                                        value="{{ old('makingcv_civilstate') }}"
                                    @endif>
                                
                                    @error('makingcv_civilstate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
        
                                    <label for="makingcv_linkedin">{{__('translations.makingcv.label_linkedin')}}</label>
            
                                    <input type="text" id="makingcv_linkedin" class="form-control @error('makingcv_linkedin') is-invalid @enderror" ref="makingcv_linkedin" 
                                    name="makingcv_linkedin" 
                                    @if($cv_basics !== null && $cv_basics->makingcv_linkedin !== null)
                                        value="{{ $cv_basics->makingcv_linkedin }}"
                                    @else
                                        value="{{ old('makingcv_linkedin') }}"
                                    @endif>
                                
                                    @error('makingcv_linkedin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6 col-12">
                                <div class="form-group">
        
                                    <label for="makingcv_website">{{__('translations.makingcv.label_website')}}</label>
            
                                    <input type="text" id="makingcv_website" class="form-control @error('makingcv_website') is-invalid @enderror" ref="makingcv_website" 
                                    name="makingcv_website" 
                                    @if($cv_basics !== null && $cv_basics->makingcv_website !== null)
                                        value="{{ $cv_basics->makingcv_website }}"
                                    @else
                                        value="{{ old('makingcv_website') }}"
                                    @endif>
                                
                                    @error('makingcv_website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                      
                    <div class="col">
                        <a href="javascript:void(0);" onclick="$('#more').slideToggle('fast')" class="makingcv-button-more">
                            {{__('translations.makingcv.button_more')}}
                        </a>
                    </div>
                    
                </div>

                <div class="form-group form-button">
                    <div class="btn-center">
                        <button type="submit" class="btn btn-outformbox">
                            {{__('translations.makingcv.button_nextstep')}} 
                            <div class="btn_arrow_right"><i class="fas fa-chevron-right"></i></div>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/cvphotopreview.js') }}"></script>
@endsection