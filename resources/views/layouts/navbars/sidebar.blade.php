<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
   <!--  <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      {{ __('CT') }}
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a> -->
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="fab fa-laravel"></i>
          <p>
            {{ __("User Management") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('users.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Users") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'roles') active @endif">
              <a href="{{ route('roles.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Roles") }} </p>
              </a>
            </li>
          </ul>
        </div>
      <li class="@if ($activePage == 'companies') active @endif">
        <a href="{{ route('companies.index') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Companies') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'maps') active @endif">
        <a href="{{ route('agencies.index') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Agencies') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'branches') active @endif">
        <a href="{{ route('branches.index') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Branches') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('currency.index') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Currency') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','typography') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Transfer Rates') }}</p>
        </a>
      </li>
     <!--  <li class = "">
        <a href="{{ route('page.index','upgrade') }}" class="bg-info">
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> -->
    </ul>
  </div>
</div>
