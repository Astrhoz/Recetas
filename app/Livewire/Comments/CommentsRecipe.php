<?php

namespace App\Livewire\Comments;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsRecipe extends Component
{
    public $recipeId;
    public $comments;
    public $newComment;
    public $editingCommentId = null;
    public $editingCommentContent;

    protected $rules = [
        'newComment' => 'required|max:500',
        'editingCommentContent' => 'required|max:500',
    ];

    public function mount($recipeId)
    {
        $this->recipeId = $recipeId;
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = Comment::where('recipe_id', $this->recipeId)
                                  ->with('users')
                                  ->latest()
                                  ->get();
    }

    public function addComment()
    {
        $this->validateOnly('newComment');

        Comment::create([
            'recipe_id' => $this->recipeId,
            'user_id' => Auth::id(),
            'content' => $this->newComment,
        ]);

        $this->newComment = '';
        $this->loadComments();
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::where('id', $commentId)
                          ->where('user_id', Auth::id())
                          ->first();

        if ($comment) {
            $comment->delete();
        }

        $this->loadComments();
    }

    public function startEditing($commentId)
    {
        $this->editingCommentId = $commentId;
        $this->editingCommentContent = Comment::find($commentId)->content;
    }

    public function cancelEditing()
    {
        $this->editingCommentId = null;
        $this->editingCommentContent = '';
    }

    public function updateComment()
    {
        $this->validateOnly('editingCommentContent');

        $comment = Comment::find($this->editingCommentId);

        if ($comment && $comment->user_id == Auth::id()) {
            $comment->update(['content' => $this->editingCommentContent]);
        }

        $this->editingCommentId = null;
        $this->editingCommentContent = '';
        $this->loadComments();
    }

    public function render()
    {
        return view('livewire.comments.comments-recipe');
    }
}
