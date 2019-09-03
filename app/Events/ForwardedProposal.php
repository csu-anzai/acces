<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ForwardedProposal implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $username;
  public $message;
  public $creator_id;

  public function __construct($username, $creator_id)
  {
      $this->username = $username;
      $this->message = "{$username} forwarded your proposal.";
      $this->creator_id = $creator_id;
  }

  public function broadcastOn()
  {
      return ['proposal-channel'];
  }

  public function broadcastAs()
  {
      return 'forwarded-proposal';
  }
}
