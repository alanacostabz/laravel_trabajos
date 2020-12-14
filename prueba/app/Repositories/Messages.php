<?php


namespace App\Repositories;

use App\Message;
use Illuminate\Support\Facades\Cache;

class Messages implements MessagesInterface
{
  public function getPaginated()
  {
    $key = "messages.page." . request('page', 1);

    // cuando se usa redis, para no tener que borrar todo con el flush
    // $messages = Cache::tags('messages')->rememberForever($key, function () {
    // return Cache::rememberForever($key, function () {
    //   return Message::with(['user', 'note', 'tags'])
    //     ->orderBy('created_at', request('sorted', 'DESC'))
    //     ->paginate(10);
    // });

    return Message::with(['user', 'note', 'tags'])
      ->orderBy('created_at', request('sorted', 'DESC'))
      ->paginate(10);
  }

  public function store($request)
  {
    $message = Message::create($request->all());

    if (auth()->check()) {
      auth()->user()->messages()->save($message);
    }

    //Cache::flush();

    return $message;
  }

  public function findById($id)
  {
    // return Cache::rememberForever("messages.{$id}", function () use ($id) {
    //   return Message::findOrFail($id);
    // });
    return Message::findOrFail($id);
  }

  public function update($request, $id)
  {
    //Cache::flush();
    return Message::findOrFail($id)->update($request->all());
  }

  public function destroy($id)
  {
    //Cache::flush();
    return Message::findOrFail($id)->delete();
  }
}
