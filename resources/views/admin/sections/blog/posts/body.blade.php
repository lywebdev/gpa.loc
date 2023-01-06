@csrf
<div class="mb-1 row">
    <div class="col-md-12">
        <label for="post[title]" class="col col-form-label">Заголовок поста</label>
        <div class="col">
            @include('admin.components.forms.input', [
                'name' => 'post[title]',
                'placeholder' => 'Заголовок поста',
                'value' => $post->title ?? ''
            ])
        </div>
    </div>
</div>

<div class="mb-1 row">
    <label for="example-text-input" class="col-form-label">Категория поста</label>
    <div class="col-md-12">
        <select class="form-control select2" name="post[category_id]" style="width: 100%;">
            <option value="-1" selected="selected">Нет категории</option>
            @if (isset($post->category))
                @foreach ($categories as $categoryRow)
                    <option value="{{ $categoryRow->id }}" @if($post->category === $categoryRow->id) selected="selected" @endif>{{ $categoryRow->getParentsNames() }}</option>
                @endforeach
            @else
                @foreach ($categories as $categoryRow)
                    <option value="{{ $categoryRow->id }}">{{ $categoryRow->getParentsNames() }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="mb-1 row">
    <div class="col-md-12">
        <label for="post[content]" class="col-form-label">Содержимое поста</label>
        <textarea id="elm1" name="post[content]">{{ $post->content ?? null }}</textarea>
    </div>
</div>

<div class="imager-container" style="margin-top: 15px;"></div>
