<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\MilkController;
use App\Mail\ContactForm;
use App\Mail\MilkForm;
use App\Mail\ThankYouContact;
use App\Mail\ThankYouMilk;
use App\Milk;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Page;
use App\Review;
use Illuminate\Support\Facades\Mail;
use App\Contact;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
//        $data['sidebar'] = Page::where('parent_id',$page->parent_id)->get();
        return view('page', $data);
    }

    public function register(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
        return view('auth.register',$data);
    }
    public function galleries(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
        $data['galleries']=\App\Gallery::all();
        $data['videos']=\App\Video::all();
        return view('gallery',$data);
    }
    public function reviews(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
        $data['reviews']=\App\Review::where('status',1)->get();
        return view('review',$data);
    }
    public function reviewstore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'name' => 'required',
            'email' => 'required',
            'reviews'=> 'required|min:15|max:300',

        ]);

        $review = new Review();
        $review->title = $request->title;
        $review->name = $request->name;
        $review->email= $request->email;
        $review->details= $request->reviews;
        $review->status=0;
        $review->save();

        if ($request->hasFile('image')) {
            $image_name = 'review-'.$review->id . '.'.$request->image->extension();
            $path = $request->image->move('uploads/reviews/', $image_name);
            $review->image = $image_name;
            $review->save();
        }


        return redirect('review')->with('success','Your reviews has been sent and will be posted after approval');
    }
    public function milksubs(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'image' => 'mimes:jpg,png,jpeg',
                'name'=>'required|min:3',
                'email'=>'required',
                'subscription_type'=>'required',
                'quantity'=>'required|min:1',
                'options'=>'required',

                'captcha' => 'required',
            ]);
            if (\Session::get('rand_pass') <> $request->captcha) {
                return redirect()->back()->withErrors(['captcha' => 'Invalid Cpatcha'])->withInput();
            }

            $milk = Milk::where('email', $request->email)->first();
            if (!$milk) {
                $milk= new Milk();
                $milk->name=$request->name;
                $milk->email=$request->email;
                $milk->phone=$request->phone;
                $milk->subscription_type=$request->subscription_type;
                $milk->quantity=$request->quantity;
                $milk->status=0;
                $milk->district=$request->district;
                $milk->address=$request->address;
                $milk->options=$request->options;
                $milk->save();

                if ($request->hasFile('image')) {
                    $image_name = str_slug($request->name) . '-' . $milk->id . '.' . $request->image->extension();
                    $path = $request->image->move('uploads/milk/', $image_name);
                    $milk->image = $image_name;
                    $milk->save();
                }

                Mail::send(new MilkForm($request));
                Mail::send(new ThankYouMilk($request));


                return redirect()->route('thankyou');
            } else {
                return redirect()->back()->withErrors(['email' => 'Milk Subscription request already sent from this email.']);
            }
        }
        $data['page'] = $page = Page::where('slug', $request->path())->first();
        return view('milk', $data);
    }
    public function thankyou()
    {
        return view('thankyou');
    }
    public function card($id)
    {
        $milk= Milk::find(decrypt($id));
        $view = view('admin.milk.pdfview', compact('milk'));
        // return $view;

        $dompdf = new dompdf();
        $dompdf->loadHtml("$view");
        $dompdf->render();
        $dompdf->stream($milk->id . ".pdf", array("Attachment" => false));
    }
    public function contact(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
                'captcha' => 'required',
            ]);
            if (\Session::get('rand_pass') <> $request->captcha) {
                return redirect()->back()->withErrors(['captcha' => 'Invalid Captcha'])->withInput();
            }

            $contact = Contact::where('email', $request->email)->first();
            if (!$contact) {
                $contact = new Contact();
                $contact->email = $request->email;
                $contact->name = $request->name;
                $contact->phone=$request->phone;
                $contact->message = $request->message;
                $contact->save();
            }


            Mail::send(new ContactForm($request));
            Mail::send(new ThankYouContact($request));
            return redirect()->route('thankyoucontact');
        }
        $data['page'] = $page = Page::where('slug', $request->path())->first();
        return view('contact',$data);
    }
    public function thankyoucontact()
    {
        return view('thankyoucontact');
    }
}
