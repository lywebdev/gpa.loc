@csrf
<div class="mb-1 row">
    <div class="col-md-12">
        <label for="category[name]" class="col col-form-label">Название категории</label>
        <div class="col">
            @include('admin.components.forms.input', [
                'name' => 'category[name]',
                'placeholder' => 'Название категории',
                'value' => $category->name ?? ''
            ])
        </div>
    </div>
</div>

<div class="mb-1 row">
    <label for="example-text-input" class="col-form-label">Выберите родительскую категорию</label>
    <div class="col-md-12">
        <select class="form-control select2" name="category[parent_id]">
            <option value="-1" selected="selected">Нет категории</option>
            @if (isset($category))
                @foreach ($categories as $categoryRow)
                    <option value="{{ $categoryRow->id }}" @if($category->parent_id === $categoryRow->id) selected="selected" @endif>{{ $categoryRow->getParentsNames() }}</option>
                @endforeach
            @else
                @foreach ($categories as $categoryRow)
                    <option value="{{ $categoryRow->id }}">{{ $categoryRow->getParentsNames() }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="imager-container" style="margin-top: 15px;"></div>
