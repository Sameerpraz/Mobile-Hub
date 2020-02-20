<?php

namespace App\Http\Controllers\Admin;

use App\Mail\PdfLink;
use App\Milk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Mail;


class MilkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $milks = Milk::all();
        return view('admin.milk.index', compact('milks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Milk $milk)
    {
        return view('admin.milk.milksubs-details', compact('milk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Milk $milk)
    {
        if ($milk && $milk->delete()) {
            return redirect()->route('milks.index')->with('success', 'Milk Subscription Deleted');
        } else {
            return redirect()->route('milks.index')->with('error', 'Error while deleting the data.');
        }
    }
    public function pdf(Milk $milk)
    {
        $view = view('admin.milk.pdfview', compact('milk'));
        // return $view;
        $dompdf = new dompdf();
        $dompdf->loadHtml("$view");
        $dompdf->render();
        $dompdf->stream($milk->id . ".pdf", array("Attachment" => false));
    }

    public function decline($id)
    {
        $data = array(
            'status' => -1,
        );
        if(Milk::where('id',$id)->update($data))
        {
            return redirect()->route('milks.index')->with('success','Milk Subscription was declined');
        }
    }

    public function approve($id)
    {
        $milk = Milk::find(decrypt($id));

        $data = array(
            'status' => 1,
        );

        if(Milk::where('id',$milk->id)->update($data))
        {
            Mail::send(new PdfLink($milk, $id));
            return redirect()->route('milks.index')->with('success','Milk Subscription Request was approved');
        }
    }
}
