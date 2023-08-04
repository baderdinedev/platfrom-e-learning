<style>
        body {
        background-color: #f1f1f1;
    }
    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
        max-width: 800px;
  min-width: 640px;
  margin: 0 auto;
    }

    .card-img-top {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .card-body {
        padding: 10px;
    }

    .card-title {
        font-size: 20px;
        font-weight: bold;
    }

    .card-text {
        margin-bottom: 10px;
    }

    .card-footer {
        padding: 10px;
        background-color: #f7f7f7;
    }

    .btn-outline-secondary {
        color: #555;
        border-color: #ccc;
        margin-right: 5px;
    }

    .btn-outline-secondary:hover {
        color: #333;
        background-color: #f7f7f7;
        border-color: #999;
    }

    .media {
        display: flex;
        align-items: center;
    }

    .fa-user-circle {
        font-size: 3em;
        margin-right: 10px;
    }

    .media-body {
        flex: 1;
    }

    .form-group {
        margin-bottom: 10px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }
</style>


<div class="card">
    <img class="card-img-top" src="{{ asset('storage/images/' . $news->image) }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{ $news->title }}</h5>
        <p class="card-text">{{ $news->content }}</p>
    </div>
    <div class="card-footer">
        <form method="POST" action="{{ route('news.like', ['id' => $news->id]) }}">
            @csrf
            <button type="submit" name="like" value="1" class="btn btn-sm btn-outline-secondary"><i class="far fa-thumbs-up"></i> Like</button>
            <button type="submit" name="like" value="0" class="btn btn-sm btn-outline-secondary"><i class="far fa-thumbs-down"></i> Dislike</button>
        </form>
    </div>
</div>

@if(count($news->comments) > 0)
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Comments</h5>
            <ul class="list-unstyled">
                @foreach($news->comments as $comment)
                    <li class="media my-4">
                        <i class="fas fa-user-circle fa-3x"></i>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">{{ $comment->user->name }}</h5>
                            <p>{{ $comment->content }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="card mt-3">
    <div class="card-body">
        <form method="POST" action="{{ route('news.comment', ['id' => $news->id]) }}">
            @csrf
            <div class="form-group">
                <label for="comment">Add a Comment</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div> 






