<?php
/**
 * Created by PhpStorm.
 * User: mammut
 * Date: 20.01.16
 * Time: 17:57
 */

namespace App\Http\Controllers;


use App\Archive;
use App\Collcontact;
use App\Confabstract;
use App\Confcommittee;
use App\Confdescription;
use App\Confinfo;
use App\Index;
use App\User;
use App\Сategory;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller
{

    public function index()
    {
        $text=Index::find('1');
        $categoryes=Сategory::where('place', '!=', '0')->orderBy('place')->get();

        return view('public.index', [ 'page'=>'index', 'text'=>$text, 'categoryes'=>$categoryes ]);
    }

    public function archive()
    {
        $archives=Archive::orderBy('place')->get();

        return view('public.archive', ['archives'=>$archives]);
    }

    public function contact()
    {
        $user = null;
        if (!Sentinel::guest()) {
            if (Sentinel::inRole('user')) {
                $user = Sentinel::check();
                $user = User::where('id', '=', $user->id)->first();
            }
        }

        return view('public.contact', ['user' => $user]);
    }

    public function confInfo()
    {
        $infos=Confinfo::orderBy('place')->get();

        return view('public.conference.info', ['infos'=>$infos ]);
    }

    public function confThesis()
    {
        $thesis = Confabstract::find('1');
        return view('public.conference.thesis', ['thesis'=>$thesis ]);
    }

    public function confPlace()
    {
        $places = Confdescription::get();
        return view('public.conference.place', ['places'=>$places ]);
    }

    public function confCommittee()
    {
        $commitets = Confcommittee::orderBy('place')->get();

        return view('public.conference.committee', ['commitets' => $commitets]);
    }

    public
    function contactpost(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required',
            'phone' => 'required',
            'text'  => 'required',
        ]);
        $mail        = new Collcontact();
        $mail->name  = $request->name;
        $mail->email = $request->email;
        $mail->phone = $request->phone;
        $mail->text  = $request->text;
        $mail->save();
        Mail::send('mail.contact', compact('request'), function ($message) use ($request) {
            $message->from('mail@space-conf.ikd.kiev.ua', 'Лист з сайту');
            $message->to('ukrainianspaceconf@gmail.com', $request->name)->subject($request->email);
        });
        return Redirect::to('contact')
            ->withSuccess(trans('master.error.send'));
    }
}