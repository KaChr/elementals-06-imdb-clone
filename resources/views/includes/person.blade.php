<div class="divider">
    <div class="divider__info is-flex">
        <h5 class="divider__title">CAST & CREW</h5>
        <a href="#">VIEW ALL</a>
    </div>
    <span class="divider__line"></span>
</div>
<section class="columns">
    <!-- TODO: Figure out how to continue looping after two -->
    @foreach($item->actors->take(2) as $actor)    
    <div class="column is-half-desktop">
        <div class="columns is-mobile">
            <div class="column is-narrow">
                <div class="person__avatar">
                    <img src="{{$actor->profile_pic}}" alt="avatar">
                </div>
            </div>
            <div class="column">
                <div>
                    <h4 class="person__name">{{$actor->name}}</h4>
                    <p class="p__fig">as {{$actor->role}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach  
</section>