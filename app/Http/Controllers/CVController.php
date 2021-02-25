<?php

namespace App\Http\Controllers;

use PDF;
use Image;
use App\Cv;
use App\User;
use App\cvDesign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CVController extends Controller
{
    public function makingMyCv()
    {
        $cv_id = session()->get('cv_id');

        $cv = Cv::where('id', $cv_id)->first();

        if ($cv != null) {
            $cv_basics = json_decode($cv->basics);

            if ($cv_basics !== null) {
                $cv_basics = session()->get('cv_basics');
            }
        } else {
            $cv_basics = null;
        }

        return view('making-my-cv', compact(
            'cv',
            'cv_basics'
        ));
    }

    public function handleBasics(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'cvphoto' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:3000'],
            'makingcv_name' => ['required', 'string', 'max: 128'],
            'makingcv_poste' => ['required', 'string', 'max: 191'],
            'makingcv_phone' => ['required', 'string', 'max: 191'],
            'makingcv_email' => ['required', 'string', 'email', 'max: 191'],
            'makingcv_address' => ['required', 'string'],
            'makingcv_zipcode' => ['required', 'string', 'regex:/^[0-9]+$/', 'max: 10'],
            'makingcv_city' => ['required', 'string', 'max: 191'],
            'makingcv_birthdate' => ['nullable', 'date', 'max: 10'],
            'makingcv_birthcity' => ['nullable', 'string', 'max: 191'],
            'makingcv_drivinglicenses' => ['nullable', 'string', 'max: 191'],
            'makingcv_sexe' => ['nullable', 'string'],
            'makingcv_national' => ['nullable', 'string', 'max: 191'],
            'makingcv_civilstate' => ['nullable', 'string', 'max: 191'],
            'makingcv_linkedin' => ['nullable', 'url'],
            'makingcv_website' => ['nullable', 'url'],
        ])->validate();

        $cv_id = session()->get('cv_id');

        if ($cv_id == null) {
            $cv = null;
        } else {
            $cv = Cv::find($cv_id);
        }

        if($request->hasfile('cvphoto')) {
            $originalImage = $request->file('cvphoto');
            $image = Image::make($request->file('cvphoto'));
            $originalPath = public_path().'/cvphoto/';
            $image->fit(400);
            $image->save($originalPath.time().$originalImage->getClientOriginalName());
            $link_cvphoto = time().$originalImage->getClientOriginalName();
        }

        if(isset($cv)) {
            if($cv->cvphoto != null && isset($link_cvphoto)) {
                unlink(public_path().'/cvphoto/'.$cv->cvphoto);
            }
        }

        $json_basics = json_encode($request->except('_token', 'cvphoto'));

        if ($cv == null) {
            $cv = new Cv;

            $cv->basics = $json_basics;

            if(isset($link_cvphoto)) {
                $cv->cvphoto = $link_cvphoto;
            }

            if ($cv->save()) {
                $cv_id = session()->put('cv_id', $cv->id, 86400);
                session()->put('cv_basics', json_decode($cv->basics), 86400);
                return redirect()->to('select-design');
            } else {
                if (LaravelLocalization::getCurrentLocale() == "fr") {
                    return redirect()->back()->with('error', 'Vos informations n\'ont pas été sauvegardés !');
                } else if (LaravelLocalization::getCurrentLocale() == "en") {
                    return redirect()->back()->with('error', 'Your informations wasn\'t backed up!');
                } else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return redirect()->back()->with('error', '¡Tu información no estaba respaldada!');
                }
            }
        } else {
            $cv->basics = $json_basics;

            if(isset($link_cvphoto)) {
                $cv->cvphoto = $link_cvphoto;
            }

            if ($cv->update()) {
                $cv_id = session()->put('cv_id', $cv->id, 86400);
                session()->put('cv_basics', json_decode($cv->basics), 86400);
                return redirect()->to('select-design');
            } else {
                if (LaravelLocalization::getCurrentLocale() == "fr") {
                    return redirect()->back()->with('error', 'Vos informations n\'ont pas été sauvegardés !');
                } else if (LaravelLocalization::getCurrentLocale() == "en") {
                    return redirect()->back()->with('error', 'Your informations wasn\'t backed up!');
                } else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return redirect()->back()->with('error', '¡Tu información no estaba respaldada!');
                }
            }
        }
    }

    public function selectDesign()
    {
        $designs = cvDesign::get();

        return view(
            'select-cv',
            compact(
                'designs',
            )
        );
    }

    public function selectedDesignPost(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'designCv' => ['required', 'numeric'],
        ])->validate();

        $designArray = array();

        switch ($request['designCv']) {
            case 1:
                $designArray = [
                    "id" => 1,
                    "name" => "barkley",
                ];
                session()->put('selectedDesign', $designArray, 86400);
                break;
            case 2:
                $designArray = [
                    "id" => 2,
                    "name" => "priceton",
                ];
                session()->put('selectedDesign', $designArray, 86400);
                break;
            case 3:
                $designArray = [
                    "id" => 3,
                    "name" => "stanford",
                ];
                session()->put('selectedDesign', $designArray, 86400);
                break;
            case 7:
                $designArray = [
                    "id" => 7,
                    "name" => "julien",
                ];
                session()->put('selectedDesign', $designArray, 86400);
                break;
            case 8:
                $designArray = [
                    "id" => 8,
                    "name" => "chloé",
                ];
                session()->put('selectedDesign', $designArray, 86400);
                break;
            case 9:
                $designArray = [
                    "id" => 9,
                    "name" => "birmingham",
                ];
                session()->put('selectedDesign', $designArray, 86400);
                break;
        }

        return redirect()->to('content-cv');
    }

    public function indexContentCV()
    {
        $cv_id = session()->get('cv_id');

        $cv = Cv::where('id', $cv_id)->first();

        $cv_basics = json_decode($cv->basics);

        $cv_xps = json_decode($cv->experience);

        $cv_educs = json_decode($cv->education);

        $cv_comps = json_decode($cv->competences);

        $cv_hobbies = json_decode($cv->loisirs);

        $cv_langs = json_decode($cv->langues);

        $cv_refs = json_decode($cv->ref);

        $cv_photo = json_decode($cv->cvphoto);

        $selected_design = session()->get('selectedDesign');

        return view(
            'content-cv',
            compact(
                'cv',
                'cv_basics',
                'cv_xps',
                'cv_educs',
                'cv_comps',
                'cv_hobbies',
                'cv_langs',
                'cv_refs',
                'cv_photo',
                'selected_design'
            )
        );
    }

    public function Payment() {
        return view(
            'payment'
        );
    }

    public function handlePayment(Request $request) {
        $paymentMethod = $request['stripePaymentMethod'];

        try {
            $stripeCharge = (new User)->charge(100, $paymentMethod);
            session()->put('paymentDone', 1, 300);
            return redirect()->route('payment-done');

        } catch (IncompletePayment $exception) {
            session()->put('paymentDone', "3DSecure", 300);
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('payment-done')]
            );
        }
    }

    public function donePayment(Request $request) {
        $paymentDone = session()->get('paymentDone');

        if($paymentDone == 1) {
            return view(
                'payment-done'
            );
        }
        else if($paymentDone == "3DSecure") {
            if($request->success == "true") {
                session()->put('3DSuccess', 1, 300);    
                return view(
                    'payment-done'
                );
            }
            else {
                session()->put('3DSuccess', 0, 300);  
                if (LaravelLocalization::getCurrentLocale() == "fr") {
                    return redirect()->route('payment')->with('error', 'Votre paiement a echoué !');
                } else if (LaravelLocalization::getCurrentLocale() == "en") {
                    return redirect()->route('payment')->with('error', 'Your payment has failed!');
                } else if (LaravelLocalization::getCurrentLocale() == "es") {
                    return redirect()->route('payment')->with('error', '¡Su pago ha fallado!');
                }
            }
        }
        else {
            if (LaravelLocalization::getCurrentLocale() == "fr") {
                return redirect()->route('payment')->with('error', 'Votre paiement a echoué !');
            } else if (LaravelLocalization::getCurrentLocale() == "en") {
                return redirect()->route('payment')->with('error', 'Your payment has failed!');
            } else if (LaravelLocalization::getCurrentLocale() == "es") {
                return redirect()->route('payment')->with('error', '¡Su pago ha fallado!');
            }
        }
    }

    public function PDF()
    {
        $selected_design = session()->get('selectedDesign');

        $template = $selected_design['name'];

        $cv_id = session()->get('cv_id');

        $cv = Cv::where('id', $cv_id)->first();

        $cv_basics = json_decode($cv->basics);

        $cv_xps = json_decode($cv->experience);

        $cv_educs = json_decode($cv->education);

        $cv_comps = json_decode($cv->competences);

        $cv_hobbies = json_decode($cv->loisirs);

        $cv_langs = json_decode($cv->langues);

        $cv_refs = json_decode($cv->ref);

        $cv_color = session()->get('cvColor');

        return view(
            'pdf.' .$template,
            compact(
                'cv',
                'cv_basics',
                'cv_xps',
                'cv_educs',
                'cv_comps',
                'cv_hobbies',
                'cv_langs',
                'cv_refs',
                'cv_color'
            )
        );
    }

    public function downloadPDF() {

        $paymentDone = session()->get('paymentDone');

        $success3DSecure  = session()->get('3DSuccess');

        if($paymentDone == 1 || $success3DSecure == 1) {

            session()->put('paymentDone', 0, 300);

            session()->put('3DSuccess', 0, 300);

            $selected_design = session()->get('selectedDesign');

            $template = $selected_design['name'];
    
            $cv_id = session()->get('cv_id');
    
            $cv = Cv::where('id', $cv_id)->first();
    
            $cv_basics = json_decode($cv->basics);
    
            $cv_xps = json_decode($cv->experience);
    
            $cv_educs = json_decode($cv->education);
    
            $cv_comps = json_decode($cv->competences);
    
            $cv_hobbies = json_decode($cv->loisirs);
    
            $cv_langs = json_decode($cv->langues);
    
            $cv_refs = json_decode($cv->ref);
    
            $cv_color = session()->get('cvColor');

            $pdf = PDF::loadView('pdf.'.$template, compact(
                'cv',
                'cv_basics',
                'cv_xps',
                'cv_educs',
                'cv_comps',
                'cv_hobbies',
                'cv_langs',
                'cv_refs',
                'cv_color'
            ))
            ->setOption('margin-bottom', '0mm')
            ->setOption('margin-top', '0mm')
            ->setOption('margin-right', '0mm')
            ->setOption('margin-left', '0mm');

            return $pdf->download($template.'.pdf');
        }
        else {
            if (LaravelLocalization::getCurrentLocale() == "fr") {
                return redirect()->route('payment')->with('error', 'Votre paiement a echoué !');
            } else if (LaravelLocalization::getCurrentLocale() == "en") {
                return redirect()->route('payment')->with('error', 'Your payment has failed!');
            } else if (LaravelLocalization::getCurrentLocale() == "es") {
                return redirect()->route('payment')->with('error', '¡Su pago ha fallado!');
            }
        }
    }
}
