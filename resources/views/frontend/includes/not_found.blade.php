<div class="row">
    <div class="container">
        <div style="text-align: center">
            <div style="background-image: url('{{url('img/no_data.jpg')}}');height: 300px;background-position: center;background-repeat: no-repeat;background-size: contain;"></div>
            <h3>{{$not_found_title}}</h3>
            <p>{{$not_found_description}}</p>

            @if($not_found_button_caption != null)

                <a href="{{ url('map-search') }}" class="btn btn-primary" style="background-color: #ff5d15;border-color: #ff5d15">{{$not_found_button_caption}}</a>

            @endif
        </div>
    </div>
</div>