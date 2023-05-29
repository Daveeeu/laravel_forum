
    <style>
        .overflow-control {
  white-space: nowrap;
  overflow: hidden;
  text-overflow:ellipsis;
}
    </style>
    
    <div class="row mt">
  <div class="col-12">
    <div class="rounded-top p-3 m-0 d-flex align-items-center" style="background-color: hsl(195, 73%, 58%);
  color: hsl(0, 0%, 100%);
  font-weight: 600;
  font-size: 13px;
  text-shadow: 0 1px 1px hsl(195, 73%, 40%);">
      <div class="col-8 col-sm-10">
        Posztok
      </div>
      @auth
      <div class="col-4 col-sm-2 text-end">
        <a data-connect>
            @include('layouts.partials.modal')
        </a>
      </div>
      @endauth

    </div>

    <div class="toggleview">
      <table class="table table-bordered">
        <thead style="background-color: hsl(206, 35%, 13%);
  border-right: 1px solid hsl(212, 35%, 15%);
  border-left: 1px solid hsl(212, 28%, 12%);
  
  color: hsl(0, 0%, 100%);
  font-weight: 300;
  font-size: 12px;
  text-shadow: 0 1px 1px hsl(0, 0%, 0%);
  text-align: center;">
          <tr>
            <th class="column">Bejegyzés</th>
            <th class="column">Készült</th>
            <th class="column">Szerző</th>
            <th class="column">Kedvelések</th>
            <th class="column">Interakció</th>
          </tr>
        </thead>
    @foreach ($posts as $post)
        <tbody>
          <tr>
            <td>
              <i class="bi bi-file-earmark"></i>
              <span class="overflow-control">
                <a href="{{ route('posts.getpost', $post->id) }}" style="text-decoration:none;  color: hsl(195, 73%, 58%);
  font-weight: 600;">{{ $post->title }}</a>
              </span>
              <br>
              <span class="overflow-control" style="color: rgba(0,0,0,.3)"> 
              {{ $post->content }}
              </span>
            </td>
            <td>
              <span>{{ $post->created_at }}</span>
            </td>
            <td>
              <span>{{ $post->author->username }}</span>
            </td>
            <td>
              <span>{{ $post->likes()->count() }}</span>
            </td>
            <td>
            @auth

                @if($isAdmin || $post->authorid === auth()->user()->id)
                <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Törlés</button>
                </form>
            @endauth
                @else
                    Ehhez a bejegyzéshez nincs jogosultságod
                @endif
              
            </td>
          </tr>
        </tbody>
        @endforeach
    </table>
  </div>
</div>
</div>

