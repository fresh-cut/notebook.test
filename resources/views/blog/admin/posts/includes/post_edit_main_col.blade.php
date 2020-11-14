
{{--<div class="form-group">--}}
{{--    <label for="title">Заголовок</label>--}}
{{--    <input type="text" class="form-control" id="title" name="title" value="{{$item->title}}" autocomplete="off" required>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--    <label for="description">Статья</label>--}}
{{--    <textarea style="height: 400px" name="description" id="description" class="form-control">{{old('content_raw',$item->content_raw)}}</textarea>--}}
{{--</div>--}}
@php
    /** @var \App\Models\BlogPost $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                    @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="car-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" aria-controls="maindata" aria-selected="true" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#adddata" aria-controls="adddata" aria-selected="false" role="tab">Доп. информация</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel" aria-labelledby="maindata-tab">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" class="form-control" minlength="3" required name="title" id="title" value="{{$item->title}}">
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Статья</label>
                            <textarea name="content_raw" id="content_raw" class="form-control" cols="30" rows="10">{{ old('content_raw', $item->content_raw) }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel" aria-labelledby="adddata-tab">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach( $categoryList as $category)
                                    <option value="{{ $category->id }}" @if( $category->id == $item->category_id) selected @endif">
                                        {{ $category->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input type="text" class="form-control" name="slug" value="{{ $item->slug }}">
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea name="excerpt" class="form-control" cols="30" rows="10" > {{ old('excerpt', $item->excerpt) }}</textarea>
                        </div>
                        <div class="form-check">
                            <input name="is_published"
                                    type="hidden"
                                    value="0">
                            <input type="checkbox" class="form-check-input" value="1" name="is_published" @if($item->is_published) checked @endif>
                            <label for="is_published" class="form-check-label">Опубликовано</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
