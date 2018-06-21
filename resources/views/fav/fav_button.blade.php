@if (Auth::user()->is_faving($micropost->id))
      {!! Form::open(['route' => ['fav.unfav', $micropost->id], 'method' => 'delete']) !!}
      {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-xs"]) !!}
      {!! Form::close() !!}
@else
      {!! Form::open(['route' => ['fav.fav', $micropost->id], 'method' => 'post'] ) !!}
      {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-xs"]) !!}
      {!! Form::close() !!}
@endif
