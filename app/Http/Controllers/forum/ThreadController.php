<?php

namespace shop\Http\Controllers\forum;

use shop\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use shop\ForumCategory;
use shop\ForumThread;

class ThreadController extends Controller
{

    public function index()
    {
        //
    }

    public function create($id)
    {
        $this->authorize('create', ForumThread::class);

        $forum = ForumCategory::findOrFail($id);
        return view('shop.forum.thread.create', compact('forum'));

    }

    public function store(Request $request, $id)
    {
        $this->authorize('store', ForumThread::class);

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        $forum = ForumCategory::findOrFail($id);
        $user = Auth::user();
        
        $thread = new ForumThread([
            'user_id' => Auth::id(),
            'forum_id' => $forum->id,
            'name' => $request->title,
            'content' => $request->content
        ]);

        try {
            $thread->save();
            return redirect()->route('forum.thread.show', $thread->id);
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function show($id)
    {
        $this->authorize('show', ForumThread::class);

        $thread = ForumThread::select('forum_threads.*', 'users.id as user_id', 'users.name as user_name')
                ->leftJoin('users', 'users.id', '=', 'forum_threads.user_id')
                ->where('forum_threads.id', '=', $id)
                ->firstOrFail();

        return view('shop.forum.thread.view', compact('thread'));
    }

    public function edit($id)
    {
        $thread = ForumThread::findOrFail($id);
        $this->authorize('edit', $thread);

        return view('shop.forum.thread.edit', compact('thread'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        $thread = ForumThread::findOrFail($id);

        $this->authorize('update', $thread);

        $thread->name = $request->title;
        $thread->content = $request->content;

        try {
            $thread->save();
            return redirect()->route('forum.thread.show', $thread->id)->with('success', __('forum.thread.success.update'));
        } catch (Exception $ex) {
            return abort(500);
        }

    }

    public function destroy($id)
    {
        $thread = ForumThread::findOrFail($id);
        $this->authorize('destroy', $thread);

        $forum_id = $thread->forum_id;

        try {
            $thread->delete();
            return redirect()->route('forum.show', $forum_id)->with('success', __('forum.thread.success.delete'));
        } catch (\Exception $ex) {
            return (500);
        }

    }

}
