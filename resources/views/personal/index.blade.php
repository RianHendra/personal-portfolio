<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Two People</title>
    <link rel="stylesheet" href="{{ asset('front/css/style-personal.css') }}">
    @foreach ($users as $user)
   <style>
    .person-header:nth-child(1) {
    /* background-color: #FF5733; */
    background: url("{{ asset('storage/' . $user->photo) }}") no-repeat center center/cover;
    background-size: cover;
    background-position-y: -250px;
    filter: grayscale(100%);
    transition: 0.3s;
    }

    .person-header:nth-child(2) {
    /* background-color: #007BFF; */
    background: url("{{ asset('storage/' . $user->photo ) }}") no-repeat center center/cover;

    background-size: cover;
    background-position-y: -270px;
    filter: grayscale(100%);
    transition: 0.3s;
}
@endforeach;
</style>
</head>

<body>
    <div class="header">
        @foreach ($users as $user)
        <div class="person-header" >
            <h2>{{ $user->name }}</h2>
            @if($user->category && $user->category != 'belum ada kategori')
                <p>{{ $user->category }}</p>
            @else
                <p>No skills available.</p>
            @endif
        </div>
        @endforeach
    </div>
    <section class="about-section">
        <div class="about-container">
            <div class="about-text">
                <h2>Tentang Kami</h2>
                <p>
                    Kami adalah komunitas yang berfokus pada pengembangan kemampuan teknologi,
                    memberikan pelatihan, dan berbagi pengalaman kepada semua orang.
                    Visi kami adalah menciptakan generasi yang siap menghadapi tantangan digital di masa depan.
                </p>
            </div>
            <div class="about-image">
                <img src="{{ asset('front/personal/image/about.png')}}" alt="About Us">
            </div>
        </div>
    </section>


    <section class="portfolio">
        <div class="portfolio-menu">
            <button class="menu-btn active">All</button>
            <button class="menu-btn">Advert</button>
            <button class="menu-btn">Web Design</button>
            <button class="menu-btn">Mobile App</button>
        </div>
        <div class="portfolio-items">
            @foreach ( $projects as $project )
            <div class="portfolio-item" data-category="{{ $project->category }}">
                <img src="{{ asset('storage/' . $project->image)   }}" alt="Project 1">
            </div>
            @endforeach
        </div>
    </section>


    <div class="skills-section">
        <h2>Skills</h2>
        <div class="skills-grid">
            @foreach ($skills as $skill)
            <div class="skill-item">
                <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->name }}">
                <h3>{{ $skill->name }}</h3>
                <p>{{ $skill->category }}</p>
            </div>
            @endforeach
            <!-- Tambahkan lebih banyak skill sesuai kebutuhan -->
        </div>
    </div>

    <div class="contact-section">
        <h3>Kontak Kami</h3>
        <p>"Jangan ragu untuk menghubungi kami untuk pertanyaan atau kolaborasi apa pun.".</p>
        <div class="contact-container">
            @foreach ($users as $user)
            <div class="contact-info">
                <p><strong>Email:</strong> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                <p><strong>Phone:</strong> {{ $user->phone }}</p>
                <p><strong>Social:</strong>
                    <a href="https://www.instagram.com/{{ $user->instagram }}" target="_blank">Instagram</a>,
                    <a href="https://api.whatsapp.com/send?phone={{ $user->phone }}&text=Hai%20mau%20kenalan%20dong" target="_blank">Whatsapp</a>
                </p>
            </div>
            @endforeach
        </div>
    </div>
  

    <script src="{{ asset('front/js/personal.js') }}">

    </script>
</body>

</html>