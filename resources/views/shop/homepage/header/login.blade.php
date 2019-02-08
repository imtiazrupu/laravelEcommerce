<div id="account-menu" class="pull-right">
        @if(!Auth::check())
    <a href="#" class="account-menu-title"><i class="fa fa-user"></i>&nbsp; Log In  </a>
    <ul class="list-unstyled account-menu-item">
        <li class="dropdown-bordered bg_grey_light login_dropdown t_align_l">
                <form class="m_bottom_5" method="post" action="{{ url('customer-login') }}">
                        @csrf
                        <ul id="loginarea-cnt" class="sub_menu bg_grey_light sub_menu_inverse sub_menu_no_hover">
                            <li class="m_bottom_10">
                                <label for="email"
                                       class="second_font d_block fw_light tt_uppercase color_dark">Email</label>
                                <input type="text" name="email" id="email" class="w_full tr_all" autocomplete="off"
                                       placeholder="Your email here...">
                            </li>
                            <li class="m_bottom_10">
                                <label for="password"
                                       class="second_font d_block fw_light tt_uppercase color_dark">Password</label>
                                <input type="password" name="password" id="password" class="w_full tr_all"
                                       placeholder="Your password here...">
                            </li>
                            <li class="m_bottom_10">
                                <input type="checkbox" name="remember_me" id="remember_me">
                                <label for="remember_me" class="second_font fw_light tt_uppercase color_dark">Remember
                                    me</label>
                            </li>
                        </ul>
                        <input type="hidden" name="goto" id="goto" value="#">
                        <button type="submit" name="login"
                                class="lh_28 t_align_c tt_uppercase w_full second_font d_block button_type_2 custom_color tr_all login-button">
                            LOG IN
                        </button>
                        <a href="#" class="p_left_0 second_font fs_ex_small underline">Forgot password?</a>
                        <h5 class="color_dark tt_uppercase second_font m_bottom_5 fw_light m_top_20">New customer?</h5>
                        <a href="{{ url('customer-login') }}" role="button"
                           class="lh_28 t_align_c tt_uppercase w_full second_font d_block button_type_2 custom_color tr_all">Start
                            here</a>
                </form>
        </li>

    </ul>
    @else
    <div id="currency" class="pull-right">
        <a href="#" class="currency-title">{{ Auth::user()->first_name }}  </a>
        <ul class="list-unstyled currency-item">
        <li><a href="{{url('customer-profile')}}">Profile</a></li>
            <li><a href="{{ url('customer-logout') }}">Log Out</a></li>
        </ul>
    </div>



    @endif
</div>






