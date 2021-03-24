<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Calendar;

use App\Exports\JobsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

      $jobs = [];

      $user = Auth::user();
      // dd($user);

      // dd($user->hasRole('admin'));
      if ($user->hasRole('admin')){
        $data = Job::all();
        // dd($data);
      }
      else {
        $initials = $user->initials;
        $data = Job::where('site_engineers', 'LIKE', '%'.$initials.'%')->get();
        // dd($data);
      }
      if ($data->count()){

        foreach ($data as $key => $value){

          $jobs[] = Calendar::event(

            $value->job_name,
                   true,
                   new \DateTime($value->start_date),
                   new \DateTime($value->finish_date.' +1 day'),
                   null,
                   // Add color and link on event
                 [
                     'color' => '#f05050',
                     'url' => route('jobs.edit', $value->id),
                 ]
               );



        }

      }

      // return view('jobs.index', compact('jobs'));

      $calendar = Calendar::addEvents($jobs);
      return view('jobs.index', compact('calendar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Job::create($request->all());
      return redirect()->route('jobs.index')->with('success', 'Job Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);

        return view('jobs.edit')->with('job', $job);
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
        $job = Job::find($id);
        $job->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job Deleted');

    }
}
