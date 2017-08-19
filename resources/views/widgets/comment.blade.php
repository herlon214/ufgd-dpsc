<div class="row">
    @foreach($classified->comments as $comment)
    <div class="col-12">
      <form action="{{ action('CommentsController@destroy', $comment->id) }}" method="POST">
        {{ csrf_field() }}
        <blockquote class="blockquote">
          <p class="mb-0">{!! nl2br($comment->comment) !!}</p>
          <footer class="blockquote-footer">
              <input type="hidden" name="_method" value="DELETE"/>

              <strong>{{ $comment->user->name }}</strong> em <small>{{ date('d/m/Y', strtotime($comment->created_at))}}</small>
              @if(\Auth::user() && \Auth::user()->id == $comment->user->id)
                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
              @endif
            
          </footer>
        </blockquote>
      </form>
    </div>
    @endforeach

    @if(count($classified->comments) == 0)
    <div class="col-12 text-center">Nenhum comentário foi postado ainda.</div>
    @endif
</div>

<div class="row">
  <div class="col">
      <hr />
      <h4>Escreva seu comentário</h4>
      @if(\Auth::user())
        {!! form($form) !!}
      @else
        <div class="text-centered">Você precisa acessar sua conta para fazer um comentário, <a href="{{ url('/login') }}">clique aqui</a> para logar.</div> 
      @endif
      
  </div>
</div>