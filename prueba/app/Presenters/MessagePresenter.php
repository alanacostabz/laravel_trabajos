<?php

namespace App\Presenters;

use App\Message;
use Illuminate\Support\HtmlString;

class MessagePresenter extends Presenter
{
  // protected $message;

  // public function __construct(Message $message)
  // {
  //   $this->message = $message;
  // }

  public function userName()
  {
    if ($this->model->user_id) {
      return $this->userLink();
    }

    return $this->model->name;
  }


  public function userEmail()
  {
    if ($this->model->user_id) {
      return $this->model->user->email;
    }

    return $this->model->email;
  }

  public function link()
  {
    return new HtmlString("<a href='" .
      route('messages.show', $this->model->id) .
      "'>{$this->model->mensaje}</a>");
  }

  public function userLink()
  {
    // return "<a href='" .
    //   route('users.show', $this->model->user->id) .
    //   "'>{$this->model->user->name}</a>";
    return $this->model->user->present()->link();
  }

  public function tags()
  {
    return $this->model->tags->pluck('name')->implode(', ');
  }

  public function notes()
  {
    return $this->model->note ? $this->model->note->body : '';
  }
}
