<?php

namespace App\Http\Controllers;

use App\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CVAjaxController extends Controller
{
    public function __construct() {
        $this->middleware('ajax');
    }

    //Form description

    public function handleDescription(Request $request) {
        $validation = Validator::make($request->all(), [
            'description_cv' => ['required', 'string'],
        ])->validate();

        $cv_id = session()->get('cv_id');

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();
            $cv->description = $request['description_cv'];
            if($cv->update()) {
                return response()->json(['success' => 'Description saved'], 200);
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'description__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'description__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'description__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'description__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'description__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'description__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }  
        }
    }

    /* Traitement Ajax XP form */

    public function storeXP(Request $request) {
        $validation = Validator::make($request->all(), [
            'contentcv_xp_poste' => ['required', 'string'],
            'contentcv_xp_city' => ['required', 'string'],
            'contentcv_xp_employer' => ['required', 'string'],
            'xp_start_month' => ['required', 'string'],
            'xp_start_year' => ['required', 'string'],
            'xp_end_month' => ['required', 'string'],
            'xp_end_year' => ['required', 'string'],
            'contentcv_xp_description' => ['required', 'string'],
        ])->validate();

        $cv_id = session()->get('cv_id');

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            if($cv->experience == null) {
                $cv_array[] = $request->except('_token');
            }
            else {
                $cv_array = json_decode($cv->experience, JSON_UNESCAPED_SLASHES);

                $cv_array[] = $request->except('_token');
            }

            $cv->experience = $cv_array;

            if($cv->save()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['success' => [
                        'xp_save' => 'Expérience sauvegardé !',
                    ]], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['success' => [
                        'xp_save' => 'Experience saved!',
                    ]], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['success' => [
                        'xp_save' => '¡Experiencia salvada!',
                    ]], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'xp__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'xp__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'xp__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'xp__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'xp__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'xp__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }  
        }
    }

    public function updateXP(Request $request, $id) {
        $validation = Validator::make($request->all(), [
            'contentcv_xp_poste' => ['required', 'string'],
            'contentcv_xp_city' => ['required', 'string'],
            'contentcv_xp_employer' => ['required', 'string'],
            'xp_start_month' => ['required', 'string'],
            'xp_start_year' => ['required', 'string'],
            'xp_end_month' => ['required', 'string'],
            'xp_end_year' => ['required', 'string'],
            'contentcv_xp_description' => ['nullable', 'string'],
        ])->validate();

        $cv_id = session()->get('cv_id');

        $xp_id = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->experience, JSON_UNESCAPED_SLASHES);

            $cv_array[$xp_id] = $request->except('_token');

            $cv->experience = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json([
                        'success' => 'Expérience modifiée',
                        'Title' => $cv_array[$xp_id],
                    ], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json([
                        'success' => 'Experience updated',
                        'Title' => $cv_array[$xp_id],
                    ], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json([
                        'success' => 'Experiencia actualizada',
                        'Title' => $cv_array[$xp_id],
                    ], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'xp__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'xp__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'xp__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'xp__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'xp__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'xp__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }  
        }
    }

    public function deleteXP(Request $request, $id) {
        $cv_id = session()->get('cv_id');

        $xp_id = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->experience, JSON_UNESCAPED_SLASHES);

            unset($cv_array[$xp_id]);

            $cv->experience = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['success' => 'Expérience supprimée'], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['success' => 'Experience deleted'], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['success' => 'Experiencia eliminada'], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'xp__form-error' => 'Vos informations n\'ont pas été supprimé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'xp__form-error' => 'Your information hasn\'t been deleted!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'xp__form-error' => '¡Tu información no ha sido borrada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'xp__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'xp__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'xp__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }
        }
    }

    /* Traitements Ajax Educ Form */

    /* Educ store */

    public function storeEduc(Request $request) {
        $validation = Validator::make($request->all(), [
            'contentcv_educ_formation' => ['required', 'string'],
            'contentcv_educ_city' => ['required', 'string'],
            'contentcv_educ_institution' => ['required', 'string'],
            'educ_start_month' => ['required', 'string'],
            'educ_start_year' => ['required', 'string'],
            'educ_end_month' => ['required', 'string'],
            'educ_end_year' => ['required', 'string'],
            'contentcv_educ_description' => ['nullable', 'string'],
        ])->validate();

        $cv_id = session()->get('cv_id');

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            if($cv->education == null) {
                $cv_array[] = $request->except('_token');
            }
            else {
                $cv_array = json_decode($cv->education, JSON_UNESCAPED_SLASHES);

                $cv_array[] = $request->except('_token');
            }

            $cv->education = $cv_array;

            if($cv->save()) {
                return response()->json(['success' => 'XP Save'], 200);
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'educ__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'educ__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'educ__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'educ__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'educ__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'educ__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }
        }
    }

    /* Educ update */

    public function updateEduc(Request $request, $id) {
        $validation = Validator::make($request->all(), [
            'contentcv_educ_formation' => ['required', 'string'],
            'contentcv_educ_city' => ['required', 'string'],
            'contentcv_educ_institution' => ['required', 'string'],
            'educ_start_month' => ['required', 'string'],
            'educ_start_year' => ['required', 'string'],
            'educ_end_month' => ['required', 'string'],
            'educ_end_year' => ['required', 'string'],
            'contentcv_educ_description' => ['nullable', 'string'],
        ])->validate();

        $cv_id = session()->get('cv_id');

        $educ_edit = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->education, JSON_UNESCAPED_SLASHES);

            $cv_array[$educ_edit] = $request->except('_token');

            $cv->education = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json([
                        'success' => 'Formation modifiée',
                        'Title' => $cv_array[$educ_edit],
                    ], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json([
                        'success' => 'Formation updated',
                        'Title' => $cv_array[$educ_edit],
                    ], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json([
                        'success' => 'Formación actualizada',
                        'Title' => $cv_array[$educ_edit],
                    ], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'educ__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'educ__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'educ__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'educ__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'educ__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'educ__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }  
        }
    }

    /* Educ delete */
     
    public function deleteEduc(Request $request, $id) {
        $cv_id = session()->get('cv_id');

        $educ_id = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->education, JSON_UNESCAPED_SLASHES);

            unset($cv_array[$educ_id]);

            $cv->education = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['success' => 'Formation supprimée'], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['success' => 'Formation deleted'], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['success' => 'Entrenamiento eliminado'], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'educ__form-error' => 'Vos informations n\'ont pas été supprimé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'educ__form-error' => 'Your information hasn\'t been deleted!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'educ__form-error' => '¡Tu información no ha sido borrada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'educ__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'educ__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'educ__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }
        }
    }

    /* Traitements Ajax Comp Form */

    /* Comp store */

    public function storeComp(Request $request) {
        $validation = Validator::make($request->all(), [
            'contentcv_comp_name' => ['required', 'string'],
            'contentcv_comp_level' => ['required', 'string'],
        ])->validate();

        $cv_id = session()->get('cv_id');

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            if($cv->competences == null) {
                $cv_array[] = $request->except('_token');
            }
            else {
                $cv_array = json_decode($cv->competences, JSON_UNESCAPED_SLASHES);

                $cv_array[] = $request->except('_token');
            }

            $cv->competences = $cv_array;

            if($cv->save()) {
                return response()->json(['success' => 'Skill Save'], 200);
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'comp__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'comp__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'comp__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'comp__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'comp__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'comp__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }
        }
    }

    /* Comp update */

    public function updateComp(Request $request, $id) {
        $validation = Validator::make($request->all(), [
            'contentcv_comp_name' => ['required', 'string'],
            'contentcv_comp_level' => ['required', 'string'],
        ])->validate();

        $cv_id = session()->get('cv_id');

        $comp_edit = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->competences, JSON_UNESCAPED_SLASHES);

            $cv_array[$comp_edit] = $request->except('_token');

            $cv->competences = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json([
                        'success' => 'Compétence modifiée',
                        'Title' => $cv_array[$comp_edit],
                    ], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json([
                        'success' => 'Skill updated',
                        'Title' => $cv_array[$comp_edit],
                    ], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json([
                        'success' => 'Habilidade actualizada',
                        'Title' => $cv_array[$comp_edit],
                    ], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'comp__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'comp__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'comp__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'comp__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'comp__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'comp__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }  
        }
    }

    /* Comp delete */
    
    public function deleteComp(Request $request, $id) {
        $cv_id = session()->get('cv_id');

        $comp_id = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->competences, JSON_UNESCAPED_SLASHES);

            unset($cv_array[$comp_id]);

            $cv->competences = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['success' => 'Compétences supprimée'], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['success' => 'Skill deleted'], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['success' => 'Entrenamiento eliminado'], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'comp__form-error' => 'Vos informations n\'ont pas été supprimé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'comp__form-error' => 'Your informations hasn\'t been deleted!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'comp__form-error' => '¡Tu información no ha sido borrada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'comp__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'comp__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'comp__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }
        }
    }


    /* Traitements Ajax Hobbies Form */

    /* Hobbies store */

    public function storeHobbies(Request $request) {
        $validation = Validator::make($request->all(), [
            'contentcv_hobbies_hobby' => ['required', 'string'],
        ])->validate();

        $cv_id = session()->get('cv_id');

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            if($cv->loisirs == null) {
                $cv_array[] = $request->except('_token');
            }
            else {
                $cv_array = json_decode($cv->loisirs, JSON_UNESCAPED_SLASHES);

                $cv_array[] = $request->except('_token');
            }

            $cv->loisirs = $cv_array;

            if($cv->save()) {
                return response()->json(['success' => 'Hobby Save'], 200);
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'hobbie__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'hobbie__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'hobbie__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'hobbie__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'hobbie__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'hobbie__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }
        }
    }

    /* Hobbies update */

    public function updateHobbies(Request $request, $id) {
        $validation = Validator::make($request->all(), [
            'contentcv_hobbies_hobby' => ['required', 'string'],
        ])->validate();

        $cv_id = session()->get('cv_id');

        $hobbie_edit = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->loisirs, JSON_UNESCAPED_SLASHES);

            $cv_array[$hobbie_edit] = $request->except('_token');

            $cv->loisirs = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json([
                        'success' => 'Loisir modifiée',
                        'Title' => $cv_array[$hobbie_edit],
                    ], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json([
                        'success' => 'Hobby updated',
                        'Title' => $cv_array[$hobbie_edit],
                    ], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json([
                        'success' => 'Pasatiempo actualizada',
                        'Title' => $cv_array[$hobbie_edit],
                    ], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'hobbie__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'hobbie__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'hobbie__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'hobbie__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'hobbie__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'hobbie__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }  
        }
    }

    /* Hobbies delete */
    
    public function deleteHobbies(Request $request, $id) {
        $cv_id = session()->get('cv_id');

        $hobbie_id = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->loisirs, JSON_UNESCAPED_SLASHES);

            unset($cv_array[$hobbie_id]);

            $cv->loisirs = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['success' => 'Loisir supprimée'], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['success' => 'Hobby deleted'], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['success' => 'Pasatiempo eliminado'], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'comp__form-error' => 'Vos informations n\'ont pas été supprimé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'comp__form-error' => 'Your informations hasn\'t been deleted!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'comp__form-error' => '¡Tu información no ha sido borrada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'comp__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'comp__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'comp__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }
        }
    }

    /* Traitements Ajax Lang Form */

    /* Lang store */

    public function storeLang(Request $request) {
        $validation = Validator::make($request->all(), [
            'contentcv_lang_name' => ['required', 'string'],
            'contentcv_lang_level' => ['required', 'string']
        ])->validate();

        $cv_id = session()->get('cv_id');

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            if($cv->loisirs == null) {
                $cv_array[] = $request->except('_token');
            }
            else {
                $cv_array = json_decode($cv->langues, JSON_UNESCAPED_SLASHES);

                $cv_array[] = $request->except('_token');
            }

            $cv->langues = $cv_array;

            if($cv->save()) {
                return response()->json(['success' => 'Language Save'], 200);
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'lang__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'lang__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'lang__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'lang__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'lang__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'lang__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }
        }
    }

    /* Lang update */

    public function updateLang(Request $request, $id) {
        $validation = Validator::make($request->all(), [
            'contentcv_lang_name' => ['required', 'string'],
            'contentcv_lang_level' => ['required', 'string']
        ])->validate();

        $cv_id = session()->get('cv_id');

        $lang_edit = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->langues, JSON_UNESCAPED_SLASHES);

            $cv_array[$lang_edit] = $request->except('_token');

            $cv->langues = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json([
                        'success' => 'Langues modifiée',
                        'Title' => $cv_array[$lang_edit],
                    ], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json([
                        'success' => 'Language updated',
                        'Title' => $cv_array[$lang_edit],
                    ], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json([
                        'success' => 'Lenguaje actualizada',
                        'Title' => $cv_array[$lang_edit],
                    ], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'lang__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'lang__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'lang__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'lang__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'lang__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'lang__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }  
        }
    }

    /* Lang delete */
    
    public function deleteLang(Request $request, $id) {
        $cv_id = session()->get('cv_id');

        $lang_id = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->langues, JSON_UNESCAPED_SLASHES);

            unset($cv_array[$lang_id]);

            $cv->langues = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['success' => 'Langues supprimée'], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['success' => 'Language deleted'], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['success' => 'Lenguaje eliminado'], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'comp__form-error' => 'Vos informations n\'ont pas été supprimé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'comp__form-error' => 'Your informations hasn\'t been deleted!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'comp__form-error' => '¡Tu información no ha sido borrada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'comp__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'comp__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'comp__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }
        }
    }

    /* Traitements Ajax ref Form */

    /* ref store */

    public function storeRef(Request $request) {
        $validation = Validator::make($request->all(), [
            'contentcv_ref_name' => ['required', 'string'],
            'contentcv_ref_contact' => ['required', 'email']
        ])->validate();

        $cv_id = session()->get('cv_id');

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            if($cv->ref == null) {
                $cv_array[] = $request->except('_token');
            }
            else {
                $cv_array = json_decode($cv->ref, JSON_UNESCAPED_SLASHES);

                $cv_array[] = $request->except('_token');
            }

            $cv->ref = $cv_array;

            if($cv->save()) {
                return response()->json(['success' => 'Reference Save'], 200);
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'ref__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'ref__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'ref__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'ref__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'ref__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'ref__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }
        }
    }

    /* Ref update */

    public function updateRef(Request $request, $id) {
        $validation = Validator::make($request->all(), [
            'contentcv_ref_name' => ['required', 'string'],
            'contentcv_ref_contact' => ['required', 'email']
        ])->validate();

        $cv_id = session()->get('cv_id');

        $ref_edit = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->ref, JSON_UNESCAPED_SLASHES);

            $cv_array[$ref_edit] = $request->except('_token');

            $cv->ref = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json([
                        'success' => 'Référence modifiée',
                        'Title' => $cv_array[$ref_edit],
                    ], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json([
                        'success' => 'Reference updated',
                        'Title' => $cv_array[$ref_edit],
                    ], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json([
                        'success' => 'Referencia actualizada',
                        'Title' => $cv_array[$ref_edit],
                    ], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'ref__form-error' => 'Vos informations n\'ont pas été sauvegardé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'ref__form-error' => 'Your information wasn\'t backed up!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'ref__form-error' => '¡Tu información no estaba respaldada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'ref__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'ref__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'ref__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }  
        }
    }

    /* Ref delete */
    
    public function deleteRef(Request $request, $id) {
        $cv_id = session()->get('cv_id');

        $ref_id = (int)$id;

        $cv_exist = Cv::where('id', $cv_id)->count();

        if($cv_exist != 0) {
            $cv = Cv::where('id', $cv_id)->first();

            $cv_array = json_decode($cv->ref, JSON_UNESCAPED_SLASHES);

            unset($cv_array[$ref_id]);

            $cv->ref = $cv_array;

            if($cv->update()) {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['success' => 'Référence supprimée'], 200);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['success' => 'Reference deleted'], 200);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['success' => 'Referencia eliminado'], 200);
                }
            }
            else {
                if(LaravelLocalization::getCurrentLocale() == "fr") {
                    return response()->json(['errors' => [
                        'ref__form-error' => 'Vos informations n\'ont pas été supprimé !',
                    ]], 500);
                }
                else if(LaravelLocalization::getCurrentLocale() == "en") {
                    return response()->json(['errors' => [
                        'ref__form-error' => 'Your informations hasn\'t been deleted!',
                    ]], 500);
                }
                else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return response()->json(['errors' => [
                        'ref__form-error' => '¡Tu información no ha sido borrada!',
                    ]], 500);
                }
            }
        }
        else {
            if(LaravelLocalization::getCurrentLocale() == "fr") {
                return response()->json(['errors' => [
                    'ref__form-error' => 'Votre CV n\'existe pas ! Remplissez l\'étape 1 !',
                ]], 500);
            }
            else if(LaravelLocalization::getCurrentLocale() == "en") {
                return response()->json(['errors' => [
                    'ref__form-error' => 'Your resume doesn\'t exist! Fill out step one!',
                ]], 500);
            }
            else if (LaravelLocalization::getCurrentLocale() == "es") {
                return response()->json(['errors' => [
                    'ref__form-error' => '¡Tu currículum no existe! Rellena el primer paso.',
                ]], 500);
            }
        }
    }

    public function colorChosen(Request $request) {
        $request->session()->put('cvColor', $request['color'], 86400);
    }

}
