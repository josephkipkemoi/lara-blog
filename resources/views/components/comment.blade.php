{{-- <div class="container row">
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
  --}}
  <div class="card container mt-4">
        <div class="p-4"><span class="bg-dark text-white rounded p-2">Discussion</span></div>
        <div class="row justify-content-center">
            <div class="col col-2 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </div>
            <div class="col col-6 card bg-light">
                <div class="card-body">
                    <span>{{ auth()->user()->full_name }}</span>
                    <textarea class="form-control" placeholder="Leave a comment"></textarea>
                    <button class="btn btn-dark p-2 float-end mt-2">Post Comment</button>
                </div>
            </div>
            <div class="p-4"><span class="p-2 fw-bold">0 Comments</span></div>
            <div class="col col-2 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </div>
            <div class="col col-6 card bg-light p-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <span>Francis Kimanzi <small class="text-secondary">3 months ago</small></span>
                    </div>
                </div>
                <div class="mt-2 mb-2">
                    <span>Some comment</span>
                </div>
                <div>
                    <small>Like (0) | </small>
                    <small>Reply | </small>
                    <small>Edit | </small>
                    <small>Remove</small>
                </div> 
            </div>
        </div>
  </div>