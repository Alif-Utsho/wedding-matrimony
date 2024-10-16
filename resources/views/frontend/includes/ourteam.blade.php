<div class="home-tit">
    <p>OUR PROFESSIONALS</p>
    <h2><span>Meet Our Team</span></h2>
    <span class="leaf1"></span>
</div>

<ul>
    @foreach($ourteams as $team)
    <li>
        <div>
            <img src="{{ asset($team->image) }}" alt="" loading="lazy">
            <h4>{{ $team->title }}</h4>
            <p>{{ $team->designation }}</p>
            <ul class="social-light">
                <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </li>
    @endforeach
</ul>