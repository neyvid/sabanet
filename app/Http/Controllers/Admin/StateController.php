<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateCreate;
use App\Models\State;
use App\Repositories\StateRepository\StateRepository;
use Illuminate\Http\Request;

class StateController extends Controller
{
    protected $stateRepository;

    public function __construct()
    {
        $this->stateRepository=new StateRepository();
    }
    public function index()
    {
        return view('admin.state.index');
    }

    public function create()
    {
        return view('admin.state.create');

    }


    public function store(StateCreate $request)
    {
        $stateName=$request->input('name');
        $stateCreate=$this->stateRepository->create([
            'name'=>$stateName
        ]);
        if($stateCreate && $stateCreate instanceof State){
            return redirect()->back()->with('success','استان مورد نظر شما با موفقیت ثبت گردید');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }
}
