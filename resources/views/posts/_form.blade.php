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
    <textarea 
    id='post-content'
        class="form-control"
        name='content'
        placeholder="Post content"
    />{{ old('content', $post->content ?? null)  }}</textarea>
</div>

@include('peaces._errors')