<?php $callout = Request::session()->get('callout') ?>
@if(isset($callout))
<div class="alert alert-{{ $callout['type'] }} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  {!! $callout['message'] !!}
</div>
@endif
