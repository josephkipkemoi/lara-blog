<div class="container row">
    <form method="POST" action="{{route('comment.store', [$slot])}}">
    @csrf
        <div class="form-group col-sm-3">
        @error('comment_body')
            <span class="d-block text-danger">{{$message}}</span>
        @enderror
            <label for="comment">Comment</label>
            <input type="text" class="form-control" name="comment_body"/>
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </div>
    </form>
</div>
 