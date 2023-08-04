<style>

    /* card styles */
.card {
  border: none;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  margin-bottom: 30px;
}

.card-header {
  background-color: #f8f9fa;
  font-weight: bold;
}

.card-body {
  padding: 30px;
}

/* title styles */
h1 {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 20px;
}

h2 {
  font-size: 28px;
  font-weight: bold;
  margin-top: 50px;
  margin-bottom: 20px;
}

/* link styles */
a {
  color: #007bff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

/* list styles */
ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

ul li {
  margin-bottom: 10px;
}

ul li:before {
  content: "\f054";
  font-family: FontAwesome;
  margin-right: 10px;
  color: #28a745;
}

/* media queries */
@media screen and (max-width: 768px) {
  h1 {
    font-size: 24px;
  }

  h2 {
    font-size: 22px;
  }
}

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Learn') }}</div>

                <div class="card-body">
                    <h1>{{ $classroom->name }}</h1>
                    <p>{{ $classroom->formation->title }}</p>
                    <p>{{ $classroom->formation->meeting_url }}</p>
                    <hr>
                    <h2>Lessons</h2>
                    <ul>
                        @foreach ($classroom->formation->lessons as $lesson)
                        <li>
                            <a href="{{ $lesson->mediaUrl }}">{{ $lesson->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>