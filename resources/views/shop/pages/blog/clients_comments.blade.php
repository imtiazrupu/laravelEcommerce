<ul class="media-list list-unstyled">
    @foreach ($comments as $comment)


        <li class="media">
            <a class="pull-left" href="#">
                <div class="pull-left">
                    <img src="{{asset('frontend/img/preview/author.jpg')}}" alt="image">
                </div>
            </a>
            <div class="media-body">
                <h5 class="media-heading">{{ $comment->name }}<span class="time-right">{{$comment->created_at}}</span></h5>
                <p>{{$comment->comment}} </p>
                <!-- Nested media object -->
                <div class="media">


                </div>
                <!-- Nested media object -->

            </div>
        </li>
        @endforeach
    </ul>
