<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Support\Facades\Gate;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view( 'member.index',[
            'members' => Member::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        // dd($request->all());

        // Gate::authorize('create', Member::class);

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'address' => 'required|string',
            'email' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        Member::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('members.index')->with('success', 'Member created successfully!');
            // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view("member.update", [
            "member"=> Member::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'address' => 'required|string',
            'email' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        $member = Member::findOrFail($id);

        $member->update([
            "name"=> $request->name,
            "address"=> $request->address,
            "email"=> $request->email,
            "phone_number"=> $request->phone_number,
        ]);
        
        return redirect()->route('members.index')->with('success', 'Member updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);

        $member->delete();

        return redirect()->route('members.index')->with('success', 'Deleted successfully!');

    }
}
