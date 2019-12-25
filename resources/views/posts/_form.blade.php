<div class="form-group">
    <lable for='post-title'>Title</lable>
    <input 
        type='text'
        id='post-title'
        name='title'
        placeholder="Post title"
        class="form-control"
        value="{{ old('title', $post->title ?? null ) }}"
        />
</div>

<div class="form-group">
    <lable for='post-content'>Content</lable>
    <input 
        type='text'
        id='post-content'
        name='content'
        placeholder="Post content"
        class="form-control"
        value="{{ old('content', $post->content ?? null)  }}"
    />
</div>

@include('peaces._errors')