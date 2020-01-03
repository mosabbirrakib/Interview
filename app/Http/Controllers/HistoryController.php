<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;
use Bulkly\User;
use Illuminate\Support\Facades\Auth;
use DB;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = User::find(Auth::id());
        $data['posts'] = DB::table('buffer_postings')
                        ->join('social_accounts', 'social_accounts.id', '=', 'buffer_postings.account_id')
                        ->join('social_post_groups', 'social_post_groups.id','=','buffer_postings.group_id')
                        ->select('buffer_postings.*','social_accounts.name','social_accounts.type', 'social_accounts.avatar','social_post_groups.name as group_name','social_post_groups.type as group_type','social_post_groups.id as group_id')
                        ->paginate(10);
        return view ('admin.history', $data);
    }

    public function search(Request $request){
        $search = $request->search;
        $date = $request->date;
        $group = $request->group;
        $posts = DB::table('buffer_postings')
                ->join('social_accounts', 'social_accounts.id', '=', 'buffer_postings.account_id')
                ->join('social_post_groups', 'social_post_groups.id','=','buffer_postings.group_id')
                ->select('buffer_postings.*','social_accounts.name','social_accounts.type', 'social_accounts.avatar','social_post_groups.name as group_name','social_post_groups.type as group_type','social_post_groups.id as group_id')
                ->orWhere('buffer_postings.post_text', 'LIKE', '%{$search}%')
                ->orWhere('buffer_postings.created_at', $date)
                ->orWhere('buffer_postings.group_id', $group)
                ->paginate(10);
        return $posts;
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
    public function destroy($id)
    {
        //
    }
}
