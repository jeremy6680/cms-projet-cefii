<?php

class CommentController extends BaseController
{

    /* get functions */
    public function listComment()
    {
        $comments = Comment::orderBy('id', 'desc')->paginate(20);
        $this->layout->title = 'Liste des commentaires';
        $this->layout->main = View::make('dash')->nest('content', 'comments.list', compact('comments'));
		
        /* BUG LORSQUE CE CODE EST ACTIVE (Trying to get property of non-object (View: /Users/jeremymarchandeau/Sites/projet-cms/app/views/comments/list.blade.php) ) */
    	/*$sortby = Input::get('sortby'); 
	    $order = Input::get('order');
	 
	    if ($sortby && $order) {
	        $comments = Comment::orderBy($sortby, $order)->get();
	    } else {
	        $comments = Comment::orderBy('commenter', 'DESC')->get();
	    }
	 
	 	$this->layout->title = 'Liste des commentaires';
		$this->layout->main = View::make('dash')->nest('content','comments.list',compact('comments', 'sortby', 'order'));*/
    }

    public function newComment(Post $post)
    {
        $comment = [
            'commenter' => Input::get('commenter'),
            'email' => Input::get('email'),
            'comment' => Input::get('comment'),
        ];
        $rules = [
            'commenter' => 'required',
            'email' => 'required | email',
            'comment' => 'required',
        ];
        $valid = Validator::make($comment, $rules);
        if ($valid->passes()) {
            $comment = new Comment($comment);
            $comment->approved = 'no';
            $post->comments()->save($comment);
            /* redirect back to the form portion of the page */
            return Redirect::to(URL::previous() . '#reply')
                ->with('success', "Le commentaire a été soumis et attend d'être validé !");
        } else {
            return Redirect::to(URL::previous() . '#reply')->withErrors($valid)->withInput();
        }
    }

    public function showComment(Comment $comment)
    {
        if (Request::ajax()) 
            return View::make('comments.show', compact('comment'));
        // handle non-ajax calls here
        //else{}
    }

    public function deleteComment(Comment $comment)
    {
        $post = $comment->post;
        $status = $comment->approved;
        $comment->delete();
        ($status === 'yes') ? $post->decrement('comment_count') : '';
        /*return Redirect::back()->with('success', 'Commentaire suprimé !');*/
		return Redirect::back()->withMessage("Le commentaire a été supprimé");
    }

    /* post functions */

    public function updateComment(Comment $comment)
    {
        $comment->approved = Input::get('status');
        $comment->save();
        $comment->post->comment_count = Comment::where('post_id', '=', $comment->post->id)
            ->where('approved', '=', 1)->count();
        $comment->post->save();
        return Redirect::back()->withMessage('Commentaire ' . (($comment->approved === 'yes') ? 'approuvé' : 'refusé'));
    }

}