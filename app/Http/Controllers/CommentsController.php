<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Comment;

class CommentsController extends Controller
{
    private function getData()
    {
        return Comment::where('moderated', true)->orderBy('created_at', 'desc')->paginate(10);
    }

    public function show(CommentRequest $r)
    {
        if ($r->isMethod('POST')) {
            try {
                $newComment = new Comment;
                $newComment->name = $r->name;
                $newComment->email = $r->email;
                $newComment->comment = $r->comment;

                $newComment->save();

                $vars['statusMessage'] = '<div class="alert alert-success"><strong>Comment added successfully and will be moderated!</strong></div>';
            } catch (Exception $e) {
                $vars['statusMessage'] = '<div class="alert alert-danger"><strong>Error! Something went wrong!</strong>' . $e . '</div>';
            }
        }

        $vars['comments'] = $this->getData();

        return view('comments', $vars);
    }
}
