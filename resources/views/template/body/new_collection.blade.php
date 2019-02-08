<div class="block">
    <div class="container">
        <div class="header-for-dark">
            <h1 class="wow fadeInRight animated" data-wow-duration="2s">New <span>Collections</span></h1>
        </div>
        <div class="row">
            @foreach ($newCollections as $newCollection)

            <div class="col-md-9">
                <article class="block-chess wow fadeInLeft" data-wow-duration="2s">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{url('mordern-product-category')}}"><img class="img-responsive" src="{{url('storage/' .$newCollection->img)}}" alt=""></a>

                        </div>
                        <div class="col-md-8">
                            <div class="chess-caption-right">
                                <a href="{{url('mordern-product-category')}}" class="col-name">{{ $newCollection->name}} </a>
                                <p>
                                        {{ $newCollection->description }}
                                </p>

                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-md-3">
                <article class="block-chess wow fadeInRight" data-wow-duration="2s">
                    <a href="#"><img class="img-responsive" src="{{url('storage/'.$newCollection->img2)}}" alt=""></a>
                </article>
            </div>
            @endforeach
        </div>

        <div class="row">
            @foreach ($classicCollections as $classicCollection)
            <div class="col-md-3">
                <article class="block-chess wow fadeInLeft" data-wow-duration="2s">
                <a href="{{url('classic-product-category')}}"><img class="img-responsive" src="{{url('storage/'.$classicCollection->img2)}}" alt=""></a>
                </article>
            </div>

            <div class="col-md-9">
                <article class="block-chess wow fadeInRight" data-wow-duration="2s">
                    <div class="row">

                        <div class="col-md-8">
                            <div class="chess-caption-left">
                            <a href="{{url('classic-product-category')}}" class="col-name">{{ $classicCollection->name}}</a>
                                <p>
                                    {{ $classicCollection->description}}
                                </p>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="#"><img class="img-responsive" src="{{url('storage/'.$classicCollection->img)}}" alt=""></a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</div>
