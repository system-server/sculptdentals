    <div class="profile_img">
      <div id="crop-avatar">
        <!-- Current avatar -->
        @if( $customer->sex == 'MASCULINO' )
          <img class="img-responsive avatar-view" src=" {{ asset('img/template/male_avatar.png') }} " alt="Avatar" title="Change the avatar">
        @else
          <img class="img-responsive avatar-view" src=" {{ asset('img/template/female_avatar.png') }} " alt="Avatar" title="Change the avatar">
        @endif
      </div>
    </div>
    <h3> {{ $customer->name }} </h3>
    <h4> {{ $customer->last_name_one .' '. $customer->last_name_two }} </h4>
    <ul class="list-unstyled user_data">
      @if( $customer->address )
        <li>
          <i class="fa fa-map-marker user-profile-icon"></i> {{ $customer->address }}
        </li>                        
      @endif
      @if( $customer->references )
        <li>
          <i class="fa fa-location-arrow user-profile-icon"></i> {{ $customer->references }}
        </li>                        
      @endif    
      @if( $customer->age )
        <li>
          <i class="fa fa-calendar user-profile-icon"></i> {{ $customer->age }} años
        </li>                        
      @endif
      @if( $customer->cell_phone )
        <li>
          <i class="fa fa-mobile user-profile-icon"></i> {{ $customer->cell_phone }}
        </li>                        
      @endif  
      @if( $customer->home_phone )
        <li>
          <i class="fa fa-phone user-profile-icon"></i> {{ $customer->home_phone }}
        </li>                        
      @endif
      @if( $customer->sex )
        <li>
          <i class="fa fa-male user-profile-icon"></i> {{ ucfirst(strtolower($customer->sex)) }}
        </li>                        
      @endif
      @if( $customer->civil_state )
        <li>
          <i class="fa fa-tag user-profile-icon"></i> {{ ucfirst(strtolower($customer->civil_state)) }}
        </li>                        
      @endif                                                                                        
    </ul>
    @can('users.create')
      <a href=" {{ route('users.edit', $customer->id) }} " class="btn btn-success btn-xs"><i class="fa fa-edit m-right-xs"></i>Editar</a>
    @endcan
    <br />