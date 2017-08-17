<?php
namespace App;
use Illuminate\Http\Request;

class Flash {
  public static function callout(String $type, String $message, Request $request) {
    $request->session()->flash('callout', ['type' => $type, 'message' => $message]);
  }
}
