<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;

use Blooddivision\Http\Requests;
use Blooddivision\User;
use Blooddivision\Forum;
use Blooddivision\Thread;
use Blooddivision\Post;

class ForumController extends Controller
{
    /**
     * instance properties
     */
    protected $user;
    protected $forum;
    protected $thread;
    protected $post;

    public function __construct(User $user, Forum $forum, Thread $thread, Post $post)
    {
        $this->user = $user;
        $this->forum = $forum;
        $this->thread = $thread;
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.forum.forum');
    }

    public function filter($category)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createThread()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeThread(Request\CreateThreadRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        if(!$data)
            abort(422);

        if ($data) {
            $this->thread->create($data);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
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
