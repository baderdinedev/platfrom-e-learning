<style>
    
    *,
*::after,
*::before {
  box-sizing: inherit;
}

body {
  font-family: 'Montserrat';
  background: #f2f2f2;
  font-size: 14px;
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  background: linear-gradient(to bottom, #ff0000, #0000ff);
}

.container {
  max-width: 800px;
  min-width: 640px;
  margin: 0 auto;
}
.read-more-link {
        color: #000;
        text-decoration: none;
        font-weight: bold;
    }

    .read-more-link:hover {
        color: #ff0000;
        text-decoration: underline;
    }
.column {
  width: 50%;
  float: left;
  padding: 0 25px;
}

.title {
  color: #666666;
  text-transform: uppercase;
}



.post-card {
  position: relative;
  box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
  background: #fff;
  min-width: 270px;
  height: 470px;
}

.post-card:hover,
.hover {
  -webkit-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
}

.post-card:hover .post-img,
.hover .post-img,
{
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  transform: scale(1.1);
  opacity: .6;
}

.post-img{
  height: 400px;
  overflow: hidden;
}

.post-card img {
  display: block;
  width: 135%;
  
}

.date {
  position: absolute;
  top: 20px;
  right: 20px;
  z-index: 1;
  background: #e74c3c;
  width: 55px;
  height: 55px;
  border-radius: 100%;
  color: #FFFFFF;
  text-align: center;
  padding: 12.5px 0;
}

.post-content {
  position: absolute;
  bottom: 0;
  background: #FFFFFF;
  width: 100%;
  padding: 30px;
}

.category {
  position: absolute;
  top: -34px;
  left: 0;
  background: #e74c3c;
  padding: 10px 15px;
  color: #FFFFFF;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
}

.title {
  margin: 0;
  padding: 0 0 10px;
  color: #333333;
  font-size: 26px;
  font-weight: 700;
}

.sub_title {
  margin: 0;
  padding: 0 0 20px;
  color: #e74c3c;
  font-size: 20px;
  font-weight: 400;
}

.description {
  color: #666666;
  font-size: 14px;
  line-height: 1.8em;
  display: none;
}

.up-title {
  margin: 0 0 15px;
  color: #666666;
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
}

.hover .post-content .description {
  display: block !important;
  height: auto !important;
  opacity: 1 !important;
}

.post-meta {
  margin: 30px 0 0;
  color: #999999;
}

.timestamp {
  margin: 0 16px 0 0;
}

.post-meta a {
  color: #999999;
  text-decoration: none;
}

</style>
<head>
    <title>Quebec News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<div class="container">
@foreach($news as $new)
  <div class="column">
    <div class="post-card">
      <div class="post-img">
      <div class="date">
          <div class="day">{{ date('d', strtotime($new->created_at)) }}</div>
          <div class="month">{{ date('M', strtotime($new->created_at)) }}</div>
        </div>
        <img src="{{ asset('storage/images/' . $new->image) }}" />
      </div>
      <div class="post-content">
        <div class="category">{{ $new->title }}</div>
        <h1 class="title"></h1>
        <h2 class="sub_title">{{ \Illuminate\Support\Str::limit($new->content, 50, '...') }}</h2>
        <p class="description"></p>
        <div class="post-meta">
            <span class="timestamp"><i class="fa fa-clock-o"></i>{{ $new->created_at->diffForHumans() }}</span><span class="comments"><i class="fa fa-comments"></i><a href="#"> {{ $new->comments()->count() }} comments</a></span>
            <span class="likes">
          <i class="fa fa-thumbs-up"></i>
          <a href="#">{{ $new->likes()->sum('like_count') }}</a>
        </span>
        <span class="dislikes">
          <i class="fa fa-thumbs-down"></i>
          <a href="#">{{ $new->likes()->sum('dislike_count') }}</a>
        </span>
        </div>
        <a href="{{ route('blog-show', $new->id) }}" class="read-more-link">Read More</a>
      </div> 
    </div>
    
  </div>
  @endforeach
</div>

<script>
    $(window).load(function() {
  $('.post-card').hover(function() {
    $(this).find('.description').stop().animate({
      height: "toggle",
      opacity: "toggle"
    }, 300);
  });
});
</script>