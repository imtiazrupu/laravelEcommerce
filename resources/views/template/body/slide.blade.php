
<div class="revolution-container">
    <div class="revolution">
        <ul class="list-unstyled">

                    <!-- SLIDE  -->
                    @foreach ($slides as $slide)


            <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                <!-- MAIN IMAGE -->
                <img src="{{  url('storage/' . $slide->img) }}"  alt="slidebg1"  data-bgfit="cover"  data-bgposition="center center" data-bgrepeat="no-repeat">
                <!-- LAYERS -->
                <div class="tp-caption skewfromrightshort customout"
                     data-x="20"
                     data-y="160"
                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="500"
                     data-start="300"
                     data-easing="Power4.easeOut"
                     data-endspeed="500"
                     data-endeasing="Power4.easeIn"
                     data-captionhidden="on"
                     style="z-index: 4">
                     <h3  style="font-family: 'Tangerine', serif;  color:aliceblue; font-size: 70px;"> {{$slide->text_one}}</h3>
                    {{-- <img src="{{asset('frontend/img/preview/slider/1.png')}}" alt=""> --}}
                </div>
                <div class="tp-caption skewfromrightshort customout"
                     data-x="20"
                     data-y="224"
                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="500"
                     data-start="500"
                     data-easing="Power4.easeOut"
                     data-endspeed="500"
                     data-endeasing="Power4.easeIn"
                     data-captionhidden="on"
                     style="z-index: 4">
                     <h1 style="font-family: normal; text-transform: uppercase; font-weight: bold; color:#eb2c33; font-size: 110px; margin-top:5px;">{{$slide->text_two}}</h1>
                    {{-- <img src="{{asset('frontend/img/preview/slider/1-2.png')}}" alt=""> --}}
                </div>
                <div class="tp-caption skewfromrightshort customout"
                     data-x="20"
                     data-y="335"
                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="500"
                     data-start="700"
                     data-easing="Power4.easeOut"
                     data-endspeed="500"
                     data-endeasing="Power4.easeIn"
                     data-captionhidden="on"
                     style="z-index: 4">
                     <h2 style="text-transform: uppercase; font-weight: bold; color:aliceblue; font-size: 60px;">{{$slide->text_three}}</h2>
                    {{-- <img src="{{asset('frontend/img/preview/slider/1-1.png')}}" alt=""> --}}
                </div>

                <div class="tp-caption customin customout hidden-xs"
                     data-x="20"
                     data-y="430"
                     data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="500"
                     data-start="1000"
                     data-easing="Power4.easeOut"
                     data-endspeed="500"
                     data-endeasing="Power4.easeIn"
                     data-captionhidden="on"
                     style="z-index: 2">
            <a href="{{url('all-product')}}" class="btn-home">{{$slide->button_one}}</a>
                </div>
                <div class="tp-caption customin customout hidden-xs"
                     data-x="145"
                     data-y="430"
                     data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="500"
                     data-start="1200"
                     data-easing="Power4.easeOut"
                     data-endspeed="500"
                     data-endeasing="Power4.easeIn"
                     data-captionhidden="on"
                     style="z-index: 2">
                    <a href="#" class="btn-home">{{$slide->button_two}}</a>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="revolutiontimer"></div>
    </div>
</div>
