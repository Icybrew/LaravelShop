<?php

namespace shop\Http\Controllers\forum;

use shop\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use shop\ForumCategory;
use shop\ForumThread;

class ForumController extends Controller
{

    public function index() {
        $forums = ForumCategory::select('forum_categories.*', DB::raw("count(forum_threads.id) as threads"))
                ->leftJoin('forum_threads', 'forum_threads.forum_id', '=', 'forum_categories.id')
                ->groupBy('forum_categories.id')
                ->orderBy('forum_categories.id')
                ->get();
        return view('shop.forum.index', compact('forums'));
    }

    public function show($id) {
        $forum = ForumCategory::findOrFail($id);
        
        $threads = ForumThread::select('forum_categories.id as forum_id', 'forum_categories.name as forum', 'forum_threads.*', 'users.id as user_id', 'users.name as user_name')
                ->leftJoin('forum_categories', 'forum_categories.id', '=', 'forum_threads.forum_id')
                ->leftJoin('users', 'users.id', '=', 'forum_threads.user_id')
                ->where('forum_id', $id)
                ->paginate(9);
        
        return view('shop.forum.forum', compact('forum', 'threads'));
    }

}
