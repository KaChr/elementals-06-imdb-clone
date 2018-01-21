@include('includes.divider', ['title' => 'SEASONS'])
@foreach($seasons as $index => $season)
    @if($index % 2 === 0)
    <section class="columns">
    @endif
        <div class="column is-6">
            <a href="{{$item[0]->item_id}}/seasons/{{$season->season_nr}}">Season {{$season->season_nr}}</a>
        </div>
    @if($index % 2 !== 0)
        </section>
    @endif
@endforeach