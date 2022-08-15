<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $pagination = $request->pagination ?? 10;

        $data = Report::paginate(intval($pagination));

        return view('table-report',compact('data'));
    }

    public function charts () {

        $total = Report::all()->count();
        $noGender = Report::where('gender','')->count();
        $noLastName = Report::where('last_name','')->count();
        $email_array = Report::select('email')->get()->toArray();
        $validEmail = array_filter($email_array, function ($s) { return filter_var($s['email'], FILTER_VALIDATE_EMAIL); });
        $invalidEmail = $total - count($validEmail);

        $data = [
            "total" => $total,
            "noGender" => $noGender,
            "noLastName" => $noLastName,
            "invalidEmail" => $invalidEmail
        ];

        return view('charts',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            #'fileToUpload' => 'required|mimes:csv|max:2048'
            'fileToUpload' => 'required|max:2048'

        ]);

        try {

        $uploadedFile = $request->file('fileToUpload');

        $filename = $uploadedFile->getClientOriginalName();

            Storage::disk('local')->putFileAs(
                'csv_files/',
                $uploadedFile,
                $filename
              );

        } catch (\RunTimeException $e) {

            return back()
            ->with('error','File has NOT been uploaded: '.$e->getMessage());

        }

        $contents = Storage::get('csv_files/'.$filename);

        $file = fopen((storage_path().'/app/csv_files/customers.csv'), "r");
        $all_data = array();



        while ( ($data = fgetcsv($file, 1000, ",")) !==FALSE )
           {
                try {

                        \DB::table('reports')->insert([

                            "id" => $data[0] ?? null,
                            "first_name"  => $data[1] ?? null,
                            "last_name" => $data[2] ?? '',
                            "email" => $data[3] ?? null,
                            "gender" => $data[4] ?? '',
                            "ip_address" => $data[5] ?? null,
                            "company" => $data[6] ?? null,
                            "city" => $data[7] ?? null,
                            "title" => $data[8] ?? null,
                            "website" =>  strlen($data[9]) > 60000 ? 'null' : $data[9],

                        ]);


                } catch (\Throwable $th) {
                    continue;
                }

           }
         fclose($file);

         return back()
         ->with('success','Report has been uploaded OK.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
